<?php 
    require("database.php");
    require("../PHP/getUserInfo.php");
    

    $query0 = "USE cinema_booking";
    $db->exec($query0);
    
    $uId = filter_input(INPUT_POST, 'userIdent');
    $password = filter_input(INPUT_POST, 'uPasswor');
    #$adminVal = filter_input(INPUT_POST, 'uAdm');

    

    $loginquery = "SELECT * FROM user
                    WHERE userId = :user_iden
                    AND pass = :p_word
                    ";

    $loginstatement = $db->prepare($loginquery);
    $loginstatement->bindValue(':user_iden', $uId);
    $loginstatement->bindValue(':p_word', $password);
    $loginstatement->execute();
    $infor = $loginstatement->fetchAll();
    $rowcount = $loginstatement->rowCount();
    #echo $rowcount;
    if ($rowcount == 1) {
    foreach ($infor as $info) {
            #echo($info['isAdmin']);
            $adminVal = $info['isAdmin'];
            $pass = $info['pass'];
    }

    if ($password == $pass) {
        
        if($adminVal == 0){
            $setactive = "UPDATE user
                            SET active=1
                            WHERE userId=:user_iden;";
            $loginstatement2 = $db->prepare($setactive);
            $loginstatement2->bindValue(':user_iden', $uId);
            $loginstatement2->execute();
            include("../HTML/home.php");
        }
        else if($adminVal == 1) {
            $setactive = "UPDATE user
                            SET active=1
                            WHERE userId=:user_iden;";
            $loginstatement2 = $db->prepare($setactive);
            $loginstatement2->bindValue(':user_iden', $uId);
            $loginstatement2->execute();
            include("../HTML/admin-home.php");
        }
        
      
    } 
    } else {
        include("../HTML/login.php");
        echo "<h5 style='color:red; font-size:16px; margin-left:47%'>Invalid credentials<h5> ";
    }

    



?>