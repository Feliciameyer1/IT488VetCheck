<?php
    session_start();

    $bulk = new MongoDB\Driver\BulkWrite;
   

    $CustSat=$_POST['CustSat'];

    try {
        
        $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");

      

        $bulk->insert($CustSat);
        $res = $mng->executeBulkWrite('vetcheck.ratings', $bulk);

       

        
        header("Location: ../userdashboard.php?Survey=done");
    } catch(MongoDB\Driver\Exception\Exception $e) {
        die('error'.$e);
    }
?>
