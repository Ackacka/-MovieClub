<?php include 'view/header.php'; ?>
<?php //var_dump($movie); ?>
<div class="row">
    <div class="card m-10 mx-auto" style="width: 30rem;";>
        <img class="card-img-top" src="https://image.tmdb.org/t/p/w500<?php echo $movie['poster_path']; ?>" alt="poster">
        <div class="card-body">
            <h5 class="card-title"><?php echo $movie['title']; ?></h5>
            <p><em>Released <?php echo date_format(date_create($movie['release_date']), 'M Y'); ?>
                </em></p>
            <p class="card-text"><?php echo $movie['overview']; ?></p>
            <p>Your rating: </p>
            <?php for ($i = 0; $i < 10; $i++) {?>
                <span class="fa fa-star <?php if ($rating >= $i + 1) echo 'starActive'; ?>"
                      id="star<?php echo $i + 1; ?>"></span>
            <?php } ?>
                      
            <a href="#" class="btn btn-secondary float-right">Haven't seen</a>
        </div>
    </div>
</div>
<!--<img src="https://image.tmdb.org/t/p/w500
<?php // echo $movie['poster_path']; ?>
 " alt="poster">-->

<?php include 'view/footer.php'; ?>
