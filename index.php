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


if (empty($_SESSION['loginUser'])) {
    $_SESSION['loginUser'] = "defaultUser";
}

if(isset($error_message))var_dump($error_message);

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
    case "profile":
        $ratings = RatingDB::getUserMovieRatings($user);
        include './main/profile.php';
        die();
        break;
    case "addRating":
        $rating = filter_input(INPUT_POST, 'rating');
        $tmdbID = filter_input(INPUT_POST, 'movieID');
        $title = filter_input(INPUT_POST, 'title');
        $overview = filter_input(INPUT_POST, 'overview');
        $poster = filter_input(INPUT_POST, 'poster');
        
        $movie = new Movie($tmdbID, $title, $overview, $poster);
        $newRating = new Rating($user->getUserID(), $tmdbID, $rating, $movie);
        
        
        RatingDB::addRating($newRating);
        $ratings = RatingDB::getUserMovieRatings($user);   
        //sequence matters for fall-through here
    case "rater":
        if (!isset($rating)) {
            $rating = 0;
        }
        
        $userRatings = RatingDB::getUserMovieRatings($user);
        $nonoIDs = array();
        foreach ($userRatings as $rating){
            array_push($nonoIDs, $rating->getTmdbID());
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
            $movie = TmdbAPI::getRandomPopular();
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
            include("./account/account_login.php");
            die();
        }
        break;
    case "logOut":
        session_destroy();
        $_SESSION['loginUser'] = 'defaultUser';
        include "./main/main.php";
        die();
        break;
}
?>
