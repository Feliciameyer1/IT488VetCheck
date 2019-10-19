<?php
include_once('header.php');Echo "test";
    $numSatisfied = 0;
    $numUnsatisfied = 0;
    $six=0;
    $five=0;
    $four=0;
    $three=0;
    $two=0;
    $one=0;
   echo "test before try";
    try{
        $sixMonthsAgo=strtotime("six months ago");
        $fiveMonthsAgo=strtotime("five months ago");
        $fourMonthsAgo=strtotime("four months ago");
        $threeMonthsAgo=strtotime("three months ago");
        $twoMonthsAgo=strtotime("two months ago");
        $oneMonthAgo=strtotime("one month ago");
        
        $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");
        $filter2=[
            'role'=> "Patient",
        ];
       
        $query2 =new MongoDB\Driver\Query($filter2);
        $rows2= $mng->executeQuery('vetcheck.users', $query2);
         foreach($rows2 as $row2) {
          
           if($row2 -> signupdate ==$sixMonthsAgo){
                $six= $six+1;
            } elseif ($row2->signupdate == $fiveMonthsAgo){
                $five=$five + 1;
            }elseif ($row2->signupdate == $fourMonthsAgo){
                $four=$four + 1;
            }elseif ($row2->signupdate == $threeMonthsAgo){
                $three=$three + 1;
            }elseif ($row2->signupdate == $twoMonthsAgo){
                $two=$two + 1;
            }elseif ($row2->signupdate == $oneMonthAgo){
                $one=$one +1;
            }
           
        } 
    }
    catch(MongoDB\Driver\Exception\Exception $e){
        die('error'.$e);
    }
    
   
    try{
        
        $mng = new MongoDB\Driver\Manager("mongodb+srv://admin:admin@vetcheck-cdi31.mongodb.net/test?retryWrites=true&w=majority");
        $filter = [
            'vet' => $_SESSION['_id']
        ];
        $query = new MongoDB\Driver\Query([$filter]);
        $rows = $mng->executeQuery('vetcheck.ratings', $query);
        foreach($rows as $row) {
            if($row-> satisfaction >= 3){
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
      google.charts.setOnLoadCallback(drawCompRatChart);

      // Callback that creates and populates a data table,
      // instantiates the bar chart, passes in the data and
      // draws it.
      function drawNewClientChart() {

    	  // Create the data table.
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Month');
          data.addColumn('number', 'Number of new Clients');
          var sixmonths=eval('<?php echo $six;?>');
          var fivemonths=eval('<?php echo $five;?>');
          var fourmonths=eval('<?php echo $four;?>');
          var threemonths=eval('<?php echo $three;?>');
          var twomonths=eval('<?php echo $two;?>');
          var onemonth=eval('<?php echo $one;?>');
          data.addRows([
            ['Six Months', sixmonths],
            ['Five Months', fivemonths],
            ['Four Months',fourmonths],
            ['Three Months', threemonths],
            ['Two Months', twomonths],
            ['One Month', onemonth]
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
      function drawCompRatChart() {
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

          var chart = new google.visualization.PieChart(document.getElementById('CompetitorRatingChart'));
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
   					 <!--Div that will hold the finance chart-->
   					 <div id="FinanceChart_div"></div>
   					 <!--Div that will hold the CompRat chart-->
   					 <div id="CompetitorRatingChart"></div>
                    </div>
                     
   					 
 
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php
    include_once('footer.php');
?>
