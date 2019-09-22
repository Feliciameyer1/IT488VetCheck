<?php
    include_once('header.php');
?>
  
<div class="container body">
    <h2 class="text-center">Request Appointment</h2>
    <form action="php/requestAppointment.php" method="POST">
        <div class="form-group">
            <label for="vet">Veterinarian Clinic</label>
            <select id="vet" name="vet" class="form-control" required>
                <option value="" disabled selected>Select a clinic</option>
                <?php
                    $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");
                    $query = new MongoDB\Driver\Query([]);
                    $rows = $mng->executeQuery('vetcheck.users', $query);
                    foreach($rows as $row) {
                        if($row->practicename) {
                            echo "<option value=\"".$row->_id."\">".$row->practicename."</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="datepicker">Date</label>
            <input type="text" class="form-control" id="datepicker" name="datepicker" required>
        </div>
        <div class="form-group">
            <label for="time">Time</label>
            <select id="time" name="time" class="form-control"  required>
                <option value="" disabled selected>Select a time</option>
                <?php
                    for($x = 8; $x < 17; $x++) {
                        $date = '2000-01-01 '.$x.':00:00';
                        $currentTime = date("g:iA", strtotime($date));
                        echo "<option value=\"".$currentTime."\">".$currentTime."</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="pet">Pet Visiting</label>
            <select id="pet" name="pet" class="form-control"  required>
                <option value="" disabled selected>Select a pet</option>
                <?php
                    foreach($_SESSION['pets'] as $pet) {
                        $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");
                        $query = new MongoDB\Driver\Query([]);
                        $rows = $mng->executeQuery('vetcheck.pets', $query);
                        foreach($rows as $row) {
                            if($row->_id == $pet) {
                                echo "<option value=\"".$row->_id."\">".$row->name."</option>";
                            }
                        }
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
			<label for="reasonforvisit">Reason for Visit</label>
			<textarea class="form-control" id="reasonforvisit" name="reasonforvisit" rows="4"  required></textarea>
		</div>
        <div class="text-center">
            <button type="submit" value="submit" class="btn btn-primary">Submit Request</button>
        </div>
    </form>
</div>
<script>
$( "#datepicker" ).datepicker({
    minDate: 0,
	inline: true
});


</script>
<?php
    include_once('footer.php');
?>


