<?php

namespace SoundGap\AppApiBundle\Model;
use Symfony\Component\HttpKernel\Exception\HttpException;

class HashLab
{
    public function genHash($parameters = '')
    {
        $time = time();
        $hash = $time.$this->getParamHashRight($parameters.$time);
        return $hash;
    }

    /**
     * $hash = time . substr( sha1( params + time + apikey ) ,0 ,10 )
     */
    public function check($hash, $parameterString, $userId = null)
    {
        # check if hash implemented correctly, assume trust origin
        if(!$this->checkParamHash($hash, $parameterString)) {
            throw new HttpException(400, 'invalid hash');
        }

        # if userId+hash found in memcache, possible same request multiple times
        if ($this->memcache->get($userId.$hash)) {
            throw new HttpException(400, 'phishing detected');
        }
        # add userId+hash in memcache for 1 day
        $this->memcache->add($userId.$hash, '1', 86400);
    }

    private function checkParamHash($paramHash, $parameters)
    {
        # get timestamp
        $time = substr($paramHash, 0, 10);

        # request more than one hour
        if((time() - $time) > 3600) return false;

        # sha1 apikey + parameters + time then substr 0,10
        $paramHashRight = $this->getParamHashRight($parameters.$time);
        return $paramHash == $time.$paramHashRight;
    }

    private function getParamHashRight($parameter)
    {
        $apiKey = 'RL@#r3##';
        $output = hash('sha1',$parameter.$apiKey);
        return substr($output, 0, 10);
    }
}