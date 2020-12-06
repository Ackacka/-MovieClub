<?php

class MovieDB {

    public static function getMovie($tmdbID) {
        $db = Database::getDB();
        $query = 'SELECT * FROM moviesgenres mg
                  INNER JOIN genres g ON mg.genreID = g.genreID
                  WHERE movieID = :tmdbID';
        $statement = $db->prepare($query);
        $statement->bindValue(":tmdbID", $tmdbID);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();
        $genres = array();
        if ($rows !== false) {
            for ($i = 0; $i < count($rows); $i++) {
                $genre = new Genre($rows[$i]['genreID'], $rows[$i]['name']);
                array_push($genres, $genre);
            }
        }


        $query = 'SELECT * FROM movies
                  WHERE tmdbID = :tmdbID';
        $statement = $db->prepare($query);
        $statement->bindValue(":tmdbID", $tmdbID);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        $movie = false;
        if ($row !== false) {
            $movie = new Movie($tmdbID, $row['title'], $row['overview'], $row['poster'], $genres);
        }
        return $movie;
    }

    public static function addMovie($movie) {
        $db = Database::getDB();
        $genres = $movie->getGenres();
        try {
            $query = 'INSERT INTO movies
                          (tmdbID, title, overview, poster)
                            VALUES
                          (:tmdbID, :title, :overview, :poster)';
            $statement = $db->prepare($query);
            $statement->bindValue(':tmdbID', $movie->getTmdbID());
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
        for ($i = 0; $i < count($genres); $i++) {
            try {
                $query = 'INSERT INTO moviesgenres
                          (movieID, genreID)
                            VALUES
                          (:tmdbID, :genreID)';
                $statement = $db->prepare($query);
                $statement->bindValue(':tmdbID', $movie->getTmdbID());
                $statement->bindValue(':genreID', $genres[$i]->getGenreID());
                $statement->execute();
                $statement->closeCursor();
            } catch (Exception $ex) {
                $error_message = $ex->getMessage();
                include("index.php");
                exit();
            }
        }
    }
    
    //returns an array of arrays of Ratings and Reviews and their users for a 
    //movie, if there are some (have to have both rating and review).
    //ratings and reviews come back with dummy movie objects.
    public static function getMovieRatingsAndReviews($tmdbID){
        $db = Database::getDB();
        $query = 'SELECT ra.ratingID, ra.userID, ra.tmdbID, ra.ratingDate,'
                . ' ra.rating, re.userID, re.reviewDate, re.reviewID, re.review '
                . 'FROM ratings ra '
                . 'LEFT OUTER JOIN reviews re '
                . 'ON ra.tmdbID = re.tmdbID '
                . 'WHERE ra.tmdbID = :tmdbID '
                . 'AND ra.userID = re.userID';
        $statement = $db->prepare($query);
        $statement->bindValue(":tmdbID", $tmdbID);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();
        
        foreach ($rows as $key => $row){
            if(is_null($row['review'])) {
                unset($rows[$key]);
            }
        }
        
        $ratingsReviewsUsers = array();
        
        foreach ($rows as $row) {
            
            $ratingReviewUser = array();
            $user = UserDB::getUser($row['userID']);
            $user->setPassword('');
            $rating = new Rating($row['userID'], $row['tmdbID'], $row['rating'], "");
            $rating->setRatingID($row['ratingID']);
            $rating->setRatingDate(date_create($row['ratingDate']));
            $review = new Review($row['userID'], $row['tmdbID'], $row['review'], "");
            $review->setReviewID($row['reviewID']);
            $review->setReviewDate(date_create($row['reviewDate']));
            $ratingReviewUser['rating'] = $rating;
            $ratingReviewUser['review'] = $review;
            $ratingReviewUser['user'] = $user;
            array_push($ratingsReviewsUsers, $ratingReviewUser);
            
            
        }
        
        return $ratingsReviewsUsers;
    }

}
