<?php 
  require("../PHP/database.php");

  $oldpass = filter_input(INPUT_POST, 'old_password');

  $changequery = "SELECT pass FROM userinfo
                    WHERE active = 1
                    AND pass = :pass_word
                    ";
  $changestatement = $db->prepare($changequery);
  $changestatement->bindValue(':pass_word', $oldpass);
  $changestatement->execute();
  $rowcount = $changestatement->rowCount();

  $pass = filter_input(INPUT_POST, 'new_password');
  $confirmpass = filter_input(INPUT_POST, 'confirm_new_pw');
  $issue = true;

  if ($rowcount == 0 || $rowcount > 1) {
    echo "<h5> Wrong Password Entered! </h5>";
  } else if ($pass != $confirmpass) {
    echo "<h5> The New Passwords Do Not Match! </h5>";
  } else {
    $issue = false;
    $changepass = "UPDATE userinfo
    SET pass = '$pass' WHERE active=1";
    $db->exec($changepass);
    echo "<h1> Password Successfully Reset! </h1>";
  }
?>