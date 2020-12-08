<?php


class Movie {
    private $tmdbID, $title, $overview, $poster, $genres;
    
    function __construct($tmdbID, $title, $overview, $poster, $genres) {
        $this->tmdbID = $tmdbID;
        $this->title = $title;
        $this->overview = $overview;
        $this->poster = $poster;
        $this->genres = $genres;
    }
    
    function getGenres() {
        return $this->genres;
    }

    function setGenres($genres): void {
        $this->genres = $genres;
    }
        
    function getTmdbID() {
        return $this->tmdbID;
    }

    function getTitle() {
        return $this->title;
    }

    function getOverview() {
        return $this->overview;
    }

    function getPoster() {
        return $this->poster;
    }

    function setTmdbID($tmdbID): void {
        $this->tmdbID = $tmdbID;
    }

    function setTitle($title): void {
        $this->title = $title;
    }

    function setOverview($overview): void {
        $this->overview = $overview;
    }

    function setPoster($poster): void {
        $this->poster = $poster;
    }


}
