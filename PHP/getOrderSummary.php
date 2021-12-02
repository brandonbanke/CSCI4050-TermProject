<?php
    require("../Modal/database.php");
    $mId = filter_input(INPUT_POST, "movieId");

    $querysummary = "SELECT movie.title, booking.bookingNumber, showinfo.date, showinfo.time
                    FROM ((movie
                    INNER JOIN booking ON movie.id = booking.movieId)
                    INNER JOIN showinfo ON movie.id = showinfo.movieId)
                    WHERE movie.id = $mId";
                    

    $Sstates = $db->prepare($querysummary);
    $Sstates->execute();
    $summaryInfs = $Sstates->fetchAll();
    $summaryOnCheck = $Sstates->rowCount();
    $Sstates->closeCursor();

    foreach ($summaryInfs as $summaryInf) {
        echo $summaryInf['title'];

    }

?>