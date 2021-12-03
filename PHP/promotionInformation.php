<?php

require("../Modal/database.php");
require("getCustomer.php");
require("getPromotion.php");
require("../PHP/mail-setup.php");

$query0 = "USE cinema_booking";
$db->exec($query0);

# gets the info
$name = filter_input(INPUT_POST, 'pName');
$promoCode = filter_input(INPUT_POST, 'pCode');
$description = filter_input(INPUT_POST, 'pDescription');
$discount = $_POST['pDiscount'];

$query2 = "INSERT INTO promotion
(promoName, code, promDescription, discount)
VALUE
(:p_name, :p_code, :p_description, $discount)
";
$insertinfo = $db->prepare($query2);
$insertinfo->bindValue(':p_name', $name);
$insertinfo->bindValue(':p_code', $promoCode);
$insertinfo->bindValue(':p_description', $description);
$insertinfo->execute();
$insertinfo->closeCursor();

$promoQuery = "SELECT email, firstName FROM user WHERE receiveProm = 1";
$x = $db->prepare($promoQuery);
$x->execute();
$emailInfo = $x->fetchAll();

# EMAIL PROMOTION #
foreach ($emailInfo as $info) {
    $inputEmail = $info['email'];
    $subject = 'New Promotion';
    $message = '<p>Dear' .$info['firstName']. ',</p>';
    $message .= '<p>We just added a new promotion. The code is: ' .$promoCode. '</p>';
    $message .= '<p>The name of the promotion is ' .$name. ' and here is the description:</p>';
    $message .= '<p>' .$description. '.</p>';

    try {
        $mail->addAddress($inputEmail, $info['firstName']);    // email of user
        $mail->isHTML(TRUE);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->Send();
    } 
    catch (Exception $e) {
        continue;
    }

}


header("Location: ../HTML/adminMenu.php")
?>