<?php 
    require("../PHP/database.php");

    $oldpass = filter_input(INPUT_POST, 'old_password');

    $changequery = "SELECT pass FROM user
                        WHERE active = 1
                        AND pass = :p_word
                        ";
    $changestatement = $db->prepare($changequery);
    $changestatement->bindValue(':p_word', $oldpass);
    $changestatement->execute();
    $rowcount = $changestatement->rowCount();

    $pass = filter_input(INPUT_POST, 'new_password');
    $confirmpass = filter_input(INPUT_POST, 'confirm_new_pw');
    $issue = true;

    
    include("../HTML/account.php");
    if ($rowcount == 0 || $rowcount > 1) {
        echo "<h5 style=\"color:red; text-align:center;\"> Wrong Password Entered! </h5>";
    } else if ($pass != $confirmpass) {
        echo "<h5 style=\"color:red; text-align:center;\"> The New Passwords Do Not Match! </h5>";
    } else {
        $issue = false;
        $changepass = "UPDATE user
        SET pass = '$pass' WHERE active=1";
        $db->exec($changepass);
    }
?>