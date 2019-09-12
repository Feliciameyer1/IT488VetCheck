<?php
  

   
   
$bulk = new MongoDB\Driver\BulkWrite;





   
   
  

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $password = $_POST['password'];
  



   $user = [
        '_id' => new MongoDB\BSON\ObjectID,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,

        'password' => $password,
        'address' => $Address,
        'city' => $city,
        'state' => $state,
        'zip' => $zip,
       

        'address' => $address,
        'city' => $city,
        'state' => $state,
        'zip' => $zip,

     

        'password' => $password,
        'pets' => []

    ];
    
   

    $userExists = false;

    try {
    
        $bulk->insert($user);
        $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");
        
        $query = new MongoDB\Driver\Query([]);
        $rows = $mng->executeQuery('vetcheck.users', $query);

        foreach($rows as $row) {
            if($row->email == $email) {
                $userExists = true;
            }
        }

        if($userExists) {
            header("Location: ../signup.php?error=userExits");
        } else {
            $res = $mng->executeBulkWrite('vetcheck.users', $bulk);
          
        }
    } catch(MongoDB\Driver\Exception\Exception $e) {
        die('error'.$e);
    }

   
?>