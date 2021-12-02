<?php
    require("getUserInfo.php");

    $card = $_POST['checkBox'];
    $userId = $userInfs[0]['userId'];
    $movieId = $_POST['movieId'];
    $showId = $_POST['showId'];


    $query = "INSERT INTO booking (ticketNumber, promotionId, cardId, userId, movieId)
    VALUE (:ticketNumber, :promotionId, :cardId, :userId, :movieId)";   

    $statement = $db->prepare($query);
    $statement->bindValue(':cardId', $card);
    $statement->bindValue(':userId',$userId);
    $statement->bindValue(':movieId',$movieId);
    $statement->execute();
    $statement->closeCursor();

    include("../HTML/booking-confirmation.php");

?>