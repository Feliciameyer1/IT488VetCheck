<?php
    $email = $_POST['email'];
    $name = $_POST['name'];
    $msg = $_POST['message'];

    $to = "ourapp@email.com";
    $subject = "Contact Form Submission";

    mail($to, $subject, $msg);

    header("Location: ../contact.php");
?>