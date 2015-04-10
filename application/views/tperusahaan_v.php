<div class="box best-selling">
	<h3>Profil Kami</h3>
	<div class="perusahaan-one">
	<?php foreach($browse_perusahaan as $bp):?>
	<table border="0" cellspacing="0" class="left_table">
	<tbody>
		<tr>
		<th>
			<h2 style="padding:10px;"><?php echo $bp->nama_perus?></h2>
		</th>
		<tr>
			<td>Alamat</td><td>: <?php echo $bp->alamat_perus?></td>
		</tr>
		<tr>
			<td>No. Telepon</td><td>: <?php echo $bp->no_telp?></td>
		</tr>
		<tr>
			<td>Email</td><td>: <?php echo $bp->email?></td>
		</tr>
		<tr>
			<td colspan="2">
				<?php echo $bp->about?>
			</td>
		</tr>
		<tr>
			<td>Bank</td><td>: <?php echo $bp->bank?></td>
		</tr>
		<tr>
			<td>No. Rekening</td><td>: <?php echo $bp->no_rek?></td>
		</tr>
		<tr>
			<td>Atas Nama</td><td>: <?php echo $bp->atas_nm?></td>
		</tr>
	</tbody>
	</table>
	<?php endforeach ?>
	</div>
    <script type="text/javascript">decorateTable('products-grid-table')</script>
    <div class="bottom-callout"></div>
</div>