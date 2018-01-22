<?php
     foreach ($application_stats as $key => $value) {
        $stats[$value['status']] = $value['count'];
     }

     $Submitted = isset($stats['Submitted']) ? '<small class="badge badge-sadr pull-right">'. $stats['Submitted'] .'</small>' : '' ;
     $Reviewed = isset($stats['Reviewed']) ? '<small class="badge badge-sadr pull-right">'. $stats['Reviewed'] .'</small>' : '' ;
     $UnSubmitted = isset($stats['UnSubmitted']) ? '<small class="badge badge-sadr pull-right">'. $stats['UnSubmitted'] .'</small>' : '' ;
     $Archived = isset($stats['Archived']) ? '<small class="badge badge-sadr pull-right">'. $stats['Archived'] .'</small>' : '' ;
     $Approved = isset($stats['Approved']) ? '<small class="badge badge-sadr pull-right">'. $stats['Approved'] .'</small>' : '' ;
     $Rejected = isset($stats['Rejected']) ? '<small class="badge badge-sadr pull-right">'. $stats['Rejected'] .'</small>' : '' ;
     $Assigned = isset($stats['Assigned']) ? '<small class="badge badge-sadr pull-right">'. $stats['Assigned'] .'</small>' : '' ;
     $Evaluated = isset($stats['Evaluated']) ? '<small class="badge badge-sadr pull-right">'. $stats['Evaluated'] .'</small>' : '' ;
     $Committee = isset($stats['Committee']) ? '<small class="badge badge-sadr pull-right">'. $stats['Committee'] .'</small>' : '' ;
     $FollowUp = isset($stats['FollowUp']) ? '<small class="badge badge-sadr pull-right">'. $stats['FollowUp'] .'</small>' : '' ;
     $RequestReporter = isset($stats['RequestReporter']) ? '<small class="badge badge-sadr pull-right">'. $stats['RequestReporter'] .'</small>' : '' ;
     $ReporterResponse = isset($stats['ReporterResponse']) ? '<small class="badge badge-sadr pull-right">'. $stats['ReporterResponse'] .'</small>' : '' ;
     $ncount = isset($ncount) ? '<small class="badge pull-right">'. $ncount .'</small>' : '' ;
  ?>
  <ul class="nav nav-sidebar nav-<?= $prefix ?>">
    <li class="<?=  ($this->request->params['action'] == 'dashboard') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-home" aria-hidden="true"></i> &nbsp; Overview', ['controller' => 'Users', 'action' => 'dashboard', 'prefix' => $prefix], array('escape' => false)); ?>      
    </li>

    <li class="<?=  ($this->request->params['controller'] == 'Applications') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-file" aria-hidden="true"></i> &nbsp; PROTOCOLS', ['controller' => 'Applications', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
        <!-- Manager or evaluator -->
        <?php if (($prefix == 'manager' || $prefix == 'evaluator') && $this->request->params['controller'] == 'Applications' ) { ?>
          <ul class="nav van-<?= $prefix ?>">
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Submitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Submitted '.$Submitted, ['controller' => 'Applications', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Submitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Assigned') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Assigned '. $Assigned , ['controller' => 'Applications', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Assigned'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Reviewed') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Reviewed '. $Reviewed , ['controller' => 'Applications', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Reviewed'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Committee') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Committee '. $Committee , ['controller' => 'Applications', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Committee'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'RequestReporter') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Request <small>(Rpt)</small> '. $RequestReporter , ['controller' => 'Applications', 'action' => 'index', 'prefix' => $prefix, 'status' => 'RequestReporter'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'ReporterResponse') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Request <small>(response)</small> '. $ReporterResponse , ['controller' => 'Applications', 'action' => 'index', 'prefix' => $prefix, 'status' => 'ReporterResponse'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Approved') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Approved '. $Approved , ['controller' => 'Applications', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Approved'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Rejected') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Rejected '. $Rejected , ['controller' => 'Applications', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Rejected'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'UnSubmitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Unsubmitted '. $UnSubmitted , ['controller' => 'Applications', 'action' => 'index', 'prefix' => $prefix, 'status' => 'UnSubmitted'], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Archived') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Archived '. $Archived , ['controller' => 'Applications', 'action' => 'index', 'prefix' => $prefix, 'status' => 'Archived'], array('escape' => false)); ?> </li>
            <li class="<?=  ($this->request->params['controller'] == 'Applications' && $this->request->params['action'] == 'restore') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> Restore deleted <small class="badge badge-sadr pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i></small>', ['controller' => 'Applications', 'action' => 'restore', 'prefix' => $prefix], array('escape' => false)); ?> </li>
          </ul>
        <?php } ?>
    </li>    
    <li class="<?=  ($this->request->params['controller'] === 'Reports') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-bar-chart" aria-hidden="true"></i> &nbsp;REPORTS', ['controller' => 'Users', 'action' => 'dashboard'], array('escape' => false)); ?>
      <?php if (($prefix == 'manager' || $prefix == 'evaluator') && ($this->request->params['controller'] === 'Reports')) { ?>
          <ul class="nav van-<?= $prefix ?>">
            <li class="<?= ($this->request->params['action'] == 'sadrsPerProvince') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Sadr Per Province ', ['controller' => 'Reports', 'action' => 'sadrsPerProvince', 'prefix' => false], array('escape' => false)); ?> 
            </li>
            <li class="<?= ($this->request->params['action'] == 'sadrsPerYear') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Sadr Per Year ', ['controller' => 'Reports', 'action' => 'sadrsPerYear', 'prefix' => false], array('escape' => false)); ?> 
            </li>
            <li class="<?= ($this->request->params['action'] == 'sadrsPerCausality') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Sadr Per Causality ', ['controller' => 'Reports', 'action' => 'sadrsPerCausality', 'prefix' => false], array('escape' => false)); ?> 
            </li>
            <li class="<?= ($this->request->params['action'] == 'aefisPerProvince') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Aefis Per Province ', ['controller' => 'Reports', 'action' => 'aefisPerProvince', 'prefix' => false], array('escape' => false)); ?> 
            </li>
            <li class="<?= ($this->request->params['action'] == 'aefisPerYear') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Aefis Per Year ', ['controller' => 'Reports', 'action' => 'aefisPerYear', 'prefix' => false], array('escape' => false)); ?> 
            </li>
          </ul>
        <?php } ?>
    </li>
    <?php if( $prefix == 'admin') { ?>
     <li class="<?=  ($this->request->params['controller'] == 'Users' && $this->request->params['action'] != 'dashboard') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-users" aria-hidden="true"></i> &nbsp; USERS', ['controller' => 'Users', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Messages') ? 'active' : ''; ?>">
          <?php
            echo $this->Html->link('<i class="fa fa-file-code-o" aria-hidden="true"></i> &nbsp; Message Templates', ['controller' => 'Messages', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); 
          ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Sites') ? 'active' : ''; ?>">
          <?php
            echo $this->Html->link('<i class="fa fa-code" aria-hidden="true"></i> &nbsp; Front end Pages', ['controller' => 'Sites', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); 
          ?>
    </li>
    <?php }; ?>
    <li class="<?=  ($this->request->params['controller'] == 'Feedbacks') ? 'active' : ''; ?>">
          <?php
            echo $this->Html->link('<i class="fa fa-comment-o" aria-hidden="true"></i> &nbsp; USER FEEDBACK', ['controller' => 'Users', 'action' => 'dashboard', 'prefix' => $prefix], array('escape' => false)); 
          ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Notifications') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> &nbsp; ALERTS'.$ncount, ['controller' => 'Users', 'action' => 'dashboard', 'prefix' => $prefix], array('escape' => false)); ?>
    </li>
  </ul>