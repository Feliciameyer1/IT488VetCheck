<?php
    /*
    if(isset($_POST['signUp-submit'])){
        //takes input from form into variable
        $username = $_POST['Email'];
        $password = $_POST['password'];
        $fname=$_POST['Fname'];
        $Lname=$_POST['Lname'];
        $Address=$_POST['Address'];
        $city = $_POST['City'];
        $state = $_POST['State'];
        $zip = $_POST['Zip'];
        $role = $_POST['Role'];
        // creates a variable for validation of password complexity against a regular expression
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
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
        // Checks for a valid email address entered
        else if(!filter_var($username, FILTER_VALIDATE_EMAIL)){
            header("location:../SignUp.html?error=InvalidEmail&fname=".$fname."&lname=".$Lname."&address=".$Address."&city=".$city."&state=".$state);
            // stops the script from running
            exit();
            
        }
        // Validates the password complexity. The password must be atleast eight charectors long with one uppercase letter, one lowercase letter, one number, and one special charector
        else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8){
            header("location:../SignUp.html?error=WeakPassword&uid=".$username."&fname=".$fname."&lname=".$Lname."&address=".$Address."&city=".$city."&state=".$state);
            // stops the script from running
            exit();
            
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

    $user = [
        '_id' => new MongoDB\BSON\ObjectID,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'password' => $password
    ];

    try {
        $bulk->insert($user);
        $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");
        $res = $mng->executeBulkWrite('vetcheck.users', $bulk);
        echo 'User Created';
    } catch(MongoDB\Driver\Exception\Exception $e) {
        die('error'.$e);
    }
?>