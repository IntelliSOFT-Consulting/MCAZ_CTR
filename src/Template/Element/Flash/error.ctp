<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<!-- <div class="message error" onclick="this.classList.add('hidden');"></div> -->
<span class="label label-danger" onclick="this.classList.add('hidden');"><?= $message ?></span>

