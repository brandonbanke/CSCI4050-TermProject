<?php
    # GETS SHOWTIME FROM MOVIE ID #

    require("../PHP/database.php");
    require("../PHP/getMovieInfo.php");

    if (!isset($showMovieId)) {
        $showMovieId = filter_input(INPUT_POST, "showmovie_id");
    }
    
    $queryshowinfo = "SELECT * FROM showinfo WHERE movieId = '$showMovieId'";

    $prstates = $db->prepare($queryshowinfo);
    $prstates->execute();
    $specificShowInfs = $prstates->fetchAll();
    $rowCount = $prstates->rowCount();
    $prstates->closeCursor();

    $query = "SELECT title FROM movie WHERE id = '$showMovieId'";
    $statement = $db->prepare($query);
    $statement->execute();
    $nameInfo = $statement->fetchAll();
    $movieName = $nameInfo[0]['title'];
    $statement->closeCursor();

     if (isset($_POST["changeForm"])) { # if admin clicks on change

        # GETS SHOW INFO FROM showId
        $showInfoId = filter_input(INPUT_POST, "showId");
        $queryshowinfo = "SELECT * FROM showinfo WHERE showId = '$showInfoId'";

        $prstates = $db->prepare($queryshowinfo);
        $prstates->execute();
        $specificShowInfs = $prstates->fetchAll();
        $rowCount = $prstates->rowCount();
        $prstates->closeCursor();


    } else if (isset($_POST["editForm"])) { # if admin edits the showtime info
        
        # EDITS THE MOVIE TIME/DATE#
        $time = filter_input(INPUT_POST, 'time');
        $date = filter_input(INPUT_POST, 'date');
        $showId = filter_input(INPUT_POST, 'showId');


        $query = "UPDATE showinfo 
            SET time = '$time',
            date = '$date'
            WHERE showId = '$showId'
        ";
        $statement = $db->prepare($query);
        $statement->execute();
        $statement->closeCursor();

        
    } else if (isset($_POST['deleteTime'])) { # if admin deletes showtime

        # DELETES THE TIME #
        $showId = filter_input(INPUT_POST, "showId");
        $query = "DELETE FROM showinfo WHERE showId = '$showId'";
        $statement = $db->prepare($query);
        $statement->execute();
        $statement->closeCursor();
    
        
    } 
    
    include("../HTML/manageShowtime.php");
    
?>