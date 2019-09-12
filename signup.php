<!--
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Sign Up</title>
</head>
<body>
<header>
<h1>Welcome to VetCheck</h1>
</header>
<h2>Please fill out the form below to create your VetCheck Account</h2>
<form name="sign-up" action="php/SignUp.php" method="post">
<input type="text" name="Fname" placeholder="First Name">
<input type="text" name="Lname" placeholder="Last Name"><br>
<input type="text" name="Address" placeholder="Street Address">
<input type="text" name="City" placeholder="City"><br>
<input type="text" name="State" placeholder="State">
<input type="text" name="Zip" placeholder="Zip Code">
<p>I am a:</p><br>
<input type="radio" name="Role" value="Pet Owner" checked>Pet Owner<br>
<input type="radio" name="Role" value="Veterinarian">Veterinarian<br>
<input type="email" name="Email" placeholder="Email Address">
<input type="password" name="password" placeholder="Password"><br>
<input type="reset">
<input type="submit" name="signUp-submit" value="Submit">


</form>
</body>
</html>
-->

<?php 
    include_once('header.php');
?>
    <div class="container body">
        <h2 class="text-center">Signup</h2>
        <form action="php/createUser.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="John" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Doe" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="example@email.com" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="************" required>
            </div>
            <div class="text-center">
                <button type="submit" value="submit" class="btn btn-primary">Sign Up</button>
            </div>
        </form>
    </div>
<?php
    include_once('footer.php');
?>