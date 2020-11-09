<?php

class tmdbAPI {
   public static function getRandomPopular(){
       
       
       $ch = curl_init();
        $page = mt_rand(1,20);
        $random = mt_rand(0,19);
        $params = ['api_key'=>'ce996ee388766d7471956f7e323701ae',
                    'language'=>'en-US',
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
}
