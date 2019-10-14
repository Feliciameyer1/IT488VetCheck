<?php
    include_once('header.php');
    $numSatisfied = 0;
    $numUnsatisfied = 0;
    
    try{
        $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");
        $query = new MongoDB\Driver\Query([]);
        $rows = $mng->executeQuery('vetcheck.ratings', $query);
        foreach($rows as $row) {
            if($row-> satisfaction >= 4){
                $numSatisfied= $numSatisfied+1;
        } else{
            $numUnsatisfied=$numUnsatisfied+1;
        }
    }
    }
    catch(MongoDB\Driver\Exception\Exception $e){
        die('error'.$e);
    }
    
?>
  <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawNewClientChart);
      google.charts.setOnLoadCallback(drawCustSatChart);
      google.charts.setOnLoadCallback(drawFinanceChart);

      // Callback that creates and populates a data table,
      // instantiates the bar chart, passes in the data and
      // draws it.
      function drawNewClientChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Month');
        data.addColumn('number', 'Number of new Clients');
        data.addRows([
          ['January', 4],
          ['February', 3],
          ['March',4],
          ['April', 3],
          ['May', 2]
        ]);

        // Set chart options
        var options = {'title':'New Client Tracker',
                       'width':700,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('NewClientchart_div'));
        chart.draw(data, options);
      }
      function drawFinanceChart() {
                      
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Finance');
        data.addColumn('number', 'Cost & Profit');
        data.addRows([
          ['Supplies', 3],
          ['Sales', 15],
          ['Labor', 5]
        ]);

        // Set chart options
        var options = {'title':'Finance Tracker',
                       'width':600,
                       'height':300};

 // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('FinanceChart_div'));
        chart.draw(data, options);
      }
      function drawCustSatChart() {
            var numSatisfied = eval('<?php echo $numSatisfied; ?>');
            var numUnsatisfied = eval('<?php echo $numUnsatisfied; ?>');

            var data = google.visualization.arrayToDataTable([
                ['Customer Survey Results', 'Rating'],
                ['Satisfied Customers', numSatisfied],
                ['Unsatisfied Customers', numUnsatisfied]
            ]);

          var options = {
            title: 'Customer Survey Results',
            is3D: true,
          };

          var chart = new google.visualization.PieChart(document.getElementById('CustSatChart'));
          chart.draw(data, options);
        }
    </script>
    <div class="container body">
        <div class="row">
            <?php if($_SESSION['role'] == 'Patient'): ?>
                <div class="col-3">
                    <h2 class="text-center">User Links</h2>
                    <a href="./pets.php" class="btn btn-secondary mt-2">Pets</a>
                    <a href="./appointments.php" class="btn btn-secondary mt-2">Appointments</a>
                    <a href="./messages.php" class="btn btn-secondary mt-2">Messages</a>
                </div>
                <div class="col-9">
                    <h2 class="text-center"><?php echo "Hello, {$_SESSION['firstname']} {$_SESSION['lastname']}"; ?></h2>
                    <div class="container">
                        <p>Email: <?php echo $_SESSION['email'] ?></p>
                        <p>Address: <?php echo $_SESSION['address'] ?></p>
                        <p>City: <?php echo $_SESSION['city'] ?></p>
                        <p>State: <?php echo $_SESSION['state'] ?></p>
                        <p>Zip: <?php echo $_SESSION['zip'] ?></p>
                    </div>
                </div>
            <?php else: ?>
                <div class="col-3">
                    <h2 class="text-center">Vet Links</h2>
                    <a href="./appointments.php" class="btn btn-secondary mt-2">Appointments</a>
                    <a href="./messages.php" class="btn btn-secondary mt-2">Messages</a>
                </div>
                <div class="col-9">
                    <h2 class="text-center"><?php echo "Hello, {$_SESSION['practicename']}"; ?></h2>
                    <div class="container">
                        <p>Email: <?php echo $_SESSION['email'] ?></p>
                        <p>Address: <?php echo $_SESSION['address'] ?></p>
                        <p>City: <?php echo $_SESSION['city'] ?></p>
                        <p>State: <?php echo $_SESSION['state'] ?></p>
                        <p>Zip: <?php echo $_SESSION['zip'] ?></p>
                    </div>
                     <!--Div that will hold the bar chart-->
   					 <div id="NewClientchart_div"></div>
   					 <!--Div that will hold the CustSat chart-->
   					 <div id="CustSatChart"></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php
    include_once('footer.php');
?>
