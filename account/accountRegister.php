<?php include 'view/header.php'; ?>


<h2>Register</h2>

<form action="index.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="addUser">			

    <label for="email">Email:</label>

    <input type="email" id="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="Enter Email" name="email">
    <span class="errorMsg"> <?php echo htmlspecialchars($emailError) ?></span>
    <br>

    <label for="username">Username:</label>

    <input type="text" id="username" value="<?php if($username !== 'defaultUser') echo htmlspecialchars($username); ?>" placeholder="Enter Username" name="username"/>
    <span class="errorMsg"> <?php echo htmlspecialchars($usernameError) ?></span>
    <br>
    
    <label for="password">Password:</label>

    <input type="password" id="password" value="<?php echo htmlspecialchars($password); ?>" placeholder="Enter Password" name="password">
    <span class="errorMsg"> <?php echo htmlspecialchars($passwordError) ?></span>
    <br>
    
    <input type="file" name="image" />
    
    <button type="submit">Register</button>


</form>  


<?php include 'view/footer.php'; ?>
