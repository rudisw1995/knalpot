<style>
.j{ width:20px; border:none; }
</style>
<div id="main_content">
<?php
	if($this->cart->contents() == false){
		echo '<div class="alert">Anda Belum Memilih Barang Untuk Dibeli</div>';
	}else{
?>
<h2><?php echo $title?></h2>
<table cellpadding="6" cellspacing="1" style="width:100%" class="cart">
<tr>
  <th>#</th>
  <th>Kode</th>
  <th>Jumlah</th>
  <th>Nama Barang</th>
  <th style="text-align:right">Harga/Item</th>
  <th style="text-align:right">Sub-Total</th>
</tr>
<?php $i = 1; ?>
<?php foreach($this->cart->contents() as $items): ?>
	<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
	<tr>
	  <td align='center'><?php echo anchor('pesan/delete/'.$items['rowid'],'<b>X</b>')?></td>
	  <td align='center'><?php echo $items['id']?></td>
	  <td align='center'><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'class' => 'j')); ?> pcs</td>
	  <td>
		<?php echo $items['name']; ?>
			<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
				<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
					<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
				<?php endforeach; ?>
			<?php endif; ?>
	  </td>
	  <td style="text-align:right"><?php echo rupiah($items['price']); ?></td>
	  <td style="text-align:right"><?php echo rupiah($items['subtotal']); ?></td>
	</tr>

<?php $i++; ?>

<?php endforeach; ?>
<tr>
	<td colspan="4"></td>
	<td class="right" style="text-align:right"><strong>Total </strong>(<i>biaya barang</i>)</td>
	<td style="text-align:right"><?php echo rupiah($this->cart->total());?></td>
</tr>
<tr>
	<?php echo form_open('pesan/biaya_kirim','name="frmkota"')?>
	<td colspan="5" style="text-align:right">
	<b>Pilih Kota Tujuan</b>
	<select name="kd_biaya_krm" onchange="this.form.submit()">
	<option value="">Pilih Kota Tujuan</option>
	<?php foreach($browse_kota->result() as $bk):?>
	<option value="<?php echo $bk->kd_biaya_krm?>" <?php if($this->session->userdata('sesi_kotakirim') == $bk->kd_biaya_krm) echo ' selected'?>>
		<?php echo $bk->nm_kota?>
	</option>
	<?php endforeach ?>
	</select>
	</td>
	<td style="text-align:right">
	<?php echo rupiah($this->session->userdata('sesi_biayakirim'))?>
	</td>
	<?php echo form_close()?>
</tr>
<tr>
	<td colspan="5"><b>Total Biaya Keseluruhan</b> (<i>biaya barang + biaya kirim</i>)</td>
	<td style="text-align:right"><b>
	<?php
		echo $totalbayar = rupiah($this->session->userdata('sesi_biayakirim')+$this->cart->total());
		$this->session->set_userdata('sesi_totalbayar', $totalbayar);
	?>
	</b></td>
</tr>
</table>
<?php
	}
	echo "<div style='text-align:center'>";
		echo anchor(base_url(), 'Pilih Barang','class="best_link"');
		if($this->cart->contents() == true)
		echo ' | '.anchor('pemesan/add', 'Selesai Memilih Barang','class="best_link" onclick="return cekKota()"');
	echo "</div>";
?>
</div><!--end of right content-->
<div style=" clear:both;"></div>
<script language="javascript">
	function tanya(){
		if(confirm('Konfirmasi\nTekan OK Untuk Melanjutkan Pembatalan Barang')){
			return true;
		}else{
			return false;
		}
	}
	function cekKota(){
		// if(document.frmkota.kd_biaya_krm.value = ""){
			// alert('PERINGATAN\nAnda Belum Memilih Kota Tujuan Pengiriman');
			// return false;
		// }
	}
</script>