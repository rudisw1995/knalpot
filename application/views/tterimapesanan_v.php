<head>
<!-- UNTUK JQUERY -->
<script src="<?php echo base_url();?>asset/js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>asset/js/loading.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>asset/js/app.js" type="text/javascript"></script>
<!-- END JQUERY APP -->
<script type='text/javascript'>
	function show(page,div){
	showloading();
	do_scroll(0);
	var site = "<?php echo site_url()?>";
	$.ajax({
	  url: site+"/"+page,
	  success: function(response){			
		$(div).html(response);
	  },
	  dataType:"html"
	});
	return false;
	}
	function load(page,div){
	do_scroll(0);
	var site = "<?php echo site_url()?>";
	$.ajax({
	  url: site+"/"+page,
	  success: function(response){			
	  $(div).html(response);
	  },
	dataType:"html"  		
	});
	return false;
	}
</script>
</head>
<div id="left_content">
	<h2>Batik Model</h2>
<?php foreach($browse_related as $br):?>
	<div class="news">
		<div class="news_content">
			<span><?php echo $br->nama?></span><br />
			<?php
				$atrimg = array(
					'src' => 'asset/images/batik/thumbs/'.$br->foto,
					'align' => 'left',
					'class' => 'smallthumb'
				);
				echo anchor('batik/detail/katalogbatik/'.$br->foto,img($atrimg));
				echo '<div class="box-det-keterangan">
						<span class="special_icon">'.img("asset/themes/".$br->sifat."_icon.gif").'</span>';
				echo 'Kode : '.$br->kode.'<br />'.
					'Harga : '.$br->harga.'<br />'.
					'Status : '.$br->status.'<br />'.
					$br->keterangan.'</div>';
			?>
		</div>
	</div>
	<div class="line"></div>   
<?php endforeach; ?>  
</div><!--end of left content-->
<div id="right_content">
<h2>Pesan Langsung Ke Produsen</h2>
Kami adalah produsen batik dari pekalongan yang siap melayani anda dalam pengadaan batik. Anda dapat memesan langsung ke kami diantaranya :
<ol>
	<h3><li>Seragam Kantor</li></h3>
	<h3><li>Seragam Pernikahan</li></h3>
	<h3><li>Seragam Keluarga</li></h3>
	<h3><li>Bahan Batik</li></h3>
	<h3><li>Blus Batik</li></h3>
	<h3><li>Hem Batik</li></h3>
	<h3><li>Pakaian Muslim</li></h3>
	<h3><li>Dan lain sebagainya</li></h3>
</ul>
Kami juga menerima pembelian secara grosir. Untuk pembelian barang grosir, kami menyediakan diskon khusus. Dan minimal pembelian grosir
adalah 1 kodi(20 potong)
</div><!--end of right content-->
<div style="clear:both;"></div>