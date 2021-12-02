<?php
    require("../Modal/database.php");
    $queryticket = "SELECT * FROM ticket ORDER BY id DESC LIMIT 1";

    $ticketstates = $db->prepare($queryticket);
    $ticketstates->execute();
    $ticketInfs = $ticketstates->fetchAll();
    $ticketstates->closeCursor();
?>