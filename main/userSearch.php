<?php include 'view/header.php'; ?>

<div class="container">
    <div class="row">
        <h3>Search for a freind's username</h3>
    </div>
    <form method="post" action="index.php">
        <div class="form-row align-items-center">
            <div class="col-sm">                
                <input type="text" class="form-control mb-2" id="usernameSearch" placeholder="Search...">
            </div>            
            
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">Search</button>
            </div>
        </div>
    </form>
</div>

<?php include 'view/footer.php'; ?>