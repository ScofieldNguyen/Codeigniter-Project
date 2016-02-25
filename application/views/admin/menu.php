    <div id="menu">
    	<ul>
        	<li><a href="#">Admin Page</a></li>
        	<li><a href="<?php echo base_url().'admin/user/index' ?>">Account Manager</a></li>
        	<li><a href="<?php echo base_url().'admin/news/index' ?>">News Manager</a></li>
        	<li><a href="<?php echo base_url().'admin/categorie/index' ?>">Categorie Manager</a></li>
        	<li><a href="<?php echo base_url().'admin/verify/logout'; ?>">Logout (<?php echo $this->session->userdata('username'); ?>)</a></li>
        </ul>
    </div>