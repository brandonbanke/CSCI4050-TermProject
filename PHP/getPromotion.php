<?php
    include("../PHP/database.php");
    $queryprom = "SELECT * FROM promotion";

    $prstates = $db->prepare($queryprom);
    $prstates->execute();
    $promInfs = $prstates->fetchAll();
    $promotionOnCheck = $prstates->rowCount();
    $prstates->closeCursor();

   
?>