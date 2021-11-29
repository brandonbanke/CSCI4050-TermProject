<?php
    # ADDS A SHOWTIME #
    require("../Modal/database.php");
    require("getMovieInfo.php");

    $newDate = filter_input(INPUT_POST,'date');
    $time = filter_input(INPUT_POST,'time');
    $movieId = filter_input(INPUT_POST,'showmovie_id');

    $queryCheck = "SELECT * FROM showinfo";
    $statement2 = $db->prepare($queryCheck);
    $statement2->execute();
    $movieInfo = $statement2->fetchAll();
    $statement2->closeCursor();
    $bool = TRUE;

    # checks if the movie already has date/time inputed
    foreach ($movieInfo as $info) {
        if ($newDate == $info['date'] && $time == $info['time']) {
            include("getShowTimeInfo.php");
            echo "<p style='padding-left:40%;'> Movie time was already found, please try again. </p>";
            $bool = FALSE;
            break;
        }
    }

    #check if movie duration conflicts with another movie
    $querymovie = "SELECT * FROM movie WHERE id = '$movieId'";
    $mstates = $db->prepare($querymovie);
    $mstates->execute();
    $specificMovieInfs = $mstates->fetchAll();
    $movieCount = $mstates->rowCount();
    $mstates->closeCursor();
    $duration = $specificMovieInfs[0]['duration']; 
    $hoursToMins = substr($time, 0, 2);
    $minutes = substr($time, 3, 2);
    $hoursToMins = $hoursToMins * 60;
    $newStartTime = $minutes + $hoursToMins;
    $newFinalTime = $duration + $newStartTime;

    # NEEDS TO PULL EVERY MOVIE
    foreach ($movieInfs as $movieInfo) {
        $duration = $movieInfo['duration'];
        $id = $movieInfo['id'];
        $queryCheck = "SELECT * FROM showinfo WHERE movieId = '$id'";
        $statement = $db->prepare($queryCheck);
        $statement->execute();
        $showtimeInfo = $statement->fetchAll();
        $count = $statement->rowCount();
        $statement->closeCursor();
        # NEEDS QUERY TO SEARCH SPECIFIC SHOWINFO BASED ON MOVIEID
        foreach($showtimeInfo as $showInfo) {
            $scheduledTime = $showInfo['time'];
            $date = $showInfo['date'];
            $hoursToMins = substr($scheduledTime, 0, 2);
            $minutes = substr($scheduledTime, 3, 2);
            $hoursToMins = $hoursToMins * 60;
            $startTime = $minutes + $hoursToMins;
            $finalTime = $duration + $startTime;
            if (($newStartTime >= $startTime && $newStartTime <= $finalTime) && ($newFinalTime >= $startTime && $newFinalTime <= $finalTime) && $newDate == $date) { #still wrongs
                include("getShowTimeInfo.php");
                echo "<p style='padding-left:34%'>Time conflict detected.</p>";
                $bool = FALSE;
            }

        }   
    }

    # if no showtime found, inster it
    if ($bool) {
        $query = "INSERT INTO showinfo (date, time, movieId) 
        VALUE (:showDate, :showTime, :movie_id)
        ";
        $statement = $db->prepare($query);
        $statement->bindValue(':showDate', $newDate);
        $statement->bindValue(':showTime',$time);
        $statement->bindValue(':movie_id',$movieId);
        $statement->execute();
        $statement->closeCursor();

        $showMovieId = $movieId;

        include("getShowTimeInfo.php");
        echo "<p style='padding-left:34%'>Successfully added a new showtime.</p>";
    }


    
    
?>