<?php


class reviewDB {
    public static function getReviewByID($reviewID) {
        $db = Database::getDB();
        $query = 'SELECT * FROM reviews
                  WHERE reviewID = :reviewID';
        $statement = $db->prepare($query);
        $statement->bindValue(":reviewID", $reviewID);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        
        
        $review = new Review($row['userID'], $row['tmdbID'], $row['review']);
        $review->setReviewID($reviewID);
        $review->setReviewDate($row['reviewDate']);
        return $review;
    }
    
    public static function getUserReviewByTmdbID($user, $tmdbID) {
        $db = Database::getDB();
        $query = 'SELECT * FROM reviews
                  WHERE userID = :userID
                  AND tmdbID = :tmdbID';
        $statement = $db->prepare($query);
        $statement->bindValue(":userID", $user->getUserID());
        $statement->bindValue(":tmdbID", $tmdbID);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();

        $movie = MovieDB::getMovie($tmdbID);
        $review = null;
        if (!empty($row)) {
            $review = new Review($row['userID'], $row['tmdbID'], $row['review'], $movie);
            $review->setReviewID($row['reviewID']);
            $review->setReviewDate($row['reviewDate']);
        }
        return $review;
    }
    
    public static function addReview($review) {
        $db = Database::getDB();

        $userID = $review->getUserID();
        $tmdbID = $review->getTmdbID();
        $newReview = $review->getReview();
        $movie = $review->getMovie();        

        try {
            $query = 'INSERT INTO reviews
                (userID, tmdbID, review)
                    VALUES
                (:userID, :tmdbID, :review)';
            $statement = $db->prepare($query);
            $statement->bindValue(':userID', $userID);
            $statement->bindValue(':tmdbID', $tmdbID);
            $statement->bindValue(':review', $newReview);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include("index.php");
            exit();
        }
    }
    
    public static function editReview($review){
        $db = Database::getDB();
        
        $userID = $review->getUserID();
        $tmdbID = $review->getTmdbID();
        $newReview = $review->getReview();
        
        
        try {
            $query = 'UPDATE reviews
                SET review = :review,
                reviewDate = CURDATE()
                WHERE userID = :userID
                AND tmdbID = :tmdbID';
            $statement = $db->prepare($query);
            $statement->bindValue(':userID', $userID);
            $statement->bindValue(':tmdbID', $tmdbID);
            $statement->bindValue(':review', $newReview);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include("index.php");
            exit();
        }
    }

    public static function getUserMovieReviews($user) {
        $db = Database::getDB();                
        
        $query = 'SELECT * FROM reviews r
                  INNER JOIN movies m ON r.tmdbID = m.tmdbID
                  WHERE userID = :userID';
        $statement = $db->prepare($query);
        $statement->bindValue(":userID", $user->getUserID());
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();
        $reviews = null;
        foreach ($rows as $row) {
            $movie = MovieDB::getMovie($row['tmdbID']);
            $review = new Review($row['userID'], $row['tmdbID'], $row['review'], $movie);
            $review->setReviewID($row['reviewID']);
            $review->setReviewDate($row['reviewDate']);

            $reviews[] = $review;
        }

        return $reviews;
    }
}
