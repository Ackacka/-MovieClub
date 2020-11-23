<?php

class GenreDB {
    public static function getGenreByID($genreID) {
        $db = Database::getDB();
        $query = 'SELECT * FROM genres
                  WHERE genreID = :genreID';
        $statement = $db->prepare($query);
        $statement->bindValue(":genreID", $genreID);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();

        $genre = new Genre($row['genreID'], $row['name']);
        return $genre;
    }
    
    public static function getGenres(){
        $db = Database::getDB();
        $query = 'SELECT * FROM genres';
        $statement = $db->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();

        $genres = array();
        foreach ($rows as $row) {            
            $genre = new Genre($row['genreID'], $row['name']);
            array_push($genres, $genre);
        }
        
        return $genres;
    }
}
