<?php 
    include_once('header.php');
?>
    <div class="container body">
        <h2 class="text-center">CLient Satisfaction Survey</h2>
        <p>Please take the time to tell us about your latest visit with:</p> 
        <form  action="php/surveysubmit.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="CustSat">How satisified where you with your visit with the vet?</label>
                    <input type="radio" class="form-control" id="CustSat1" name="CustSat" value="1">
                    <label for="CustSat1">Very disatisfied</label>
                    <input type="radio" class="form-control" id="CustSat2" name="CustSat" value="2">
                    <label for="CustSat2">Disatisfied</label>
                    <input type="radio" class="form-control" id="CustSat3" name="CustSat" value="3">
                    <label for="CustSat3">Neutral</label>
                    <input type="radio" class="form-control" id="CustSat4" name="CustSat" value="4">
                    <label for="CustSat4">Satisfied</label>
                    <input type="radio" class="form-control" id="CustSat5" name="CustSat" value="5">
                    <label for="CustSat5">Very Satisfied</label>
                </div>
                <div class="form-group col-md-6">
                    <label for="comments">Please tell us about your visit</label>
                    <textarea class="form-control" name="Comments" rows="4" >
                    
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
?>