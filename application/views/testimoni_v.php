<head>
	<style>
	.textarea_guest{
		width:172px;
	}
	</style>
</head>
    <div class="block-title">
        <h3>Testimoni</h3>
    </div>
	<?php
		echo $this->pquery->form_remote_tag(array(
		'url'=>site_url('tamu/save'),
		'update'=>'#bukutamu',
		'id'=>'form',
		'type'=>'post'));
	?>
        <fieldset class="block-content">
		<legend></legend>
		<div class="input-box">
			Nama<br/><input type="text" class="input-text" name="nama"><br />
		</div>
		<div class="input-box">
			Alamat<br/><input type="text" class="input-text" name="alamat"><br />
			Pesan<textarea name="komentar" class='textarea_guest' cols="5"></textarea>
		</div>
		<?php
			echo form_submit('simpan','Kirim Pesan');
			echo form_close();
		?>
    </form>
	<div class="list-guest">
		<?php
			$sql_guest = "SELECT * FROM tamu WHERE tampil <> 0 ORDER BY id_tamu DESC LIMIT 5";
			$que_guest = mysql_query($sql_guest);
			while($dg = mysql_fetch_array($que_guest)):
				echo '<b><i>'.$dg['nama'].'</i></b> dari ';
				echo '<b>'.$dg['alamat'].'</b><br />';
				echo '&quot;'.$dg['komentar'].'&quot;'.'<br />
					<div style="margin-top:5px;border-top:1px dotted #efefef"></div>';
			endwhile;
		?>
	</div>
	</fieldset>
<div class="block-bottom"></div>