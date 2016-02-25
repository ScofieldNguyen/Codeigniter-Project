<div align='center'>
            <?php 
                if (isset($_SESSION['flash_mess'])  &&  $_SESSION['flash_mess'] != ''){
                    echo "<div class='flash_mess'><ul>";
                    echo "<li>".$_SESSION['flash_mess']."</li>";
                    echo "</ul></div>";
                }
            ?>

        <div id="cate-table">
			<table align="center" width="450">
            	<tr>
                	<td class="title">STT</td>
                    <td class="title">Categorie</td>
                    <td class="title">Edit</td>
                    <td class="title">Del</td>
                </tr>

                <?php
                $stt=0; 
                foreach ($info as $item) {
                	$stt++;
                	echo "<tr>";
                	echo "<td class='title'>$stt</td>";
                	echo "<td class='title'>".$item['cate_title']."</td>";
                	echo "<td class='title'><a href='".base_url()."admin/categorie/edit/".$item['cate_id']."'>Edit</a></td>";
                	echo "<td class='title'><a href='javascript:void(0)' class='delete' setid='".$item['cate_id']."' >Delete</a></td>";
                	echo "</tr>";
                }
                ?>
            </table>
        </div>

        <table id="add-cate-table" align="center" width="450">
            <tr>
                <td><strong><a href="javascript:void(0)" class="add"><font color="#99CC33">Add A Categorie</font></a></strong></td>
            </tr>
        </table>

            <div id="add-categorie-form">
                <div class="formPanel mdi addForm">
                    <div id="add-error"></div>
                    <fieldset>
                        <legend>Add a Categorie</legend>
                        <form action="" method="post">
                            <label>Categorie</label><select name="selectCate" id="select-cate-parent">
                            <?php callCate($info, 0); ?>
                            </select><br/>
                            <label>Categorie Title</label><input type = "text" size = '25' name = 'txtname' id="txt-cate-title"/><br/>
                            <label>&nbsp;</label> <input type="submit" name="ok" value="Submit" class="button" id="ok-add-categorie-form"/>
                        </form> 
                    </fieldset>
                </div>
            </div>
</div>