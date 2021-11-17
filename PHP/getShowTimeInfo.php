<?php
    require("../PHP/database.php");

    $showMovieId = filter_input(INPUT_POST, "showmovie_id");
    $queryshowinfo = "SELECT * FROM showinfo WHERE movieId = '$showMovieId'";

    $prstates = $db->prepare($queryshowinfo);
    $prstates->execute();
    $specificShowInfs = $prstates->fetchAll();
    $prstates->closeCursor();

    include("../HTML/manageShowtime.php");
    
?>