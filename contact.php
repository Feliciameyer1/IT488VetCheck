<?php 
    include_once('header.php');
?>
	<div class="container body">
        <h2 class="text-center">Contact Vet Clinic</h2>
        <form action="php/contact.php" method="POST">
            <div class="form-group">
                <label for="vet">Veterinarian</label>
                <select id="vet" name="vet" class="form-control">
                    <option value="-1">Select a vet</option>
                    <?php
                        $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");
                        $query = new MongoDB\Driver\Query([]);
                        $rows = $mng->executeQuery('vetcheck.users', $query);
                        foreach($rows as $row) {
                            if($row->practicename) {
                                echo "<option value=\"".$row->practicename."\">".$row->practicename."</option>";
                            }
                        }
                    ?>
                </select>
            </div>
			<div class="form-group">
				<label for="message">Message</label>
				<textarea class="form-control" id="message" name="message" rows="4"></textarea>
			</div>
            <div class="text-center">
                <button type="submit" value="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
<?php
    include_once('footer.php');
?>