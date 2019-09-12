<?php 
    include_once('header.php');
?>
    <div class="container body">
        <h2 class="text-center">Add Pet</h2>
        <form action="php/addpet.php" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Charlie" required>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" class="form-control" id="type" name="type" placeholder="Dog" required>
            </div>
            <div class="form-group">
                <label for="type">Breed</label>
                <input type="text" class="form-control" id="breed" name="breed" placeholder="Poodle" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <input type="text" class="form-control" id="gender" name="gender" placeholder="Male" required>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" name="age" placeholder="1" required>
            </div>
            <div class="text-center">
                <button type="submit" value="submit" class="btn btn-primary">Add Pet</button>
            </div>
        </form>
    </div>
<?php
    include_once('footer.php');
?>