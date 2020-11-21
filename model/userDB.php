<?php

class UserDB {

    public static function search($search) {
        $search = '%' . $search . '%';
        $db = Database::getDB();
        $query = "SELECT * FROM users
                WHERE username LIKE :search";
        $statement = $db->prepare($query);
        $statement->bindValue(":search", $search);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();
        $results = null;
        foreach ($rows as $row) {
            $user = new User($row['email'], $row['username'], '', $row['proPic']);
            $user->setUserID($row['userID']);
            $results[] = $user;
        }

        return $results;
    }

    public static function getUser($userID) {
        $db = Database::getDB();
        $query = 'SELECT * FROM users
                  WHERE userID = :userID';
        $statement = $db->prepare($query);
        $statement->bindValue(":userID", $userID);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        $user = new User($row['email'], $row['username'], '', $row['proPic']);
        $user->setUserID($row['userID']);
        return $user;
    }

    public static function getUserByUserName($username) {
        $db = Database::getDB();
        $query = 'SELECT * FROM Users
                  WHERE username = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(":username", $username);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        $user = new User($row['email'], $row['username'], '', $row['proPic']);
        $user->setUserID($row['userID']);
        return $user;
    }

    public static function getPassword($username) {
        $db = Database::getDB();
        $query = 'SELECT password FROM users
                  WHERE username = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(":username", $username);
        $statement->execute();
        $password = $statement->fetch();
        $statement->closeCursor();
        if ($password === false) {
            return false;
        }
        return $password[0];
    }

    public static function uniqueUsernameTest($username) {
        $db = Database::getDB();
        $userQuery = 'SELECT username FROM users WHERE username = :username;';
        $userStatement = $db->prepare($userQuery);
        $userStatement->bindValue(':username', $username);
        $userStatement->execute();
        $uniqueUser = $userStatement->fetch();
        $userStatement->closeCursor();
        return $uniqueUser;
    }

    public static function uniqueEmailTest($email) {
        $db = Database::getDB();
        $emailQuery = 'SELECT email FROM users WHERE email = :email;';
        $emailStatement = $db->prepare($emailQuery);
        $emailStatement->bindValue(':email', $email);
        $emailStatement->execute();
        $uniqueEmail = $emailStatement->fetch();
        $emailStatement->closeCursor();
        return $uniqueEmail;
    }

    public static function addUser($user) {
        $db = Database::getDB();

        $email = $user->getEmail();
        $username = $user->getUsername();
        $password = $user->getPassword();
        $proPic = $user->getProPic();

        try {
            // Add the user to the database  
            $query = 'INSERT INTO users
                     (email, username, password, proPic)
                  VALUES
                     (:email, :username, :password, :proPic)';
            $statement = $db->prepare($query);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':username', $username);
            $statement->bindValue(':password', $password);
            $statement->bindValue(':proPic', $proPic);
            $statement->execute();
            $statement->closeCursor();
//            return $userID;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include("index.php");
            exit();
        }
    }
    
    public static function updateUser($user) {
        $db = Database::getDB();
        
        $userID = $user->getUserID();
        $username = $user->getUsername();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $image = $user->getProPic();

        try {

            $query = 'UPDATE users 
                         SET email = :email, password = :password, proPic = :image, username = :username
                         WHERE userID = :userID';

            $statement = $db->prepare($query);            
            $statement->bindValue(':username', $username);
            $statement->bindValue(':userID', $userID);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':password', $password);
            $statement->bindValue(':image', $image);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include("index.php");
            exit();
        }
    }
    
    public static function updateUserNoPass($user) {
        $db = Database::getDB();
        
        $userID = $user->getUserID();
        $username = $user->getUsername();
        $email = $user->getEmail();
        
        $image = $user->getProPic();

        try {

            $query = 'UPDATE users 
                         SET email = :email, proPic = :image, username = :username
                         WHERE userID = :userID';

            $statement = $db->prepare($query);            
            $statement->bindValue(':username', $username);
            $statement->bindValue(':userID', $userID);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':image', $image);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include("index.php");
            exit();
        }
        
        
    }

}
