<?php

namespace Kun\CommonBundle\Factory;

class S3Factory
{
    public static function get(array $config)
    {
        $s3 = new \AmazonS3($config['construct']);
        $s3->set_cache_config($config['others']['cache_config_location'], $config['others']['cache_config_gzip']);

        if ($config['others']['disable_ssl']) {
            @$s3->disable_ssl();
        }

        if ($config['others']['disable_ssl_verification']) {
            @$s3->disable_ssl_verification();
        }

        $s3->set_max_retries($config['others']['retries']);

        return $s3;
    }
}