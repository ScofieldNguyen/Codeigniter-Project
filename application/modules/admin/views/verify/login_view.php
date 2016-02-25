<?php 
	if (isset($error) && $error != ""){
		echo "<div class = 'mess_error'><ul><li>$error</li></ul></div>";
	}
?>
<div class = 'formPanel mdi'>
	<fieldset>
		<legend>Login</legend>
		<form action = '<?php echo base_url()."admin/verify/login";?>' method = 'post'>
			<label>Username</label><input name = 'txtname' type = 'text' size = '30 ' /><br/>
			<label>Password</label><input name = 'txtpass' type = 'password' size = '30 ' /><br/>
			<label>&nbsp;</label><input type = 'submit' name = 'ok' value = 'Submit' class = 'button' />
		</form>
	</fieldset>
</div>