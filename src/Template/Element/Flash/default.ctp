<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<!-- <div class=""></div> -->

<!-- <span class="label label-info <?php // h($class) ?>"  onclick="this.classList.add('hidden');"><?php // $message ?></span> -->

<div class="alert alert-info alert-dismissible fade in" role="alert" onclick="this.classList.add('hidden')"> 
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span></button> 
		<?= $message ?>
</div>

