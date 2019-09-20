<?php
    session_start();

    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk2 = new MongoDB\Driver\BulkWrite;

    $appointmentId = $_POST['appointment'];
    $petId = $_POST['pet'];
    $shots = $_POST['shots'];
    $notes = $_POST['notes'];

    try {
        $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");

        $query = new MongoDB\Driver\Query([]);
        $rows = $mng->executeQuery('vetcheck.appointments', $query);
        foreach($rows as $row) {
            if($row->_id == $appointmentId) {
                $appointmentId = $row->_id;
            }
        }

        $bulk->update(array("_id" => $appointmentId), array('$push' => array("shots" => $shots)));
        $res = $mng->executeBulkWrite('vetcheck.appointments', $bulk);
        
        $bulk2->update(array("_id" => $appointmentId), array('$push' => array("notes" => $notes)));
        $res = $mng->executeBulkWrite('vetcheck.appointments', $bulk2);
        
        header("Location: ../userdashboard.php");
    } catch(MongoDB\Driver\Exception\Exception $e) {
        die('error'.$e);
    }
?>