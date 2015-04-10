<div class='b-selling'>
<h5>Cara Pembelian</h5>
<ol>
	<h3><li>1. Pilih Barang</li></h3>
	Menentukan model knalpot yang akan dipesan, dapat dilakukan via bbm/sms/phone atau anda dapat memilih barang yang ada pada website
	kami dengan mengklik tombol <font color ='brown'><b>Beli sekarang</b></font> pada masing-masing detail barang sesuai
	dengan model knalpot dan jenis kendaraan.
	
	<h3><li>2. Keranjang Belanja</li></h3>
	Barang yang anda pilih akan muncul pada halaman <font color='brown'><b>Keranjang Belanja</b></font>. Anda dapat memilih lagi barang
	yang ada diwebsite kami dengan mengklik link <font color='brown'><b>Pilih Barang</b></font>. Jika anda sudah selesai dalam memilih
	barang, selanjutnya anda dapat memilih link <font color='brown'><b>Selesai Memilih Barang</b></font> untuk melanjutkan ke form input
	identitas<br /><br />
	<h3><li>3. Masukkan Identitas Anda</li></h3>
	Setelah melakukan pemilihan barang, selanjutnya anda dapat memasukkan identitas dan melengkapi
	data-data anda untuk mempermudah kami dalam pengiriman barang yang anda pesan.<br /><br />
	<h3><li>4. Pembayaran</li></h3>
	Sebelum kami mengerjakan/mengirimkan barang yang anda pesan, terlebih dahulu anda harus membayar uang muka (DP) sebagai tanda jadi
	melalui <br />
	<?php
		$que = mysql_query("SELECT * FROM perusahaan");
		$d = mysql_fetch_array($que);
		echo '&nbsp; Bank : '.$d['bank'].'<br />';
		echo '&nbsp; No. Rekening : '.$d['no_rek'].'<br />';
		echo '&nbsp; Atas Nama: '.$d['atas_nm'].'<br />';
	?>
	Setelah anda mentransfer pembayaran uang muka (DP), harap anda menghubungi kami agar kami segera mengecek transaksi dari anda dan
	untuk selanjutnya memprosesnya. Sedangkan untuk pelunasan yaitu sisa pembayaran ditambahkan dengan ongkos kirim wajib dibayarkan
	setelah konsumen mendapat bukti-bukti pengiriman.<br /><br />
	<h3><li>5. Pengiriman Barang</li></h3>
	Kami akan segera mengirimkan barang pesanan anda ke alamat yang anda masukkan pada form identitas diri. Sebelum knalpot pesanan
	dibungkus dan dikirim, kami akan memfotokan kondisi knalpot beserta Nama+Alamat+No.Tlp pemesan untuk diperiksa kondisi knalpot dan
	alamat pengiriman yang dituju. Setelah diperiksa dan sepakat, knalpot kami bungkus dan kami kirimkan via TIKI/JNE/Pos/Travel. Untuk
	selanjutnya, kami akan menunjukkan seluruh bukti-bukti pengiriman kepada konsumen.
</ul>
</div>
<div style="clear:both;"></div>