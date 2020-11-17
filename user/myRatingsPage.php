<?php include 'view/header.php'; ?>



<div class="container">


    <div class="row">
        <div class="col-sm mx-auto">
            <?php if (is_null($ratings)) { ?>
                <h4>Go rate some movies!</h4>
            <?php } else { ?>
                <h3>Your ratings:</h3>
                <div id="carouselExampleIndicators" class="carousel slide mx-auto" data-ride="carousel">

                    <div class="carousel-inner">

                        <?php for ($i = 0; $i < count($ratings); $i++) { ?>
                            <div class="carousel-item <?php if ($i === 0) echo 'active' ?>">
                                <a href="index.php?action=viewMovie&movie=<?php echo $ratings[$i]->getMovie()->getTmdbID(); ?>">
                                    <img class="d-block w-300" src="https://image.tmdb.org/t/p/w500<?php echo $ratings[$i]->getMovie()->getPoster(); ?>" alt="slide">
                                </a>
                                <div class="carousel-caption d-none d-md-block">
                                    <?php for ($x = 0; $x < $ratings[$i]->getRating(); $x++) { ?>  
                                        <span><i class="fas fa-star"></i></span>
                                    <?php } ?>
                                    <?php for ($x = 0; $x < 10 - $ratings[$i]->getRating(); $x++) { ?>  
                                        <span><i class="far fa-star"></i></span>
                                    <?php } ?>
                                </div>
                            </div>     
                        <?php } ?> 


                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>



</div>

<?php include 'view/footer.php'; ?>