<?php
    require("../Modal/database.php");
    $querycard = "SELECT billingAddress, expirationDate, 
    CAST(AES_DECRYPT(cardNumber, 'cebs1234') AS CHAR(200)) AS cardNumber,  
    CAST(AES_DECRYPT(cvv, 'cebs1234') AS CHAR(50)) AS cvv,
    fullName, cardId, userId FROM payment_card WHERE userId = (SELECT userId FROM user WHERE active=1)";

    $cstates = $db->prepare($querycard);
    $cstates->execute();
    $paymentCards = $cstates->fetchAll();
    $cardCount = $cstates->rowCount();
    $cstates->closeCursor();

   
?>