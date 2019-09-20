<?php
    session_start();
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk2 = new MongoDB\Driver\BulkWrite;

    $name = $_POST['name'];
    $type = $_POST['type'];
    $breed = $_POST['breed'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $ownerId = $_SESSION['_id'];

    try {
        $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");

        $query = new MongoDB\Driver\Query([]);
        $rows = $mng->executeQuery('vetcheck.users', $query);
        foreach($rows as $row) {
            if($row->_id == $ownerId) {
                $ownerInfo = $row->_id;
            }
        }

        $pet = [
            '_id' => new MongoDB\BSON\ObjectID,
            'name' => $name,
            'type' => $type,
            'breed' => $breed,
            'gender' => $gender,
            'age' => $age,
            'owner' => $ownerInfo
        ];

        $petRef = $pet['_id'];

        $bulk->insert($pet);
        $res = $mng->executeBulkWrite('vetcheck.pets', $bulk);

        $bulk2->update(array("_id" => $ownerId), array('$push' => array("pets" => $petRef)));
        $res = $mng->executeBulkWrite('vetcheck.users', $bulk2);

        array_push($_SESSION['pets'], $pet);
        header("Location: ../userdashboard.php");
    } catch(MongoDB\Driver\Exception\Exception $e) {
        die('error'.$e);
    }
?>