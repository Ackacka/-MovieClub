<!DOCTYPE html>
<?php
$lifetime = 60 * 60 * 24 * 14;    // 2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();

require_once './model/database.php';
require_once './model/user.php';
require_once './model/userDB.php';
require_once './model/movie.php';
require_once './model/movieDB.php';
require_once './model/rating.php';
require_once './model/ratingDB.php';
require_once './model/validation.php';
require_once './model/tmdbapi.php';
require_once './model/genre.php';
require_once './model/genreDB.php';
require_once './model/friendshipDB.php';


if (empty($_SESSION['loginUser'])) {
    $_SESSION['loginUser'] = "defaultUser";
}

if (isset($error_message))
    var_dump($error_message);

$action = filter_input(INPUT_POST, "action");
if ($action === null) {
    $action = filter_input(INPUT_GET, "action");
    if ($action === null) {
        $action = "main";
    }
}

$username = $_SESSION['loginUser'];
$user;
if ($username !== 'defaultUser') {
    $user = UserDB::getUserByUsername($username);
}

$makeSecret = 'ce996ee388766d7471956f7e323701ae';
$tmdbAuth = 'Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjZTk5NmVlMzg4NzY2ZDc0NzE5NTZmN2UzMjM3MDFhZSIsInN1YiI6IjVmOThhZWIwMTc3OTJjMDAzNjNkZTRjNSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.ITM03gfoEx96OQWrhtFVecgSP3HiqlD80MbD4tOHncI';


switch ($action) {
    case "friendInvite":
        $userIDto = filter_input(INPUT_POST, 'userIDto');
        $userTo = UserDB::getUser($userIDto);
        FriendshipDB::sendFriendRequest($user, $userTo);
        include './main/requestConfirmation.php';
        die();
        break;        
    case "searchUsers":
        $search = filter_input(INPUT_POST, 'usernameSearch');
        $search = htmlspecialchars($search);
        if($search !== "") $results = UserDB::search($search);
        //case order matters here
    case "searchUsersPage":
        if(!isset($results)) $results = array();
        if(!isset($search)) $search = "";
        include './main/userSearch.php';
        die();
        break;
    case "search":
        $search = filter_input(INPUT_POST, 'search');
        $searchResults = TmdbAPI::getSearchResults($search);
        include './main/searchResults.php';
        die();
        break;
    case "viewMovie":
        $movieID = filter_input(INPUT_GET, 'movie');
        $movie = TmdbAPI::getMovie($movieID);
        include './main/movie.php';
        die();
        break;
    case "myRatingsPage":
        $ratings = RatingDB::getUserMovieRatings($user);
        include './main/myRatingsPage.php';
        die();
        break;
    case "addRating":
        $genreCounter = filter_input(INPUT_POST, 'genreCounter');
        $rating = filter_input(INPUT_POST, 'rating');
        $tmdbID = filter_input(INPUT_POST, 'movieID');
        $title = filter_input(INPUT_POST, 'title');
        $overview = filter_input(INPUT_POST, 'overview');
        $poster = filter_input(INPUT_POST, 'poster');
        $genreIDs = array();
        for ($i = 0; $i < $genreCounter; $i++) {
            array_push($genreIDs, filter_input(INPUT_POST, 'genre' . $i));
        }
        $genres = array();
        for ($i = 0; $i < count($genreIDs); $i++) {
            $genre = GenreDB::getGenreByID($genreIDs[$i]);
            array_push($genres, $genre);
        }

        $movie = new Movie($tmdbID, $title, $overview, $poster, $genres);
        $newRating = new Rating($user->getUserID(), $tmdbID, $rating, $movie);

        $ratings = RatingDB::getUserMovieRatings($user);
        var_dump($ratings);
        $ratedMovieIDs = array();
        for ($i = 0; $i < count($ratings); $i++) {
            array_push($ratedMovieIDs, $ratings[$i]->getTmdbID());
        }
        if (in_array($movie->getTmdbID(), $ratedMovieIDs)) {
            RatingDB::editRating($newRating);
        } else {
            RatingDB::addRating($newRating);
        }


    //sequence matters for fall-through here
    case "rater":
        if (!isset($rating)) {
            $rating = 0;
        }

        $userRatings = RatingDB::getUserMovieRatings($user);

        $nonoIDs = array();
        if (!is_null($userRatings)) {
            foreach ($userRatings as $rating) {
                array_push($nonoIDs, $rating->getTmdbID());
            }
        }

        $movie = array();
        do {
            $movie = TmdbAPI::getRandomPopular();
        } while (in_array($movie['id'], $nonoIDs));

        include './main/rater.php';
        die();
        break;
    case "main":

        $movies = TmdbAPI::getTopPopular(10);
        include './main/main.php';
        die();
        break;
    case "login":
        if (!isset($usernameError)) {
            $usernameError = '';
        }
        if (!isset($passwordError)) {
            $passwordError = '';
        }
        if (!isset($username)) {
            $username = '';
        }
        if (!isset($password)) {
            $password = '';
        }
        include 'account/account_login.php';
        die();
        break;
    case "logOut":
        $_SESSION['loginUser'] = 'defaultUser';
        include './main/main.php';
        die();
        break;
    case "userLogin":
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $pwdHash = userDB::getPassword($username);


        if (password_verify($password, $pwdHash)) {
            $passwordError = "";
            $_SESSION['loginUser'] = $username;
            $user = UserDB::getUserByUsername($username);
            $movies = TmdbAPI::getTopPopular(10);
            include './main/main.php';
            die();
            break;
            //more stuff if successful password match
        } else {
            $passwordError = "Password is invalid.";
        }

        if (!isset($passwordError)) {
            $passwordError = '';
        }
        if (!isset($usernameError)) {
            $usernameError = '';
        }
        if (!isset($username)) {
            $username = '';
        }
        if (!isset($password)) {
            $password = '';
        }

        include './account/account_login.php';
        die();
        break;
    case "register":
        if (!isset($email)) {
            $email = '';
        }
        if (!isset($username)) {
            $username = '';
        }
        if (!isset($password)) {
            $password = '';
        }
        if (!isset($emailError)) {
            $emailError = '';
        }
        if (!isset($usernameError)) {
            $usernameError = '';
        }
        if (!isset($passwordError)) {
            $passwordError = '';
        }
        include 'account/account_register.php';
        die();
        break;
    case "addUser":
        $email = filter_input(INPUT_POST, 'email');
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

        $emailError = Validation::validEmail($email, 'Email');
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = $email . " is not a valid email.";
        }
        if (!UserDB::uniqueEmailTest($email) === false) {
            $emailError = 'Email already in use.';
        }
        $usernameError = Validation::validUsername($username, 'Username');
        if ($username == "") {
            if (UserDB::uniqueUsernameTest($username) === false) {
                $usernameError = 'Username already taken.';
            }
        }
        $passwordError = Validation::validPassword($password, 'Password');
        $pwdHash = password_hash($password, PASSWORD_BCRYPT);

        //write user information to database
        if ($usernameError !== '' || $emailError !== '' || $passwordError !== '') {
            include("./account/account_register.php");
            die();
        } else {
            $user = new User($email, $username, $pwdHash);
            UserDB::addUser($user);

            $_SESSION['loginUser'] = $username;
            $user = UserDB::getUserByUsername($username);
            $ratings = RatingDB::getUserMovieRatings($user);
            include './main/profile.php';
            die();
        }
        break;
    case "logOut":
        session_destroy();
        $_SESSION['loginUser'] = 'defaultUser';
        $movies = TmdbAPI::getTopPopular(10);
        include "./main/main.php";
        die();
        break;
}
?>
