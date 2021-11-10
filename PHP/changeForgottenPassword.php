<?php 
    require("../PHP/database.php");

    $usId = filter_input(INPUT_POST, 'useName');

    $changequery = "SELECT CAST(AES_DECRYPT(pass, 'cebs1234') AS CHAR(200)) AS pass FROM user
                        WHERE userId = '$usId'
                        ";
    $changestatement = $db->prepare($changequery);
    $changestatement->execute();
    $infor = $changestatement->fetchall();
    $rowcount = $changestatement->rowCount();

    foreach($infor as $info) {
        $currentPassword = $info['pass'];
    }

    $pass = filter_input(INPUT_POST, 'new_password');
    $confirmpass = filter_input(INPUT_POST, 'confirm_new_pw');
    $issue = true;


    
    include("../HTML/change-forget-password.php");
    if ($pass != $confirmpass) {
        echo "<h5 style=\"color:red; text-align:center;\"> The New Passwords Do Not Match! </h5>";
    } else if ($rowcount == 0) {
        echo "<h5 style=\"color:red; text-align:center;\"> That Account Does Not Exist! </h5>";
    } else {
        $issue = false;
        $changepass = "UPDATE user
        SET pass = AES_ENCRYPT('$pass', 'cebs1234') WHERE active=1";
        $db->exec($changepass);
    }
?>