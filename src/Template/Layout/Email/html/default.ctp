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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
	<title><?= $this->fetch('title') ?></title>
</head>
<body>
  <div align="center">
<br>
<table style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; width: 780px; border: 10px solid #2F1F50;" border="0" cellspacing="0" cellpadding="10" align="center" bgcolor="#FFFFFF">
  <tbody>
    <tr>
      <td style="font-family: Georgia, 'Times New Roman', Times, serif; font-size: 24px; color: #fff;" bgcolor="2F1F50">Medicines Control Authority of Zimbabwe</td>
    </tr>
    <tr>
      <td>
	 <?php echo $this->fetch('content');?>
      </td>
    </tr>
  </tbody>
</table>
</div>
</body>
</html>
