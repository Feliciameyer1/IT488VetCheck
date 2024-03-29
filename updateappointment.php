<?php
    include_once('header.php');
?>
<div class="container body">
    <h2 class="text-center">Appointment Outcome</h2>
    <form action="php/updateappointment.php" method="POST">
        <div class="form-group d-none">
            <label for="appointment">Appointment</label>
            <input type="text" class="form-control" id="appointment" name="appointment" value="<?php echo $_SERVER['QUERY_STRING'] ?>" required>
        </div>
        <div class="form-group">
			<label for="notes">Diagnosis</label>
			<textarea class="form-control" id="diagnosis" name="diagnosis" rows="4"></textarea>
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
                <option value='FVRCP'> FVRCP</option>
                <option value='Feline Distemper'>Feline Distemper</option>
            </select>
        </div>
        <div class="form-group">
			<label for="notes">Prescribed Medications</label>
			<textarea class="form-control" id="medications" name="medications" rows="4"></textarea>
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