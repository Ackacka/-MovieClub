<?php

class RatingDB {

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
        $newRating = $rating->getRating();
        $movie = $rating->getMovie();

        //if a movie with this tmdb hasn't been entered into the database yet,
        //then enter it
        if(MovieDB::getMovie($tmdbID) === false) {
            try{
                $query = 'INSERT INTO movies
                          (tmdbID, title, overview, poster)
                            VALUES
                          (:tmdbID, :title, :overview, :poster)';
                $statement = $db->prepare($query);                
                $statement->bindValue(':tmdbID', $tmdbID);
                $statement->bindValue(':title', $movie->getTitle());
                $statement->bindValue(':overview', $movie->getOverview());
                $statement->bindValue(':poster', $movie->getPoster());
                $statement->execute();
                $statement->closeCursor();
            } catch (Exception $ex) {
                $error_message = $e->getMessage();
                include("index.php");
                exit();
            }
        }
        
        try {
            $query = 'INSERT INTO ratings
                (userID, tmdbID, rating)
                    VALUES
                (:userID, :tmdbID, :rating)';
            $statement = $db->prepare($query);
            $statement->bindValue(':userID', $userID);
            $statement->bindValue(':tmdbID', $tmdbID);
            $statement->bindValue(':rating', $newRating);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include("index.php");
            exit();
        }
    }
    
    public static function getUserMovieRatings($user){
        $db = Database::getDB();
        $query = 'SELECT * FROM ratings r
                  INNER JOIN movies m ON r.tmdbID = m.tmdbID
                  WHERE userID = :userID';
        $statement = $db->prepare($query);
        $statement->bindValue(":userID", $user->getUserID());
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();
        
        $ratings = null;
        foreach ($rows as $row){
            $movie = new  Movie($row['tmdbID'], $row['title'], $row['overview'], $row['poster']);
            $rating = new Rating($row['userID'], $row['tmdbID'], $row['rating'], $movie);
            $rating->setRatingID($row['ratingID']);
            $rating->setRatingDate($row['ratingDate']);
            
            $ratings[] = $rating;
        }
        
        return $ratings;
    }
}
