<?php
	$numb = 1;
?>
<style type="text/css">
  td {
    font-family: Georgia, "Times New Roman", Times, serif;
    font-size: 12px;
  }
</style>

    <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      Clinical Trials Registry</h3> 
      
    <h3 class="text-center">Quality Assessment Report</h3>
    <hr>

  <?= $this->element('pdf/common_header')?>


  <?= $this->element('applications/quality_reports') ?>

   