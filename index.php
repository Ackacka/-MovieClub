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
require_once './model/review.php';
require_once './model/reviewDB.php';
require_once './model/validation.php';
require_once './model/tmdbapi.php';
require_once './model/genre.php';
require_once './model/genreDB.php';
require_once './model/friendshipDB.php';
require_once './model/favoriteDB.php';
require_once './model/contHelper.php';
require_once './model/middleware.php';


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
    case "unfavorite":
        $tmdbID = filter_input(INPUT_GET, 'movie');
        FavoriteDB::removeFavorite($user->getUserID(), $tmdbID);
        //tmdb's movie result array, not movie object.
        $movie = TmdbAPI::getMovie($tmdbID);
        $ratingsReviewsUsers = MovieDB::getMovieRatingsAndReviews($movie['id']);
        //load data for movie details page
        $userRating = false;
        $userReview = false;
        if (!is_null(RatingDB::getUserRatingByTmdbID($user, $tmdbID))) {
            $userRating = RatingDB::getUserRatingByTmdbID($user, $tmdbID);
        }
        if (!is_null(ReviewDB::getUserReviewByTmdbID($user, $tmdbID))) {
            $userReview = ReviewDB::getUserReviewByTmdbID($user, $tmdbID);
        }

        $isFavorite = false;
        $favString = 'favorite';
        include './main/movie.php';
        die();
        break;
    case "favorite":
        $tmdbID = filter_input(INPUT_GET, 'movie');
        FavoriteDB::addFavorite($user->getUserID(), $tmdbID);
        //tmdb's movie result array, not movie object.
        $movie = TmdbAPI::getMovie($tmdbID);
        $ratingsReviewsUsers = MovieDB::getMovieRatingsAndReviews($movie['id']);
        //load data for movie details page
        $userRating = false;
        $userReview = false;
        if (!is_null(RatingDB::getUserRatingByTmdbID($user, $tmdbID))) {
            $userRating = RatingDB::getUserRatingByTmdbID($user, $tmdbID);
        }
        if (!is_null(ReviewDB::getUserReviewByTmdbID($user, $tmdbID))) {
            $userReview = ReviewDB::getUserReviewByTmdbID($user, $tmdbID);
        }
        $isFavorite = true;
        $favString = 'unfavorite';
        include './main/movie.php';
        die();
        break;
    case "friendsList":
        $friendsIDs = FriendshipDB::getFriends($user);
        $friends = array();
        for ($i = 0; $i < count($friendsIDs); $i++) {
            $friend = UserDB::getUser($friendsIDs[$i]);
            array_push($friends, $friend);
        }


        include './account/friendsList.php';
        die();
        break;
    case "showProfile":
        $username = filter_input(INPUT_GET, 'profileUser');
        $profileUser = UserDB::getUserByUsername($username);

        include './account/profile.php';
        die();
        break;
    case "editProfileForm":
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
        include './account/editProfile.php';
        die();
        break;
    case "editProfile":
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $email = $user->getEmail();
        $proPic = $user->getProPic();
        $passwordError = '';
        $pwdHash = '';

        $usernameError = Validation::validUsername($username, 'Username');
        if ($username == "") {
            if (UserDB::uniqueUsernameTest($username) === false) {
                $usernameError = 'Username already taken.';
            }
        }
        if ($password !== "") {
            $passwordError = Validation::validPassword($password, 'Password');
            $pwdHash = password_hash($password, PASSWORD_BCRYPT);
        }


        if (isset($_FILES['image'])) {
            $errors = array();
            $fileName = $_FILES['image']['name'];
            $fileSize = $_FILES['image']['size'];
            $fileTemp = $_FILES['image']['tmp_name'];
            $fileType = $_FILES['image']['type'];
            $expFile = explode('.', $fileName);
            $fileExt = end($expFile);
            $fileExt = strtolower($fileExt);
            $proPic = "./img/" . $username . $fileName;

            $extensions = array("jpeg", "jpg", "png", "gif");

            if (in_array($fileExt, $extensions) === false) {
                $errors[] = "file extension not in whitelist: " . join(',', $extensions);
            }

            if ($usernameError != '') {
                array_push($errors, 'filename characters');
            }

            if (empty($errors)) {
                move_uploaded_file($fileTemp, $proPic);
            }
        }
        //write user information to database
        if ($usernameError !== '' || $passwordError !== '') {
            include("./account/editProfile.php");
            die();
        } else if ($password !== "") {
            $updateUser = new User($email, $username, $pwdHash, $proPic);
            $updateUser->setUserID($user->getUserID());
            UserDB::updateUser($updateUser);

            $_SESSION['loginUser'] = $username;
            $user = UserDB::getUserByUsername($username);
            $requestingUsers = ContHelper::getRequestingUsers($user);

            $top3Genres = ContHelper::getTop3Genres($user);
            include './account/dashboard.php';
            die();
        } else {
            $updateUser = new User($email, $username, '', $proPic);
            $updateUser->setUserID($user->getUserID());
            UserDB::updateUserNoPass($updateUser);

            $_SESSION['loginUser'] = $username;
            $user = UserDB::getUserByUsername($username);
            $ratings = RatingDB::getUserMovieRatings($user);
            $requestingUsers = ContHelper::getRequestingUsers($user);

            $top3Genres = ContHelper::getTop3Genres($user);
            include './account/dashboard.php';
            die();
        }
        break;
    case "friendDecline":
        $userIDFrom = filter_input(INPUT_POST, 'userIDfromDec');
        $userFrom = UserDB::getUser($userIDFrom);
        FriendshipDB::declineFriendRequest($userFrom, $user);
        $requestingUsers = ContHelper::getRequestingUsers($user);
        $top3Genres = ContHelper::getTop3Genres($user);
        include './account/dashboard.php';
        die();
        break;
    case "friendAccept":
        $userIDFrom = filter_input(INPUT_POST, 'userIDfromAcc');
        $userFrom = UserDB::getUser($userIDFrom);
        FriendshipDB::acceptFriendRequest($userFrom, $user);
        $requestingUsers = ContHelper::getRequestingUsers($user);
        $top3Genres = ContHelper::getTop3Genres($user);
        include './account/dashboard.php';
        die();
        break;
    case "dashboard":
        $requestingUsers = ContHelper::getRequestingUsers($user);
        $top3Genres = ContHelper::getTop3Genres($user);

        include './account/dashboard.php';
        die();
        break;
    case "friendInvite":
        $userIDto = filter_input(INPUT_POST, 'userIDto');
        $userTo = UserDB::getUser($userIDto);
        FriendshipDB::sendFriendRequest($user, $userTo);
        include './main/requestConfirmation.php';
        die();
        break;
    case "searchUsers":
        $search = filter_input(INPUT_POST, 'usernameSearch');
        $results = array();
        $friends = FriendshipDB::getFriends($user);
        if ($search !== "")
            $results = UserDB::search($search);
        foreach ($results as $i => $result) {
            if ($user->getUserID() === $result->getUserID()) {
                unset($results[$i]);
            }
        }
    //case order matters here
    case "searchUsersPage":
        if (!isset($results))
            $results = array();
        if (!isset($search))
            $search = "";
        include './account/userSearch.php';
        die();
        break;
    case "search":
        $search = filter_input(INPUT_POST, 'search');
        $searchResults = array();
        if (!empty($search)){
            $searchResults = TmdbAPI::getSearchResults($search);
        }
        
        include './main/searchResults.php';
        die();
        break;
    case "viewMovie":
        $movieID = filter_input(INPUT_GET, 'movie');
        $movie = TmdbAPI::getMovie($movieID);
        $ratingsReviewsUsers = MovieDB::getMovieRatingsAndReviews($movie['id']);
        $userRating = false;
        $userReview = false;

        if ($username !== 'defaultUser') {
            if (!is_null(RatingDB::getUserRatingByTmdbID($user, $movieID))) {
                $userRating = RatingDB::getUserRatingByTmdbID($user, $movieID);
            }
            if (!is_null(ReviewDB::getUserReviewByTmdbID($user, $movieID))) {
                $userReview = ReviewDB::getUserReviewByTmdbID($user, $movieID);
            }
            $isFavorite = FavoriteDB::findFavorite($user->getUserID(), $movieID);
            $favString = '';
            if ($isFavorite) {
                $favString = 'unfavorite';
            } else {
                $favString = 'favorite';
            }
        }

        include './main/movie.php';
        die();
        break;
    case "myRatingsPage":
        $ratings = RatingDB::getUserMovieRatingsAndReviews($user);
        include './account/myRatingsPage.php';
        die();
        break;
    case "addRating":
        $genreCounter = filter_input(INPUT_POST, 'genreCounter');
        $rating = filter_input(INPUT_POST, 'rating');
        $review = filter_input(INPUT_POST, 'newReview');
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
        $newReview = "";
        if (!empty($review)) {
            $review = trim($review);
            $newReview = new Review($user->getUserID(), $tmdbID, $review, $movie);
        }

        if (!is_null(RatingDB::getUserRatingByTmdbID($user, $tmdbID))) {
            RatingDB::editRating($newRating);
        } else {
            RatingDB::addRating($newRating);
        }

        $reviewError = Validation::validLength($review, 'Review', 400);
        if (!empty($newReview) && $reviewError === "") {
            if (is_null(ReviewDB::getUserReviewByTmdbID($user, $tmdbID))) {
                ReviewDB::addReview($newReview);
            } else {
                ReviewDB::editReview($newReview);
            }
        }
        //movie is not a movie object, but an array of TMDB results from the 
        //tmdbID
        $movie = TmdbAPI::getMovie($tmdbID);
        $ratingsReviewsUsers = MovieDB::getMovieRatingsAndReviews($movie['id']);
        $userRating = false;
        $userReview = false;

        if (!is_null(RatingDB::getUserRatingByTmdbID($user, $tmdbID))) {
            $userRating = RatingDB::getUserRatingByTmdbID($user, $tmdbID);
        }
        if (!is_null(ReviewDB::getUserReviewByTmdbID($user, $tmdbID))) {
            $userReview = ReviewDB::getUserReviewByTmdbID($user, $tmdbID);
        }
        $favString = '';
        $isFavorite = FavoriteDB::findFavorite($user->getUserID(), $tmdbID);
        if ($isFavorite) {
            $favString = 'unfavorite';
        } else {
            $favString = 'favorite';
        }
        include './main/movie.php';
        die();
        break;
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

        //let view know whether movie is the user's favorite
        $favString = '';
        $isFavorite = FavoriteDB::findFavorite($user->getUserID(), $movie['id']);
        if ($isFavorite) {
            $favString = 'unfavorite';
        } else {
            $favString = 'favorite';
        }
        include './account/rater.php';
        die();
        break;
    case "main":
        $movies = TmdbAPI::getTopPopular();
        $bg = TmdbAPI::getRandomPopular();
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
        include 'account/accountLogin.php';
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

        include './account/accountLogin.php';
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
        include 'account/accountRegister.php';
        die();
        break;
    case "addUser":
        $email = filter_input(INPUT_POST, 'email');
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $proPic = './img/cat.jpg';

        $emailError = Validation::validEmail($email, 'Email');
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = $email . " is not a valid email.";
        }
        if (!UserDB::uniqueEmailTest($email) === false) {
            $emailError = 'Email already in use.';
        }
        $usernameError = Validation::validUsername($username, 'Username');

        if (!UserDB::uniqueUsernameTest($username) === false) {
            $usernameError = 'Username already taken.';
        }

        $passwordError = Validation::validPassword($password, 'Password');
        $pwdHash = password_hash($password, PASSWORD_BCRYPT);

        if (isset($_FILES['image'])) {
            $errors = array();
            $fileName = $_FILES['image']['name'];
            $fileSize = $_FILES['image']['size'];
            $fileTemp = $_FILES['image']['tmp_name'];
            $fileType = $_FILES['image']['type'];
            $expFile = explode('.', $fileName);
            $fileExt = end($expFile);
            $fileExt = strtolower($fileExt);
            $proPic = "./img/" . $username . $fileName;

            $extensions = array("jpeg", "jpg", "png", "gif");

            if (in_array($fileExt, $extensions) === false) {
                $errors[] = "file extension not in whitelist: " . join(',', $extensions);
            }

            if ($usernameError != '') {
                array_push($errors, 'filename characters');
            }

            if (empty($errors)) {
                move_uploaded_file($fileTemp, $proPic);
            }
        }
        //write user information to database
        if ($usernameError !== '' || $emailError !== '' || $passwordError !== '') {
            include("./account/accountRegister.php");
            die();
        } else {
            $user = new User($email, $username, $pwdHash, $proPic);
            UserDB::addUser($user);

            $_SESSION['loginUser'] = $username;
            $user = UserDB::getUserByUsername($username);
            $ratings = RatingDB::getUserMovieRatings($user);
            include './main/main.php';
            die();
        }
        break;
    case "logOut":
        session_destroy();
        $_SESSION['loginUser'] = 'defaultUser';
        $username = $_SESSION['loginUser'];
        $movies = TmdbAPI::getTopPopular();
        include "./main/main.php";
        die();
        break;
}
?>
