<?php
if ($application->submitted == 2) {
  $this->extend('/Element/applications/application_pdf_view');
} else {
  $this->extend('/Element/applications/application_view');
}
?>

<?php $this->start('tabs'); ?>
    <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      Clinical Trials Registry</h3> 
<?php $this->end(); ?>
