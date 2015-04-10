<?php echo form_open('barang/search_first','id="search_mini_form"')?>
<fieldset class="form-search">
	<div class="mw_search"> 
	<input type='submit' value='Cari' />
	<input autocomplete="off" id="search" class="input-text" name="txt_general"
		value="<?php echo $this->session->userdata('sesi_generalsearch')?>" type="text">    
	<div style="display: none;" id="search_autocomplete" class="search-autocomplete"></div>
	<script type="text/javascript">
	//<![CDATA[
		var searchForm = new Varien.searchForm('search_mini_form', 'search', 'Search');
		searchForm.initAutocomplete('<?php echo base_url()?>', 'search_autocomplete');
	//]]>
	</script>
	<div class="clear_both"><span> </span></div>
	</div>
</fieldset>
<?php echo form_close()?>