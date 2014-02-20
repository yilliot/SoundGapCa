<?php

namespace Elliot\CommonBundle\Factory;

class MemcachedFactory
{
    public static function get(array $config)
    {
        $memcached = new \Memcached();

        $memcached->addServers($config['servers']);

        return $memcached;
    }
}