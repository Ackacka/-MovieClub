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
                $statement->bindValue(':tmdbID', $tmdbID);
                $statement->bindValue(':genreID', $genres[$i]->getGenreID());
                $statement->execute();
                $statement->closeCursor();
            } catch (Exception $ex) {
                $error_message = $e->getMessage();
                include("index.php");
                exit();
            }
        }
    }

}
