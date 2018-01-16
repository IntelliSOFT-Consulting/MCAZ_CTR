<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?php
    $this->assign('Login', 'active');
?>
<div class="users form">
<?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username/email and password') ?></legend>
        <?= $this->Form->control('username', ['label' => 'Username/Email']) ?>
        <?= $this->Form->control('password') ?>

                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8"> 
                          <?= $this->Html->link('forgot password?', ['controller' => 'Users', 'action' => 'forgotPassword']) ?>
                      </div>
                    </div> 
    </fieldset>

    <div class="form-group"> 
        <div class="col-sm-offset-4 col-sm-8"> 
          <button type="submit" class="btn btn-primary active" id="login"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>
        </div> 
	</div>
    <?= $this->Form->end() ?>
</div>
