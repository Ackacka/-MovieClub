<?php

class FriendshipDB {

    public static function sendFriendRequest($userFrom, $userTo) {
        $friends = self::userSort($userFrom, $userTo);

        //if relationship hasn't been added, add it, otherwise update to
        //pending2 if user1 sent request, or pending1 if user2 sent request
        $pending = '';
        if ($userFrom < $userTo) {
            $pending = 'pending2';
        } else {
            $pending = 'pending1';
        }
        if (count(self::checkFriendship($friends)) !== 0) {
            try {
                $db = Database::getDB();
                $query = 'UPDATE userrelationships
                    SET type = :pending
                    WHERE userFirstID = :user1';
                $statement = $db->prepare($query);
                $statement->bindValue(":pending", $pending);
                $statement->bindValue(":user1", $friends[0]->getUserID());
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
                $statement->bindValue(":userFirstID", $friends[0]->getUserID());
                $statement->bindValue(":userSecondID", $friends[1]->getUserID());
                $statement->execute();
                $statement->closeCursor();
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include("index.php");
                exit();
            }
        }
    }

    private static function checkFriendship($friends) {
        $db = Database::getDB();
        $query = 'SELECT * FROM userrelationships
                WHERE userFirstID = :friendship';
        $statement = $db->prepare($query);
        $statement->bindValue(":friendship", $friends[0]->getUserID());
        $statement->execute();
        $results = $statement->fetchAll();
        return $results;
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

}
