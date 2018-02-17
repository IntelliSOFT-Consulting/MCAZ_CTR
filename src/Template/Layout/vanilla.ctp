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

$cakeDescription = 'MCAZ CTR:';
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
    <?= $this->Html->meta('icon', 'img/mcaz_logo.ico', ['type' => 'icon']) ?>

    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>


    <!-- jquery UI -->
    <?= $this->Html->css('jquery-ui.min') ?>
    <?= $this->Html->script('jquery/jquery') ?>
    <?= $this->Html->script('jquery/jquery-ui') ?>
    <?= $this->Html->script('jquery/jquery.datetimepicker.full.min') ?>
    <?= $this->Html->script('jquery/js.cookie') ?>


    <?= $this->Html->css('bootstrap/bootstrap.min') ?>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <?= $this->Html->css('bootstrap/ie10-viewport-bug-workaround') ?>

    <!-- Custom styles for this template -->
    <?= $this->Html->css('bootstrap/font-awesome.min'); ?>
    <?= $this->Html->css('jquery.datetimepicker'); ?>

    <?= $this->Html->css('bootstrap/jumbotron') ?>
    <?= $this->Html->css('ctr-fix') ?>
    <?= $this->Html->css('vanilla') ?>


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
    
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">   
       <?= $this->fetch('content') ?>
      </div>

      <hr>

      
    </div> <!-- /container -->
    
  </body>

</html>
