<?php
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
    $connection = new MongoClient("mongodb+srv://vetchecksiteuser:p@ssw0rd1!@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");
    $db = $client->test;
    //checks for empty fields
    if(empty($username) || empty($password) || empty($fname) || empty($Lname) || empty($Address) || empty($city) || empty($state) || empty($zip) || empty($role)){
    //returns the user back to the signup page with any of their filled in feilds in the url
        header("location:../SignUp.html?error=emptyFields&uid=".$username."&fname=".$fname."&lname=".$Lname."&address=".$Address."&city=".$city."&state=".$state);
        // stops the script from running
        exit();
        
    }
}
