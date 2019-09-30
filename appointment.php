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
                    Pet: {$petName}<br />";
                    if($_SESSION['role'] == 'Veterinarian') {
                        echo "<a href=\"./updateappointment.php?{$row->_id}\">Update Appointment</a><br /><br />";
                    } else {
                        echo "<br />";
                    }
                }
            }
        ?>
        <a href="./appointments.php">View All Appointments</a>
    </div>
<?php
    include_once('footer.php');
?>