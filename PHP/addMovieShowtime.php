<?php
    require("database.php");


    $date = filter_input(INPUT_POST,'date');
    $time = filter_input(INPUT_POST,'time');
    $movieId = filter_input(INPUT_POST,'movieId');

    # wrong query format
    $queryCheck = "SELECT * FROM TABLE showid WHERE movieId = '$movieId'";
    #
    
    $statement2 = $db->prepare($queryCheck);
    $statement2->execute();
    $movieInfo = $statement2->fetchAll();

    # NEEDS TO GET DATE AND TIME FROM SPECIFIC MOVIE
    if ($date == $movieInfo[0]['date'] && $time == $movieInfo[0]['time']) {
        echo "ALREADY THAT DATE";
    } else {
        $query = "INSERT INTO showinfo (date, time, movieId) 
        VALUE (:showDate, :showTime, :movie_id)
        ";


        $statement = $db->prepare($query);
        $statement->bindValue(':showDate', $date);
        $statement->bindValue(':showTime',$time);
        $statement->bindValue(':movie_id',$movieId);
        $statement->execute();

        echo "INSERTED";
    }

    
?>