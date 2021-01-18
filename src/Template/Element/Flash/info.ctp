<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<!-- <div class="message info"></div> -->

<div class="alert alert-info alert-dismissible fade in" role="alert" onclick="this.classList.add('hidden')"> 
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span></button> 
		<?= $message ?>
</div>