<?php 
    include_once('header.php');
?>
    <div class="container body">
        <h2 class="text-center">View Messages</h2>
        <?php
            if($_SESSION['role'] == 'Patient') {
                echo '<a href="./contact.php" class="btn btn-secondary mb-2">Message Vet</a>';
            }
        ?>
        <?php
            foreach($_SESSION['messages'] as $msg) {
                $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");
                $query = new MongoDB\Driver\Query([]);
                $rows = $mng->executeQuery('vetcheck.messages', $query);
                foreach($rows as $row) {
                    if($row->_id == $msg) {
                        echo "Vet: {$row->vet}<br />
                        Message: {$row->message}<br />
                        <a href=\"./appointment.php?{$row->_id}\">View Appointment</a><br /><br />";
                    }
                }
            }
        ?>
    </div>
<?php
    include_once('footer.php');
?>