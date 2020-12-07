<?php

class FavoriteDB {

    public static function addFavorite($userID, $tmdbID) {
        
        $tmdbMovie = TmdbAPI::getMovie($tmdbID);
        $genres = array();
        for ($i = 0; $i < count($tmdbMovie['genres']); $i++){
            $genre = new Genre($tmdbMovie['genres'][$i]['id'], $tmdbMovie['genres'][$i]['name']);
            array_push($genres, $genre);
        }
        $movie = new Movie($tmdbMovie['id'], $tmdbMovie['title'], $tmdbMovie['overview'],
                $tmdbMovie['poster_path'], $genres);
        
        if (MovieDB::getMovie($tmdbID) === false) {
            MovieDB::addMovie($movie);
        }
        
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
        } catch (PDOException $ex) {
            $error_message = $ex->getMessage();
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

    public static function getUserFavorites($userID){
        $db = Database::getDB();
        $query = 'SELECT * FROM favorites
                WHERE userID = :userID';
        $statement = $db->prepare($query);
        $statement->bindValue(":userID", $userID);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();        
        
        $favorites = array();
        foreach($rows as $row) {
            array_push($favorites, $row['tmdbID']);
        }
        
        return $favorites;
    }
}
