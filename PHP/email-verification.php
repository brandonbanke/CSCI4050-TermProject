<?php
    $to = 'bbrandon107@gmail.com';
    $subject = 'Subject!';
    $message = '<p>this is the message of the email<p>';
    $headers .= "From: Brandon Banke <bhb13727@uga.edu>\r\n";
    $headers .= "Reply To: bhb1372@uga.edu\r\n";
    $headers .= "Content-type: text/html\r\n";
    mail($to, $subject, $message, $headers);
?>