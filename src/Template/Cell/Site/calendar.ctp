<?= $this->Html->link('<i class="fa fa-file-code-o" aria-hidden="true"></i> Edit content', ['controller' => 'Sites', 'action' => 'calendar', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn btn-success')); ?> &nbsp;
<hr>

<?php
use Cake\Utility\Text;

echo Text::insert($site->content, ['calendar' => $this->element('comments/meeting_dates')])
?>

<?= $site->created ?>