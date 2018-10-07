<?php

class Config
{
    protected static $settings = array();

    /**
     *
     * getter
     *
     * @return   mixed
     *
     */
    public static function get($key)
    {
        return isset(self::$settings[$key]) ? self::$settings[$key] : null;
    }

    /**
     *
     * setter
     *
     * @return   string
     *
     */
    public static function set($key, $value)
    {
        self::$settings[$key] = $value;
    }
}