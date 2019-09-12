<?php
    include_once('header.php');
?>
    <div class="container body">
        <h2 class="text-center">Signin</h2>
        <form action="php/signin.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="example@email.com" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="************" required>
            </div>
            <div class="text-center">
                <button type="submit" value="submit" class="btn btn-primary">Sign In</button>
            </div>
        </form>
    </div>
<?php
    include_once('footer.php');
?>