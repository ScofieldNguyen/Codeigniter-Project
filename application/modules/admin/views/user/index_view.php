<div align='center'>
            <?php 
                if (isset($_SESSION['flash_mess'])  &&  $_SESSION['flash_mess'] != ''){
                    echo "<div class='flash_mess'><ul>";
                    echo "<li>".$_SESSION['flash_mess']."</li>";
                    echo "</ul></div>";
                }
            ?>

        <div id="user-table">
			<table align="center" width="450">
            	<tr>
                	<td class="title">STT</td>
                    <td class="title">Username</td>
                    <td class="title">Email</td>
                    <td class="title">Level</td>
                    <td class="title">Edit</td>
                    <td class="title">Del</td>
                </tr>
                <?php
                $stt=0; 
                foreach ($info as $item) {
                	$stt++;
                	echo "<tr>";
                	echo "<td class='title'>$stt</td>";
                	echo "<td class='title'>".$item['username']."</td>";
                	echo "<td class='title'>".$item['email']."</td>";
                	if ($item['level']==0)
                		echo "<td class='title'>Member</td>";
                	else echo "<td class='title' style='color: red'>Admin</td>";
                	echo "<td class='title'><a href='".base_url()."admin/user/edit/".$item['id']."''>Edit</a></td>";
                	echo "<td class='title'><a href='".base_url()."admin/user/delete/".$item['id']."'>Delete</a></td>";
                	echo "</tr>";
                }
                ?>
            </table>
        </div>

        <table id="add-user-table" align="center" width="450">
            <tr>
                <td><strong><a href="javascript:void(0,0)" class="add"><font color="#99CC33">Add A User</font></a></strong></td>
            </tr>
        </table>
            
            <div id="add-user-form">
                <div class="formPanel mdi addForm">
                    <fieldset>
                        <legend>Add a User</legend>
                        <form>
                            <label>Username</label><input type="text" name="txtuser" size="30" /><br />
                            <label>Password</label><input type="password" name="txtpass" size="30" /><br />
                            <label>Re-password</label><input type="password" name="txtpass2" size="30" /><br />
                            <label>Email</label><input type="text" name="txtemail" size="30" /><br />
                            <label>Level</label><select name="selectlevel">
                                                    <option value="0">User</option>
                                                    <option value="1">Admin</option>
                                                </select><br/>
                            <label>&nbsp;</label> <input type="submit" name="ok" value="Submit" class="button"/>
                        </form> 
                    </fieldset>
                </div>
            </div>
            <?php
                echo $page_link;
            ?>
</div>