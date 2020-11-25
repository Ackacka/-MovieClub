<?php

class FavoriteDB {

    public static function addFavorite($userID, $tmdbID) {
        
        try {
            $db = Database::getDB();
            $query = 'INSERT INTO favorites
                (userID, tmdbID)
                VALUES
                (:userID, :tmdbID)';
            $statement = $db->prepare($query);
            $statement->bindValue(":userID", $userID);
            $statement->bindValue(":tmdbID", $tmdbID);
            $statement->execute();
            $statement->closeCursor();
        } catch (Exception $ex) {
            $error_message = $e->getMessage();
            include("index.php");
            exit();
        }
        
    }
    
    public static function removeFavorite($userID, $tmdbID) {
        try {
            $db = Database::getDB();
            $query = 'DELETE FROM favorites
                WHERE userID = :userID
                AND tmdbID = :tmdbID';
            $statement = $db->prepare($query);
            $statement->bindValue(":userID", $userID);
            $statement->bindValue(":tmdbID", $tmdbID);
            $statement->execute();
            $statement->closeCursor();
        } catch (Exception $ex) {
            $error_message = $e->getMessage();
            include("index.php");
            exit();
        }
    }
    
    public static function findFavorite($userID, $tmdbID){
        $db = Database::getDB();
        $query = 'SELECT * FROM favorites
                WHERE userID = :userID
                AND tmdbID = :tmdbID';
        $statement = $db->prepare($query);
        $statement->bindValue(":userID", $userID);
        $statement->bindValue(":tmdbID", $tmdbID);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        
        if (!$row) {
            return false;
        }
        return true;
    }
    
    public static function getUserFavorites($user){
        //next commit
    }

}
