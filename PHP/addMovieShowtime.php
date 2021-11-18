<?php
    # ADDS A SHOWTIME #

    require("database.php");

    $date = filter_input(INPUT_POST,'date');
    $time = filter_input(INPUT_POST,'time');
    $movieId = filter_input(INPUT_POST,'showmovie_id');

    $queryCheck = "SELECT * FROM showinfo";
    
    $statement2 = $db->prepare($queryCheck);
    $statement2->execute();
    $movieInfo = $statement2->fetchAll();
    $bool = TRUE;

    # checks if the movie already has date/time inputed
    foreach ($movieInfo as $info) {
        if ($date == $info['date'] && $time == $info['time']) {
            include("getShowTimeInfo.php");
            echo "<p style='padding-left:40%;'> Movie time was already found, please try again. </p>";
            $bool = FALSE;
            break;
        }
    }

    # if no showtime found, inster it
    if ($bool) {
        $query = "INSERT INTO showinfo (date, time, movieId) 
        VALUE (:showDate, :showTime, :movie_id)
        ";
        $statement = $db->prepare($query);
        $statement->bindValue(':showDate', $date);
        $statement->bindValue(':showTime',$time);
        $statement->bindValue(':movie_id',$movieId);
        $statement->execute();
        $statement->closeCursor();

        $showMovieId = $movieId;

        include("getShowTimeInfo.php");
    }


    
    
?>