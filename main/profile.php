<?php include 'view/header.php'; ?>

<div class="container">

    <div class="row">
        <div class="col-sm">            
            <img class="mt-3" src="<?php echo Middleware::xecho($profileUser->getProPic()); ?>" style="width: 7rem">
            <h4><?php echo Middleware::xecho($profileUser->getUsername()); ?></h4>
            <h5><span class="badge badge-success"><?php echo $relationship ?></span></h5>
        </div>



    </div>
    <?php if ($relationship === 'friends') { ?>                
        <?php if (count($sameFavs) > 0) { ?>
            <hr>
            <h3 style='display: inline'>You share <?php echo count($sameFavs) ?> favorite movie
                <?php if (count($sameFavs) > 1) echo 's'; ?>...
            </h3>
            <div class="row justify-content-center">

                <br>
                <a href="index.php?action=viewMovie&movie=<?php echo $sameFavMovie->getTmdbID(); ?>">
                    <img class="searchThumb" src="https://image.tmdb.org/t/p/w185<?php echo $sameFavMovie->getPoster(); ?>">
                </a><br />

            </div>
            <div class="row justify-content-center">     
                <p class='lightgrey'><em><?php echo $sameFavMovie->getTitle() ?></em> is one of them</p>

            </div>
        <?php } ?>                
    <?php } ?>

    <?php if (!empty($profileUserRatings)) { ?>
        <h3><?php echo $profileUser->getUsername() ?>'s reviews:</h3>

        <?php for ($i = 0; $i < count($profileUserRatings); $i++) { ?>  
            <hr />  
            <div class="row m-1 board">
                <div class="col-sm-3 m-3 p-2">
                    <h4><?php echo $profileUserRatings[$i]['rating']->getMovie()->getTitle() ?></h4>
                    <a href="index.php?action=viewMovie&movie=<?php echo $profileUserRatings[$i]['rating']->getMovie()->getTmdbID(); ?>"><img class="searchThumb" src="https://image.tmdb.org/t/p/w185<?php echo $profileUserRatings[$i]['rating']->getMovie()->getPoster(); ?>"></a>
                    <?php if ($profileUserRatings[$i]['review'] !== false) { ?>
                        <p>review date: <?php echo date_format(date_create($profileUserRatings[$i]['review']->getReviewDate()), 'M Y') ?></p>
                    <?php } else { ?>
                        <p>rating date: <?php echo date_format(date_create($profileUserRatings[$i]['rating']->getRatingDate()), 'M Y') ?></p>
                    <?php } ?>
                    <p>
                        <?php for ($x = 0; $x < $profileUserRatings[$i]['rating']->getRating(); $x++) { ?>  
                            <span class="align-bottom"><i class="fas fa-star"></i></span>
                        <?php } ?>
                        <?php for ($x = 0; $x < 10 - $profileUserRatings[$i]['rating']->getRating(); $x++) { ?>  
                            <span class="align-bottom"><i class="far fa-star"></i></span>
                        <?php } ?>
                    </p>
                </div>
                <div class="col-sm m-3 p-2">                    
                    <p class="my-auto">
                        <?php if ($profileUserRatings[$i]['review'] !== false) { ?>
                            <?php echo $profileUserRatings[$i]['review']->getReview(); ?>
                        <?php } else { ?>
                            <em>No review</em>
                        <?php } ?>

                    </p>
                </div>
            </div>
        <?php } ?>
    <?php } ?>


</div>

<?php include 'view/footer.php'; ?>
