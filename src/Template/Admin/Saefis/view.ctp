<?php 
  echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </button>', ['controller' => 'Saefis', 'action' => 'view', '_ext' => 'pdf', $saefi->id], ['escape' => false]);
  echo $this->element('saefis/reporter_view');
?>