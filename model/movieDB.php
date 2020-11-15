<?php


class MovieDB {
    public static function getMovie($tmdbID) {
        $db = Database::getDB();
        $query = 'SELECT * FROM movies
                  WHERE tmdbID = :tmdbID';
        $statement = $db->prepare($query);
        $statement->bindValue(":tmdbID", $tmdbID);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        $movie = false;
        if($row !== false){
            $movie = new Movie($tmdbID, $row['title'], $row['overview'], $row['poster']);
        }        
        return $movie;
    }
}
