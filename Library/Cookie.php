<?php

namespace Library;

class Cookie
{
    public $name;
    public $value;
    public $expire;
    public $path;
    
    public function __construct($name, $value, $expire = 31536000, $path = '/')
    {
        $this->name = $name;
        $this->value = $value;
        $this->expire =  time() + $expire;
        $this->path = $path;
    }
    
    
    public static function set($key, $value, $time = 31536000)
    {
        setcookie($key, $value, time() + $time, '/') ;
    }
    public static function get($key)
    {
        if ( isset($_COOKIE[$key]) ){
            return $_COOKIE[$key];
        }
        
        return null;
    }
    public static function delete($key)
    {
        if (isset($_COOKIE[$key])){
            self::set($key, '', -3600);
            unset($_COOKIE[$key]);
        }
    }
}