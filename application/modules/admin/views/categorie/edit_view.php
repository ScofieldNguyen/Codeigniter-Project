                <div class="formPanel mdi">
                    <div id="add-error"></div>
                    <fieldset>
                        <legend>Add a Categorie</legend>
                        <form action="<?php echo base_url(); ?>/admin/categorie/edit" method="post">
                            <label>Categorie</label><select name="selectCate">
                            <?php callCate($cate_data, 0, "---", $info['0']['cate_parent']); ?>
                            </select><br/>
                            <label>Categorie Title</label><input type = "text" size = '25' name = 'txtname' value="<?php echo $info['0']['cate_title']; ?>"/><br/>
                            <label>&nbsp;</label> <input type="submit" name="ok" value="Submit"/>
                        </form> 
                    </fieldset>
                </div>
