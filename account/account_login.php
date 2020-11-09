<?php include 'view/header.php'; ?>

<div class="container">     
    <h1>Account Sign In</h1>
    <form method="post" action="index.php">
        <input type="hidden" name="action" value="userLogin">

        <input type="text" name="username" value="<?php if($username !== 'defaultUser') echo htmlspecialchars($username); ?>" placeholder="Enter Your User Name"/>  
        <span style="color: red;"> <?php echo htmlspecialchars($usernameError) ?></span>
        <br>
        <input class="rounded" type="password" name="password" placeholder="Enter Your Password"/> 
        <span style="color: red;"> <?php echo htmlspecialchars($passwordError) ?></span>
        <br>

        <br>

        <input type="submit" type="submit" value="LOGIN" class="btn-login"/>                       
    </form>
    <br>
    <p><a href="index.php?action=register">Register</a><br></p>
</div>

<?php include 'view/footer.php'; ?>