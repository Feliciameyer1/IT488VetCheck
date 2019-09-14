<?php
    session_start();

    $email = $_POST['email'];

    $filter = [
        'email' => $email
    ];

    $query = new MongoDB\Driver\Query($filter);

    try {
        $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");
        $res = $mng->executeQuery('vetcheck.users', $query);

        $row = $res->toArray();

        if($row) {
            if(password_verify($_POST['password'], $row[0]->password)) {
                if($row[0]->role == 'Veterinarian') {
                    $id = $row[0]->_id;
                    $email = $row[0]->email;
                    $name = $row[0]->practicename;
                    $address = $row[0]->address;
                    $city = $row[0]->city;
                    $state = $row[0]->state;
                    $zip = $row[0]->zip;
                    $role = $row[0]->role;
                    $_SESSION['_id'] = $id;
                    $_SESSION['email'] = $email;
                    $_SESSION['practicename'] = $practicename;
                    $_SESSION['address'] = $address;
                    $_SESSION['city'] = $city;
                    $_SESSION['state'] = $state;
                    $_SESSION['zip'] = $zip;
                    $_SESSION['role'] = $role;
                } elseif ($row[0]->role == 'Patient') {
                    $id = $row[0]->_id;
                    $email = $row[0]->email;
                    $firstname = $row[0]->firstname;
                    $lastname = $row[0]->lastname;
                    $address = $row[0]->address;
                    $city = $row[0]->city;
                    $state = $row[0]->state;
                    $zip = $row[0]->zip;
                    $pets = $row[0]->pets;
                    $role = $row[0]->role;
                    $_SESSION['_id'] = $id;
                    $_SESSION['email'] = $email;
                    $_SESSION['firstname'] = $firstname;
                    $_SESSION['lastname'] = $lastname;
                    $_SESSION['address'] = $address;
                    $_SESSION['city'] = $city;
                    $_SESSION['state'] = $state;
                    $_SESSION['zip'] = $zip;
                    $_SESSION['pets'] = $pets;
                    $_SESSION['role'] = $role;
                }

                header("Location: ../index.php");
            } else {
                header("Location: ../signin.php");
            }
        } else {
            header("Location: ../signin.php");
        }
    } catch(MongoDB\Driver\Exception\Exception $e) {
        die('error'.$e);
    }
?>