<?php


class Review {
    private $reviewID, $userID, $tmdbID, $reviewDate, $review, $movie;
    
    function __construct($userID, $tmdbID, $review, $movie) {        
        $this->userID = $userID;
        $this->tmdbID = $tmdbID;
        $this->review = $review;
        $this->movie = $movie;
    }
    
    function getMovie() {
        return $this->movie;
    }

    function setMovie($movie): void {
        $this->movie = $movie;
    }

        
    function getReviewID() {
        return $this->reviewID;
    }

    function getUserID() {
        return $this->userID;
    }

    function getTmdbID() {
        return $this->tmdbID;
    }

    function getReviewDate() {
        return $this->reviewDate;
    }

    function getReview() {
        return $this->review;
    }

    function setReviewID($reviewID): void {
        $this->reviewID = $reviewID;
    }

    function setUserID($userID): void {
        $this->userID = $userID;
    }

    function setTmdbID($tmdbID): void {
        $this->tmdbID = $tmdbID;
    }

    function setReviewDate($reviewDate): void {
        $this->reviewDate = $reviewDate;
    }

    function setReview($review): void {
        $this->review = $review;
    }



}
