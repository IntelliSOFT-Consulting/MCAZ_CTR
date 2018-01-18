<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?php
  $this->extend('/Element/applications/finance_view');
?>

<?php $this->start('tabs'); ?>
    <!-- Nav tabs -->    
    <?= $this->Html->script('application_view', ['block' => true]); ?>
    <ul>
      <li><a href="#tabs-16">16. Financials</a></li>
      <li><a href="#tabs-17">17. Finance Approvals</a></li>
    </ul>
<?php $this->end(); ?>
