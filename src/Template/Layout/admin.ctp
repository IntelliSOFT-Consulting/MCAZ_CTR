<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'MCAZ CTR';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <?= $this->Html->meta('icon', 'img/mcaz_logo.ico', ['type' => 'icon']) ?>

    <title>
      <?= $cakeDescription ?>:
      <?= $this->fetch('title') ?>
    </title>

    <!-- Bootstrap core CSS -->
    <?= $this->Html->css('bootstrap/bootstrap.min') ?>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <?= $this->Html->css('bootstrap/ie10-viewport-bug-workaround') ?>

    <!-- Custom styles for this template -->
    <?= $this->Html->css('bootstrap/font-awesome.min'); ?>
    <?= $this->Html->css('jquery.datetimepicker'); ?>
    <?= $this->Html->css('bootstrap/dashboard') ?>

    <!-- jquery UI -->
    <?= $this->Html->css('jquery-ui.min') ?>
    <?= $this->Html->script('jquery/jquery') ?>
    <?= $this->Html->script('jquery/jquery-ui') ?>
    <?= $this->Html->script('jquery/jquery.datetimepicker.full.min') ?>
    <?= $this->Html->script('jquery/js.cookie') ?>
    
    <?= $this->Html->css('ctr-fix') ?>
    <?= $this->Html->css('shared_styles') ?>
    <?= $this->Html->css('admin') ?>
    <?php // $this->Html->css('bootstrap/jumbotron') ?>
    <?= $this->Html->script('jquery/jquery') ?>
    <?= $this->Html->script('jquery/jquery-ui.min') ?>
    <?= $this->Html->script('jquery/jquery.datetimepicker.full.min') ?>

    <?= $this->Html->script('bootstrap/bootstrap.min'); ?>
    <?= $this->Html->script('bootstrap/holder.min'); ?>
    <?= $this->Html->script('bootstrap/ie10-viewport-bug-workaround'); ?>    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
  </head>

  <body style="background: url("/img/cream_dust.png") repeat scroll 0% 0% transparent;">
    <nav class="navbar navbar-inverse navbar-<?= $prefix ?> navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php
              if($this->request->session()->read('Auth.User')) {
                $icon = "ravelry";
                $val = ($prefix == 'director_general') ? 'Manager Authorization' : $prefix ;
                if($prefix == "finance") $icon = "money";
                  echo $this->Html->link('<i class="fa fa-'.$icon.'" aria-hidden="true"></i> MCAZ CTR '.$val.' <small>(restricted)</small>',
                      array('controller' => 'users', 'action' => 'dashboard', 'prefix' => $prefix, 'plugin' => false) , array('escape' => false, 'class' => 'navbar-brand'));                    
              } else {
                  echo $this->Html->link('<i class="fa fa-ravelry" aria-hidden="true"></i> MCAZ CTR '.$prefix.' <small>(restricted)</small>',
                      array('controller' => 'pages', 'action' =>  'home', 'prefix' => false, 'plugin' => false ) , array('escape' => false, 'class' => 'navbar-brand'));
              }
          ?>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <?= $this->Html->link('<i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard', ['controller' => 'Users', 'action' => 'dashboard', 'prefix' => $prefix], array('escape' => false)); ?>
            </li>
            <li><a href="#"><i class="fa fa-wrench" aria-hidden="true"></i> Settings</a></li>
            <li><!-- <a href="#">Profile</a> -->
                <?php
                    //if($this->Session->read('Auth.User')) {
                    if($this->request->session()->read('Auth.User')) {
                        echo $this->Html->link('<i class="fa fa-user-circle"></i> '.$this->request->session()->read('Auth.User.email'),
                            array('controller' => 'users', 'action' => 'profile', 'prefix' => false, 'plugin' => false ,) , array('escape' => false));                    
                    } else {
                        echo $this->Html->link('<i class="fa fa-smile-o"></i> Login',
                            array('controller' => 'users', 'action' =>  'login', 'prefix' => false, 'plugin' => false ) , array('escape' => false));
                    }
                ?>
            </li>
            <li>
              <?= $this->Html->link('<i class="fa fa-sign-out" aria-hidden="true"></i> Logout', ['controller' => 'Users', 'action' => 'logout', 'prefix' => false, 'plugin' => false ], array('escape' => false)); ?>
            </li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid  nav-<?= $prefix ?>">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php 
            echo $this->fetch('sidebar');             
            if ($this->request->params['controller'] == 'Logs') {
              echo $this->cell('SideBar');
            }
          ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <?= $this->Flash->render() ?>
          <?= $this->fetch('content') ?>
          
        </div>
      </div>

    </div>



    <script>
    $(function() {
        $('.mapop').popover();

        $('.tiptip').tooltip();

      });

    </script>

  </body>
</html>
