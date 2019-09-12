

<?php 
    include_once('header.php');
?>
    <div class="container body">
        <h2 class="text-center">Signup</h2>
        <form action="php/signup.php" method="POST">
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
                <label for="address">Street Address</label>
                <input type="text" class="form-control" id="adress" name="address" placeholder="1234 cherry lane" required>
            </div>
             <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Your city name" required>
            </div>
             <div class="form-group">
                <label for="zip">Zip Code</label>
                <input type="text" class="form-control" id="zip" name="zip" placeholder="12345" required>
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