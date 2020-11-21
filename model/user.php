<?php

class User {

    private $userID, $email, $username, $password, $proPic;

    function __construct($email, $username, $password, $proPic) {
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->proPic = $proPic;
    }

    function getProPic() {
        return $this->proPic;
    }

    function setProPic($proPic): void {
        $this->proPic = $proPic;
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
