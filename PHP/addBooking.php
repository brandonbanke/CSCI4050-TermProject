<?php
    require("getUserInfo.php");
    require("../PHP/mail-setup.php");

    if (isset($_POST['submit1'])) $card = $_POST['cardId1'];
    else if (isset($_POST['submit2'])) $card = $_POST['cardId2'];
    else if (isset($_POST['submit3'])) $card = $_POST['cardId3'];

    $userId = $userInfs[0]['userId'];
    $movieId = $_POST['movieId'];
    $showId = $_POST['showId'];
    $fName = $userInfs[0]['firstName'];
    $userEmail = $userInfs[0]['email'];
    $ticketNumber = 1; # needs to be the id from ticket
    $promotionId = 8; # needs to include actual promotion id
    #$movieId = 6; # just for testing, uncomment if needed
    #$userId = 'a'; # just for testing, uncomment if needed

    $query = "INSERT INTO booking (ticketNumber, promotionId, cardId, userId, movieId)
    VALUE ($ticketNumber, $promotionId, $card, '$userId', $movieId)";   

    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();


    # email confirmation
    $subject = 'CBS Booking Confirmation';
    $message = '<p>This is an email confirmation for: ' . $fName ;
    $message .= '</p><p>Thank you for using CBS, your ticket number is '. $ticketNumber .'</p>';
    $message .= '<p>Enjoy the show.</p>';

    try {
        $mail->addAddress($userEmail, $fName); # email of user
        $mail->isHTML(TRUE);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->Send();
    } 
    catch (Exception $e) {
        echo "";
    }


    include("../HTML/booking-confirmation.php");

?>