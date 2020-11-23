<?php include 'view/header.php'; ?>


<h2>Edit Profile</h2>

<form action="index.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="editProfile">			

    <label for="username">Username:</label>

    <input type="text" id="username" value="<?php if($username !== 'defaultUser') echo htmlspecialchars($username); ?>" placeholder="Enter Username" name="username"/>
    <span class="errorMsg"> <?php echo htmlspecialchars($usernameError) ?></span>
    <br>
    
    <label for="password">Password:</label>

    <input type="password" id="password" value="<?php echo htmlspecialchars($password); ?>" placeholder="Enter Password" name="password">
    <span class="errorMsg"> <?php echo htmlspecialchars($passwordError) ?></span>
    <br>
    
    <label for="password">Profile Picture:</label>
    <input type="file" name="image" />
    <br>
    <button type="submit">Save Edits</button>


</form>  


<?php include 'view/footer.php'; ?>
