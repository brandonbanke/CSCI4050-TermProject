<?php
  require("../PHP/database.php");

  $setinactive = "UPDATE user
                  SET active=0;";
  $loginstatement2 = $db->prepare($setinactive);
  $loginstatement2->execute();

  header("Location: ../HTML/login.php");
?>