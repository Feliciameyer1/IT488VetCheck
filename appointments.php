<?php 
    include_once('header.php');
?>
    <div class="container body">
        <h2 class="text-center">View Appointments</h2>
        <?php
            if($_SESSION['role'] == 'Patient') {
                echo '<a href="./requestAppointment.php" class="btn btn-secondary mb-2">Request Appointment</a>';
            }
        ?>
        <?php
            $filter = [
                'patient' => $_SESSION['_id']
            ];
            $options = [
                'sort' => ['date' => 1, 'time' => 1],
            ];
            $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");
            $apptQuery = new MongoDB\Driver\Query( $filter, $options);
            $apptRows = $mng->executeQuery('vetcheck.appointments', $apptQuery);
            
            foreach($apptRows as $row) {
                $userName = '';
                $petName = '';

                /* Try to get the user's name */
                try {
                    $userFilter = [
                        '_id' => $row->patient
                    ];
                
                    $userQuery = new MongoDB\Driver\Query($userFilter);
                    $userRes = $mng->executeQuery('vetcheck.users', $userQuery);
            
                    $userRow = $userRes->toArray();
                    if ($userRow) {
                        $userName =  $userRow[0]->firstname.' '.$userRow[0]->lastname;
                    }
                }
                catch (MongoDB\Driver\Exception\Exception $e) {
                    /* if an exception occurs, show a blank user name */
                    $userName = '';
                }

                /* Try to get the pet's name */
                try {
                    $petFilter = [
                        '_id' => $row->pet
                    ];
                
                    $petQuery = new MongoDB\Driver\Query($petFilter);
                    $petRes = $mng->executeQuery('vetcheck.pets', $petQuery);
            
                    $petRow = $petRes->toArray();
                    if ($petRow) {
                        $petName = $petRow[0]->name;
                    }
                }
                catch (MongoDB\Driver\Exception\Exception $e) {
                    /* if an exception occurs, show a blank pet name */
                    $petName = '';
                }

                echo "Date: {$row->date}<br />
                Time: {$row->time}<br />
                Reason For Visit: {$row->reasonForVisit}<br />
                Patient: {$userName}<br />
                Pet: {$petName}<br />
                <a href=\"./appointment.php?{$row->_id}\">View Appointment</a><br /><br />";
                echo"Please take the time to fill out a survey about your visit.<br>";
                echo "<a href='./ApptSurvey.php'>Appointment Survey</a><br /><br />";
            }
        ?>
    </div>
<?php
    include_once('footer.php');
?>