<div style="border:1px dotted red;padding:10px;margin:10px;">
	<div class="contact_info_title">Information</div>
	<div style="padding:5px;">
	Untuk melanjutkan belanja anda, anda dapat memasukkan data anda pada form berikut. Mohon untuk mengisi data
	yang sebenarnya, karena data tersebut akan kami gunakan untuk melakukan pengiriman barang yang anda pesan.
	</div>
</div>
<div id="contact_form">
<head>
	<script> $(document).ready(function(){ stoploading(); }) </script>
</head>
<?php
	echo $this->pquery->form_remote_tag(array(
	'url'=>site_url('pemesan/save'),
	'update'=>'#contact_form',
	'id'=>'form',
	'type'=>'post'));
?>
<h2>Form Data Pemesan</h2>
	<div class="form_row">
		<label>Nama:</label><input type="text" name="nm_pms" size="35" class="contact_input" /><br />
		<?php echo form_error('nm_pms'); ?>
	</div>
	<div class="form_row">
		<label>Alamat:</label><input type="text" name="alamat" size="60" class="contact_input" /><br />
		<?php echo form_error('alamat'); ?>
	</div>
	<div class="form_row">
		<label>Kota:</label><input type="text" name="kota" size="30" class="contact_input" /><br />
		<?php echo form_error('kota'); ?>
	</div>                    
	<div class="form_row">
		<label>Kodepos:</label><input type="text" name="kd_pos" size="5" class="contact_input" /><br />
		<?php echo form_error('kd_pos'); ?>
	</div>                    
	<div class="form_row">
		<label>Email:</label><input type="text" name="email" size="25" class="contact_input" /><br />
		<?php echo form_error('email'); ?>
	</div>
	 <div class="form_row">
		<label>No.&nbsp;Telepon:</label><input type="text" name="telp" size="25" class="contact_input" /><br />
		<?php echo form_error('telp'); ?>
	</div>                   
	<div class="form_row">
		<label>Pesan&nbsp; Tambahan:</label><textarea name="pesan" cols="40" class="contact_textarea"></textarea><br />
		<label></label><?php echo form_error('pesan'); ?>
	</div>
	<div class="form_row">
		<label>&nbsp;</label>
		<input type='submit' OnClick='Setujui()' id='simpan' name='simpan' value='Simpan' class=""/>
		|&nbsp; <a href='#' OnClick='history.back()'> < Back </a>
	</div>
<div style="clear:both"></div>
<div align="center">
	<div id="loading"></div>
</div>
</form>
</div>
<div style="clear:both;"></div>
<script>
	function Setujui(){
		document.getElementById('simpan').disabled = true;
		showloading();
	}
</script>