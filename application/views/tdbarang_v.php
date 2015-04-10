<div class="bottom-callout"></div>
<!--<div class="listing-type-grid  block">-->
<div class="clear_both"></div>
<h3>Detail Produk</h3>
<div class="one-selling">
	<table border="0" cellspacing="0">
	<tbody>
		<?php echo form_open('pesan/choose'); foreach($detail_barang as $bth){?>
		<tr class="odd">
		<td colspan='3'>
			<?php
				$arr_img = array(
					'src' => 'asset/images/barang/'.$bth->nama_field
				);
				echo anchor('barang/detail/ecommerce/'.$bth->kd_brg, img($arr_img));
			?>
			<div class="clear"></div>
		</td>
		</tr>
		<tr class="odd">
			<td width='80' colspan="2"><b>Jumlah Pesanan</b> <input type="text" style="padding:1px;margin:4px;" size="2" name="jumlah"/></td>
			<td rowspan='2'><?php echo form_submit('cmdBeli','Beli sekarang','class="button-buy"');?></td>
		</tr>
		<tr class="odd">
			<td>Kode Barang</td><td>:
				<?php echo $bth->kd_brg?>
			</td>
		</tr>
		<tr class="odd">
			<td>Nama Barang</td><td>:
			<?php
				echo form_hidden('nama', $bth->nm_brg);
				echo form_hidden('kode', $bth->kd_brg);
				echo $bth->nm_brg
			?>
			</td>
		</tr>
		<tr class="odd">
			<td>Harga</td><td>: <?php echo form_hidden('harga',$bth->harga); echo rupiah($bth->harga)?></td>
		</tr>		
		<tr class="odd">
			<td>Bahan</td><td>: <?php echo $bth->bahan?></td>
		</tr>
		<tr class="odd">
			<td>Ketarangan</td><td colspan="2">: <?php echo $bth->keterangan?></td>
		</tr>
		<?php } echo form_close(); ?>
		</tbody>
	</table>
<script type="text/javascript">decorateTable('products-grid-table')</script>
<div class="bottom-callout"></div>
</div>