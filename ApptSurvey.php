<?php 
    include_once('header.php');
?>
    <div class="container body">
        <h2 class="text-center">Client Satisfaction Survey</h2>
        <p>Please take the time to tell us about your latest visit with your vet:</p> 
        <form  action="php/ApptSurveyLogic.php" method="POST">
            <div class="form-row">
               
                    <p>How satisified where you with your visit with the vet?</p> 
                    <br>
                    <input type="radio"  id="CustSat1" name="CustSat" value="1">
                    <label for="CustSat1">Very disatisfied</label> &nbsp;&nbsp;
                
                
                <input type="radio"  id="CustSat2" name="CustSat" value="2">
                    <label for="CustSat2">Disatisfied</label>&nbsp;&nbsp;
                   
                    
                    <input type="radio" id="CustSat3" name="CustSat" value="3">
                    <label for="CustSat3">Neutral</label>&nbsp;&nbsp;
                    
                    
                    <input type="radio"  id="CustSat4" name="CustSat" value="4">
                    <label for="CustSat4">Satisfied</label>&nbsp;&nbsp;
                   
                    
                    <input type="radio"  id="CustSat5" name="CustSat" value="5">
                    <label for="CustSat5">Very Satisfied</label>&nbsp;&nbsp;
                      
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