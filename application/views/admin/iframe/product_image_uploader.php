<?php include('header.php');?>

<script type="text/javascript">

<?php if( $this->input->post('submit') ):?>
$(window).ready(function(){
	$('#iframe_uploader', window.parent.document).height($('body').height());	
});
<?php endif;?>

<?php if(!empty($file_name)) { foreach($file_name as $files):?>
	parent.add_product_image('<?php echo $files;?>');
<?php endforeach; } ?>

</script>

<?php if (!empty($error)): ?>
	<div class="alert alert-error">
		<a class="close" data-dismiss="alert">×</a>
		<?php echo $error; ?>
	</div>
<?php endif; ?>

<div class="row-fluid">
	<div class="span12">
		<?php echo form_open_multipart($this->config->item('admin_folder').'/product/product_image_upload', 'class="form-inline"');?>
			<?php echo form_upload(array('name'=>'userfile[]', 'multiple'=>'multiple', 'id'=>'userfile', 'class'=>'input-file'));?> <input class="btn" name="submit" type="submit" value="<?php echo 'Upload'; ?>" />
		</form>
	</div>
</div>

<style>

.container-fluid {
    padding: 10px 10px 15px;
    background-color: #000;
}
</style>
<?php include('footer.php');
