<?php
    session_start();

    $bulk = new MongoDB\Driver\BulkWrite;
   
    $vetRef = $_POST['vetInfo'];
    $CustSat=$_POST['CustSat'];
    $comments=$_POST['Comments'];
    $patientId = $_SESSION['_id'];

    try {
        
        $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");

        $query = new MongoDB\Driver\Query([]);
        $rows = $mng->executeQuery('vetcheck.users', $query);
        foreach($rows as $row) {
            if($row->_id == $patientId) {
                $patientInfo = $row->_id;
            }
        }

        $query2 = new MongoDB\Driver\Query([]);
        $rows = $mng->executeQuery('vetcheck.users', $query2);
        foreach($rows as $row) {
            if($row->_id == $vetRef) {
                $vetInfo = $row->_id;
            }
        }

        $feedback = [
            '_id' => new MongoDB\BSON\ObjectID,
            'satisfaction' => $CustSat,
            'comments' => $comments,
            'patient' => $patientInfo,
            'vet' => $vetInfo
        ];

        $bulk->insert($feedback);
        $res = $mng->executeBulkWrite('vetcheck.ratings', $bulk);

        header("Location: ../userdashboard.php");
    } catch(MongoDB\Driver\Exception\Exception $e) {
        die('error'.$e);
    }
?>
