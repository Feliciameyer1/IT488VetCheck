<?php 
    include_once('header.php');
?>
    <div class="container body">
        <h2 class="text-center">AppointmentOutcome</h2>
        <a href="./AppointmentOutcome.php" class="btn btn-secondary mb-2">AppointmentOutcome</a>
        <?php
            foreach($_SESSION['OutCome'] as $Outcome) {
                $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");
                $query = new MongoDB\Driver\Query([]);
                $rows = $mng->executeQuery('AppointmentOutcome', $query);
                foreach($rows as $row) {
                    if($row->_id == $Outcome) {
                        echo "UpdatePatientPetShot: {$row->UpdatePatientPetShot}<br />
                        NextVisit: {$row->NextVisit}<br />
                        Medication: {$row->Medication}<br />
                        Issues: {$row->Issues}<br />
                        PainLevel: {$row->PainLevel}<br />
                        Score: <br />";
                        if(count($row->shots) > 0) {
                            foreach($row->Score as $shot) {
                                echo $UpdatePatientPetShot."<br />";
                            }
                        } else {
                            echo "Record of Outcome.<br />";
                        }
                        echo "<br />";
                    }
                }
            }
        ?>
    </div>
<?php
    include_once('footer.php');
?>