<?php
    session_start();

    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk2 = new MongoDB\Driver\BulkWrite;
    $bulk3 = new MongoDB\Driver\BulkWrite;
    $bulk4 = new MongoDB\Driver\BulkWrite;

    $vet = $_POST['vet'];
    $patientId = $_SESSION['_id'];
    $date = $_POST['datepicker'];
    $time = $_POST['time'];
    $petId = $_POST['pet'];
    $reasonforvisit = $_POST['reasonforvisit'];

    try {
        // TODO: move connection string to the session; 2019-09-15 - Chris
        $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");

        $query = new MongoDB\Driver\Query([]);
        $rows = $mng->executeQuery('vetcheck.users', $query);
        foreach($rows as $row) {
            if($row->_id == $vet) {
                $vetInfo = $row->_id;
                $vetInfo->password = null;
            }
        }

        $query2 = new MongoDB\Driver\Query([]);
        $rows = $mng->executeQuery('vetcheck.users', $query2);
        foreach($rows as $row) {
            if($row->_id == $patientId) {
                $patientInfo = $row->_id;
                $patientInfo->password = null;
            }
        }

        $query3 = new MongoDB\Driver\Query([]);
        $rows = $mng->executeQuery('vetcheck.pets', $query3);
        foreach($rows as $row) {
            if($row->_id == $petId) {
                $petInfo = $row->_id;
            }
        }

        $appointment = [
            '_id' => new MongoDB\BSON\ObjectID,
            'vet' => $vetInfo,
            'patient' => $patientInfo,
            'date' => $date,
            'time' => $time,
            'pet' => $petInfo,
            'reasonForVisit' => $reasonforvisit,
            'shots' => [],
            'notes' => []
        ];

        $aptRef = $appointment['_id'];

        $bulk->insert($appointment);
        $res = $mng->executeBulkWrite('vetcheck.appointments', $bulk);

        $bulk2->update(array("_id" => $patientId), array('$push' => array("appointments" => $aptRef)));
        $res = $mng->executeBulkWrite('vetcheck.users', $bulk2);

        $bulk3->update(array("_id" => $vetInfo), array('$push' => array("appointments" => $aptRef)));
        $res = $mng->executeBulkWrite('vetcheck.users', $bulk3);

        $bulk4->update(array("_id" => $petInfo), array('$push' => array("appointments" => $aptRef)));
        $res = $mng->executeBulkWrite('vetcheck.pets', $bulk4);

        array_push($_SESSION['appointments'], $appointment);
        header("Location: ../userdashboard.php");
    } catch(MongoDB\Driver\Exception\Exception $e) {
        die('error'.$e);
    }
?>