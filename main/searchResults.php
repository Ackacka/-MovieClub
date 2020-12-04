<?php include 'view/header.php'; ?>

<div class="container">
    <?php if (count($searchResults) > 0) { ?>
        <?php for ($i = 0; $i < count($searchResults); $i++) { ?>
            <div class="row searchRow h-100 m-1">            
                <div class="col-sm-2 m-3 p-2">
                    <h4><?php echo $searchResults[$i]['title']; ?></h4>
                    <a href="index.php?action=viewMovie&movie=<?php echo $searchResults[$i]['id']; ?>"><img class="searchThumb" src="https://image.tmdb.org/t/p/w185<?php echo $searchResults[$i]['poster_path']; ?>"></a>
                    <p><?php echo date_format(date_create($searchResults[$i]['release_date']), 'M Y') ?></p>
                </div>
                <div class="col-sm m-3 p-2">
                    <p class="my-auto"><?php echo $searchResults[$i]['overview']; ?></p>
                </div>
            </div>
        <?php } ?>
    <?php } else {?>
    <p class="m-3 p-3 board"><em>No search results.</em></p>
    <?php } ?>




</div>

<?php include 'view/footer.php'; ?>