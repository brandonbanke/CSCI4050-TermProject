<?php 
    # ALTERS isBlocked FROM AadminMenu.pbp #
    require("getCustomer.php");
    $userId = filter_input(INPUT_POST, 'userBlockButton');

    $query = "SELECT isBlocked FROM user
    WHERE userId = '$userId'";
    $statement = $db->prepare($query);
    $statement->execute();
    $information = $statement->fetchAll();

    if ($information[0]['isBlocked'] == 1) {
        $changeQuery = "UPDATE user SET isBlocked = 0 WHERE userId = '$userId'";
    } else {
        $changeQuery = "UPDATE user SET isBlocked = 1 WHERE userId = '$userId'";
    }

    $changeStatement = $db->prepare($changeQuery);
    $changeStatement->execute();
    header("Location: ../HTML/adminMenu.php");
?>