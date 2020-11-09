<?php

class ratingDB {

    public static function getRatingByID($ratingID) {
        $db = Database::getDB();
        $query = 'SELECT * FROM ratings
                  WHERE ratingID = :ratingID';
        $statement = $db->prepare($query);
        $statement->bindValue(":ratingID", $ratingID);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();

        $rating = new Rating($row['userID'], $row['tmdbID']);
        $rating->setRatingID($ratingID);
        $rating->setRatingDate($row['ratingDate']);
        return $rating;
    }

    public static function addRating($rating) {
        $db = Database::getDB();

        $userID = $rating->getUserID();
        $tmdbID = $rating->getTmdbID();
        $rating = $rating->getRating();

        try {
            $query = 'INSERT INTO ratings
                (userID, tmdbID, rating)
                    VALUES
                (:userID, :tmdbID, :rating)';
            $statement = $db->prepare($query);
            $statement->bindValue(':userID', $userID);
            $statement->bindValue(':tmdbID', $tmdbID);
            $statement->bindValue(':rating', $rating);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include("index.php");
            exit();
        }
    }
    
    public static function getUserRatings($user){
        $db = Database::getDB();
        $query = 'SELECT * FROM ratings
                  WHERE userID = :userID';
        $statement = $db->prepare($query);
        $statement->bindValue(":userID", $user->getUserID());
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();
        
        $ratings = null;
        foreach ($rows as $row){
            $rating = new Rating($row['userID'], $row['tmdbID'], $row['rating']);
            $rating->setRatingID($row['ratingID']);
            $rating->setRatingDate($row['ratingDate']);
            
            $ratings[] = $rating;
        }
        
        return $ratings;
    }
}
