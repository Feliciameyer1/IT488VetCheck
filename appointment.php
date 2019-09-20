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
                    $data = json_decode(json_encode($row), true);
                    echo "Patient: {$data['patient']['firstname']} {$data['patient']['lastname']}<br />
                    Contact: {$data['patient']['email']}<br />
                    Date: {$data['date']}<br />
                    Time: {$data['time']}<br />
                    Reason for Visit: {$data['reasonForVisit']}<br /><br />";
                }
            }
        ?>
        <a href="./appointments.php">View All Appointments</a>
    </div>
<?php
    include_once('footer.php');
?>