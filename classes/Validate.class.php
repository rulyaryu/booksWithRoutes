<?php 

class Validate {
    public static function email(string $email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    public static function isLoginUnique(array $logins, string $login) {
        return in_array($login, $logins) == false;
    } 
    public static function checkRepeatPassw($passw1, $passw2) {
        return $passw1 === $passw2;
    } 
    public static function check_len(string $str) {
        return count($str) < 40; 
    }
    public static function clean($val) {
        return htmlspecialchars(trim($val));
    }
    
}

?>