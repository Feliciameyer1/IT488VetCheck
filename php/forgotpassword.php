<?php
    $bulk = new MongoDB\Driver\BulkWrite;

    $email = $_POST['email'];

    function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    $randomPassword = generateRandomString();
    $hashed_password = password_hash($randomPassword, PASSWORD_BCRYPT);

    try {
        $bulk->update(array('email' => $email), array('$set' => array('password' => $hashed_password)));
        $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");

        $res = $mng->executeBulkWrite('vetcheck.users', $bulk);

        $to = $email;
        $subject = "VetCheck Password Reset";
        $msg = "You requested a new password. Please sign in with the temporary password ".$randomPassword."and update your password.";

        mail($to, $subject, $msg);

        header("Location: ../signin.php");
    } catch(MongoDB\Driver\Exception\Exception $e) {
        die('error'.$e);
    }
?>