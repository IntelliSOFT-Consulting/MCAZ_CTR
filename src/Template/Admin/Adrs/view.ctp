<?php 
    echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF </button>', ['controller' => 'Adrs', 'action' => 'view', '_ext' => 'pdf', $adr->id], ['escape' => false]);
    echo $this->element('adrs/reporter_view');
?>
