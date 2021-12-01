<?php 
    require("../PHP/getCustomer.php");
    $isOn = false;
    foreach($custInfs as $info) {
        if ($info['active'] == 1) {
            $isOn = true;
            break;
        }
    }
    
    // if user is not on, go to login, else checkout
    if ($isOn) header("Location: ../HTML/checkout.php");
    else header("Location: ../HTML/login-checkout.php");
?>