<?php


class Rating {
    private $ratingID, $userID, $tmdbID, $ratingDate, $rating;
    
    function __construct($userID, $tmdbID, $rating) {
        $this->userID = $userID;
        $this->tmdbID = $tmdbID;
        $this->rating = $rating;
    }
    
    function getRating() {
        return $this->rating;
    }

    function setRating($rating): void {
        $this->rating = $rating;
    }

        function getRatingID() {
        return $this->ratingID;
    }

    function getUserID() {
        return $this->userID;
    }

    function getTmdbID() {
        return $this->tmdbID;
    }

    function getRatingDate() {
        return $this->ratingDate;
    }

    function setRatingID($ratingID): void {
        $this->ratingID = $ratingID;
    }

    function setUserID($userID): void {
        $this->userID = $userID;
    }

    function setTmdbID($tmdbID): void {
        $this->tmdbID = $tmdbID;
    }

    function setRatingDate($ratingDate): void {
        $this->ratingDate = $ratingDate;
    }



}
