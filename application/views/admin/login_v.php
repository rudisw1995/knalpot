<html>
<head>
	<script>
		function fokus(){
			document.getElementById('inUsername').focus();
		}
	</script>
	<style>
		table{
			-moz-border-radius-bottomleft:5px;
			-moz-border-radius-bottomright:5px;
			-moz-border-radius-topleft:5px;
			-moz-border-radius-topright:5px;-moz-box-shadow: 0 0 10px #EFEFEF;
			-webkit-box-shadow: 0 0 10px #EFEFEF;
			margin:150px auto;
			border:1px solid #000;
			padding:20px;
			background:#EFEFEF;
		}
		body{
			background:#EFEFEF url(http://localhost/ecomm/asset/images/admtheme/bglogintop.jpg);
		}
	</style>
</head>
<body onload="return fokus()">
<?php
	$atrform = array(
		"id" => "formID",
		"nama" => "frmLogin",
		"class" => "formular",
	);
	$atrusername = array(
		"type" => "text",
		"name" => "username",
		"maxlength" => "8",
		"size" => "30",
		"id" => "inUsername"
		/*"class" => "validate[required,custom[noSpecialCaracters],custom[onlyNumber],length[8,8]] text-input"*/
	);
	$atrpassword = array(
		"type" => "password",
		"name" => "password",
		"size" => "35",
		"id" => "password",
		"class"=>"validate[required,custom[noSpecialCaracters],length[3,20]] text-input"
	);
	$atrlogin = array(
		"type" => "submit",
		"name" => "cmdLogin",
		"id" => "inButton",
		"value" => "Login"
	);
	$atrclose = array(
		"id" => "inCancel"
		//"OnClick" => "$.validationEngine.closePrompt('.formError',true)"
	);
	echo "<div id='form'>";
		echo form_open("admin/login/cek_login",$atrform);
		$this->load->library('table');
		$this->table->add_row('', '<b>'.$title.'</b>');
		$this->table->add_row('Username', form_input($atrusername));
		$this->table->add_row('Password', form_input($atrpassword));
		$this->table->add_row('', form_submit($atrlogin).' '.anchor("admin/login/","Cancel",$atrclose));
		$this->table->add_row('','<div id="alert">'.$alert.'</div>');
		echo $this->table->generate();
		$this->table->clear();
		echo form_close();
	echo "</div>";
?>
</body>
</html>