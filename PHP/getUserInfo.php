<?php
    include("../PHP/database.php");
    $queryacct = "SELECT * FROM user WHERE userId = (SELECT userId FROM user WHERE active=1)";

    $pstates = $db->prepare($queryacct);
    $pstates->execute();
    $userInfs = $pstates->fetchAll();
    $pstates->closeCursor();

?>