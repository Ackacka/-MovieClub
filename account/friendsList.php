<?php include 'view/header.php'; ?>


<div class="container">
    <ul class="nav justify-content-center socialNav m-3">
        <li class="nav-item">
            <a class="nav-link active" href="index.php?action=searchUsersPage">Add new friends</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=friendsList">Friends list</a>
        </li>
    </ul>

    <?php for ($i = 0; $i < count($friends); $i++) { ?>
        <?php if ($i % 3 === 0) { ?>
            <div class="row">
        <?php } ?>
            <div class="col-sm-4">
                <div class="card" style="width: 18rem;">
                    <a href="index.php?action=showProfile&profileUser=<?php echo $friends[$i]->getUsername() ?>">
                        <img class="card-img-top" src="<?php echo $friends[$i]->getProPic(); ?>" alt="<?php echo $friends[$i]->getUsername(); ?>'s profile pic">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $friends[$i]->getUsername(); ?></h5>
                        <p class="card-text">Lorem ipsum dolor sit.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
                <?php if ($i % 3 === 2) {?>
            </div>
                <?php } ?>
        <?php } ?>

    </div>

    <?php include 'view/footer.php'; ?>
