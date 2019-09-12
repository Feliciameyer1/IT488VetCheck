<?php
    include_once('header.php');
?>
    <div class="container body">
        <div class="row">
            <div class="col-3">
                <h2 class="text-center">User Links</h2>
                <a href="./addpet.php" class="btn btn-secondary">Add Pet</a>
                <a href="#" class="btn btn-secondary mt-2">Request Appointment</a>
            </div>
            <div class="col-9">
                <h2 class="text-center"><?php echo "Hello, {$_SESSION['firstname']} {$_SESSION['lastname']}"; ?></h2>
                <div class="container">
                    <p>Email: <?php echo $_SESSION['email'] ?></p>
                    <p>Address: <?php echo $_SESSION['address'] ?></p>
                    <p>City: <?php echo $_SESSION['city'] ?></p>
                    <p>State: <?php echo $_SESSION['state'] ?></p>
                    <p>Zip: <?php echo $_SESSION['zip'] ?></p>
                    <p>Pets: <br />
                        <?php 
                            foreach($_SESSION['pets'] as $pet) {
                                echo "Name: {$pet['name']}<br />
                                Type: {$pet['type']}<br />
                                Breed: {$pet['breed']}<br />
                                Gender: {$pet['gender']}<br />
                                Age: {$pet['age']}<br /><br />";
                            }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php
    include_once('footer.php');
?>