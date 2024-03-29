<?php
    session_start();

    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk2 = new MongoDB\Driver\BulkWrite;
    $bulk3 = new MongoDB\Driver\BulkWrite;

    $vet = $_POST['vet'];
    $msg = $_POST['message'];
    $patientId = $_SESSION['_id'];

    try {
        $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");

        $query = new MongoDB\Driver\Query([]);
        $rows = $mng->executeQuery('vetcheck.users', $query);
        foreach($rows as $row) {
            if($row->practicename == $vet) {
                $vetInfo = $row->_id;
            }
        }

        $message = [
            '_id' => new MongoDB\BSON\ObjectID,
            'vet' => $vetInfo,
            'patient' => $patientId,
            'message' => $msg
        ];

        $msgRef = $message['_id'];

        $bulk->insert($message);
        $res = $mng->executeBulkWrite('vetcheck.messages', $bulk);

        $bulk2->update(array("_id" => $patientId), array('$push' => array("messages" => $msgRef)));
        $res = $mng->executeBulkWrite('vetcheck.users', $bulk2);

        $bulk3->update(array("_id" => $vetInfo), array('$push' => array("messages" => $msgRef)));
        $res = $mng->executeBulkWrite('vetcheck.users', $bulk3);

        array_push($_SESSION['messages'], $message);

        header("Location: ../userdashboard.php");
    } catch(MongoDB\Driver\Exception\Exception $e) {
        die('error'.$e);
    }
?>