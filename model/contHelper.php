<?php

class ContHelper {

    public static function getRequestingUsers($user) {
        $pendingRequestIDs = FriendshipDB::getPendingRequests($user);
        $requestingUsers = array();
        for ($i = 0; $i < count($pendingRequestIDs); $i++) {
            array_push($requestingUsers, UserDB::getUser($pendingRequestIDs[$i]));
        }
        return $requestingUsers;
    }

    public static function getTop3Genres($user) {
        $ratings = RatingDB::getUserMovieRatings($user);
        $genres = GenreDB::getGenres();
        $genreCount = array();
        $top3Genres = array();
        foreach ($genres as $genre) {
            $genreCount[$genre->getName()] = 0;
        }
        if (!is_null($ratings)) {
            foreach ($ratings as $rating) {
                for ($i = 0; $i < count($rating->getMovie()->getGenres()); $i++) {
                    $genreCount[$rating->getMovie()->getGenres()[$i]->getName()]++;
                }
            }
            arsort($genreCount);


            for ($i = 0; $i < 3; $i++) {
                $top3Genres[key($genreCount)] = reset($genreCount);
                array_shift($genreCount);
            }
        }
        return $top3Genres;
    }
    

}
