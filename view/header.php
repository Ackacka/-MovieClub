<!DOCTYPE html>
<html>

<head>
    <title>tmdb test</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>


<body>
<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarToggler">
    <a class="navbar-brand" href="#">Movie Club</a>
    <?php if($_SESSION['loginUser'] === 'defaultUser') { ?>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item active p-3">
            <a class="navlink" href="index.php?action=login">Log In</a>

          </li>
          <li class="nav-item p-3">
            <a class="navlink" href="index.php?action=register">Register</a>
          </li>      
        </ul>    
    <?php } else { ?>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item active p-3">
            <a class="navlink" href="index.php?action=rater">Rate Movies</a>        
          </li>   
          <li class="nav-item active p-3">
            <a class="navlink" href="index.php?action=logOut">Log Out</a>        
          </li>         
        </ul>
    <?php } ?>
  </div>
</nav>





<br>
<br>
