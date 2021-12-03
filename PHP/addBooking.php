<?php
    require("getUserInfo.php");
    require("../PHP/mail-setup.php");

    if (isset($_POST['submit1'])) $card = $_POST['cardId1'];
    else if (isset($_POST['submit2'])) $card = $_POST['cardId2'];
    else if (isset($_POST['submit3'])) $card = $_POST['cardId3'];

    $numAdult = $_POST['numAdult'];
    $numChild = $_POST['numChild'];
    $numSenior = $_POST['numSenior'];

    $userId = $userInfs[0]['userId'];
    $movieId = $_POST['movieId'];
    $showId = $_POST['showId'];
    $fName = $userInfs[0]['firstName'];
    $userEmail = $userInfs[0]['email'];

    $ticketNumber = 1;
    $promotionId = $_POST['promoId']; 
    if ($promotionId == null) $promotionId = 'NULL';
    $total = $_POST['total']; 

    $query = "INSERT INTO ticket (numAdult, numChild, numSenior, total)
    VALUES ($numAdult, $numChild, $numSenior, $total)";
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();

    $query = "SELECT LAST_INSERT_ID() FROM ticket";
    $statement = $db->prepare($query);
    $statement->execute();
    $ticketInfo = $statement->fetchAll();
    $ticketNumber = $ticketInfo[0]['LAST_INSERT_ID()'];

    $query = "INSERT INTO booking (ticketNumber, promotionId, cardId, userId, movieId)
    VALUES ($ticketNumber, $promotionId, $card, '$userId', $movieId)";   
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();

    $query = "SELECT LAST_INSERT_ID() FROM booking";
    $statement = $db->prepare($query);
    $statement->execute();
    $bookingInfo = $statement->fetchAll();
    $bookingNumber = $bookingInfo[0]['LAST_INSERT_ID()'];

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


    # grab movie name and such
    $query = "SELECT * from  movie where id = $movieId";
    $statement = $db->prepare($query);
    $statement->execute();
    $information = $statement->fetchAll();
    $title = $information[0]['title'];
    $statement->closeCursor();

    $query = "SELECT * FROM showinfo where showId = $showId";
    $statement = $db->prepare($query);
    $statement->execute();
    $information = $statement->fetchAll();
    $movieDate = $information[0]['date'];
    $movieTime = $information[0]['time'];
    $statement->closeCursor();

    // include("../HTML/booking-confirmation.php");
    include("../HTML/order-summary.php");

?>