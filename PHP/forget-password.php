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

    
        # EMAIL #
        $subject = 'CBS Forgot Password';
        $message = '<p>This is an email for forget password to: ' .$inputEmail .'</p>';
        #$message .= '<p>Password: ' .$pass .'</p>';
        $message .= '<p> click here to reset your password: <a href=\'http://localhost/CSCI4050-TermProject/HTML/change-forget-password.php\'>Here</a></p>';
        $headers = "From: cbsmailserver9@gmail.com\r\n";
        $headers .= "Reply To: cbsmailserver9@gmail.com\r\n";
        $headers .= "Content-type: text/html\r\n";
        mail($inputEmail, $subject, $message, $headers);
    
        
    }
    include("../HTML/login.php");
?>