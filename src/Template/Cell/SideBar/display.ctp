<?php
     foreach ($application_stats as $key => $value) {
        $stats[$value['status']] = $value['count'];
     }

     $Submitted = isset($stats['Submitted']) ? '<small class="badge badge-sadr pull-right">'. $stats['Submitted'] .'</small>' : '' ;
     $Finance = isset($stats['Finance']) ? '<small class="badge badge-sadr pull-right">'. $stats['Finance'] .'</small>' : '' ;
     $Reviewed = isset($stats['Reviewed']) ? '<small class="badge badge-sadr pull-right">'. $stats['Reviewed'] .'</small>' : '' ;
     $UnSubmitted = isset($stats['UnSubmitted']) ? '<small class="badge badge-sadr pull-right">'. $stats['UnSubmitted'] .'</small>' : '' ;
     $Archived = isset($stats['Archived']) ? '<small class="badge badge-sadr pull-right">'. $stats['Archived'] .'</small>' : '' ;
     $Approved = isset($stats['Approved']) ? '<small class="badge badge-sadr pull-right">'. $stats['Approved'] .'</small>' : '' ;
     $Rejected = isset($stats['Rejected']) ? '<small class="badge badge-sadr pull-right">'. $stats['Rejected'] .'</small>' : '' ;
     $Assigned = isset($stats['Assigned']) ? '<small class="badge badge-sadr pull-right">'. $stats['Assigned'] .'</small>' : '' ;
     $Evaluated = isset($stats['Evaluated']) ? '<small class="badge badge-sadr pull-right">'. $stats['Evaluated'] .'</small>' : '' ;
     $Committee = isset($stats['Committee']) ? '<small class="badge badge-sadr pull-right">'. $stats['Committee'] .'</small>' : '' ;
     $Section75 = isset($stats['Section75']) ? '<small class="badge badge-sadr pull-right">'. $stats['Section75'] .'</small>' : '' ;
     $GCP = isset($stats['GCP']) ? '<small class="badge badge-sadr pull-right">'. $stats['GCP'] .'</small>' : '' ;
     $Notification = isset($stats['Notification']) ? '<small class="badge badge-sadr pull-right">'. $stats['Notification'] .'</small>' : '' ;
     $RequestReporter = isset($stats['RequestReporter']) ? '<small class="badge badge-sadr pull-right">'. $stats['RequestReporter'] .'</small>' : '' ;
     $ReporterResponse = isset($stats['ReporterResponse']) ? '<small class="badge badge-sadr pull-right">'. $stats['ReporterResponse'] .'</small>' : '' ;

     foreach ($amendment_stats as $key => $value) {
        $astats[$value['status']] = $value['count'];
     }

     $aSubmitted = isset($astats['Submitted']) ? '<small class="badge badge-sadr pull-right">'. $astats['Submitted'] .'</small>' : '' ;
     $aFinance = isset($astats['Finance']) ? '<small class="badge badge-sadr pull-right">'. $astats['Finance'] .'</small>' : '' ;
     $aReviewed = isset($astats['Reviewed']) ? '<small class="badge badge-sadr pull-right">'. $astats['Reviewed'] .'</small>' : '' ;
     $aUnSubmitted = isset($astats['UnSubmitted']) ? '<small class="badge badge-sadr pull-right">'. $astats['UnSubmitted'] .'</small>' : '' ;
     $aArchived = isset($astats['Archived']) ? '<small class="badge badge-sadr pull-right">'. $astats['Archived'] .'</small>' : '' ;
     $aApproved = isset($astats['Approved']) ? '<small class="badge badge-sadr pull-right">'. $astats['Approved'] .'</small>' : '' ;
     $aRejected = isset($astats['Rejected']) ? '<small class="badge badge-sadr pull-right">'. $astats['Rejected'] .'</small>' : '' ;
     $aAssigned = isset($astats['Assigned']) ? '<small class="badge badge-sadr pull-right">'. $astats['Assigned'] .'</small>' : '' ;
     $aEvaluated = isset($astats['Evaluated']) ? '<small class="badge badge-sadr pull-right">'. $astats['Evaluated'] .'</small>' : '' ;
     $aCommittee = isset($astats['Committee']) ? '<small class="badge badge-sadr pull-right">'. $astats['Committee'] .'</small>' : '' ;
     $aSection75 = isset($astats['Section75']) ? '<small class="badge badge-sadr pull-right">'. $astats['Section75'] .'</small>' : '' ;
     $aGCP = isset($astats['GCP']) ? '<small class="badge badge-sadr pull-right">'. $astats['GCP'] .'</small>' : '' ;
     $aNotification = isset($astats['Notification']) ? '<small class="badge badge-sadr pull-right">'. $astats['Notification'] .'</small>' : '' ;
     $aRequestReporter = isset($astats['RequestReporter']) ? '<small class="badge badge-sadr pull-right">'. $astats['RequestReporter'] .'</small>' : '' ;
     $aReporterResponse = isset($astats['ReporterResponse']) ? '<small class="badge badge-sadr pull-right">'. $astats['ReporterResponse'] .'</small>' : '' ;
     $ncount = isset($ncount) ? '<small class="badge pull-right">'. $ncount .'</small>' : '' ;
  ?>
  <ul class="nav nav-sidebar nav-<?= $prefix ?>">
    <li class="<?=  ($this->request->params['action'] == 'dashboard') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-home" aria-hidden="true"></i> &nbsp; Overview', ['controller' => 'Users', 'action' => 'dashboard', 'prefix' => $prefix], array('escape' => false)); ?>      
    </li>

    <?php if( $prefix != 'admin') { ?>
    <li class="<?=  ($this->request->params['controller'] == 'Applications') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-file" aria-hidden="true"></i> &nbsp; PROTOCOLS', ['controller' => 'Applications', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
        <!-- Manager or evaluator -->
        <?php if (($prefix == 'manager' || strpos($prefix, 'evaluator') !== false) && $this->request->params['controller'] == 'Applications' ) { ?>
          <ul class="nav van-<?= $prefix ?>">
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Submitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Submitted '.$Submitted, ['controller' => 'Applications', 'action' => 'index', 'status' => 'Submitted', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Finance') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Finance '.$Finance, ['controller' => 'Applications', 'action' => 'index', 'status' => 'Finance', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Assigned') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Assigned '. $Assigned , ['controller' => 'Applications', 'action' => 'index', 'status' => 'Assigned', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Reviewed') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Reviewed '. $Reviewed , ['controller' => 'Applications', 'action' => 'index', 'status' => 'Reviewed', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Committee') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Committee '. $Committee , ['controller' => 'Applications', 'action' => 'index', 'status' => 'Committee', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'RequestReporter') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Request <small>(Rpt)</small> '. $RequestReporter , ['controller' => 'Applications', 'action' => 'index', 'status' => 'RequestReporter', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Section75') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Section 75 '. $Section75 , ['controller' => 'Applications', 'action' => 'index', 'status' => 'Section75', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'GCP') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> GCP Inspection '. $GCP , ['controller' => 'Applications', 'action' => 'index', 'status' => 'GCP', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Notification') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Notification(s) '. $Notification , ['controller' => 'Applications', 'action' => 'index', 'status' => 'Notification', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'ReporterResponse') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Request <small>(response)</small> '. $ReporterResponse , ['controller' => 'Applications', 'action' => 'index', 'status' => 'ReporterResponse', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Approved') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Approved '. $Approved , ['controller' => 'Applications', 'action' => 'index', 'status' => 'Approved', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Rejected') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Rejected '. $Rejected , ['controller' => 'Applications', 'action' => 'index', 'status' => 'Rejected', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'UnSubmitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Unsubmitted '. $UnSubmitted , ['controller' => 'Applications', 'action' => 'index', 'status' => 'UnSubmitted', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Archived') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Archived '. $Archived , ['controller' => 'Applications', 'action' => 'index', 'status' => 'Archived', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?=  ($this->request->params['controller'] == 'Applications' && $this->request->params['action'] == 'restore') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> Restore deleted <small class="badge badge-sadr pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i></small>', ['controller' => 'Applications', 'action' => 'restore', 'prefix' => $prefix], array('escape' => false)); ?> </li>
          </ul>
        <?php } ?>
    </li>    

    <li class="<?=  ($this->request->params['controller'] == 'Amendments') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-file-text-o" aria-hidden="true"></i> &nbsp; AMENDMENTS', ['controller' => 'Amendments', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
        <!-- Manager or evaluator -->
        <?php if (($prefix == 'manager' || strpos($prefix, 'evaluator') !== false) && $this->request->params['controller'] == 'Amendments' ) { ?>
          <ul class="nav van-<?= $prefix ?>">
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Submitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Submitted '.$aSubmitted, ['controller' => 'Amendments', 'action' => 'index', 'status' => 'Submitted', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Finance') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Finance '.$aFinance, ['controller' => 'Amendments', 'action' => 'index', 'status' => 'Finance', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Assigned') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Assigned '. $aAssigned , ['controller' => 'Amendments', 'action' => 'index', 'status' => 'Assigned', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Reviewed') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Reviewed '. $aReviewed , ['controller' => 'Amendments', 'action' => 'index', 'status' => 'Reviewed', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Committee') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Committee '. $aCommittee , ['controller' => 'Amendments', 'action' => 'index', 'status' => 'Committee', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'RequestReporter') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Request <small>(Rpt)</small> '. $aRequestReporter , ['controller' => 'Amendments', 'action' => 'index', 'status' => 'RequestReporter', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Section75') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Section 75 '. $aSection75 , ['controller' => 'Amendments', 'action' => 'index', 'status' => 'Section75', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'GCP') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> GCP Inspection '. $aGCP , ['controller' => 'Amendments', 'action' => 'index', 'status' => 'GCP', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Notification') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Notification(s) '. $aNotification , ['controller' => 'Amendments', 'action' => 'index', 'status' => 'Notification', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'ReporterResponse') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Request <small>(response)</small> '. $ReporterResponse , ['controller' => 'Amendments', 'action' => 'index', 'status' => 'ReporterResponse', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Approved') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Approved '. $aApproved , ['controller' => 'Amendments', 'action' => 'index', 'status' => 'Approved', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Rejected') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Rejected '. $aRejected , ['controller' => 'Amendments', 'action' => 'index', 'status' => 'Rejected', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'UnSubmitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Unsubmitted '. $aUnSubmitted , ['controller' => 'Amendments', 'action' => 'index', 'status' => 'UnSubmitted', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Archived') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Archived '. $aArchived , ['controller' => 'Amendments', 'action' => 'index', 'status' => 'Archived', 'prefix' => $prefix], array('escape' => false)); ?> </li>
            <li class="<?=  ($this->request->params['controller'] == 'Amendments' && $this->request->params['action'] == 'restore') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> Restore deleted <small class="badge badge-sadr pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i></small>', ['controller' => 'Amendments', 'action' => 'restore', 'prefix' => $prefix], array('escape' => false)); ?> </li>
          </ul>
        <?php } ?>
    </li> 
    <?php } ?>   
    <li class="<?=  ($this->request->params['controller'] === 'Reports') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-bar-chart" aria-hidden="true"></i> &nbsp;REPORTS', ['controller' => 'Reports', 'action' => 'index', 'prefix' => false], array('escape' => false)); ?>
      <?php if (($prefix == 'manager' || $prefix == 'evaluator') && ($this->request->params['controller'] === 'Reports')) { ?>
          <ul class="nav van-<?= $prefix ?>">
            <li class="<?= ($this->request->params['action'] == 'protocolsPerYear') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Protocols Per Year ', ['controller' => 'Reports', 'action' => 'protocolsPerYear', 'prefix' => false], array('escape' => false)); ?> 
            </li>
            <li class="<?= ($this->request->params['action'] == 'protocolsPerPhase') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Protocols Per Phase ', ['controller' => 'Reports', 'action' => 'protocolsPerPhase', 'prefix' => false], array('escape' => false)); ?> 
            </li>
            <li class="<?= ($this->request->params['action'] == 'researchArea') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Research Area', ['controller' => 'Reports', 'action' => 'researchArea', 'prefix' => false], array('escape' => false)); ?> 
            </li>
            <li class="<?= ($this->request->params['action'] == 'timelinesForReview') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Timelines for Review', ['controller' => 'Reports', 'action' => 'timelinesForReview', 'prefix' => false], array('escape' => false)); ?> 
            </li>
            <li class="<?= ($this->request->params['action'] == 'processingStatus') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Processing Status', ['controller' => 'Reports', 'action' => 'processingStatus', 'prefix' => false], array('escape' => false)); ?> 
            </li>
            <li class="<?= ($this->request->params['action'] == 'amendmentsPerYear') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Amendments Per Year', ['controller' => 'Reports', 'action' => 'amendmentsPerYear', 'prefix' => false], array('escape' => false)); ?> 
            </li>
            <li class="<?= ($this->request->params['action'] == 'notificationsPerYear') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Notifications Per Year', ['controller' => 'Reports', 'action' => 'notificationsPerYear', 'prefix' => false], array('escape' => false)); ?> 
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
            echo $this->Html->link('<i class="fa fa-comment-o" aria-hidden="true"></i> &nbsp; USER FEEDBACK', ['controller' => 'Feedbacks', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); 
          ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Notifications') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> &nbsp; ALERTS'.$ncount, ['controller' => 'Notifications', 'action' => 'index', 'prefix' => $prefix], array('escape' => false)); ?>
    </li>
  </ul>