  <ul class="nav nav-sidebar">
    <li class="<?php ($this->request->params['action'] == 'dashboard') ? 'active' : ''; ?>"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
    <li class="<?= $this->fetch('da') ?>">
      <?= $this->Html->link((string)$this->fetch('actv2').' ADRS', ['controller' => 'Sadrs', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
    </li>
    <li class="<?= $this->fetch('actv') ?>"><a href="#">Analytics</a></li>
    <li class="<?= $this->fetch('actv') ?>"><a href="#">Export</a></li>
  </ul>

  <!-- <i class="fa fa-hand-o-right" aria-hidden="true"></i> -->
<?php // echo $this->request->params['action']; ?>