<?php
    require("../Modal/database.php");

    $movieId = filter_input(INPUT_POST, "movie_id");
    $querymovie = "SELECT * FROM movie WHERE id = '$movieId'";

    $mstates = $db->prepare($querymovie);
    $mstates->execute();
    $specificMovieInfs = $mstates->fetchAll();
    $movieCount = $mstates->rowCount();
    $mstates->closeCursor();

    if($movieCount == 1) {
        include("../HTML/edit-movie.php");
        
    } else {
        echo $movieId;
    }
    
?>