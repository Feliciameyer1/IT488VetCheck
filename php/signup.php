<?php
    /* can't get this to work... will comeback later
     *     if (isset($_POST['submit'])){
        if(!preg_match("/^[a-zA-Z0-9]*$/",$password)){
            echo "password too weak";
        }
        else{
            echo "password is good";
        }
    
}
   
        //takes input from form into variable
        $username = $_POST['Email'];
        $password = $_POST['password'];
        $fname=$_POST['Fname'];
        $Lname=$_POST['Lname'];
       
     
        //creates a connection with the database
        $client = new MongoDB\Client("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");
    // specifys the Mongodb collection we will be accessing
        $collection= $client->VetCheck;    
    
        
        //checks for empty fields
        if(empty($username) || empty($password) || empty($fname) || empty($Lname) || empty($Address) || empty($city) || empty($state) || empty($zip) || empty($role)){
        //returns the user back to the signup page with any of their filled in feilds in the url
            header("location:../SignUp.html?error=emptyFields&uid=".$username."&fname=".$fname."&lname=".$Lname."&address=".$Address."&city=".$city."&state=".$state);
            // stops the script from running
            exit();
            
        }
       
            
        }
        // Validates the password complexity. The password must be atleast eight charectors long with one uppercase letter, one lowercase letter, one number, and one special charector
      
        }
        else{
            $existingAccountcheck=$collection->findone(['email' => $username]);
            if($existingAccountcheck>0){
                //creates a new user if no results are returned
                $insertNewUser=$collection->insertone([
                    'firstname' => $fname,
                    'lastname' => $Lname,
                    'email' => $username,
                    'role' => $role,
                    'address'=> $Address,
                    'city' => $city,
                    'state'=> $state,
                    'zip' => $zip
                    
                ]);
                // will send user to dashboard down here once I have the document name
                header("Location:..");
                exit();
            } else{
                //sends the user back to the sign up page with an error that the email provided already has an account
                header("location:../SignUp.html?error=UserExists");
                exit();
            }
        }
    }
    */
$bulk = new MongoDB\Driver\BulkWrite;

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$Address=$_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$role = $_POST['role'];


<<<<<<< HEAD
   
   
  
=======
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $password = $_POST['password'];
>>>>>>> b4a42172a32fe81423fe9df1797d20f408cc9183

   $user = [
        '_id' => new MongoDB\BSON\ObjectID,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
<<<<<<< HEAD
        'password' => $password,
        'address' => $Address,
        'city' => $city,
        'state' => $state,
        'zip' => $zip,
        'role' => $role,
=======
        'address' => $address,
        'city' => $city,
        'state' => $state,
        'zip' => $zip,
        'password' => $password
>>>>>>> b4a42172a32fe81423fe9df1797d20f408cc9183
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
            header("Location: ../signup.php");
        } else {
            $res = $mng->executeBulkWrite('vetcheck.users', $bulk);
            header("Location: ../signin.php");
        }
    } catch(MongoDB\Driver\Exception\Exception $e) {
        die('error'.$e);
    }

   
?>