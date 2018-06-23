<?php

class User {
    protected $login, $password, $email;

    public function ___construct($login='Anon', $password='', $email='@mail.com') {
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;    
    }

    public function getLogin() {
        return $this->login;
    }

}
