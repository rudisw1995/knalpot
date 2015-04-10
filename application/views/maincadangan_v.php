<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Batik is a provider of catalog orders such as batik batik shirt, blouse batik from Yogyakarta or pekalongan">
<meta name="keywords" content="<?php echo $this->load->view('keywords_v');?>">
<title>
	<?php
		echo $url_title = url_title($title, 'underscore', TRUE);
	?>
</title>
<link rel="icon" type="image/png" href="<?php echo base_url();?>asset/themes/thumb-logo.png"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/css/fancy.css" />
<?php
  $canonical    = isset($canonical) ? $canonical : base_url() .$this->uri->uri_string();
  $canonical    = str_replace('www.','',$canonical);
  $canonical    = reduce_double_slashes(base_url() .$canonical);
?>
<link rel='canonical' href='<?php echo $canonical;?>' />  
<script type="text/javascript" src="<?php echo base_url()?>asset/js/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asset/js/jquery.fancybox-1.0.0.js"></script>
<!--<script type="text/javascript">
	$(function(){
		$(".photo-link").fancybox({ 'zoomSpeedIn': 100, 'zoomSpeedOut': 100, 'overlayShow': true }); 
	});
</script>-->
</head>
<body>
<div id="main_container">
	<div id="header">
		<div class='support'>
		<?php echo $this->load->view('supportonline_v')?>
		
		</div>
    	<div id="logo">
			<img src="<?php echo base_url()?>asset/themes/logo.png" />
		
		</div>
        <div id="menu">
		<?php echo $this->load->view('topmenu_v')?>
        </div>
    </div>
    <div id="main_content">
    	<div id="wide_content">
			<?php echo $this->load->view($main)?>
        </div><!--end of left content-->
    </div><!--end of main content-->
	<div id="footer">
    	<div class="footer_links">
			<?php $this->load->view('tfooter_v');?>
        </div>
    </div> 
</div> <!--end of main container-->
</body>
</html>
