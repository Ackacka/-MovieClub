<?php include 'view/header.php'; ?>

<div class="row">
    <div class="card m-10 mx-auto" style="width: 40rem;";>
        <img class="card-img-top" src="https://image.tmdb.org/t/p/w500<?php echo $movie['poster_path']; ?>" alt="poster">
        <div class="card-body">
            <h5 class="card-title"><?php echo $movie['title']; ?></h5>
            <p><em>Released <?php echo date_format(date_create($movie['release_date']), 'M Y'); ?>
                </em></p>
            <p class="card-text"><?php echo $movie['overview']; ?></p>            
            
            <form method="post" action="index.php">
                <input type="hidden" name="action" value="addRating">
                <input type="hidden" name="movieID" value="<?php echo $movie['id'] ?>">
                <input type="hidden" name="title" value="<?php echo $movie['title'] ?>">
                <input type="hidden" name="overview" value="<?php echo $movie['overview'] ?>">
                <input type="hidden" name="poster" value="<?php echo $movie['poster_path'] ?>">
                
                <div class="collapse" id="collapseTxtReview">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Your thoughts</label>
                        <textarea class="form-control" id="txtReview" name="newReview" rows="3" maxlength="400"><?php if ($review !== false) echo $review->getReview(); ?></textarea>
                    </div>
                </div>
                
                <select id="ddRating" name="rating">
                    <?php for ($i = 0; $i < 10; $i++) { ?>
                        <option value="<?php echo $i + 1 ?>"
                                <?php if ($rating !== false) { ?>
                                    <?php if ($i === intval($rating->getRating())) echo 'selected'; ?>
                                <?php } ?>
                                ><?php echo $i + 1 ?> stars</option>
                    <?php } ?>
                </select>
                <br>
                
                <input class="btn btn-outline-primary" type="submit" value="Submit">
                <a href="#collapseTxtReview" class="btn btn-primary mr-auto" data-toggle="collapse"role="button" aria-expanded="false" aria-controls="collapseTxtReview">Write a review</a>
                <a href="#" class="btn btn-outline-secondary float-right">Haven't seen</a>
            </form>

            
        </div>
    </div>
</div>

<?php include 'view/footer.php'; ?>