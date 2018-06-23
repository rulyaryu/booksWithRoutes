<?php

class Session {

    private static function __init() {
    // if(session_status() === ' PHP_SESSION_NONE')
        if(session_id() == '') {
            return session_start();
        }
    }


    public static function read(string $key, $child = false) {
        self::__init();

        if(isset($_SESSION[$key])) {
            
            if(false === $child) 
                return $_SESSION[$key];
            else 
                return $_SESSION[$key][$child];

        }
        return false;
    }

    public static function write(string $key, $value) {
        self::__init();

        $_SESSION[$key] = $value;

        return $value;
    }

    public static function delete(string $key) {
        self::__init();

        unset($_SESSION[$key]);
    }

    public static function dump() {
        self::__init();

        print_r($_SESSION);
    }

    public static function start() {
        return self::__init();
    }
    
    public static function destroy() {
        return session_destroy();
    }

}
