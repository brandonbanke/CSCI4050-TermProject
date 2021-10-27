<?php 
    require("database.php");

    $query0 = "USE cinema_booking";
    $db->exec($query0);
    
    $uId = filter_input(INPUT_POST, 'userIdent');
    $password = filter_input(INPUT_POST, 'uPasswor');

    $loginquery = "SELECT pass FROM userInfo
                    WHERE userId = :user_iden
                    AND pass = :p_word
                    ";

    $loginstatement = $db->prepare($loginquery);
    $loginstatement->bindValue(':user_iden', $uId);
    $loginstatement->bindValue(':p_word', $password);
    $loginstatement->execute();
    $rowcount = $loginstatement->rowCount();

    if ($rowcount == 1) {
        include("../HTML/home.html");
        $setactive = "UPDATE userInfo
                        SET active=1
                        WHERE userId=:user_iden;";
        $loginstatement2 = $db->prepare($setactive);
        $loginstatement2->bindValue(':user_iden', $uId);
        $loginstatement2->execute();
    } else {
        echo "<h5>Invalid credentials<h5> ";
    }

?>