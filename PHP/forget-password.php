<?php
    require("../PHP/database.php");
    

    $inputEmail = filter_input(INPUT_POST, 'input_email');

    $query = "SELECT pass FROM user
                WHERE active = 0 AND email = :input_email";

    $statement = $db->prepare($query);
    $statement->bindValue(':input_email', $inputEmail);
    $statement->execute();
    $infoEmail = $statement->fetchAll();
    $rowCount = $statement->rowCount();
    $statement->closeCursor();

    if ($rowCount == 0) {
        echo("No matching email");
        
    } else {
        foreach($infoEmail as $info) {
            $pass = $info['pass'];
        }

        require("../PHP/mail-setup.php");
        # EMAIL #
        $subject = 'CBS Forgot Password';
        $message = '<p>This is an email for forget password to: ' .$inputEmail .'</p>';
        $message .= '<p> click here to reset your password: <a href=\'http://localhost/CSCI4050-TermProject/HTML/change-forget-password.php\'>Here</a></p>';

        try {
            $mail->addAddress($inputEmail, '');    // email of user
            $mail->isHTML(TRUE);
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->Send();

        } 
        catch (Exception $e) {
            #continue;
            echo"";
        }
    }
    include("../HTML/login.php");
?>