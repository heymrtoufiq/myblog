<?php
/**
 * Created by PhpStorm.
 * User: Toufiq
 * Date: 2019-04-02
 * Time: 01:40
 */
// session class

class Session{
    // session start here & have access using scope resolution operator
    public static function init(){
        session_start();
    }

    // seter start here
    public static function set($key, $val){
        $_SESSION[$key] = $val;
    }
    // get value
    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return false;
        }
    }
    // login check
    public  static function checkSession(){
        self::init();
        if (self::get("login") == false){
            self::destroy();
            header("Location:login.php");
        }
    }
    public  static function checkLogin(){
        self::init();
        if (self::get("login") == true){
            header("Location:index.php");
        }
    }

    // destroy method
    public static function destroy(){
        session_destroy();
        header("Location:login.php");

    }


}