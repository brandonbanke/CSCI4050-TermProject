<?php
    require("../Modal/database.php");
    $querycust = "SELECT * FROM user";

    $ustates = $db->prepare($querycust);
    $ustates->execute();
    $custInfs = $ustates->fetchAll();
    $custOnCheck = $ustates->rowCount();
    $ustates->closeCursor();

   
?>