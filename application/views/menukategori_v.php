<?php
	echo '<ul id="theMenu_acc">';
	$query = mysql_query("SELECT * FROM kategori ORDER BY kd_ktgr DESC");
	while($d = mysql_fetch_array($query)):
		echo '<li class="first">'.anchor('barang/perkategori/'.$d['kd_ktgr'].'/'.$d['nm_ktgr'],$d['nm_ktgr'],'class="main-cate"').'</li>';
	endwhile;
	echo '</ul>';
?>