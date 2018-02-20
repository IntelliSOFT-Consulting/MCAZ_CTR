<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?php 
  if($this->request->session()->read('Auth.User.group_id') >= 1 and $this->request->session()->read('Auth.User.group_id') <= 3) { ?> 
<?= $this->cell('Site::calendar'); ?>
<?php $this->assign('Calendar', 'active'); ?>

<?php } ?>