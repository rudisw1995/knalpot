<head>
<script> $(document).ready(function(){ stoploading(); }) </script>
</head>
<?php
	echo $this->pquery->form_remote_tag(array(
	'url'=>site_url('contact/save'),
	'update'=>'#contact_form',
	'id'=>'form',
	'type'=>'post'));
?>
<h2>Contact form</h2>
<div class="form_row">
	<label>Nama:</label><input type="text" name="nama" value="<?php echo $this->input->post('nama')?>" size="35" class="contact_input" /><br />
	<?php echo form_error('nama'); ?>
	<input type="hidden" name="kode" value="<?php echo $kode?>"/>
</div>
<div class="form_row">
	<label>Alamat:</label><input type="text" name="alamat" value="<?php echo $this->input->post('alamat')?>" size="48" class="contact_input" /><br />
	<?php echo form_error('nama'); ?>
</div>                    
<div class="form_row">
	<label>Email:</label><input type="text" name="email" value="<?php echo $this->input->post('email')?>" size="30" class="contact_input" />
	<div style="float:right; color:green">)* Informasi pemesanan, juga kami kirimkan melalui Email ini</div><br />
	<?php echo form_error('email'); ?>
</div>
 <div class="form_row">
	<label>No.&nbsp;Telepon:</label><input type="text" name="telepon" value="<?php echo $this->input->post('telepon')?>" class="contact_input" />
</div>                   
<div class="form_row">
	<label>Pesan:</label><textarea name="pesan" cols="39" class="contact_textarea"><?php echo $this->input->post('pesan')?></textarea><br />
	<?php echo form_error('pesan'); ?>
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
<script>
	function Setujui(){
		document.getElementById('simpan').disabled = true;
		showloading();
	}
</script>