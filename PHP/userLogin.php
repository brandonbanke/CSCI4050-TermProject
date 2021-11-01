<?php 
    require("database.php");

    $query0 = "USE cinema_booking";
    $db->exec($query0);
    
    $uId = filter_input(INPUT_POST, 'userIdent');
    $password = filter_input(INPUT_POST, 'uPasswor');

    $loginquery = "SELECT pass FROM user
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
        $setactive = "UPDATE user
                        SET active=1
                        WHERE userId=:user_iden;";
        $loginstatement2 = $db->prepare($setactive);
        $loginstatement2->bindValue(':user_iden', $uId);
        $loginstatement2->execute();
    } else {
        include("../HTML/login.php");
        echo "<h5 style='color:red; font-size:16px; margin-left:47%'>Invalid credentials<h5> ";
    }

?>