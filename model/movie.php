<?php


class movie {
    private $tmdbID, $title, $overview, $poster;
    
    function __construct($tmdbID, $title, $overview, $poster) {
        $this->tmdbID = $tmdbID;
        $this->title = $title;
        $this->overview = $overview;
        $this->poster = $poster;
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
