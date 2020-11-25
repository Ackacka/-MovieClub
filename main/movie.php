<?php include 'view/header.php'; ?>

<div class="row">
    <div class="card m-10 mx-auto" style="width: 40rem;";>
        <img class="card-img-top" src="https://image.tmdb.org/t/p/w500<?php echo $movie['poster_path']; ?>" alt="poster">
        <div class="card-body">
            <a href="index.php?action=<?php echo $favString ?>&movie=<?php echo $movie['id'] ?>">
                <i class="fas fa-heart fa-3x heart float-right <?php echo $favString ?>">
                    </i>
            </a>
            <h5 class="card-title"><?php echo $movie['title']; ?></h5>
            
            <p><em>Released <?php echo date_format(date_create($movie['release_date']), 'M Y'); ?>
                </em></p>
            <p class="card-text"><?php echo $movie['overview']; ?></p>            
        </div>
        <?php if ($review !== false) { ?>
        <div class="card-body">
            <h6>Your review:</h6>
            <p class="card-text"><?php echo $review->getReview(); ?></p>
        </div>
        <?php } ?>
        <div class="card-body">
            <form method="post" action="index.php">
                <input type="hidden" name="action" value="addRating">
                <input type="hidden" name="movieID" value="<?php echo $movie['id'] ?>">
                <input type="hidden" name="title" value="<?php echo $movie['title'] ?>">
                <input type="hidden" name="overview" value="<?php echo $movie['overview'] ?>">
                <input type="hidden" name="poster" value="<?php echo $movie['poster_path'] ?>">                
                
                <div class="collapse" id="collapseTxtReview">
                    <div class="form-group">
                        <label for="txtReview">Your review</label>
                        <textarea class="form-control" id="txtReview" name="newReview" rows="3" maxlength="400"></textarea>
                    </div>
                </div>
                
                
                
                <select id="ddRating" name="rating">
                    <?php for ($i = 0; $i < 10; $i++) { ?>
                        <option value="<?php echo $i + 1 ?>"
                                <?php if ($rating !== false) { ?>
                                    <?php if ($i + 1 === intval($rating->getRating())) echo 'selected'; ?>
                                <?php } ?>
                                ><?php echo $i + 1 ?> stars</option>
                    <?php } ?>
                </select>
                <br>
                
                <input class="btn btn-outline-primary" type="submit" value="Submit">
                <a href="#collapseTxtReview" class="btn btn-primary mr-auto"
                   data-toggle="collapse"role="button" aria-expanded="false"
                   aria-controls="collapseTxtReview">
                    <?php if ($review !== false) { ?>
                        Edit review
                    <?php } else { ?>
                        Write a review
                    <?php } ?>
                </a>
                
                <a href="#" class="btn btn-outline-secondary float-right">Haven't seen</a>
            </form>

            
        </div>
    </div>
</div>

<?php include 'view/footer.php'; ?>