<?php include 'view/header.php'; ?>

<div class="container">
    <div class="jumbotron m-3">
        <h1 class="display-4">Welcome to the Video Club<?php if ($username !== 'defaultUser') echo ', ' . $user->getUsername() ?>!</h1>
        <p class="lead">Track your taste in cinema, and share it with your friends!</p>
        
        <?php if ($username === 'defaultUser') { ?>
            <hr class="my-4">
            <p>Get started by making an account.</p>
            <p class="lead">
                <a class="btn btn-success btn-lg" href="index.php?action=register" role="button">Get started</a>
            </p>
        <?php } ?>
    </div>
    
    <h3>Popular movies now:</h3>
        <?php for ($i = 0; $i < 18; $i++) { ?>
            <?php if ($i % 6 === 0) { ?>
                <div class="row">
            <?php } ?>
        <div class="col-sm-2 p-1">
            <a href="index.php?action=viewMovie&movie=<?php echo $movies[$i]['id']; ?>">
                <img src="https://image.tmdb.org/t/p/w92<?php echo $movies[$i]['poster_path']; ?>" alt="poster">
            </a>            
        </div>   
            <?php if ($i % 6 === 5) {?>
                </div>
            <?php } ?>   
        <?php } ?>
                
                    
    
    
    <?php // var_dump($movies); ?>
</div>

<?php include 'view/footer.php'; ?>
