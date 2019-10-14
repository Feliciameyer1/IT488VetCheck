<?php
    session_start();

    $bulk = new MongoDB\Driver\BulkWrite;
   
    
    $CustSat=$_POST['CustSat'];
    $comments=$_POST['Comments'];

    try {
        
        $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");

        $feedback = [
            '_id' => new MongoDB\BSON\ObjectID,
            
            'OverallSat' => $CustSat,
            'Comments' => $comments,
            
        ];

        $bulk->insert($feedback);
        $res = $mng->executeBulkWrite('vetcheck.ratings', $bulk);

       

        
        header("Location: ../userdashboard.php");
    } catch(MongoDB\Driver\Exception\Exception $e) {
        die('error'.$e);
    }
?>
