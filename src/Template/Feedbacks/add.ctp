<?php
$this->loadHelper('Captcha.Captcha');
$this->assign('Contactus', 'active');
?>
<div class="row">
    <div class="col-md-4">
        <?= $this->cell('Site::contactus'); ?>
    </div>
    <div class="col-md-8">      
        <?= $this->Form->create($feedback) ?>
            <?php
                echo $this->Form->control('email', ['value' => $this->request->session()->read('Auth.User.email')]);
                echo $this->Form->control('subject');
                echo $this->Form->control('feedback', ['label' => 'Message']);
                echo $this->Captcha->render(['placeholder' => __('Please solve the riddle')]);
            ?>

        <div class="form-group"> 
            <div class="col-sm-offset-4 col-sm-8"> 
            <button type="submit" class="btn btn-primary active" id="login"><i class="fa fa-plus" aria-hidden="true"></i> Submit</button>
            </div> 
        </div>
        <?= $this->Form->end() ?>    
    </div>
</div>
