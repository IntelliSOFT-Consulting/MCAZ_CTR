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

$cakeDescription = 'MCAZ CTR: ';
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

    <?= $this->Html->css('bootstrap/bootstrap.min', ['fullBase' => true]) ?>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <?= $this->Html->css('bootstrap/ie10-viewport-bug-workaround', ['fullBase' => true]) ?>

    <!-- Custom styles for this template -->
    <?= $this->Html->css('bootstrap/font-awesome.min', ['fullBase' => true]); ?>
    <?= $this->Html->css('jquery.datetimepicker', ['fullBase' => true]); ?>

    <!-- jquery UI -->
    <?= $this->Html->css('jquery-ui.min', ['fullBase' => true]) ?>
    <?= $this->Html->css('bootstrap/jumbotron', ['fullBase' => true]) ?>
    <?= $this->Html->css('vanilla', ['fullBase' => true]) ?>
</head>
<body>

    <?= $this->fetch('content') ?>

</body>

</html>
