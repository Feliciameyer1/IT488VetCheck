<?php
    session_start();

    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk2 = new MongoDB\Driver\BulkWrite;
    $bulk3 = new MongoDB\Driver\BulkWrite;

    $vet = $_POST['vet'];
    $patientId = $_SESSION['_id'];
    $date = $_POST['datepicker'];
    $time = $_POST['time'];
    $pet = $_POST['pet'];
    $reasonforvisit = $_POST['reasonforvisit'];
    
    try {
        // TODO: move connection string to the session; 2019-09-15 - Chris
        $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");

        $query = new MongoDB\Driver\Query([]);
        $rows = $mng->executeQuery('vetcheck.users', $query);
        foreach($rows as $row) {
            if($row->practicename == $vet) {
                $vetInfo = $row;
                $vetInfo->password = null;
            }
        }

        $query2 = new MongoDB\Driver\Query([]);
        $rows = $mng->executeQuery('vetcheck.users', $query2);
        foreach($rows as $row) {
            if($row->_id == $patientId) {
                $patientInfo = $row;
                $patientInfo->password = null;
            }
        }

        $appointment = [
            '_id' => new MongoDB\BSON\ObjectID,
            'vet' => $vetInfo,
            'patient' => $patientInfo,
            'date' => $date,
            'time' => $time,
            'pet' => $pet,
            'reasonForVisit' => $reasonforvisit,
        ];

        $bulk->insert($appointment);
        $res = $mng->executeBulkWrite('vetcheck.appointments', $bulk);

        $bulk2->update(array("_id" => $patientId), array('$push' => array("appointments" => $appointment)));
        $res = $mng->executeBulkWrite('vetcheck.users', $bulk2);

        $bulk3->update(array("_id" => $vetInfo->_id), array('$push' => array("appointments" => $appointment)));
        $res = $mng->executeBulkWrite('vetcheck.users', $bulk3);

        array_push($_SESSION['appointments'], $appointment);
        header("Location: ../userdashboard.php");
    } catch(MongoDB\Driver\Exception\Exception $e) {
        die('error'.$e);
    }
?>