<ul class="menu" id="menu">
	<li class="bg-home active">
		<?php
			$img = img('asset/images/theme/home.gif');
			echo anchor(base_url(),$img,'class="active-bghome"');
		?>
	</li>
	<li onmouseover="toggleMenu(this,1)" onmouseout="toggleMenu(this,0)" class="level0 nav-1 parent">
		<?php echo anchor("barang/carabeli","<span>Cara Pembelian</span>")?>
	</li>	
	<li onmouseover="toggleMenu(this,1)" onmouseout="toggleMenu(this,0)" class="level0 nav-1 parent">
		<?php echo anchor("perusahaan/about_us","<span>Tentang Kami</span>")?>
	</li>
</ul>
<div class="clear_both"><span> </span></div>
<script language="javascript">
	function oke(){
		alert("Hubungi : Mas GTT Cukup\nNo HP : 085228500272");
		alert("Terimakasih Telah Lihat-lihat Koleksi Kami... ;)");
		return false;
	}
</script>