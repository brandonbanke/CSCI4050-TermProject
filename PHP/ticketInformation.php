<?php

require("../Modal/database.php");

$query0 = "USE cinema_booking";
$db->exec($query0);

# gets the info
$ticketNumber = filter_input(INPUT_POST, 'ticketNum');
$adultNum = filter_input(INPUT_POST, 'numAdult1');
$childNum = filter_input(INPUT_POST, 'numChild1');
$seniorNum = filter_input(INPUT_POST, 'numSenior1');



$query2 = "INSERT INTO ticket
(ticketNumber, numAdult, numChild, numSenior)
VALUE
(:ticket_num, :numAdult, :numChild, :numSenior)
";
$insertinfo = $db->prepare($query2);
$insertinfo->bindValue(':ticket_num', $ticketNumber);
$insertinfo->bindValue(':numAdult', $adultNum);
$insertinfo->bindValue(':numChild', $childNum);
$insertinfo->bindValue(':numSenior', $seniorNum);

$insertinfo->execute();
$insertinfo->closeCursor();

include("../HTML/select-seat.php");

?>