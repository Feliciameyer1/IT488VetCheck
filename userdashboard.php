<?php
    include_once('header.php');
?>
    <div class="container body">
        <div class="row">
            <?php if($_SESSION['role'] == 'Patient'): ?>
                <div class="col-3">
                    <h2 class="text-center">User Links</h2>
                    <a href="./addpet.php" class="btn btn-secondary">Add Pet</a>
                    <a href="./requestAppointment.php" class="btn btn-secondary mt-2">Request Appointment</a>
                    <a href="./contact.php" class="btn btn-secondary mt-2">Contact Vet Clinic</a>
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
                                    $data = json_decode(json_encode($pet), true);
                                    echo "Name: {$data['name']}<br />
                                    Type: {$data['type']}<br />
                                    Breed: {$data['breed']}<br />
                                    Gender: {$data['gender']}<br />
                                    Age: {$data['age']}<br /><br />";
                                }
                            ?>
                        </p>
                        <p>Appointments: <br />
                            <?php
                                foreach($_SESSION['appointments'] as $appointment) {
                                    $data = json_decode(json_encode($appointment), true);
                                    echo "Vet: {$data['vet']['practicename']}<br />
                                    Location: {$data['vet']['address']}, {$data['vet']['city']}, {$data['vet']['state']}, {$data['vet']['zip']}<br />
                                    Date: {$data['date']}<br />
                                    Time: {$data['time']}<br />
                                    Reason for Visit: {$data['reasonForVisit']}<br />";
                                }
                            ?>
                        </p>
                        <p>Messages: <br />
                            <?php
                                foreach($_SESSION['messages'] as $message) {
                                    $data = json_decode(json_encode($message), true);
                                    echo "Vet: {$data['vet']['practicename']}<br />
                                    Location: {$data['vet']['address']}, {$data['vet']['city']}, {$data['vet']['state']}, {$data['vet']['zip']}<br />
                                    Message: {$data['message']}<br />";
                                }
                            ?>
                        </p>
                    </div>
                </div>
            <?php else: ?>
                <div class="col-3">
                    <h2 class="text-center">Vet Links</h2>
                    <a href="./appointments.php" class="btn btn-secondary mt-2">View Appointments</a>
                </div>
                <div class="col-9">
                    <h2 class="text-center"><?php echo "Hello, {$_SESSION['practicename']}"; ?></h2>
                    <div class="container">
                        <p>Email: <?php echo $_SESSION['email'] ?></p>
                        <p>Address: <?php echo $_SESSION['address'] ?></p>
                        <p>City: <?php echo $_SESSION['city'] ?></p>
                        <p>State: <?php echo $_SESSION['state'] ?></p>
                        <p>Zip: <?php echo $_SESSION['zip'] ?></p>
                        <p>Messages: <br />
                            <?php
                                foreach($_SESSION['messages'] as $message) {
                                    $data = json_decode(json_encode($message), true);
                                    echo "Patient: {$data['patient']['firstname']} {$data['patient']['lastname']}<br />
                                    Contact: {$data['patient']['email']}<br />
                                    Message: {$data['message']}<br />";
                                }
                            ?>
                        </p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php
    include_once('footer.php');
?>