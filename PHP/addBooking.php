<?php
    require("getUserInfo.php");

    $card = $_POST['checkBox'];
    $userId = $userInfs[0]['userId'];
    $movieId = $_POST['movieId'];
    $showId = $_POST['showId'];


    $query = "INSERT INTO booking (ticketNumber, promotionId, cardId, userId, movieId)
    VALUE ()";
    

?>