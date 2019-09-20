<?php
    include_once('header.php');
?>
<div class="container body">
    <h2 class="text-center">Update Appointment</h2>
    <form action="php/updateappointment.php" method="POST">
        <div class="form-group d-none">
            <label for="appointment">Appointment</label>
            <input type="text" class="form-control" id="appointment" name="appointment" value="<?php echo $_SERVER['QUERY_STRING'] ?>" required>
        </div>
        <div class="form-group d-none">
            <label for="pet">Pet</label>
            <select id="pet" name="pet" class="form-control">
                <?php
                    $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");
                    $query = new MongoDB\Driver\Query([]);
                    $rows = $mng->executeQuery('vetcheck.appointments', $query);
                    foreach($rows as $row) {
                        if($row->_id == $_SERVER['QUERY_STRING']) {
                            $data = json_decode(json_encode($row), true);
                            echo "<option value=\"".$data['pet']['_id']['$oid']."\">".$data['pet']['name']."</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="shots">Shots</label>
            <select id="shots" name="shots" class="form-control">
                <option value="-1">Select a shot</option>
                <option value='Rabies'>Rabies</option>
                <option value='DA2P'>DA2P</option>
                <option value='Bordetella'>Bordetella</option>
                <option value='Canine Influenza Virus'>Canine Influenza Virus</option>
                <option value='Leptospirosis'>Leptospirosis</option>
                <option value='Lyme'>Lyme</option>
            </select>
        </div>
        <div class="form-group">
			<label for="notes">Additional Notes</label>
			<textarea class="form-control" id="notes" name="notes" rows="4"></textarea>
		</div>
        <div class="text-center">
            <button type="submit" value="submit" class="btn btn-primary">Update Records</button>
        </div>
    </form>
</div>
<?php
    include_once('footer.php');
?>