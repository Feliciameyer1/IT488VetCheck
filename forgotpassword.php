<?php 
    include_once('header.php');
?>
	<div class="container body">
        <h2 class="text-center">Forgot Password</h2>
		<form name="forgotpassword" method="POST" action="php/forgotpassword.php">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="example@email.com" required>
            </div>
            <div class="text-center">
                <button type="submit" value="submit" class="btn btn-primary">Reset Password</button>
            </div>
		</form>
	</div>
<?php
    include_once('footer.php');
?>