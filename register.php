<script type="text/javascript">
	//checks to see if an ellement is only alphabetical characters.
	function isAlphabet(elem){
		var alphaExp = /^[a-zA-Z]+$/;
		if(elem.value.match(alphaExp)){
			return true;
		}else{
			elem.focus();
			return false;
		}
	}
	//checks to see if an email is vallid
	function checkEmail(elem){
		var email = elem.value;
		var atPos = email.indexOf('@');
		var dotPos = email.lastIndexOf('.');
		
		if(atPos < 1 || dotPos < atPos){
			return false;
			elem.focus();
		}
		return true;
	}
	//check clientside to see if the form has vallid inputs.
	function validate(){
		var form = document.forms["register"];
		if(!isAlphabet(form["firstName"])){
			alert("Please enter a vallid first name.");
			return false;
		}
		if(!isAlphabet(form["lastName"])){
                        alert("Please enter a vallid second name.");
                        return false;
                }
		if(!checkEmail(form["email"])){
			alert("Invalid email.");
			return false;
		}
		if(form["email"].value != form["confirm-email"].value){
			form["confirm-email"].focus();
			alert("Emails don't match.");
			return false;
		}
		if(form["password"].value.length < 5 || form["password"].value.length > 30){
			alert("Passwords must be between 5 and 30 characters long.");
			form["password"].focus();
			return false;
		}
		if(form["password"].value != form["confirm-password"].value){
			alert("Passwords do not match.")
			form["password"].focus();
			return false;
		}
		return true;
	}
</script>
<h3>Sign up!</h3>
<hr>
<form action="check-register.php" method="post" onsubmit="return validate()" class="form-horizontal" name="register">
	
	<div class="control-group">
                <label class="control-label">First name: </label>
                <div class="controls">
                        <input name="firstName" type="text" placeholder="John">
                </div>
        </div>
	<div class="control-group">
                <label class="control-label">Second name: </label>
                <div class="controls">
                        <input name="lastName" type="text" placeholder="Doe">
                </div>
        </div>
	<br>
	<div class="control-group">
		<label class="control-label">Email:</label>
		<div class="controls">
			<input name="email" type="text" placeholder="exaple@domain.eg">
		</div>
	</div>
	<div class="control-group">
                <label class="control-label">Confirm email:</label>
                <div class="controls">
                        <input name="confirm-email" type="text" placeholder="exaple@domain.eg">
                </div>
        </div>
	<br>
	<div class="control-group">
        	<label class="control-label" for="inputPassword">Password: </label>
        	<div class="controls">
       			<input name="password" type="password" id="inputPassword" placeholder="Password">
        	</div>
	</div>
	<div class="control-group">
                <label class="control-label" for="inputPassword">Confirm password: </label>
                <div class="controls">
                        <input name="confirm-password" type="password" id="inputPassword" placeholder="Password">
                </div>
        </div>
	<div class="control-group">
		<div class="controls">
			<input type="submit" value="Sign up!">
		</div>
        </div>
	<hr>
        <p style="margin: 1em 0 0 0;"> Already have an account? <a href="<?php echo $siteURL; ?>?page=login.php">login</a>.
        <hr>
</form>
