<?php 
    include_once('header.php');
?>
	<div class="container body">
        <h2 class="text-center">Contact Us</h2>
        <form action="php/contact.php" method="POST">
			<div class="form-group">
                <label for="password">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="example@email.com" required>
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