<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?php 
  if(in_array($this->request->session()->read('Auth.User.group_id'), [1, 2, 3, 4, 5, 6, 7])) { ?> 
<?= $this->cell('Site::calendar'); ?>
<?php $this->assign('Calendar', 'active'); ?>

<?php } ?>