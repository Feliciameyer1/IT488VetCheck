<?php
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $filter = [
        'email' => $email,
        'password' => $password
    ];

    $query = new MongoDB\Driver\Query($filter);

    try {
        $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");
        $res = $mng->executeQuery('vetcheck.users', $query);

        $row = $res->toArray();

        if($row) {
            $email = $row[0]->email;
            $firstname = $row[0]->firstname;
            $lastname = $row[0]->lastname;
            $_SESSION['email'] = $email;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            header("Location: ../index.php");
        } else {
            header("Location: ../signin.php");
        }
    } catch(MongoDB\Driver\Exception\Exception $e) {
        die('error'.$e);
    }
?>