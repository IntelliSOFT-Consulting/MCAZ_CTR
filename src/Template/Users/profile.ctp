<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php
    $this->assign('Login', 'active');
?>
<!-- <div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-4">.col-md-4</div>
      <div class="col-md-8">.col-md-8</div>
    </div>
  </div>
</div> -->

<div class="row">
  <div class="col-md-12">
    <h3><?= h($user->name) ?></h3>
    <dl class="dl-horizontal">
      <dt scope="row"><?= __('Username') ?></dt>
      <dd><?= h($user->username) ?></dd>
      <dt scope="row"><?= __('Name') ?></dt>
        <dd><?= h($user->name) ?></dd>
     <dt scope="row"><?= __('Email') ?></dt>
        <dd><?= h($user->email) ?></dd>
        <dt scope="row"><?= __('Group') ?></dt>
        <dd><?php //echo $user->has('group') ? $this->Html->link($user->group->name, ['controller' => 'Groups', 'action' => 'view', $user->group->id]) : '' ?>
          <?= $user->group->name ?>
        </dd>
        <dt scope="row"><?= __('Phone No') ?></dt>
            <dd><?= h($user->phone_no) ?></dd>
    </dl>
  </div>
</div>

