<?php

namespace Elliot\CommonBundle\Factory;

class MemcahedFactory
{
    public static function get(array $config)
    {
        $memcached = new \Memcached();

        $memached->addServers($config['servers']);

        return $memcached;
    }
}