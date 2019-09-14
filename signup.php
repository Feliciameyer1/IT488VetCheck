<?php 
    include_once('header.php');
?>
    <div class="container body">
        <h2 class="text-center">Signup</h2>
        <form onsubmit="return passwordRepeat.oninput(this)" action="php/signup.php" method="POST">
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
                <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" required>
            </div>
            <div class="form-group">
                <label for="address">Street Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="1 Main St" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="state">State</label>
                    <select class="form-control" id="state" name="state" required>
                        <option value=''>Select One</option>
                        <option value='Alabama'>Alabama</option>
                        <option value='Alaska'>Alaska</option>
                        <option value='Arizona'>Arizona</option>
                        <option value='Arkansas'>Arkansas</option>
                        <option value='California'>California</option>
                        <option value='Colorado'>Colorado</option>
                        <option value='Connecticut'>Connecticut</option>
                        <option value='Delaware'>Delaware</option>
                        <option value='District Of Columbia'>District Of Columbia</option>
                        <option value='Florida'>Florida</option>
                        <option value='Georgia'>Georgia</option>
                        <option value='Hawaii'>Hawaii</option>
                        <option value='Idaho'>Idaho</option>
                        <option value='Illinois'>Illinois</option>
                        <option value='Indiana'>Indiana</option>
                        <option value='Iowa'>Iowa</option>
                        <option value='Kansas'>Kansas</option>
                        <option value='Kentucky'>Kentucky</option>
                        <option value='Louisiana'>Louisiana</option>
                        <option value='Maine'>Maine</option>
                        <option value='Maryland'>Maryland</option>
                        <option value='Massachusetts'>Massachusetts</option>
                        <option value='Michigan'>Michigan</option>
                        <option value='Minnesota'>Minnesota</option>
                        <option value='Mississippi'>Mississippi</option>
                        <option value='Missouri'>Missouri</option>
                        <option value='Montana'>Montana</option>
                        <option value='Nebraska'>Nebraska</option>
                        <option value='Nevada'>Nevada</option>
                        <option value='New Hampshire'>New Hampshire</option>
                        <option value='New Jersey'>New Jersey</option>
                        <option value='New Mexico'>New Mexico</option>
                        <option value='New York'>New York</option>
                        <option value='North Carolina'>North Carolina</option>
                        <option value='North Dakota'>North Dakota</option>
                        <option value='Ohio'>Ohio</option>
                        <option value='Oklahoma'>Oklahoma</option>
                        <option value='Oregon'>Oregon</option>
                        <option value='Pennsylvania'>Pennsylvania</option>
                        <option value='Rhode Island'>Rhode Island</option>
                        <option value='South Carolina'>South Carolina</option>
                        <option value='South Dakota'>South Dakota</option>
                        <option value='Tennessee'>Tennessee</option>
                        <option value='Texas'>Texas</option>
                        <option value='Utah'>Utah</option>
                        <option value='Vermont'>Vermont</option>
                        <option value='Virginia'>Virginia</option>
                        <option value='Washington'>Washington</option>
                        <option value='West Virginia'>West Virginia</option>
                        <option value='Wisconsin'>Wisconsin</option>
                        <option value='Wyoming'>Wyoming</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="zip">Zip</label>
                    <input type="text" class="form-control" id="zip" name="zip" placeholder="12345" required>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="************" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
            </div>
            <div id="PasswordError">
 			 <h3>Password must contain the following:</h3>
  			<p id="letter">A <b>lowercase</b> letter</p>
  			<p id="capital">A <b>capital (uppercase)</b> letter</p>
  			<p id="number">A <b>number</b></p>
  			<p id="length">Minimum <b>8 characters</b></p>
			</div>
             <div class="form-group">
                <label for="passwordComfirm">Confirm Password</label>
                <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" placeholder="************" required>
            </div>
            <div id="PasswordConfirmErr">
            
            </div>
            <div class="text-center">
                <button type="submit" value="submit" class="btn btn-primary">Sign Up</button>
            </div>
        </form>
    </div>
    <script>
    //validation works but need to edit to hide the box once the page loads
var myInput = document.getElementById("password");
var passwordRepeat= document.getElementById("passwordConfirm");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
var match = document.getElementById("match");
// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("PasswordError").style.display = "block";
  
  }

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("PasswordError").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.style.color='green';
  } else {
    letter.style.color='red';
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.style.color='green';
  } else {
    capital.style.color='red';
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.style.color='green';
  } else {
    number.style.color='red';
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.style.color='green';
  } else {
    length.style.color='red';
  }
}
//When the user clicks on the password field, show the message box
passwordRepeat.onfocus = function() {
  document.getElementById("PasswordConfirmErr").style.display = "block";
//When the user clicks outside of the password field, hide the message box
}
  passwordRepeat.onblur = function() {
    document.getElementById("PasswordConfirmErr").style.display = "none";
  }
    //validate matching passwords    
  passwordRepeat.oninput=function(){
	 if(myInput.value == passwordRepeat.value){
		 document.getElementById("PasswordConfirmErr").innerHTML="Passwords match";
		 document.getElementById("PasswordConfirmErr").style.color='green';
		 return true;
	 } else{
		 document.getElementById("PasswordConfirmErr").innerHTML="Passwords do not match";
		 document.getElementById("PasswordConfirmErr").style.color='red';
		 return false;
		  }
	 }
	 
	  
  
</script>
<?php
    include_once('footer.php');
?>