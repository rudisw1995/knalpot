<div id="panel">	<?php echo anchor('admin/pesan/laporan_detail/'.$this->uri->segment(4,0),'Laporan');?></div><div id="clear"></div><div id="box">	<h3 id="adduser">Detail Pesanan</h3>	<?php		echo form_open('admin/pesan/status','id="form"');		foreach($detail_pemesan as $do):	?>	<!--</?php echo form_open("admin/batik/save","id='form_masuk'"); ?>-->	  <fieldset id="personal">		<legend> Data Pemesan</legend>		<label>ID Pemesan</label><div>: <?php echo $do->id_pms?></div><br />		<label>Nama</label><div>: <?php echo $do->nm_pms?></div><br />		<label>Alamat</label><div>: <?php echo $do->alamat?></div><br />		<label>Email</label><div>: <?php echo $do->email?></div><br />		<label>Telepon</label><div>: <?php echo $do->telp?></div><br />		<!--<label>Status</label> 		<select name="status" class="required">			<option value='1'>Ada</option>			<option value='2'>Kosong</option>			<option value='3'>Dalam Proses Pembuatan</option>		</select>		<br />-->	  </fieldset>	<table width="100%">		<thead>			<tr>				<th><a href="#">No</a></th>				<th><a href="#">Foto Barang</a></th>				<th><a href="#">Kode</a></th>				<th><a href="#">Nama Barang</a></th>				<th><a href="#">Harga/Barang</a></th>				<th><a href="#">Jumlah</a></th>				<th><a href="#">Total Harga/Barang</a></th>			</tr>		</thead>		<tbody>		<?php			$total = 0; $i = 1; foreach($browse_pesan as $bo):			$no = $i++;		?>			<tr>				<td class="a-center"><?php echo $no.'.';?></td>				<td width="100"><?php					$atrimg = array('src'=>'asset/images/barang/thumbs/'.$bo->nama_field,'width'=>100);					echo img($atrimg);				?></td>				<td><?php $kdbiaya=$bo->kd_biaya_krm; echo $bo->kd_brg;?></td>				<td><?php echo $bo->nm_brg;?></td>				<td align="right"><?php echo rupiah($bo->harga); ?></td>				<td align="center"><?php echo $bo->jum_brg;?></td>				<td align="right">					<?php						$sub_jumlah = $bo->harga * $bo->jum_brg;						echo rupiah($sub_jumlah);					?>				</td>							</tr>		<?php			$total = $total+$sub_jumlah;			$status = $bo->status;			$total_brg = $no;			echo form_hidden('status', $status);			echo form_hidden('jum'.$no, $bo->jum_brg);			echo form_hidden('kd_brg'.$no, $bo->kd_brg);			echo form_hidden('no_psn', $bo->no_psn);			echo form_hidden('id_pms', $bo->id_pms);			endforeach;			echo form_hidden('total_brg', $total_brg);		?>			<tr>				<td align="right" colspan="6"><b>Biaya Pengiriman</b></td>				<td align="right">				<?php					$sql = "SELECT * FROM biaya_kirim WHERE kd_biaya_krm = ".$kdbiaya;					$que = mysql_query($sql);					while($dk = mysql_fetch_array($que)):						$biayakirim = $dk['biaya_krm'];						echo rupiah($biayakirim);					endwhile;				?>				</td>			</tr>			<tr>				<td colspan='6' align="right"><b>Total Harga</b></td>				<td align="right"><?php echo '<b>'.rupiah($total+$biayakirim).'</b>';?></td>			</tr>		</tbody>	</table>	  <div align="center">	  <?php		if($status == 'sedang diproses'){			echo '<input id="button1" type="submit" value="Setujui dan Kirim Barang"/>';			echo '<input name="batalpesan" id="button2" type="submit" value="Batalkan Pemesanan"/>';		}elseif($status == 'dikirim'){			echo '<input id="button1" type="submit" value="Berhasil Dikirim dan Selesai"/>';			echo '<input name="batalpesan" id="button2" type="submit" value="Batalkan Pemesanan"/>';		}	  ?>		  </div>	<?php endforeach; ?>	</form></div>