<?php 

    $showMovieId = $_POST['movieId'];
    $showInfo = $_POST['showId'];
    $numAdult = $_POST['numAdult'];
    $numChild = $_POST['numChild'];
    $numSenior = $_POST['numSenior'];
    $promoId = $_POST['promoId'];
    $total = $_POST['total'];

    require("../PHP/getCustomer.php");
    $isOn = false;
    foreach($custInfs as $info) {
        if ($info['active'] == 1) {
            $isOn = true;
            break;
        }
    }
    
    // if user is not on, go to login, else checkout
    if ($isOn) include("../HTML/checkout.php");
    else include("../HTML/login-checkout.php");
?>