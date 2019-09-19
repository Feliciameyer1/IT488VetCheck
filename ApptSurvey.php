<?php 
    include_once('header.php');
?>
    <div class="container body">
        <h2 class="text-center">CLient Satisfaction Survey</h2>
        <p>Please take the time to tell us about your latest visit with:</p> 
        <form  action="php/surveysubmit.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="waittime">How satisified where you with your visit with the vet?</label>
                    <input type="radio" class="form-control" id="waittime1" name="waittime" value="1">
                    <label for="waittime1">Very disatisfied</label>
                    <input type="radio" class="form-control" id="waittime2" name="waittime" value="2">
                    <label for="waittime2">Disatisfied</label>
                    <input type="radio" class="form-control" id="waittime3" name="waittime" value="3">
                    <label for="waittime3">Neutral</label>
                    <input type="radio" class="form-control" id="waittime4" name="waittime" value="4">
                    <label for="waittime4">Satisfied</label>
                    <input type="radio" class="form-control" id="waittime5" name="waittime" value="5">
                    <label for="waittime5">Very Satisfied</label>
                </div>
                <div class="form-group col-md-6">
                    <label for="comments">Please tell us about your visit</label>
                    <textarea rows="4" cols="50">
                    
                    </textarea>
                </div>
            </div>
           
            <div class="text-center">
                <button type="submit" value="submit" class="btn btn-primary">Sign Up</button>
            </div>
        </form>
    </div>

<?php
    include_once('footer.php');

