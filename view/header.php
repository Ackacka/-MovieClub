<!DOCTYPE html>
<html>

    <head>
        <title>Movie Club</title>
        <script src="https://kit.fontawesome.com/7c28c542f0.js" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">        
        <link rel="stylesheet" href="./main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>


    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarToggler">                    
                <a class="navbar-brand" href="index.php?action=main"><i class="fas fa-film"></i>
                    <p style="display: inline"><b>Movie Club</b></p>
                </a>
                <form class="form-inline" method="post" action="index.php">
                    <input name="action" type="hidden" value="search">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search movies..." aria-label="Search" name="search">
                    <button class="btn btn-outline-success m-2 my-sm-0" type="submit">Search</button>
                    <?php if ($username !== 'defaultUser') { ?>
                        <a href="index.php?action=rater"><button type="button" class="btn btn-outline-dark my-2 my-sm-0">Random Movie</button></a>
                    <?php } ?>
                </form>
            </div>
            <?php if ($_SESSION['loginUser'] === 'defaultUser') { ?>
                <ul class="nav navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active p-3">
                        <a class="navlink" href="index.php?action=login">Log In</a>

                    </li>
                    <li class="nav-item p-3">
                        <a class="navlink" href="index.php?action=register">Register</a>
                    </li>      
                </ul>    
            <?php } else { ?>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $user->getUsername() ?></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="index.php?action=showProfile&profileUser=<?php echo $user->getUsername() ?>">My Profile</a>
                            <a class="dropdown-item" href="index.php?action=editProfileForm">Edit Profile</a>
                            <a class="dropdown-item" href="index.php?action=searchUsersPage">Friends</a>
                            <a class="dropdown-item" href="index.php?action=rater">Rate Movies</a>
                            <a class="dropdown-item" href="index.php?action=myRatingsPage">My Ratings</a>
                            <a class="dropdown-item" href="index.php?action=logOut">Log Out</a>
                        </div>
                    </li> 
                </ul>

            <?php } ?>

        </nav>






