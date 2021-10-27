<?php
    $to = 'bbrandon107@gmail.com';
    $subject = 'Subject!';
    $message = '<p>this is the message of the email<p>';
    $headers .= "From: Brandon Banke <simran2000@gmail.com>\r\n";
    $headers .= "Reply To: simran2000@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";
    mail($to, $subject, $message, $headers);
?>