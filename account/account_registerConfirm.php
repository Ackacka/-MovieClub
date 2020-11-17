<?php include 'view/header.php'; ?>



<h1>User Registration Successful</h1>

<h4><?php echo "Thank you " . $user->getUsername() . ".<br>" . "You have been registered." ?></h4>
<br>

<p><a href="index.php?action=main">Back to the home page</a></p>   


<?php include 'view/footer.php'; ?>
