<?php
    include("../PHP/database.php");
    $querycard = "SELECT * FROM payment_card WHERE userId = (SELECT userId FROM user WHERE active=1)";

    $cstates = $db->prepare($querycard);
    $cstates->execute();
    $paymentCards = $cstates->fetchAll();
    $cardCount = $cstates->rowCount();
    $cstates->closeCursor();

   
?>