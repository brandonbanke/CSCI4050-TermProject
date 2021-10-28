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
        <?php foreach ($userInfs as $userInf) : ?>
            <?php 
            $isActive = $userInf['active'];
            if ($isActive == 1) {
                include("../HTML/edit-profile.php");
            } else {
                include("../HTML/login.php");
            }
            
            ?>
        <?php endforeach; ?>

    </main>

</body>
</html>