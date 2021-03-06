<?php

require("../Modal/database.php");
require("getUserInfo.php");

$query0 = "USE cinema_booking";
$db->exec($query0);

$billingAdd = filter_input(INPUT_POST, 'cBillingAddress');
$expDate = filter_input(INPUT_POST, 'cExpDate');
$cardNum = filter_input(INPUT_POST, 'cCardNum');
$CVV = filter_input(INPUT_POST, 'cCVV');
$nameOnCard = filter_input(INPUT_POST, 'cFullName');
$cardId = filter_input(INPUT_POST, 'cCardId');
$userId = filter_input(INPUT_POST, 'cUserId');

$query2 = "INSERT INTO payment_card
(billingAddress, expirationDate, cardNumber, cvv, fullName, cardId, userId)
VALUE
(:bill_ad, :ex_date, AES_ENCRYPT(:card_num, 'cebs1234'), AES_ENCRYPT(:c_vv, 'cebs1234'), :full_name, :card_id, :user_ids)
";
$insertinfo = $db->prepare($query2);
$insertinfo->bindValue(':bill_ad', $billingAdd);
$insertinfo->bindValue(':ex_date', $expDate);
$insertinfo->bindValue(':card_num', $cardNum);
$insertinfo->bindValue(':c_vv', $CVV);
$insertinfo->bindValue(':full_name', $nameOnCard);
$insertinfo->bindValue(':card_id', $cardId);
$insertinfo->bindValue(':user_ids', $userId);
$insertinfo->execute();
$insertinfo->closeCursor();


if (isset($_POST['addCard'])){
    $showMovieId = $_POST['movieId'];
    $showInfo = $_POST['showId'];  
    $numAdult = $_POST['numAdult'];
    $numChild = $_POST['numChild'];
    $numSenior = $_POST['numSenior'];
    $promoId = $_POST['promoId'];
    $total = $_POST['total'];
    include("../HTML/checkout.php");
} 
else include("../HTML/edit-card.php");

?>