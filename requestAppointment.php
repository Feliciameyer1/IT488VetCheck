<?php
    include_once('header.php');
?>
<div class="container body">
    <h2 class="text-center">Request Appointment</h2>
    <form action="php/requestAppointment.php" method="POST">
        <div class="form-group">
            <label for="date">Date</label>
            <input type="text" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="time">Time</label>
            <input type="text" class="form-control" id="time" name="time" required>
        </div>
        <div class="form-group">
            <label for="preferredvet">Preferred Vet</label>
            <input type="text" class="form-control" id="preferredvet" name="preferredvet">
        </div>
    </form>
</div>
<?php
    include_once('footer.php');
?>


