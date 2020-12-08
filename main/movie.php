<?php include 'view/header.php'; ?>

<?php // var_dump($ratingsReviewsUsers) ?>

<div class="container">
    <div class="row">
        <div class="col-sm-8 m-1">
            <div class="card";>
                <img class="card-img-top" src="https://image.tmdb.org/t/p/w500<?php echo $movie['poster_path']; ?>" alt="poster">
                <div class="card-body">

                    <?php if ($_SESSION['loginUser'] !== 'defaultUser') { ?>
                        <a href="index.php?action=<?php echo $favString ?>&movie=<?php echo $movie['id'] ?>">
                            <i class="fas fa-heart fa-3x heart float-right <?php echo $favString ?>">
                            </i>
                        </a>
                    <?php } ?>

                    <h5 class="card-title"><?php echo $movie['title']; ?></h5>

                    <p><em>Released <?php echo date_format(date_create($movie['release_date']), 'M Y'); ?>
                        </em></p>
                    <p class="card-text"><?php echo $movie['overview']; ?></p>
                </div>
                <?php if ($_SESSION['loginUser'] !== 'defaultUser') { ?>
                    <?php if ($userReview !== false) { ?>
                        <div class="card-body">
                            <h6>Your review:</h6>
                            <p class="card-text"><?php echo $userReview->getReview(); ?></p>
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


                            <?php if ($_SESSION['loginUser'] !== 'defaultUser') { ?>

                            <?php } ?>
                            <select id="ddRating" name="rating">
                                <?php for ($i = 0; $i < 10; $i++) { ?>
                                    <option value="<?php echo $i + 1 ?>"
                                    <?php if ($userRating !== false) { ?>
                                        <?php if ($i + 1 === intval($userRating->getRating())) echo 'selected'; ?>
                                    <?php } ?>
                                            ><?php echo $i + 1 ?> stars</option>
                                        <?php } ?>
                            </select>
                            <br>

                            <input class="btn btn-outline-primary" type="submit" value="Submit">
                            <a href="#collapseTxtReview" class="btn btn-primary mr-auto"
                               data-toggle="collapse"role="button" aria-expanded="false"
                               aria-controls="collapseTxtReview">
                                   <?php if ($userReview !== false) { ?>
                                    Edit review
                                <?php } else { ?>
                                    Write a review
                                <?php } ?>
                            </a>

                            <a href="index.php?action=rater" class="btn btn-outline-secondary float-right">Haven't seen</a>
                        </form>
                    </div>
                <?php } ?>



            </div>
        </div>
        <div class="col-sm">
            <div class="board m-1">
                <div class="d-flex p-2 justify-content-center">
                    <h4>User Reviews:</h4>
                </div>

                <?php if (!empty($ratingsReviewsUsers)) { ?>
                    <?php foreach ($ratingsReviewsUsers as $rru) { ?>
                        <div class="row">
                            <div class="col-sm-4">
                                <a href="index.php?action=showProfile&profileUser=<?php echo Middleware::xecho($rru['user']->getUsername()); ?>">
                                    <img class="p-1" src="<?php echo Middleware::xecho($rru['user']->getProPic()); ?>" style="width: 100%">
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <p><em><?php echo Middleware::xecho($rru['review']->getReview()); ?></em></p>
                                    <p>&nbsp;  - <?php echo Middleware::xecho($rru['user']->getUsername()); ?></p>
                                </div>

                                <div class="row">
                                    <?php for ($i = 0; $i < $rru['rating']->getRating(); $i++) { ?>  
                                        <span><i class="fas fa-star activeStar"></i></span>
                                    <?php } ?>
                                    <?php for ($i = 0; $i < 10 - $rru['rating']->getRating(); $i++) { ?>  
                                        <span><i class="far fa-star"></i></span>
                                    <?php } ?>
                                </div>
                                <?php if ($user->getUsername() === 'nluginbill' || $rru['user']->getUsername() === $_SESSION['loginUser']) { ?>
                                    <form method="post" action="index.php">
                                        <input type="hidden" name="action" value="deleteReview">
                                        <input type="hidden" name="movieID" value="<?php echo $movie['id'] ?>">
                                        <input type="hidden" name="reviewID" value="<?php echo $rru['review']->getReviewID() ?>">
                                        <div class="d-flex flex-row-reverse">
                                            <input class="btn btn-danger btn-sm m-1" type="submit" value="Delete">
                                        </div>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>

                <?php } else { ?>
                    <div class="col-8 m-1">
                        <div class="row">
                            <p>No one has rated this movie.</p>
                        </div>
                    </div>
                <?php } ?>




            </div>
        </div>
    </div>
</div>



<?php include 'view/footer.php'; ?>

