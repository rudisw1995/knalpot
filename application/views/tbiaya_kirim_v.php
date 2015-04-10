<div class="box best-selling">
<h3><?php echo $title?></h3>
<table border="0" cellspacing="0">
<tbody>
<tr><td>
<table cellpadding="6" cellspacing="1" style="width:100%" class="cart">
<tr>
  <th>No.</th>
  <th>Kota Tujuan</th>
  <th>Biaya</th>
</tr>
<?php
	$i = $no+1;
	foreach($browse_biaya_kirim->result() as $bk):
?>
	<tr>
	  <td align='center'><?php echo $i++?></td>
	  <td style="text-align:left"><?php echo $bk->nm_kota?></td>
	  <td style="text-align:right"><?php echo rupiah($bk->biaya_krm); ?></td>
	</tr>
<?php endforeach; ?>
</table>
</td></tr>
</tbody>
</table>
</div>