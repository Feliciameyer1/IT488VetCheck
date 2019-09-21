<?php 
    include_once('header.php');
?>
    <div class="container body">
        <h2 class="text-center">View Pets</h2>
        <a href="./addpet.php" class="btn btn-secondary mb-2">Add Pet</a>
        <?php
            foreach($_SESSION['pets'] as $pet) {
                $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");
                $query = new MongoDB\Driver\Query([]);
                $rows = $mng->executeQuery('vetcheck.pets', $query);
                foreach($rows as $row) {
                    if($row->_id == $pet) {
                        echo "Name: {$row->name}<br />
                        Type: {$row->type}<br />
                        Breed: {$row->breed}<br />
                        Gender: {$row->gender}<br />
                        Age: {$row->age}<br />
                        Shots: <br />";
                        if(count($row->shots) > 0) {
                            foreach($row->shots as $shot) {
                                echo $shot."<br />";
                            }
                        } else {
                            echo "No shot records found.<br />";
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