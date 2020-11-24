<?php

class Validation {     
    public function validLength($arg, $label, $max) {
        if(strlen($arg) > $max) {
            return $label . ' must be ' . $max . ' characters or less' . "\n";
        } else {
            return "";
        }
    }
    
    public function validUsername($arg, $label) {
        if ($arg === null || $arg === "") {
            return $label . ' must not be empty' . "\n";
        } else if (!(strlen($arg) >= 4 && strlen($arg) <= 30)) {
            return $label . ' must be between 4 and 30 characters long' . "\n";
        } else if (!preg_match('/^\s*[a-z,A-Z]/', trim($arg))) {
            return $label . ' must start with a letter' . "\n";
        } else {
            return $label = '';
        }
    }

    public function validPassword($arg, $label) {
        if ($arg === null || $arg === "") {
            return $label . ' must not be empty' . "\n";
        } else if (!preg_match('/[A-Z]+/', $arg)) {
            return $label . ' must have a capital letter' . "\n";
        } else if (!preg_match('/[a-z]+/', $arg)) {
            return $label . ' must have a lower case letter' . "\n";
        } else if (!preg_match('/[0-9]+/', $arg)) {
            return $label . ' must include a number' . "\n";
        } else if (strlen($arg) < 8) {
            return $label . ' must be at least 8 characters long' . "\n";
        } else {
            return $label = '';
        }
    }

    public function validEmail($arg, $label) {
        if ($arg === null || $arg === "") {
            return $label . ' must not be empty' . "\n";
//        } else if (!filter_var($arg, FILTER_VALIDATE_EMAIL)) {
//            return $label = "The email ".$arg." is not a valid email.";
        } else {
            return $label = "";
        }
    }

}
