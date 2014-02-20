<?php

namespace SoundGap\AppApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserController extends Controller
{
    const ACTION_SIGNUP = 'ACTION_SIGNUP';
    const ACTION_LOGIN = 'ACTION_LOGIN';
    const ACTION_RESETPASSWORD = 'ACTION_RESETPASSWORD';

    private $userManager;
    private $emailInput;
    private $passwordInput;

    public function signupAction()
    {
        $this->userManager = $this->get('fos_user.user_manager');
        $this->emailInput = $this->getRequest()->request->get('email');
        $this->passwordInput = $this->getRequest()->request->get('password');

        // overwrite for test
        $this->emailInput = 'yilliot@gmail.com';
        $this->passwordInput = '111111';

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
        $action = self::ACTION_LOGIN;
        $encoder_service = $this->get('security.encoder_factory');
        $encoder = $encoder_service->getEncoder($user);
        $encoded_pass = $encoder->encodePassword($this->passwordInput, $user->getSalt());

        # generate token
        if ($encoded_pass === $user->getPassword()) {
            $token = $this->generateToken();
        # forget password
        } else {
            $action = self::ACTION_RESETPASSWORD;
            $errorMessages = array('password' => 'Do you forget your password?');
        }
        return array(
            'action' => $action,
            'success' => (self::ACTION_LOGIN === $action),
            'errorMessages' => isset($errorMessages) ? $errorMessages : null,
            'token' => isset($token) ? $token : null,
        );
    }

    protected function signup()
    {
        $user = $this->userManager->createUser();
        $user->setEmail($this->emailInput);
        $user->setPlainPassword($this->passwordInput);
        $user->setEnabled(true);
        $user->setRoles(array('ROLE_APP_USER'));

        $validator = $this->get('validator');
        $errors = $validator->validate($user);

        # error messages
        $errorMessages = array();
        if (count($errors) > 0) {
            foreach ($errors as $key => $error) {
                if(isset($errorMessages[$error->getPropertyPath()]))
                    $errorMessages[$error->getPropertyPath()][] = $error->getMessage();
                else 
                    $errorMessages[$error->getPropertyPath()] = array($error->getMessage());
            }
        # generate token
        } else {
            $result = $this->userManager->updateUser($user);
            $token = $this->generateToken();
        }
        return array(
            'action' => self::ACTION_SIGNUP,
            'success' => !isset($errorMessages) || empty($errorMessages),
            'errorMessages' => isset($errorMessages) ? $errorMessages : null,
            'token' => isset($token) ? $token : null,
        );
    }

    private function generateToken()
    {
        return 'token';
    }
}
