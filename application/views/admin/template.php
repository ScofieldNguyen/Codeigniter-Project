<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url(); ?>public/<?php echo $module; ?>/style/style2.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.12.0-beta.1/themes/smoothness/jquery-ui.css">



<script language = "javascript" src = "<?php echo base_url().'public/'.$module.'/js/java.js'?>"></script>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script language = "javascript" src = "http://code.jquery.com/ui/1.12.0-beta.1/jquery-ui.js"></script>
<script	language="javascript">
	var baseUrl = "<?php echo base_url(); ?>";
</script>
<script language = "javascript" src = "<?php echo base_url().'public/'.$module.'/js/jquery_code.js'?>"></script>
<title><?php echo $pageTitle; ?></title>
</head>

<body>
	<?php $this->load->view('admin/top');?>
	<?php if ($this->session->userdata('level') == 1){
			$this->load->view('admin/menu');
		}
	?>
	<div id="main">    	
        <div id="info">
        	<?php $this->load->view($loadPage); ?>
        </div>
    </div>
	<?php $this->load->view('admin/bottom');?>
</body>
</html>
