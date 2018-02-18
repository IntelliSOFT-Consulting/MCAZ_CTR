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
    <?= $this->Html->css('shared_styles') ?>
    <?= $this->Html->css('ctr-fix') ?>

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

    <nav class="navbar navbar-default navbar-fixed-top">
          
      <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- <a class="navbar-brand" href="/">MCAZ, Pharmacovigilance reporting system</a>        -->
          <!-- <a class="navbar-brand" href="/"> <img style="width: 190px;"  alt="Medicines Control Authourity of Zimbabwe" src="/img/mcaz_logo.png"></a> -->

          <?php if($this->request->session()->read('Auth.User')) { 
              echo $this->Html->link(
                  $this->Html->image("mcaz_logo.png", ["alt" => "Medicines Control Authourity of Zimbabwe"]),
                   ['controller' => 'Users', 'action' => 'dashboard', 'prefix' => $prefix],
                   ['escape' => false, 'class' => "navbar-brand"]
              );
            ?>
            <!--   <a class="navbar-brand" href="/users/home"> <img style="width: 190px;"  alt="Medicines Control Authourity of Zimbabwe" src="/img/mcaz_logo.png"></a>                   -->
          <?php    } else { ?>
              <a class="navbar-brand" href="/"> <img style="width: 190px;"  alt="Medicines Control Authourity of Zimbabwe" src="/img/mcaz_logo.png"></a>
          <?php     }       ?>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <!-- <li><a href="/"><i class="fa fa-home"></i> Home</a></li> -->
        <li class="<?php echo $this->fetch('Login') ?>">
                <?php
                    if($this->request->session()->read('Auth.User')) {
                        echo $this->Html->link('<i class="fa fa-home"></i> Home', array('controller' => 'Users', 'action' => 'dashboard', 'prefix' => $prefix) , 
                          array('escape' => false));                    
                    } else {
                        echo $this->Html->link('<i class="fa fa-home"></i> Home',
                            array('controller' => 'Pages', 'action' =>  'home', 'prefix' => $prefix) , array('escape' => false));
                    }
                ?>
        </li>
        <li class="<?php echo $this->fetch('News') ?>">
            <?= $this->Html->link('<i class="fa fa-bullhorn"></i> News', 
                ['controller' => 'Pages', 'action' =>  'news', 'prefix' => false] , ['escape' => false]); ?>
        </li>
        <li class="<?php echo $this->fetch('Faqs') ?>">
            <?= $this->Html->link('<i class="fa fa-question-circle"></i> FAQs', 
                ['controller' => 'Pages', 'action' =>  'faqs', 'prefix' => false] , ['escape' => false]); ?>
        </li>
        <li class="<?php echo $this->fetch('Reports') ?>">
            <?= $this->Html->link('<i class="fa fa-bar-chart"></i> Reports', 
                ['controller' => 'Reports', 'action' =>  'publicReports', 'prefix' => false] , ['escape' => false]); ?>
        </li>
        <li class="<?php echo $this->fetch('Contactus') ?>">
            <?= $this->Html->link('<i class="fa fa-envelope-o"></i> Contact us', 
                ['controller' => 'Feedbacks', 'action' =>  'add', 'prefix' => false] , ['escape' => false]); ?>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
            <li role="presentation" class="<?php echo $this->fetch('Login') ?>">
                <?php
                    //if($this->Session->read('Auth.User')) {
                    if($this->request->session()->read('Auth.User')) {
                        echo $this->Html->link('<i class="fa fa-user-circle"></i> '.$this->request->session()->read('Auth.User.email'),
                            array('controller' => 'users', 'action' => 'profile', 'prefix' => false) , array('escape' => false));                    
                    } else {
                        echo $this->Html->link('<i class="fa fa-sign-in"></i> Login',
                            array('controller' => 'users', 'action' =>  'login', 'prefix' => false) , array('escape' => false));
                    }
                ?>
            </li>
            <?php if($this->request->session()->read('Auth.User')) { ?>
                <li role="presentation">
                <?php
                        echo $this->Html->link('<i class="fa fa-sign-out"></i> Logout',
                        array('controller' => 'users', 'action' => 'logout',  'prefix' => false) , array('escape' => false));
                ?>
                </li>
            <?php } else { ?>
                <li class="<?php echo $this->fetch('Register') ?>">
                <?php
                        echo $this->Html->link('<i class="fa fa-edit"></i> Register',
                        array('controller' => 'users', 'action' => 'register', 'prefix' => false) , array('escape' => false));
                ?>
                </li>
            <?php } ?>
          </ul>
    </div><!-- /.navbar-collapse -->

        
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <div class="alert alert-error alertbrowser" style="display: none;">
          <button type="button" class="close"data-dismiss="alert">&times;</button>
            <strong>NOTE TO APPLICANT!</strong> Please use the latest versions of Firefox or Google Chrome for the best experience on this site.
        </div>
        <!-- <a href="/"> <img style="float:left; width: 190px; padding-top: 50px"  alt="Medicines Control Authourity of Zimbabwe" src="/img/mcaz_logo.png"></a> -->
        <h2 class="text-center">Medicines Control Authority of Zimbabwe</h2>
        <!-- <p class="text-center">SAE, ADR and AEFI electronic reporting. </p> -->
        <p class="lead" style="margin-bottom:10px; font-size:19px;">Clinical Trials Registry</p>
        <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p> -->
        <?php if($this->request->session()->read('Auth.User')) { ?>
            <p>
              <?php
                // echo $this->Html->link(
                //       '<i class="fa fa-file" aria-hidden="true"></i> My Reports &raquo;',
                //       ['controller' => 'Users', 'action' => 'dashboard', 'prefix' => $prefix],
                //       ['escape' => false,'class' => 'btn btn-info']
                //   );
              ?>
            </p>
        <?php    } else { ?>
            <p></p>
        <?php     }       ?>
      </div>
    </div>
    
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">   
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
        <?php 
          // Later come here to incldue the dashboard menu
            if($this->request->session()->read('Auth.User')) {
                if($this->request->session()->read('Auth.User.group_id') == '1') echo $this->element('menus/admin_menu') ;
                if($this->request->session()->read('Auth.User.group_id') == '2') echo $this->element('menus/manager_menu');
                if($this->request->session()->read('Auth.User.group_id') == '3') echo $this->element('menus/evaluator_menu');
                if($this->request->session()->read('Auth.User.group_id') == '4') echo $this->element('menus/applicant_menu');
            }
        ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
        <?= $this->Flash->render() ?>
                </div>
            </div>
        <?= $this->fetch('content') ?>
        </div>
      </div>

      <hr>

      
    </div> <!-- /container -->
    <footer class="footer">
        <div class="container">
            <p><i class="fa fa-copyright" aria-hidden="true"></i> <?= date('Y') ?> MCAZ, CTR.</p>
        </div>
    </footer>
    
    <script>
    $(function() {
        $('.mapop').popover();

        $('.tiptip').tooltip();

        $.browser = {};
        $.browser.msie = /msie/.test(navigator.userAgent.toLowerCase());
        if ($.browser.msie) {
              $('.alertbrowser').show();
        }
        /* Get browser */
        $.browser.chrome = /chrome/.test(navigator.userAgent.toLowerCase());

        /* Detect Chrome */
        if($.browser.chrome){
            /* Do something for Chrome at this point */
            /* Finally, if it is Chrome then jQuery thinks it's
               Safari so we have to tell it isn't */
            $.browser.safari = false;
        }

        /* Detect Safari */
        if($.browser.safari){
            /* Do something for Safari */
            $('.alertbrowser').show();
        }

      });

    </script>

  </body>

</html>
