<?php

require("database.php");
require("../PHP/mail-setup.php");

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
receiveProm BOOLEAN NOT NULL,
isAdmin BOOLEAN NOT NULL
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
$adminCheck = 0;


$querycheck = "SELECT * FROM user WHERE email = :uEmail";
$emailcheckstatement = $db->prepare($querycheck);
$emailcheckstatement->bindValue(':uEmail', $userEmail);
$emailcheckstatement->execute();
$already = $emailcheckstatement->rowCount();
$emailcheckstatement->closeCursor();

if ($already != 0) {
    include("../HTML/login.php");
    echo "<h5 style=\"color:red;\">An account with this email already exist<h5>";
    exit();
}

$query2check = "SELECT * FROM user WHERE userID = :userIden";
$usercheckstatement = $db->prepare($query2check);
$usercheckstatement->bindValue(':userIden', $userIdentification);
$usercheckstatement->execute();
$already2 = $usercheckstatement->rowCount();
$usercheckstatement->closeCursor();

if ($already2 != 0) {
    include("../HTML/login.php");
    echo "<h5 style=\"color:red;\">An account with this username already exist<h5>";
    exit();
}

# if promotion box not check, set to false
if ($promoCheck == NULL) {
    $promoCheck = 0;
}

if ($adminCheck == NULL) {
    $adminCheck = 0;
}



$query2 = "INSERT INTO user
(userId, firstName, lastName, email, pass, active, receiveProm, isAdmin)
VALUE
(:user_iden, :first_name, :last_name, :e_mail, AES_ENCRYPT(:p_word, 'cebs1234'), :active, :receive_Prom, :is_Admin)
";
$insertinfo = $db->prepare($query2);
$insertinfo->bindValue(':user_iden', $userIdentification);
$insertinfo->bindValue(':first_name', $fName);
$insertinfo->bindValue(':last_name', $lName);
$insertinfo->bindValue(':e_mail', $userEmail);
$insertinfo->bindValue(':p_word', $pass);
$insertinfo->bindValue(':active', $active);
$insertinfo->bindValue(':receive_Prom', $promoCheck);
$insertinfo->bindValue(':is_Admin', $adminCheck);
$insertinfo->execute();
$insertinfo->closeCursor();

# EMAIL CONFIRMATION #
$subject = 'CBS Email Confirmation';
$message = '<p>This is an email confirmation for: ' . $fName . ' ' . $lName . '</p>';
$message .= '</P><p>username: ' . $userIdentification . '</p>';

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


include("../HTML/registration-confirmation.html")

?>