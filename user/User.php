<?php

class User {
    
    public $codUser;
    public $name;
    public $email;
    public $pass;
    
    function __construct($name, $email, $pass) {
        $this->name = $name;
        $this->email = $email;
        $this->pass = $pass;
    }

    
    function getCodUser() {
        return $this->codUser;
    }

    function getEmail() {
        return $this->email;
    }

    function getName() {
        return $this->name;
    }

    function getPass() {
        return $this->pass;
    }

    function setCodUser($codUser) {
        $this->codUser = $codUser;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }



}

