<?php $this->start('sidebar'); ?>
  <ul class="nav nav-sidebar">
    <li><?= $this->Html->link('Overview', ['controller' => 'Users', 'action' => 'dashboard', 'prefix' => $prefix], array('escape' => false)); ?></li>
    <li>
      <?= $this->Html->link('ADRS', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
    </li>
    <li>
      <?= $this->Html->link('AEFIS', ['controller' => 'Aefis', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
    </li>
    <li>
      <?= $this->Html->link('SAEFIS', ['controller' => 'Saefis', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
    </li>
    <li>
      <?= $this->Html->link('SAES', ['controller' => 'Adrs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
    </li>
    <li class="active">
      <?= $this->Html->link('USERS', ['controller' => 'Users', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
    </li>
  </ul>
<?php $this->end(); ?>

<?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> Users', ['controller' => 'Users', 'action' => 'Add', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn btn-primary')); ?>
<hr>
<h1 class="page-header">USERS</h1>

<?= $this->Form->create($user) ?>

<div class="row">
    <div class="col-md-6">
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('email');
            echo $this->Form->control('phone_no');
            echo $this->Form->control('group_id', ['options' => $groups]);
        ?>
    </div><!--/span-->
    <div class="col-md-6">
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('confirm_password', ['type' => 'password']);
            echo $this->Form->control('is_active', ['type' => 'hidden', 'value' => 1]);
            //echo $this->Form->control('is_admin');
        ?>
    </div><!--/span-->
</div><!--/row-->
<hr>
<div class="row">
    <?= $this->Form->button(__('Submit')) ?>
</div>
     <?= $this->Form->end() ?>
