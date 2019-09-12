<?php
    include_once('header.php');
?>
    <div class="container body">
        <div class="card">
            <h2 class="card-title text-center">Card title</h2>
            <div class="card-body">
                <p class="card-text">
                    Email: <?php echo $_SESSION['email'] ?>
                </p>
                <p class="card-text">
                    First Name: <?php echo $_SESSION['firstname'] ?>
                </p>
                <p class="card-text">
                    Last Name: <?php echo $_SESSION['lastname'] ?>
                </p>
            </div>
        </div>
    </div>
<?php
    include_once('footer.php');
?>