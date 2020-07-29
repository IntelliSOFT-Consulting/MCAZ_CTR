<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<h1 class="page-header">Application Stage</h1>


<?= $this->Html->link('<i class="fa fa-list" aria-hidden="true"></i> Stages', ['controller' => 'Stages', 'action' => 'index'], array('escape' => false, 'class' => 'btn btn-primary')); ?> &nbsp;

<div class="row">
  <div class="col-xs-12">
    <dl class="dl-horizontal">
      <dt>Name</dt>
      <dd><?= h($stage->name) ?></dd>
     <dt scope="row"><?= __('Description') ?></dt>
        <dd><?= h($stage->description) ?></dd>
    </dl>
  </div>
</div>

