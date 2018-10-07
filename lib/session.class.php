<?php

class Session
{
    protected static $flash_message;

    /**
     *
     * set message flash
     *
     * @param    string
     * @return   null
     *
     */
    public static function setFlash($message)
    {
        self::$flash_message = $message;
    }

    /**
     *
     * check message flash
     *
     * @return   boolean
     *
     */
    public static function hasFlash()
    {
        return !is_null(self::$flash_message);
    }

    /**
     *
     * print message flash
     *
     * @return   null
     *
     */
    public static function flash()
    {
        echo self::$flash_message;
        self::$flash_message = null;
    }

    /**
     *
     * setting  value in Session
     *
     * @param    mixed
     *
     * @return   null
     *
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    /**
     *
     * getting value from  Session
     *
     * @param    mixed
     *
     * @return   mixed
     *
     */
    public static function get($key)
    {
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
         return null;
    }

    /**
     *
     * deleting value from  Session
     *
     * @param    mixed
     *
     * @return   null
     *
     */
    public static function delete($key)
    {
        if(isset($_SESSION[$key])){
            unset($_SESSION[$key]);
        }
    }
    /**
     *
     * destroy  Session
     *
     *
     * @return   null
     *
     */
    public static function destroy(){
        session_destroy();
    }
}