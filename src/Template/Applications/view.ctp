<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?php
  $this->extend('/Element/applications/application_view');
?>


<?php $this->start('form-actions'); ?>
    <?= $this->Html->link('<i class="fa fa-list-ul" aria-hidden="true"></i> List Applications', ['action' => 'index', 'prefix' => false], array('escape' => false, 'class' => 'btn btn-success')); ?> &nbsp;
    <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'view', '_ext' => 'pdf', $application->id, 'prefix' => false], ['escape' => false, 'class' => 'btn btn-info active']);
              ?>

    <h2 class="page-header"><?= $application->protocol_no ?></h2>
    <h5><?= $application->version_no ?></h5>
    <h5><?= $application->date_of_protocol ?></h5>

<?php $this->end(); ?>

<?php $this->start('tabs'); ?>
    <!-- Nav tabs -->    
    
<?php $this->end(); ?>


<?php $this->start('endjs'); ?>


<?php $this->end(); ?>

