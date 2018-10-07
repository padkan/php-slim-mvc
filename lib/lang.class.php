<?php

class Lang
{
    protected static $data;

    /**
     *
     * loading lang
     *
     * @return   mixed
     *
     */
    public static function load($lang_code)
    {
        $lang_file_path = ROOT.DS.'lang'.DS.strtolower($lang_code).'.php';
        if(file_exists($lang_file_path)){
            self::$data = include($lang_file_path);
        }else{
            throw new Exception('lang file not found in '.$lang_file_path );
        }
    }

    /**
     *
     * getting lang
     *
     * @return   mixed
     *
     */
    public static function get($key, $default_value = '')
    {
        return isset(self::$data[strtolower($key)]) ? self::$data[strtolower($key)] : $default_value ;
    }
}