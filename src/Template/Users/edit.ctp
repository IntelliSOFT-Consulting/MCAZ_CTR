<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?php
    $this->assign('Login', 'active');
?>

<div class="row">
    <div class="col-md-12">
        <?= $this->Html->link('<i class="fa fa-backward" aria-hidden="true"></i> Back to profile', ['controller' => 'Users', 'action' => 'profile', $user->id], array('escape' => false, 'class' => 'btn btn-info')); ?> &nbsp;

        <div class="page-header">
            <div class="styled_title"><h1>Update Details </h1></div>
        </div>
        <?= $this->Flash->render() ?>

    <?= $this->Form->create($user, ['type' => 'file']) ?>

    <div class="row">
        <h5 class="text-center"><small><em>fields marked with <span class="sterix fa fa-asterisk" aria-hidden="true"></span> are required!!</em></small></h5>
        <div class="col-md-6">
            <?php
                echo $this->Form->control('name', ['label' => 'Name', 'escape' => false]);
                echo $this->Form->control('email', ['label' => 'Email', 'escape' => false]);
                  
                if($this->request->session()->read('Auth.User.group_id') != 4) {
                    echo "<label>Kindly attach digital signature</label>";
                    echo $this->Form->control('file', ['type' => 'file', 'label' => 'Signature!']);
                    //echo $this->Html->image(substr($user->dir, 8) . '/' . $user->file);
                    echo "<img src='".$this->Url->build(substr($user->dir, 8) . '/' . $user->file, true)."' style='width: 70%;' alt=''>";
                } 
            ?>
        </div><!--/span-->
        <div class="col-md-6">
            <?php
                echo $this->Form->control('username');
                echo $this->Form->control('phone_no');  
                ?>
        </div><!--/span-->
    </div><!--/row-->
     <hr>
      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10"> 
          <button type="submit" class="btn btn-success active" id="login"><i class="fa fa-save" aria-hidden="true"></i> Update</button>
        </div> 
    </div>
     <?= $this->Form->end() ?>
    </div>
</div>

