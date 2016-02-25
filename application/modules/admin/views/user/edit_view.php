<?php echo "<div class='mess_error'><ul>".validation_errors("<li>","</li>")."</ul></div>"; ?>
<div class="formPanel mdi">
	<fieldset>
		<legend>Edit Form</legend>
		<form action="<?php echo base_url()."admin/user/edit/".$info['id']; ?>" method="post">
			<label>Username</label><input type="text" name="txtuser" size="30" value=<?php echo $info['username']; ?> ><br />
		    <label>Password</label><input type="password" name="txtpass" size="30" /><br />
		    <label>Re-password</label><input type="password" name="txtpass2" size="30" /><br />
		    <label>Email</label><input type="text" name="txtemail" size="30" value=<?php echo $info['email']; ?>><br />
		    <label>Level</label><select name="selectlevel">
		    						<option value="0" <?php if ($info['level'] == 0) echo "selected"; ?>>User</option>
		    						<option value="1" <?php if ($info['level'] == 1) echo "selected"; ?>>Admin</option>
		    					</select><br/>
		    <label>&nbsp;</label> <input type="submit" name="ok" value="Submit" class="button" />
		</form> 
	</fieldset>
</div>