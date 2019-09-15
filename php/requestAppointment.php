<?php
    $bulk = new MongoDB\Driver\BulkWrite;

    $date = $_POST['datepicker'];
    $time = $_POST['time'];
    $reasonforvisit = $_POST['reasonforvisit'];
    $ownerId = $_SESSION['_id'];

    $appointment = [
        '_id' => new MongoDB\BSON\ObjectID,
        'requestingUserId' => $ownerId,
        'date' => $date,
        'time' => $time,
        'reasonForVisit' => $reasonforvisit,
    ];

    try {
        $bulk->insert($appointment);

        // TODO: move connection string to the session; 2019-09-15 - Chris
        $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");

        $res = $mng->executeBulkWrite('vetcheck.appointments', $bulk);
        array_push($_SESSION['appointments'], $appointment);
        header("Location: ../userdashboard.php");
    } catch(MongoDB\Driver\Exception\Exception $e) {
        die('error'.$e);
    }

?>