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

<span class="label label-info <?= h($class) ?>"  onclick="this.classList.add('hidden');"><?= $message ?></span>
