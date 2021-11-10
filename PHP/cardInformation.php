<?php

require("database.php");
require("getUserInfo.php");

$query0 = "USE cinema_booking";
$db->exec($query0);


$query1 = "CREATE TABLE IF NOT EXISTS payment_card
(
billingAddress VARCHAR(255),
expirationDate VARCHAR(255),
cardNumber VARCHAR(255) NOT NULL,
cvv INT(11) NOT NULL,
fullName VARCHAR(255) NOT NULL,
cardId INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
#userId VARCHAR(255) NOT NULL,
#FOREIGN KEY (userId) REFERENCES user(userId)
)
";
#$db->exec($query1);

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


include("../HTML/home.php");

?>