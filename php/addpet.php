<?php
    session_start();
    $bulk = new MongoDB\Driver\BulkWrite;

    $name = $_POST['name'];
    $type = $_POST['type'];
    $breed = $_POST['breed'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $ownerId = $_SESSION['_id'];

    $pet = [
        '_id' => new MongoDB\BSON\ObjectID,
        'name' => $name,
        'type' => $type,
        'breed' => $breed,
        'gender' => $gender,
        'age' => $age
    ];

    try {
        $bulk->update(array("_id" => $ownerId), array('$push' => array("pets" => $pet)), array("upsert" => true));
        $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");

        $res = $mng->executeBulkWrite('vetcheck.users', $bulk);
        array_push($_SESSION['pets'], $pet);
        header("Location: ../userdashboard.php");
    } catch(MongoDB\Driver\Exception\Exception $e) {
        die('error'.$e);
    }
?>