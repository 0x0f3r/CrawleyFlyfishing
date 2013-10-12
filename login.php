<div>
<h3>Please sign in:</h3>
</div>
<hr>
<form action="check-login.php" method="post" class="form-horizontal" name="login">
  <div class="control-group">
	<label class="control-label" for="inputEmail">Email</label>
	<div class="controls">
	  <input name="email" type="text" id="inputEmail" placeholder="Email">
	</div>
  </div>
  <div class="control-group">
	<label class="control-label" for="inputPassword">Password</label>
	<div class="controls">
	  <input name="password" type="password" id="inputPassword" placeholder="Password">
	</div>
  </div>
  <div class="control-group">
	<div class="controls">
	  <button type="submit" class="btn" >Sign in</button>
	</div>
  </div>
	<hr>
	<p style="margin: 1em 0 0 0;"> Don't have an account? <a href="<?php echo $siteURL; ?>?page=register.php">Sign up</a> now!
	<hr>
 </form>




