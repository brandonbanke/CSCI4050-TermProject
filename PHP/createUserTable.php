<?php

    require("database.php");

    $query0 = "USE cinema_booking";
    $db->exec($query0);

    $query1 = "CREATE TABLE IF NOT EXISTS user
                (
                    userId INT(6) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    pass VARCHAR(55) NOT NULL,
                    firstName VARCHAR (255) NOT NULL,
                    lastName VARCHAR(55) NOT NULL,
                    active BOOLEAN NOT NULL
                )
                ";
    
    $db->exec($query1);

    $pword = filter_input(INPUT_POST, 'pass');
    $firstname = filter_input(INPUT_POST, 'firstName');
    $lastname = filter_input(INPUT_POST, 'lastName');
    $active = 0;

    // $querycheck = "SELECT * FROM user WHERE email = :Email";
    // $emailcheckstatement = $db->prepare($querycheck);
    // $emailcheckstatement->bindValue(':Email', $email);
    // $emailcheckstatement->execute();
    // $already = $emailcheckstatement->rowCount();
    // $emailcheckstatement->closeCursor(); 

    if ($already != 0) {
        //include("../html/login.php");
        echo "<h5>An account with this email already exist<h5>";
        exit();
    }

    $query2 = "INSERT INTO user
                    (pass, firstName, lastName, active)
                VALUE
                    (:p_word, :first_name, :last_name, :active)
                ";
    $insertinfo = $db->prepare($query2);
    $insertinfo->bindValue(':p_word', $pword);
    $insertinfo->bindValue(':first_name', $firstname);
    $insertinfo->bindValue(':cty', $lastname);
    $insertinfo->bindValue(':active', $active);
    $insertinfo->execute();
    $insertinfo->closeCursor();

    //include("../html/login.php")
    
?>