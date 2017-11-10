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

$cakeDescription = 'MCAZ PV: SAE, ADR and AEFI electronic reproting';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <?= $this->Html->meta('icon') ?>

    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>

    <?= $this->Html->css('bootstrap/bootstrap.min') ?>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <?= $this->Html->css('bootstrap/ie10-viewport-bug-workaround') ?>

    <!-- Custom styles for this template -->
    <?= $this->Html->css('bootstrap/jumbotron') ?>
    <?= $this->Html->css('bootstrap/font-awesome.min'); ?>
    <?= $this->Html->css('jquery.datetimepicker'); ?>

    <!-- jquery UI -->
    <?= $this->Html->css('jquery-ui.min') ?>
    <?= $this->Html->script('jquery/jquery') ?>
    <?= $this->Html->script('jquery/jquery-ui.min') ?>
    <?= $this->Html->script('jquery/jquery.datetimepicker.full.min') ?>

    <?= $this->Html->script('bootstrap/bootstrap.min'); ?>
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
 <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
          
      <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">MCAZ, Pharmacovigilance reporting system</a>          
        </div>
        <ul class="nav nav-pills navbar-right">
            <!-- <li role="presentation" class="active"><a href="#">Home</a></li>
            <li role="presentation"><a href="#">About</a></li>
            <li role="presentation"><a href="#">Contact</a></li> -->
            <li class="<?php echo $this->fetch('Login') ?>">
                <?php
                    //if($this->Session->read('Auth.User')) {
                    if($this->request->session()->read('Auth.User')) {
                        echo $this->Html->link('<i class="icon-user"></i> '.$this->request->session()->read('Auth.User.username'),
                            array('controller' => 'users', 'action' => 'profile', 'admin' => false,) , array('escape' => false));                    
                    } else {
                        echo $this->Html->link('<i class="icon-signin"></i> Login',
                            array('controller' => 'users', 'action' =>  'login', 'admin' => false) , array('escape' => false));
                    }
                ?>
            </li>
            <?php if($this->request->session()->read('Auth.User')) { ?>
                <li>
                <?php
                        echo $this->Html->link('<i class="icon-signout"></i> Logout',
                        array('controller' => 'users', 'action' => 'logout',  'admin' => false) , array('escape' => false));
                ?>
                </li>
            <?php } else { ?>
                <li class="<?php echo $this->fetch('Register') ?>">
                <?php
                        echo $this->Html->link('<i class="icon-edit"></i> Register',
                        array('controller' => 'users', 'action' => 'register', 'admin' => false) , array('escape' => false));
                ?>
                </li>
            <?php } ?>
          </ul>
        <!-- <div id="navbar" class="navbar-collapse collapse"> -->
          <!-- <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form> -->

        <!--</div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h2>Medicines Control Authourity of Zimbabwe</h2>
        <p>SAE, ADR and AEFI electronic reporting. <a href=""><?= $this->fetch('title') ?></a></p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>
    
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">   
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
      </div>

      <hr>

      <footer>
        <p>&copy; 2017 MCAZ, PV.</p>
      </footer>
    </div> <!-- /container -->

    
  </body>

</html>
