<?php 
    require("../Modal/database.php");
    require("../PHP/getUserInfo.php");
    
    if (isset($_POST['checkout'])) {
        $showMovieId = $_POST['movieId'];
        $showInfo = $_POST['showId'];
        $numAdult = $_POST['numAdult'];
        $numChild = $_POST['numChild'];
        $numSenior = $_POST['numSenior'];  
        $promoId = $_POST['promoId'];
        $total = $_POST['total'];
    }
    

    $query0 = "USE cinema_booking";
    $db->exec($query0);
    
    $uId = filter_input(INPUT_POST, 'userIdent');
    $password = filter_input(INPUT_POST, 'uPasswor');
    #$adminVal = filter_input(INPUT_POST, 'uAdm');

    

    $loginquery = "SELECT userId, CAST(AES_DECRYPT(pass, 'cebs1234') AS CHAR(200)) AS pass, isAdmin, active, isBlocked FROM user
                    WHERE userId = :user_iden
                    ";

    $loginstatement = $db->prepare($loginquery);
    $loginstatement->bindValue(':user_iden', $uId);
    #$loginstatement->bindValue(':p_word', $password);
    $loginstatement->execute();
    $infor = $loginstatement->fetchAll();
    $rowcount = $loginstatement->rowCount();
    if ($rowcount == 1) {
        foreach ($infor as $info) {
                $adminVal = $info['isAdmin'];
                $pass = $info['pass'];
                $isBlocked = $info['isBlocked'];
        }
        if ($isBlocked) {
            include("../HTML/login.php");
            echo "<h5 style='color:red; font-size:16px; margin-left:47%'>Account is blocked. Cannot login<h5> ";
        } else if ($password == $pass) {

            $setactive = "UPDATE user
                            SET active=1
                            WHERE userId=:user_iden;";
            $loginstatement2 = $db->prepare($setactive);
            $loginstatement2->bindValue(':user_iden', $uId);
            $loginstatement2->execute();
            

            if (isset($_POST['checkout'])) include("../HTML/checkout.php");
            else include("../HTML/home.php");

        } else {
            if (isset($_POST['checkout'])) include("../HTML/login-checkout.php");
            else include("../HTML/login.php");
            echo "<h5 style='color:red; font-size:16px; margin-left:47%'>Invalid credentials<h5> ";
        }
    } else {
        if (isset($_POST['checkout'])) include("../HTML/login-checkout.php");
        else include("../HTML/login.php");
        echo "<h5 style='color:red; font-size:16px; margin-left:47%'>Invalid credentials<h5> ";
    }

    
?>