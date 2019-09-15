<?php
    include_once('header.php');
?>
  
<div class="container body">
    <h2 class="text-center">Request Appointment</h2>
    <form action="php/requestAppointment.php" method="POST">
        <div class="form-group">
            <label for="datepicker">Date</label>
            <input type="text" class="form-control" id="datepicker" name="datepicker" required>
        </div>
        <div class="form-group">
            <label for="time">Time</label>
            <select id="time" name="time" class="form-control">
                <option value="-1">Select a time</option>
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
            <label for="reasonforvisit">Reason For Visit</label>
            <input type="text" class="form-control" id="reasonforvisit" name="reasonforvisit">
        </div>
        <div class="text-center">
            <button type="submit" value="submit" class="btn btn-primary">Submit Request</button>
        </div>
    </form>
</div>
<script>
$( "#datepicker" ).datepicker({
	inline: true
});


</script>
<?php
    include_once('footer.php');
?>


