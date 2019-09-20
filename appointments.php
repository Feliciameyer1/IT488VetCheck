<?php 
    include_once('header.php');
?>
    <div class="container body">
        <h2 class="text-center">View Appointments</h2>
        <?php
            foreach($_SESSION['appointments'] as $apt) {
                $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");
                $query = new MongoDB\Driver\Query([]);
                $rows = $mng->executeQuery('vetcheck.appointments', $query);
                foreach($rows as $row) {
                    if($row->_id == $apt) {
                        echo "Date: {$row->date}<br />
                        Time: {$row->time}<br />
                        Reason For Visit: {$row->reasonForVisit}<br />
                        Patient: {$row->patient}<br />
                        Pet: {$row->pet}<br />
                        <a href=\"./appointment.php?{$row->_id}\">View Appointment</a><br /><br />";
                    }
                }
            }
        ?>
    </div>
<?php
    include_once('footer.php');
?>