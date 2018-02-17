<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<h1 class="page-header">PROFILE</h1>


<div class="row">
  <div class="col-md-6">
    <dl class="dl-horizontal">
      <dt>Name</dt>
      <dd><?= h($user->name) ?></dd>
     <dt scope="row"><?= __('Email') ?></dt>
        <dd><?= h($user->email) ?></dd>
     <dt scope="row"><?= __('Username') ?></dt>
        <dd><?= h($user->username) ?></dd>
     <dt scope="row"><?= __('Phone No') ?></dt>
        <dd><?= h($user->phone_no) ?></dd>
        <dt scope="row"><?= __('Group') ?></dt>
        <dd><?= $user->group->name ?></dd>
    </dl>
  </div>
  <div class="col-md-6">
    <dl class="dl-horizontal">
      <dt>Designation</dt>
      <dd><?= $user->has('designation') ? $this->Html->link($user->designation->name, ['controller' => 'Designations', 'action' => 'view', $user->designation->id]) : '' ?></dd>
      <dt scope="row"><?= __('name_of_institution') ?></dt>
      <dd><?= h($user->name_of_institution) ?></dd>
      <dt scope="row"><?= __('Institution Address') ?></dt>
        <dd><?= h($user->institution_address) ?></dd>
     <dt scope="row"><?= __('Institution Code') ?></dt>
        <dd><?= h($user->institution_code) ?></dd>
    </dl>
  </div>
</div>

<div class="row">
  <div class="col-md-offset-1 col-md-11">
    <?= $this->Html->link('<i class="fa fa-edit" aria-hidden="true"></i> Edit', ['controller' => 'Users', 'action' => 'edit', $user->id], array('escape' => false, 'class' => 'btn btn-info')); ?> &nbsp;
  </div>
</div>