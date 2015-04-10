<div class="block-title">
	<h3>Koleksi Kami</h3>
</div>
<div class="block-content">
	<ul>
	<?php
		$sql_koleksi = "SELECT kd_brg, nm_brg FROM barang ORDER BY kd_brg DESC LIMIT 5";
		$que_koleksi = mysql_query($sql_koleksi);
		while($d = mysql_fetch_array($que_koleksi)):
			echo '<ol>'.anchor('barang/detail/ecommerce/'.$d['kd_brg'],$d['nm_brg']).'</ol>';
		endwhile;
	?>
	</ul>
</div>
<div class="block-bottom"></div>
