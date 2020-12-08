<?php

class TmdbAPI {

    public static function getRandomPopular() {
        $ch = curl_init();
        $page = mt_rand(1, 20);
        $random = mt_rand(0, 19);
        $params = ['api_key' => 'ce996ee388766d7471956f7e323701ae',
            'language' => 'en-US',
            'page' => $page];

        $endpoint = "https://api.themoviedb.org/3/movie/";
        $url = $endpoint . 'popular?' . http_build_query($params);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $dResponse = json_decode($response, true);
        $movie = $dResponse['results'][$random];

        curl_close($ch);
        return $movie;
    }

    public static function getTopPopular() {
        $ch = curl_init();
        $params = ['api_key' => 'ce996ee388766d7471956f7e323701ae',
            'language' => 'en-US',
            'page' => 1];

        $endpoint = "https://api.themoviedb.org/3/movie/";
        $url = $endpoint . 'popular?' . http_build_query($params);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $dResponse = json_decode($response, true);
//        var_dump($dResponse);
        $movies = $dResponse['results'];

        curl_close($ch);
        return $movies;
    }

    public static function getMovie($tmdbID) {
        $ch = curl_init();
        $params = ['api_key' => 'ce996ee388766d7471956f7e323701ae',
            'language' => 'en-US'];
        $endpoint = "https://api.themoviedb.org/3/movie/";
        $url = $endpoint . $tmdbID . '?' . http_build_query($params);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $movie = json_decode($response, true);
        curl_close($ch);
        return $movie;
    }
    
    public static function getSearchResults($search){
        $ch = curl_init();
        $params = ['api_key' => 'ce996ee388766d7471956f7e323701ae',
            'language' => 'en-US',
            'include_adult' => 'false',
            'query' => $search,
            'page' => 1];
        $endpoint = "https://api.themoviedb.org/3/search/movie";
        $url = $endpoint . '?' . http_build_query($params);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $searchResults = json_decode($response, true);
        $searchResults = $searchResults['results'];
        curl_close($ch);
        return $searchResults;
    }
    
    public static function getRecommendations($randFav){
        $ch = curl_init();
        $params = ['api_key' => 'ce996ee388766d7471956f7e323701ae',
            'language' => 'en-US',
            'page' => 1];
        $endpoint = "https://api.themoviedb.org/3/movie/" . $randFav . "/recommendations";
        $url = $endpoint . '?' . http_build_query($params);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $recommendations = json_decode($response, true);
        $recommendations = $recommendations['results'];
        curl_close($ch);
        return $recommendations;
    }

}
