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
   } else if (isset($_POST['changePromoForm'])) {
         
          $name = $_POST['name'];
          $code = $_POST['code'];
          $description = $_POST['description'];
          $promId = $_POST['promotion_id'];
          $query2 = "UPDATE promotion 
               SET promoName = '$name',
               code = '$code',
               promDescription = '$description'
               WHERE id = '$promId'
               ";

          $statement = $db->prepare($query2);
          $statement->execute();
          $statement->closeCursor();
          
          header("Location: ../HTML/adminMenu.php");
   }
?>