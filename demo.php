<?php
	$field   = get_field( 'title' ) ?: 'Text not set';
	$wrapper = $is_preview ? '' : get_block_wrapper_attributes();
?>
<div <?php echo $wrapper; ?>>
	<h3><?php echo $field; ?></h3>
</div>
