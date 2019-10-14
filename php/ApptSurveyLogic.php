<?php
    session_start();

    $bulk = new MongoDB\Driver\BulkWrite;
   
    
    $CustSat=$_POST['CustSat'];
    $comments=$_POST['Comments'];
    $patientId = $_SESSION['_id'];

    try {
        
        $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");

        $query2 = new MongoDB\Driver\Query([]);
            $rows = $mng->executeQuery('vetcheck.users', $query2);
            foreach($rows as $row) {
                if($row->_id == $patientId) {
                    $patientInfo = $row->_id;
                    $patientInfo->password = null;
                }
            }

        $feedback = [
            '_id' => new MongoDB\BSON\ObjectID,

        $bulk->insert($feedback);
        $res = $mng->executeBulkWrite('vetcheck.ratings', $bulk);

       

        
        header("Location: ../userdashboard.php");
    } catch(MongoDB\Driver\Exception\Exception $e) {
        die('error'.$e);
    }
?>
