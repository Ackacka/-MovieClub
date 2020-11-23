<?php include 'view/header.php'; ?>

<div class="container">
    <?php if (count($requestingUsers) > 0) { ?>
        <h4>You have friend requests:</h4>
        <?php for ($i = 0; $i < count($requestingUsers); $i++) { ?>
            <div class="row searchRow h-100 m-1">            
                <div class="col-sm m-3 p-2">
                    <h4><?php echo $requestingUsers[$i]->getUsername() ?></h4>                        
                </div>
                <div class="col-sm m-auto p-2">
                    <form method="post" action="index.php">
                        <input type="hidden" name="action" value="friendDecline">
                        <input type="hidden" name="userIDfromDec" value="<?php echo $requestingUsers[$i]->getUserID(); ?>">
                        <button type="submit" class="btn btn-danger btn-sm align-items-center float-right">Decline</button>
                    </form>
                    <form method="post" action="index.php">
                        <input type="hidden" name="action" value="friendAccept">
                        <input type="hidden" name="userIDfromAcc" value="<?php echo $requestingUsers[$i]->getUserID(); ?>">
                        <button type="submit" class="btn btn-primary btn-sm align-items-center float-right">Accept</button>
                    </form>
                </div>

            </div>
        <?php } ?>        
    <?php } ?>
    <?php if (isset($top3Genres)) { ?>
        <div class="container">
            <div class="col-sm board m-3 p-1">
                <h4>Genres with the most ratings:</h4>
                <ul>
                    <?php foreach ($top3Genres as $genre => $count) { ?>                    
                        <li><?php echo $genre ?>: <?php echo $count ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
    </div>


</div>

<?php include 'view/footer.php'; ?>
