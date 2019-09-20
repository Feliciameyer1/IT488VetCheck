<?php 
    include_once('header.php');
?>
    <div class="container body">
        <h2 class="text-center">View Appointments</h2>
        <?php
            $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");
            $query = new MongoDB\Driver\Query([]);
            $rows = $mng->executeQuery('vetcheck.appointments', $query);
            foreach($rows as $row) {
                if($row->_id == $_SERVER['QUERY_STRING']) {
                    echo "Date: {$row->date}<br />
                    Time: {$row->time}<br />
                    Reason For Visit: {$row->reasonForVisit}<br />
                    Patient: {$row->patient}<br />
                    Pet: {$row->pet}<br />";
                    if($_SESSION['role'] == 'Veterinarian') {
                        "<a href=\"./updateappointment.php?{$row->_id}\">Update Appointment</a><br /><br />";
                    }
                }
            }
        ?>
        <a href="./appointments.php">View All Appointments</a>
    </div>
<?php
    include_once('footer.php');
?>