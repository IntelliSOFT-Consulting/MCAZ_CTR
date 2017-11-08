<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<!-- <div class="message success"></div> -->
<span class="label label-success " onclick="this.classList.add('hidden')"><?= $message ?></span>
