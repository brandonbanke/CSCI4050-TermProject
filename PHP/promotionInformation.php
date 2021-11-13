<?php

require("database.php");

$query0 = "USE cinema_booking";
$db->exec($query0);

$query1 = "CREATE TABLE IF NOT EXISTS movie
(
    promoName VARCHAR(255) NOT NULL,
    code VARCHAR(255) NOT NULL,
    promDescription VARCHAR(255) NOT NULL,
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY
)";
$db->exec($query1);


# gets the info
$name = filter_input(INPUT_POST, 'pName');
$promoCode = filter_input(INPUT_POST, 'pCode');
$description = filter_input(INPUT_POST, 'pDescription');

$query2 = "INSERT INTO promotion
(promoName, code, promDescription)
VALUE
(:p_name, :p_code, :p_description)
";
$insertinfo = $db->prepare($query2);
$insertinfo->bindValue(':p_name', $name);
$insertinfo->bindValue(':p_code', $promoCode);
$insertinfo->bindValue(':p_description', $description);
$insertinfo->execute();
$insertinfo->closeCursor();

include("../HTML/adminMenu.php")
?>