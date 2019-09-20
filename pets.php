<?php 
    include_once('header.php');
?>
    <div class="container body">
        <h2 class="text-center">View Pets</h2>
        <?php
            foreach($_SESSION['pets'] as $pet) {
                $data = json_decode(json_encode($pet), true);
                echo "Name: {$data['name']}<br />
                Type: {$data['type']}<br />
                Breed: {$data['breed']}<br />
                Gender: {$data['gender']}<br />
                Age: {$data['age']}<br /><br />";
            }
        ?>
    </div>
<?php
    include_once('footer.php');
?>