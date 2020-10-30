<?php

namespace App;

trait TSingleton
{
    protected static $instances = [];

    public static function getInstance()
    {
        if (!array_key_exists(static::class, self::$instances)){
            self::$instances[static::class] = new static;
        }

        return self::$instances[static::class];
    }
}
