<div class="top-callout"></div>
<script src="<?php echo base_url()?>asset/css/jquery.js" type="text/javascript"></script>
<div class="bottom-callout"></div>
<!--<div class="listing-type-grid  block">-->
<div class="clear_both"></div>
<?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'?>
<div class="box best-selling">
	<h3>Galeri Produk</h3>
			<table border="0" cellspacing="0">
			<tbody>
				<tr class="odd">
				<?php $x=1; foreach($browse_thumbs as $bth){?>
				<td>
					<?php
						$arr_img = array(
							'src' => 'asset/images/barang/thumbs/'.$bth->nama_field
						);
						echo anchor('barang/detail/ecommerce/'.$bth->kd_brg.'/'.$bth->nm_brg, img($arr_img));
						echo '<div class="product-description"><h5>'.anchor('barang/detail/ecommerce/'.$bth->kd_brg,$bth->nm_brg).'</h5>';
						echo '</div>';
					?>
					<div class="clear"></div>
				</td>
				<?php
					$j= $x++;
					if($j % 3 == 0) echo "<tr class='odd'>";
					}
				?>
				</tr>
			</tbody>
			</table>
    <script type="text/javascript">decorateTable('products-grid-table')</script>
    <div class="bottom-callout"></div>
	<?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'?>
</div>