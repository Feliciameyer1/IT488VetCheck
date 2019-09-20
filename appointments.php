<?php 
    include_once('header.php');
?>
    <div class="container body">
        <h2 class="text-center">View Appointments</h2>
        <?php
            foreach($_SESSION['appointments'] as $appointment) {
                $data = json_decode(json_encode($appointment), true);
                echo "Patient: {$data['patient']['firstname']} {$data['patient']['lastname']}<br />
                Contact: {$data['patient']['email']}<br />
                Date: {$data['date']}<br />
                Time: {$data['time']}<br />
                Reason for Visit: {$data['reasonForVisit']}<br />
                <a href=\"./appointment.php?{$data['_id']['$oid']}\">View Appointment</a><br /><br />";
            }
        ?>
    </div>
<?php
    include_once('footer.php');
?>