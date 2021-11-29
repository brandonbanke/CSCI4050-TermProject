<?php
    # THIS FILE GETS ALL THE MOVIES #

    require("../Modal/database.php");
    $querymovie = "SELECT * FROM movie";

    $mstates = $db->prepare($querymovie);
    $mstates->execute();
    $movieInfs = $mstates->fetchAll();
    $movieOnCheck = $mstates->rowCount();
    $mstates->closeCursor();

    $categoryQuery = "SELECT DISTINCT category FROM movie";
    $query2 = $db->prepare($categoryQuery);
    $query2->execute();
    $allCategories = $query2->fetchAll();
    

?>