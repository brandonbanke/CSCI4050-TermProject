<?php
    require("../PHP/database.php");
    require("../PHP/getMovieInfo.php");

    $showMovieId = filter_input(INPUT_POST, "showmovie_id");
    $queryshowinfo = "SELECT * FROM showinfo WHERE movieId = '$showMovieId'";

    $prstates = $db->prepare($queryshowinfo);
    $prstates->execute();
    $specificShowInfs = $prstates->fetchAll();
    $rowCount = $prstates->rowCount();
    $prstates->closeCursor();

    foreach ($movieInfs as $movieInfo){
        if ($specificShowInfs[0]['movieId'] == $movieInfo['id']) {
            $movieName = $movieInfo['title'];
        }
    }

    include("../HTML/manageShowtime.php");
    
?>