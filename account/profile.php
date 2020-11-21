<?php include 'view/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-sm">            
            <img class="mt-3" src="<?php echo $profileUser->getProPic(); ?>" style="width: 7rem">
            <h4><?php echo $profileUser->getUsername(); ?></h4>
        </div>

    </div>
</div>

<?php include 'view/footer.php'; ?>
