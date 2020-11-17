<?php

class Genre {
    private $genreID, $name;
    
    function __construct($genreID, $name) {
        $this->genreID = $genreID;
        $this->name = $name;
    }
    
    function getGenreID() {
        return $this->genreID;
    }

    function getName() {
        return $this->name;
    }

    function setGenreID($genreID): void {
        $this->genreID = $genreID;
    }

    function setName($name): void {
        $this->name = $name;
    }



}
