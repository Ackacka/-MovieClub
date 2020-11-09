<?php

class User {
    private $userID, $email, $username, $password;
    
    function __construct($email, $username, $password) {        
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        
    }
    public function getUserID() {
        return $this->userID;
    }
    
    public function getEmail() {
        return $this->email;
    }
    public function getUsername() {
        return $this->username;
    }
    public function getPassword() {
        return $this->password;
    }
    function setUserID($userID): void {
        $this->userID = $userID;
    }    
    function setEmail($email): void {
        $this->email = $email;
    }
    function setUsername($username): void {
        $this->username = $username;
    }    
    function setPassword($password): void {
        $this->password = $password;
    }
}

