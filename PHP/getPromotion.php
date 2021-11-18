<?php
    include("../PHP/database.php");
    $queryprom = "SELECT * FROM promotion";

    $prstates = $db->prepare($queryprom);
    $prstates->execute();
    $promInfs = $prstates->fetchAll();
    $promotionOnCheck = $prstates->rowCount();
    $prstates->closeCursor();

   if (isset($_POST['deletePromo'])) {

        $promId = filter_input(INPUT_POST, 'promId');
        $query = "DELETE FROM promotion WHERE id = '$promId'";
        $statement = $db->prepare($query);
        $statement->execute();
        $statement->closeCursor();

        header("Location: ../HTML/adminMenu.php");
   }
?>