<?php

require("database.php");

$query0 = "USE cinema_booking";
$db->exec($query0);


$query1 = "CREATE TABLE IF NOT EXISTS user
(
userId VARCHAR(255) NOT NULL PRIMARY KEY,
firstName VARCHAR(255) NOT NULL,
lastName VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL,
pass VARCHAR(255) NOT NULL,
active BOOLEAN NOT NULL,
receiveProm BOOLEAN NOT NULL
)
";
$db->exec($query1);

$userIdentification = filter_input(INPUT_POST, 'userIden');
$userEmail = filter_input(INPUT_POST, 'uEmail');
$pass = filter_input(INPUT_POST, 'uPassword');
$fName = filter_input(INPUT_POST, 'uFirstName');
$lName = filter_input(INPUT_POST, 'uLastName');
$active = 0;
$promoCheck = filter_input(INPUT_POST, 'uPromo');

$querycheck = "SELECT * FROM user WHERE email = :Email";
$emailcheckstatement = $db->prepare($querycheck);
$emailcheckstatement->bindValue(':Email', $email);
$emailcheckstatement->execute();
$already = $emailcheckstatement->rowCount();
$emailcheckstatement->closeCursor();

if ($already != 0) {
include("../html/login.php");
echo "<h5>An account with this email already exist<h5>";
exit();
}


$query2 = "INSERT INTO user
(userId, firstName, lastName, email, pass, active, receiveProm)
VALUE
(:user_iden, :first_name, :last_name, :e_mail, :p_word, :active, :receive_Prom)
";
$insertinfo = $db->prepare($query2);
$insertinfo->bindValue(':user_iden', $userIdentification);
$insertinfo->bindValue(':first_name', $fName);
$insertinfo->bindValue(':last_name', $lName);
$insertinfo->bindValue(':e_mail', $userEmail);
$insertinfo->bindValue(':p_word', $pass);
$insertinfo->bindValue(':active', $active);
$insertinfo->bindValue(':receive_Prom', $promoCheck);
$insertinfo->execute();
$insertinfo->closeCursor();

include("../HTML/registration-confirmation.html")

?>