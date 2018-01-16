<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?php
    $this->assign('Login', 'active');
?>
<div class="users form">
    <h2>Forgot Password Reset</h2>
    <p>If you have forgotten your password, you can reset it here. Enter the email address you used to register and you will get an email with instructions on how to proceed.</p>
    <hr>
<?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <?= $this->Form->control('email', ['label' => 'Email']) ?>
    </fieldset>

    <div class="form-group"> 
        <div class="col-sm-offset-4 col-sm-8"> 
          <button type="submit" class="btn btn-primary active" id="login"> Submit</button>
        </div> 
	</div>
    <?= $this->Form->end() ?>
</div>
