<?php
    require("../PHP/getUserInfo.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Cinema E Booking Website! </title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="../CSS/edit-profile.css">
    <link rel="stylesheet" href="../CSS/nav-bar.css">
</head>

<body>

        <?php 
        if (count($userInfs) == 0) {
            include("../HTML/login.php");
            #header("Location: ../HTML/login.php");
        } else {
            foreach ($userInfs as $userInf) {
                $isActive = $userInf['active'];
            }    
            if ($isActive == 1) {
                header("Location: ../HTML/edit-profile.php");
            } else {
                header("Location: ../HTML/login.php");
            }
            
        }
        ?>
    </main>

</body>
</html>