<?php include 'view/header.php'; ?>

<h1>Friend Request Sent</h1>

<h4><?php echo "You have sent a friend request to " . $userTo->getUsername()?></h4>
<br>

<p><a href="index.php?action=mainPage">Back to the home page</a></p>   

<?php include 'view/footer.php'; ?>