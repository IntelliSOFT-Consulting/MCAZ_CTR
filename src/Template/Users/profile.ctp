<?php
    $this->assign('Login', 'active');
?>
<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<h2 class="page-header text-center text-success"><?= (!empty($user->name)) ? $user->name : $user->email ; ?>'s profile</h2>


<div class="row">
  <div class="col-md-3">
    <p>Thank you for being a registered user.</p>

    <p>You may update your registration details within your profile or change your password</p>
  </div>
  <div class="col-md-4">
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
    <hr>
    <div class="row">
      <div class="col-md-offset-5 com-md-7">
        <?= $this->Html->link('<i class="fa fa-pencil-square" aria-hidden="true"></i> Edit', ['controller' => 'Users', 'action' => 'edit', $user->id], array('escape' => false, 'class' => 'btn btn-info')); ?> &nbsp;
      </div>
    </div>
    
  </div>
  <div class="col-md-5">
    <?= $this->Form->create() ?>
    <?php        
        echo $this->Form->control('old_password', ['type' => 'password', 'label' => 'Old Password <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]);
        echo $this->Form->control('password', ['label' => 'New Password <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]);
        echo $this->Form->control('confirm_password', ['type' => 'password', 'label' => 'Confirm Password <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]);  
    ?>
    <!-- <hr> -->
      <div class="form-group"> 
        <div class="col-sm-offset-4 col-sm-8"> 
          <button type="submit" class="btn btn-primary active" id="login"><i class="fa fa-edit" aria-hidden="true"></i> Change</button>
        </div> 
      </div>
    <?= $this->Form->end() ?>
  </div>
</div>

