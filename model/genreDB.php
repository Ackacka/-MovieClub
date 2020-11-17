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
}
