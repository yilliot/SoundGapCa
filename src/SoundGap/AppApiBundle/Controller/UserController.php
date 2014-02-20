<?php

namespace SoundGap\AppApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

use SoundGap\UserBundle\Document\User;


class UserController extends Controller
{
    const ACTION_SIGNUP = 'ACTION_SIGNUP';
    const ACTION_LOGIN = 'ACTION_LOGIN';
    const ERROR_PASSWORD = 'ERROR_PASSWORD';
    const ERROR_PARAM = 'ERROR_PARAM';
    const ERROR_HASH = 'ERROR_HASH';

    private $userManager;
    private $emailInput;
    private $passwordInput;

    public function indexAction()
    {
        // echo $this->container->getParameter('fos_user.resetting.token_ttl');
        $um = $this->get('fos_user.util.token_generator');
        echo get_class($um);
        exit;
    }

    public function resetPasswordAction()
    {

        $this->emailInput = $this->getRequest()->request->get('email');
        // overwrite for test
        $this->emailInput = 'yilliot@gmail.com';

        $this->checkHash($this->emailInput);

        $user = $this->get('fos_user.user_manager')->findUserByEmail($this->emailInput);

        # email not found
        if (null === $user) {

            $data = array(
                'errorCode' => self::ERROR_PARAM,
                'success' => false,
                'message' => $user->getEmail().' hasn\'t not signup yet',
            );
            $response = new JsonResponse();
            $response->setData($data);
            return $response;
        }

        # already sent
        if ($user->isPasswordRequestNonExpired($this->container->getParameter('fos_user.resetting.token_ttl'))) {
            $data = array(
                'errorCode' => null,
                'success' => true,
                'message' => 'Reset password email already sent to '.$user->getEmail(),
            );
            $response = new JsonResponse();
            $response->setData($data);
            return $response;
        }

        # generate token
        if (null === $user->getConfirmationToken()) {
            /** @var $tokenGenerator \FOS\UserBundle\Util\TokenGeneratorInterface */
            $tokenGenerator = $this->get('fos_user.util.token_generator');
            $user->setConfirmationToken($tokenGenerator->generateToken());
        }

        $this->get('fos_user.mailer')->sendResettingEmailMessage($user);
        $user->setPasswordRequestedAt(new \DateTime());
        $this->get('fos_user.user_manager')->updateUser($user);

        $data = array(
            'errorCode' => null,
            'success' => true,
            'message' => 'Reset password email sent to '.$user->getEmail(),
        );
        $response = new JsonResponse();
        $response->setData($data);
        return $response;
    }

    public function signupAction()
    {
        $this->userManager = $this->get('fos_user.user_manager');
        $this->emailInput = $this->getRequest()->request->get('email');
        $this->passwordInput = $this->getRequest()->request->get('password');

        // overwrite for test
        // $this->emailInput = 'yilliot2@gmail.com';
        // $this->passwordInput = '111111';

        $this->checkHash($this->emailInput.$this->passwordInput);

        # find by email
        $user = $this->userManager->findUserByEmail($this->emailInput);

        # login
        if ($user) {
            $data = $this->login($user);
        # signup
        } else {
            $data = $this->signup();
        }

        $response = new JsonResponse();
        $response->setData($data);
        return $response;
    }

    protected function login($user)
    {
        $encoder_service = $this->get('security.encoder_factory');
        $encoder = $encoder_service->getEncoder($user);
        $encoded_pass = $encoder->encodePassword($this->passwordInput, $user->getSalt());

        # generate token
        if ($encoded_pass === $user->getPassword()) {
            //$token = $this->generateUserAccessToken($user);
            $tokenCounter = $this->get('soundgap_api.token_counter');
            $token = $tokenCounter->generateUserAccessToken($user);

        # forget password
        } else {
            $errorCode = self::ERROR_PASSWORD;
            $errorMessages = array('password' => 'Do you forget your password?');
        }
        return array(
            'actionCode' => self::ACTION_LOGIN,
            'errorCode' => isset($errorCode) ? $errorCode : null,
            'success' => !isset($errorCode),
            'errorMessages' => isset($errorMessages) ? $errorMessages : null,
            'token' => isset($token) ? $token : null,
        );
    }

    protected function signup()
    {
        $user = $this->userManager->createUser();
        $user->setEmail($this->emailInput);
        $user->setUsername($this->emailInput);
        $user->setPlainPassword($this->passwordInput);
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_APP_USER'));

        $validator = $this->get('validator');
        $errors = $validator->validate($user);

        # error messages
        $errorMessages = array();
        if (count($errors) > 0) {
            $errorCode = self::ERROR_PARAM;
            foreach ($errors as $key => $error) {
                if(isset($errorMessages[$error->getPropertyPath()]))
                    $errorMessages[$error->getPropertyPath()][] = $error->getMessage();
                else 
                    $errorMessages[$error->getPropertyPath()] = array($error->getMessage());
            }
        # generate token
        } else {
            $result = $this->userManager->updateUser($user);
            $tokenCounter = $this->get('soundgap_api.token_counter');
            $token = $tokenCounter->generateUserAccessToken($user);
        }
        return array(
            'actionCode' => self::ACTION_SIGNUP,
            'errorCode' => isset($errorCode) ? $errorCode : null,
            'success' => !isset($errorMessages) || empty($errorMessages),
            'errorMessages' => isset($errorMessages) ? $errorMessages : null,
            'token' => isset($token) ? $token : null,
        );
    }

    private function generateUserAccessToken($user)
    {
        $userAccessToken = new UserAccessToken();
        $userAccessToken->setUser($user);
        $userAccessToken->setExpiry(strtotime('next year'));
        $dm = $this->get('doctrine_mongodb')->getManager();
        $dm->persist($userAccessToken);
        $dm->flush();
        return $userAccessToken->getId();
    }

    public function checkHash($param)
    {
        $hashLab = $this->get('soundgap_api.hash_lab');
        $hash = $this->getRequest()->request->get('hash');
        // $hash = $hashLab->genHash($this->emailInput.$this->passwordInput);

        try {
            $hashLab->check($hash, $param);
        } catch (\SoundGap\AppApiBundle\Model\HashHttpException $e) {
            $data = array(
                'actionCode' => null,
                'errorCode' => self::ERROR_HASH,
                'success' => false,
                'errorMessages' => null,
                'token' => null,
            );
            $response = new JsonResponse();
            $response->setData($data);
            return $response;
        }
    }
}
