<?php include 'view/header.php'; ?>



<div class="row">
      
</div>
<div class="row">
    <div class="col-sm mx-auto">
    <label>Your ratings:</label>
    <div id="carouselExampleIndicators" class="carousel slide mx-auto" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
        </ol>
        <div class="carousel-inner">
            <?php for ($i = 0; $i < 6; $i++) { ?>
                <div class="carousel-item <?php if ($i === 0) echo 'active' ?>">
                    <img class="d-block w-300" src="https://image.tmdb.org/t/p/w300<?php echo $ratings[$i]->getMovie()->getPoster(); ?>" alt="slide">
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
    </div>
</div>



</div>

<?php include 'view/footer.php'; ?>