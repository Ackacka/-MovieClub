<?php

class Validation {
    
    public function validLength($string, $label, $length){
        if(strlen($string) > $length){
            return $label . " must be " . $length . "characters or less.";
        } else {
            return $label = '';
        }
    }
    
    public function validUsername($username, $label) {
        if (empty($username)) {
            return $label . ' must not be empty' . "\n";
        } else if (!(strlen($username) >= 4 && strlen($username) <= 30)) {
            return $label . ' must be between 4 and 30 characters long' . "\n";
        } else if (!preg_match('/^\s*[a-z,A-Z]/', trim($username))) {
            return $label . ' must start with a letter' . "\n";
        } else {
            return $label = '';
        }
    }

    public function validPassword($password, $label) {
        if (empty($password)) {
            return $label . ' must not be empty' . "\n";
        } else if (!preg_match('/[A-Z]+/', $password)) {
            return $label . ' must have a capital letter' . "\n";
        } else if (!preg_match('/[a-z]+/', $password)) {
            return $label . ' must have a lower case letter' . "\n";
        } else if (!preg_match('/[0-9]+/', $password)) {
            return $label . ' must include a number' . "\n";
        } else if (strlen($password) < 8) {
            return $label . ' must be at least 8 characters long' . "\n";
        } else {
            return $label = '';
        }
    }

    public function validEmail($email, $label) {
        if (empty($email)) {
            return $label . ' must not be empty' . "\n";
        } else {
            return $label = "";
        }
    }

}
