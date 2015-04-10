<label for="select-language"> </label>
<select id="select-language" onchange="window.location.href=this.value">
	<option value="">Pilih Kategori Barang</option>
	<?php
		$query = mysql_query("SELECT * FROM kategori ORDER BY kd_ktgr DESC");
		while($d = mysql_fetch_array($query)):
	?>
	<option value="<?php echo base_url()?>barang/perkategori/<?php echo $d['kd_ktgr'].'/'.$d['nm_ktgr']?>"><?php echo $d['nm_ktgr']?></option>
	<?php endwhile?>
</select>