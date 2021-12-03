<?php
    require("../Modal/database.php");
    $queryhistory = "SELECT * 
                    FROM ((booking 
                    INNER JOIN movie ON booking.movieId = movie.id)
                    INNER JOIN showinfo ON (booking.movieId = showinfo.movieId AND booking.showinfoId = showinfo.showId))
                    WHERE userId = (SELECT userId FROM user WHERE active=1)";

    $bstates = $db->prepare($queryhistory);
    $bstates->execute();
    $bookingInfs = $bstates->fetchAll();
    $orderCount = $bstates->rowCount();
    $bstates->closeCursor();

 

   
    
?>