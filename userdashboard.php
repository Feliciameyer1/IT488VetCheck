<?php
    include_once('header.php');
?>
    <div class="container body">
        <div class="card">
            <h2 class="card-title text-center"><?php echo "Hello, {$_SESSION['firstname']} {$_SESSION['lastname']}"; ?></h2>
            <div class="card-body">
                <p class="card-text">Email: <?php echo $_SESSION['email'] ?></p>
                <p class="card-text">Address: <?php echo $_SESSION['address'] ?></p>
                <p class="card-text">City: <?php echo $_SESSION['city'] ?></p>
                <p class="card-text">State: <?php echo $_SESSION['state'] ?></p>
                <p class="card-text">Zip: <?php echo $_SESSION['zip'] ?></p>
            </div>
        </div>
    </div>
<?php
    include_once('footer.php');
?>