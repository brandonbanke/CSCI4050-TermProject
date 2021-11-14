<?php
    include("../PHP/database.php");
    $querymovie = "SELECT * FROM movie";

    $mstates = $db->prepare($querymovie);
    $mstates->execute();
    $movieInfs = $mstates->fetchAll();
    $movieOnCheck = $mstates->rowCount();
    $mstates->closeCursor();

   
?>