<div id="panel">	<?php echo anchor('admin/kategori','Browse kategori');?></div><div id="clear"></div><div id="box">	<h3 id="adduser">Tambah Kategori Barang</h3>	<?php echo form_open('admin/kategori/save','id="form"')?>	  <fieldset id="personal">		<legend> INPUT DATA KATEGORI</legend>		<label>Nama&nbsp;Kategori</label>		<input name="nm_ktgr" type="text" size="50"/>		<?php echo form_error('nm_ktgr')?>		<br />	  </fieldset>	  <div align="center">	  <input id="button1" type="submit" value="Simpan" tabindex="7" /> 	  <input id="button2" type="button" value="Batal" OnClick="history.back()" tabindex="8" />	  </div>	</form></div>