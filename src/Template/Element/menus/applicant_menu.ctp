<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Applicant Menu::</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse">
      <!-- <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
      </ul> -->
      <ul class="nav navbar-nav">
        <li class="<?php echo $this->fetch('Dashboard') ?>">
          <?php
            echo $this->Html->link('<i class="fa fa-dashboard"></i> Dashboard',
            array('controller' => 'Users', 'action'=>'dashboard', 'prefix' => $prefix ), array('escape' => false ));
              ?>
         </li>
         <li class="<?php echo $this->fetch('MyApplications') ?>">
          <?php
            echo $this->Html->link('<i class="fa fa-files-o"></i> My Applications',
              array('controller' => 'Applications', 'action'=>'index', 'prefix' => $prefix ), array('escape' => false ));
              ?>
         </li>
         <li class="<?php echo $this->fetch('MyMessages') ?>">
          <?php
            echo $this->Html->link('<i class="fa fa-comment-o"></i> My Messages',
              array('controller' => 'Notifications', 'action'=>'index', 'prefix' => $prefix ), array('escape' => false ));
              ?>
         </li>
         <li class="<?php echo $this->fetch('FeesSchedule') ?>">
          <?php
            echo $this->Html->link('<i class="fa fa-money"></i> Fees Schedule',
              array('controller' => 'Pages', 'action'=>'fees', 'prefix' => false ), array('escape' => false ));
              ?>
         </li>
         <li class="<?php echo $this->fetch('Profile') ?>">
          <?php
            echo $this->Html->link('<i class="fa fa-user"></i> My Profile',
              array('controller' => 'users', 'action'=>'profile', 'prefix' => false ), array('escape' => false ));
              ?>
         </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
