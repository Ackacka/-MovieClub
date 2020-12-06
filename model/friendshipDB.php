<?php

class FriendshipDB {

    public static function getPendingRequests($user) {
        $db = Database::getDB();
        $query = "SELECT * FROM userrelationships
                  WHERE (userFirstID = :userID
                  AND type = 'pending1')
                  OR (userSecondID = :userID
                  AND type = 'pending2')";
        $statement = $db->prepare($query);
        $statement->bindValue(":userID", $user->getUserID(), PDO::PARAM_INT);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();
        $requestIDs = array();
        //for every relationship row, determine which id is the request sender id,
        //and add it to the array of request sender ids
        for ($i = 0; $i < count($rows); $i++) {
            if ($user->getUserID() === $rows[$i]['userFirstID']) {
                array_push($requestIDs, $rows[$i]['userSecondID']);
            } else {
                array_push($requestIDs, $rows[$i]['userFirstID']);
            }
        }
        return $requestIDs;
    }

    public static function acceptFriendRequest($userFrom, $userTo) {
        $friends = self::userSort($userFrom, $userTo);

        try {
            $db = Database::getDB();
            $query = "UPDATE userrelationships
                    SET type = 'friends'
                    WHERE userFirstID = :user1
                    AND userSecondID = :user2";
            $statement = $db->prepare($query);
            $statement->bindValue(":user1", $friends[0]->getUserID());
            $statement->bindValue(":user2", $friends[1]->getUserID());
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $ex) {
            $error_message = $e->getMessage();
            include("index.php");
            exit();
        }
    }
    
    public static function declineFriendRequest($userFrom, $userTo) {
        $friends = self::userSort($userFrom, $userTo);

        try {
            $db = Database::getDB();
            $query = "DELETE FROM userrelationships
                    WHERE userFirstID = :user1
                    AND userSecondID = :user2";
            $statement = $db->prepare($query);
            $statement->bindValue(":user1", $friends[0]->getUserID());
            $statement->bindValue(":user2", $friends[1]->getUserID());
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $ex) {
            $error_message = $e->getMessage();
            include("index.php");
            exit();
        }
    }

    public static function sendFriendRequest($userFrom, $userTo) {
        $users = self::userSort($userFrom, $userTo);

        //if relationship hasn't been added, add it, otherwise update to
        //pending2 if user1 sent request, or pending1 if user2 sent request
        $pending = '';
        if ($userFrom < $userTo) {
            $pending = 'pending2';
        } else {
            $pending = 'pending1';
        }
        if (count(self::getRelationship($users)) !== 0) {
            try {
                $db = Database::getDB();
                $query = 'UPDATE userrelationships
                    SET type = :pending
                    WHERE userFirstID = :user1';
                $statement = $db->prepare($query);
                $statement->bindValue(":pending", $pending);
                $statement->bindValue(":user1", $users[0]->getUserID());
                $statement->execute();
                $statement->closeCursor();
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include("index.php");
                exit();
            }
        } else {
            try {
                $db = Database::getDB();
                $query = 'INSERT INTO userrelationships
                            (userFirstID, userSecondID, type)
                          VALUES
                            (:userFirstID, :userSecondID, :type)';
                $statement = $db->prepare($query);
                $statement->bindValue(":type", $pending);
                $statement->bindValue(":userFirstID", $users[0]->getUserID());
                $statement->bindValue(":userSecondID", $users[1]->getUserID());
                $statement->execute();
                $statement->closeCursor();
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include("index.php");
                exit();
            }
        }
    }

    public static function getRelationship($users) {
        $users = self::userSort($users[0], $users[1]);
        $db = Database::getDB();
        $query = 'SELECT * FROM userrelationships
                WHERE userFirstID = :relationship1
                AND userSecondID = :relationship2';
        $statement = $db->prepare($query);
        $statement->bindValue(':relationship1', $users[0]->getUserID());
        $statement->bindValue(':relationship2', $users[1]->getUserID());
        $statement->execute();
        $result = $statement->fetch();
        return $result;
    }

    private static function userSort($userFrom, $userTo) {
        $userLow;
        $userHigh;
        $userArray = array();
        if ($userFrom->getUserID() < $userTo->getUserID()) {
            $userLow = $userFrom;
            $userHigh = $userTo;
        } else {
            $userLow = $userTo;
            $userHigh = $userFrom;
        }
        array_push($userArray, $userLow);
        array_push($userArray, $userHigh);
        return $userArray;
    }
    
    public static function getFriends($user){
        $db = Database::getDB();
        $query = 'SELECT * FROM userrelationships
                WHERE userFirstID = :user
                OR userSecondID = :user';
        $statement = $db->prepare($query);
        $statement->bindValue(':user', $user->getUserID());
        $statement->execute();
        $rows = $statement->fetchAll();
        $friends = array();
        
        foreach ($rows as $row) {
            if ($user->getUserID() === $row['userFirstID']) {
                array_push($friends, $row['userSecondID']);
            } else {
                array_push($friends, $row['userFirstID']);
            }
        }
       
        return $friends;
    }

}
