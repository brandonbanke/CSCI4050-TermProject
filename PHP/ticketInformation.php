<?php

require("../Modal/database.php");

$query0 = "USE cinema_booking";
$db->exec($query0);
$query1 = "CREATE TABLE IF NOT EXISTS ticket
(
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    showTime VARCHAR(255) DEFAULT NULL,
    AgeType enum('adult','senior','child') DEFAULT NULL,
    ticketNumber INT(11) NOT NULL
)";
$db->exec($query1);


    # gets the info
    $showTime = filter_input(INPUT_POST, 'showtime');
    $AgeType = filter_input(INPUT_POST, 'age');
    $ticketNumber = filter_input(INPUT_POST, 'ticketNum');
   

    $query2 = "INSERT INTO ticket
    (showTime, AgeType, ticketNumber)
    VALUE
    (:show_time, :age_type, :ticket_num)
    ";
    $insertinfo = $db->prepare($query2);
    $insertinfo->bindValue(':show_time', $showTime);
    $insertinfo->bindValue(':age_type', $AgeType);
    $insertinfo->bindValue(':ticket_num', $ticketNumber);
 
    $insertinfo->execute();
    $insertinfo->closeCursor();

    

    include("../HTML/select-age.php");




?>