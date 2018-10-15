<?php
     foreach ($application_stats as $key => $value) {
        $stats[$value['status']] = $value['count'];
     }

     $Submitted = isset($stats['Submitted']) ? '<small class="badge badge-sadr pull-right">'. $stats['Submitted'] .'</small>' : '' ;
     $Finance = isset($stats['Finance']) ? '<small class="badge badge-sadr pull-right">'. $stats['Finance'] .'</small>' : '' ;
     $Reviewed = isset($stats['Reviewed']) ? '<small class="badge badge-sadr pull-right">'. $stats['Reviewed'] .'</small>' : '' ;
     $UnSubmitted = isset($stats['UnSubmitted']) ? '<small class="badge badge-sadr pull-right">'. $stats['UnSubmitted'] .'</small>' : '' ;
     $Archived = isset($stats['Archived']) ? '<small class="badge badge-sadr pull-right">'. $stats['Archived'] .'</small>' : '' ;
     $FinalStage = isset($stats['FinalStage']) ? '<small class="badge badge-sadr pull-right">'. $stats['FinalStage'] .'</small>' : '' ;
     $Suspended = isset($stats['Suspended']) ? '<small class="badge badge-sadr pull-right">'. $stats['Suspended'] .'</small>' : '' ;
     // $Reinstated = isset($stats['Reinstated']) ? '<small class="badge badge-sadr pull-right">'. $stats['Reinstated'] .'</small>' : '' ;
     $Correspondence = isset($stats['Correspondence']) ? '<small class="badge badge-sadr pull-right">'. $stats['Correspondence'] .'</small>' : '' ;
     $Assigned = isset($stats['Assigned']) ? '<small class="badge badge-sadr pull-right">'. $stats['Assigned'] .'</small>' : '' ;
     $Evaluated = isset($stats['Evaluated']) ? '<small class="badge badge-sadr pull-right">'. $stats['Evaluated'] .'</small>' : '' ;
     $Committee = isset($stats['Committee']) ? '<small class="badge badge-sadr pull-right">'. $stats['Committee'] .'</small>' : '' ;
     $CommitteeDeclined = isset($stats['CommitteeDeclined']) ? '<small class="badge badge-sadr pull-right">'. $stats['CommitteeDeclined'] .'</small>' : '' ;
     $DirectorGeneral = isset($stats['DirectorGeneral']) ? '<small class="badge badge-sadr pull-right">'. $stats['DirectorGeneral'] .'</small>' : '' ;
     $Notification = isset($stats['Notification']) ? '<small class="badge badge-sadr pull-right">'. $stats['Notification'] .'</small>' : '' ;
     $ApplicantResponse = isset($stats['ApplicantResponse']) ? '<small class="badge badge-sadr pull-right">'. $stats['ApplicantResponse'] .'</small>' : '' ;
     $Presented = isset($stats['Presented']) ? '<small class="badge badge-sadr pull-right">'. $stats['Presented'] .'</small>' : '' ;
     $DirectorAuthorize = isset($stats['DirectorAuthorize']) ? '<small class="badge badge-sadr pull-right">'. $stats['DirectorAuthorize'] .'</small>' : '' ;

     $averlou = isset($stats['Authorize']) ? $stats['Authorize'] : 0;
     $senepale = isset($stats['DirectorAuthorize']) ? $stats['DirectorAuthorize'] : 0;
     $AllAuthorize = (isset($stats['DirectorAuthorize']) or isset($stats['Authorize'])) ? '<small class="badge badge-sadr pull-right">'. ($senepale+$averlou) .'</small>' : '' ;
     $Authorize = isset($stats['Authorize']) ? '<small class="badge badge-sadr pull-right">'. $stats['Authorize'] .'</small>' : '' ;
     $DirectorDeclined = isset($stats['DirectorDeclined']) ? '<small class="badge badge-sadr pull-right">'. $stats['DirectorDeclined'] .'</small>' : '' ;

     foreach ($amendment_stats as $key => $value) {
        $astats[$value['status']] = $value['count'];
     }

     $aSubmitted = isset($astats['Submitted']) ? '<small class="badge badge-sadr pull-right">'. $astats['Submitted'] .'</small>' : '' ;
     $aFinance = isset($astats['Finance']) ? '<small class="badge badge-sadr pull-right">'. $astats['Finance'] .'</small>' : '' ;
     $aAssigned = isset($astats['Assigned']) ? '<small class="badge badge-sadr pull-right">'. $astats['Assigned'] .'</small>' : '' ;
     $aEvaluated = isset($astats['Evaluated']) ? '<small class="badge badge-sadr pull-right">'. $astats['Evaluated'] .'</small>' : '' ;
     $aCommittee = isset($astats['Committee']) ? '<small class="badge badge-sadr pull-right">'. $astats['Committee'] .'</small>' : '' ;
     $aCorrespondence = isset($astats['Correspondence']) ? '<small class="badge badge-sadr pull-right">'. $astats['Correspondence'] .'</small>' : '' ;
     $aApplicantResponse = isset($astats['ApplicantResponse']) ? '<small class="badge badge-sadr pull-right">'. $astats['ApplicantResponse'] .'</small>' : '' ;
     $aPresented = isset($astats['Presented']) ? '<small class="badge badge-sadr pull-right">'. $astats['Presented'] .'</small>' : '' ;
     $aFinalStage = isset($astats['FinalStage']) ? '<small class="badge badge-sadr pull-right">'. $astats['FinalStage'] .'</small>' : '' ;

     $ncount = isset($ncount) ? '<small class="badge pull-right">'. $ncount .'</small>' : '' ;
  ?>
  <ul class="nav nav-sidebar nav-<?= $prefix ?>">
    <li class="<?=  ($this->request->params['action'] == 'dashboard') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-home" aria-hidden="true"></i> &nbsp; Overview', ['controller' => 'Users', 'action' => 'dashboard', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?>      
    </li>

    <?php if( $prefix != 'admin') { ?>
    <li class="<?php  if($this->request->params['controller'] == 'Applications') { 
            if((isset($this->request->query['status']) && $this->request->query['status'] == 'FinalStage')) {
                echo '';
            } else {
                echo 'active';
            }             
        }; ?>">
      <?= $this->Html->link('<i class="fa fa-file" aria-hidden="true"></i> &nbsp; PROTOCOLS', ['controller' => 'Applications', 'action' => 'index', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?>      
        <!-- Manager or evaluator -->
        <?php 
          if (($prefix == 'manager' || strpos($prefix, 'evaluator') !== false) && $this->request->params['controller'] == 'Applications' ) {   
            if((isset($this->request->query['status']) && $this->request->query['status'] != 'FinalStage') || !isset($this->request->query['status'])) {
        ?>
          <ul class="nav van-<?= $prefix ?>">
            <li><a href="#" class="text-warning" style="text-decoration: underline; padding-left: 15px;">APPLICATION STAGES</a></li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Submitted') ? 'active' : ''; ?>"><?= $this->Html->link('<b>1.</b> Submitted '.$Submitted, ['controller' => 'Applications', 'action' => 'index', 'status' => 'Submitted', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Finance') ? 'active' : ''; ?>"><?= $this->Html->link('<b>2.</b> Finance '.$Finance, ['controller' => 'Applications', 'action' => 'index', 'status' => 'Finance', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Assigned') ? 'active' : ''; ?>"><?= $this->Html->link('<b>3.</b> Assigned '. $Assigned , ['controller' => 'Applications', 'action' => 'index', 'status' => 'Assigned', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Evaluated') ? 'active' : ''; ?>"><?= $this->Html->link('<b>4.</b> Evaluated '. $Evaluated , ['controller' => 'Applications', 'action' => 'index', 'status' => 'Evaluated', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Committee') ? 'active' : ''; ?>"><?= $this->Html->link('<b>5.</b> Committee '. $Committee , ['controller' => 'Applications', 'action' => 'index', 'status' => 'Committee', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Correspondence') ? 'active' : ''; ?>"><?= $this->Html->link('<b>6.</b> Correspondence '. $Correspondence , ['controller' => 'Applications', 'action' => 'index', 'status' => 'Correspondence', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'ApplicantResponse') ? 'active' : ''; ?>"><?= $this->Html->link('<b>7.</b> Response '. $ApplicantResponse , ['controller' => 'Applications', 'action' => 'index', 'status' => 'ApplicantResponse', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Presented') ? 'active' : ''; ?>"><?= $this->Html->link('<b>8.</b> Presented '. $Presented , ['controller' => 'Applications', 'action' => 'index', 'status' => 'Presented', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'DirectorGeneral') ? 'active' : ''; ?>"><?= $this->Html->link('<b>9.</b> Health Secretary'. $DirectorGeneral , ['controller' => 'Applications', 'action' => 'index', 'status' => 'DirectorGeneral', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['approved']) && $this->request->query['approved'] == 'DirectorAuthorize' or (isset($this->request->query['approved'])) && $this->request->query['approved'] == 'Authorize') ? 'active' : ''; ?>"><?= $this->Html->link('<b>10.</b> Authorized'. $AllAuthorize , ['controller' => 'Applications', 'action' => 'index', 'approved' => 'DirectorAuthorize', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['approved']) && $this->request->query['approved'] == 'DirectorAuthorize') ? 'active' : ''; ?>"><?= $this->Html->link('<b style="padding-left: 25px;"></b> Director'. $DirectorAuthorize , ['controller' => 'Applications', 'action' => 'index', 'approved' => 'DirectorAuthorize', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['approved']) && $this->request->query['approved'] == 'Authorize') ? 'active' : ''; ?>"><?= $this->Html->link('<b style="padding-left: 25px;"></b> Indemnity'. $Authorize , ['controller' => 'Applications', 'action' => 'index', 'approved' => 'Authorize', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'DirectorDeclined') ? 'active' : ''; ?>"><?= $this->Html->link('<b>11.</b> Declined <small class="muted">Dir</small>'. $DirectorDeclined , ['controller' => 'Applications', 'action' => 'index', 'status' => 'DirectorDeclined', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'CommitteeDeclined') ? 'active' : ''; ?>"><?= $this->Html->link('<b style="padding-left: 25px;"></b> Declined <small class="muted">Comm</small>'. $CommitteeDeclined , ['controller' => 'Applications', 'action' => 'index', 'status' => 'CommitteeDeclined', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> </li>
            

            <li><a href="#" class="text-warning" style="text-decoration: underline; padding-left: 15px;">OTHERS</a></li>

            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'UnSubmitted') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Unsubmitted '. $UnSubmitted , ['controller' => 'Applications', 'action' => 'index', 'status' => 'UnSubmitted', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Suspended') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Suspended'. $Suspended , ['controller' => 'Applications', 'action' => 'index', 'status' => 'Suspended', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> </li>
          </ul>
        <?php } } ?>
    </li>    


    <li class="<?=  ($this->request->params['controller'] == 'Applications' && 
        (isset($this->request->query['status']) && $this->request->query['status'] == 'FinalStage')) ? 'active' : ''; ?>">
       <?= $this->Html->link('<i class="fa fa-flag-checkered" aria-hidden="true"></i> &nbsp; FINAL STAGE'. $FinalStage , ['controller' => 'Applications', 'action' => 'index', 'status' => 'FinalStage', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?>
    </li>


    <?php if($this->request->session()->read('Auth.User.group_id') != 6) { ?>
    <li class="<?=  ($this->request->params['controller'] == 'Amendments') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-file-text-o" aria-hidden="true"></i> &nbsp; AMENDMENTS', ['controller' => 'Amendments', 'action' => 'index', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?>
        <!-- Manager or evaluator -->
        <?php if (($prefix == 'manager' || strpos($prefix, 'evaluator') !== false) && $this->request->params['controller'] == 'Amendments' ) { ?>
          <ul class="nav van-<?= $prefix ?>">
            <li><a href="#" style="text-decoration: underline; padding-left: 15px;">AMENDMENT STAGES</a></li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Submitted') ? 'active' : ''; ?>"><?= $this->Html->link('<b>1.</b> Submitted '.$aSubmitted, ['controller' => 'Amendments', 'action' => 'index', 'status' => 'Submitted', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Finance') ? 'active' : ''; ?>"><?= $this->Html->link('<b>2.</b> Finance '.$aFinance, ['controller' => 'Amendments', 'action' => 'index', 'status' => 'Finance', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> </li>          
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Assigned') ? 'active' : ''; ?>"><?= $this->Html->link('<b>3.</b> Assigned '. $aAssigned , ['controller' => 'Amendments', 'action' => 'index', 'status' => 'Assigned', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Evaluated') ? 'active' : ''; ?>"><?= $this->Html->link('<b>4.</b> Evaluated '. $aEvaluated , ['controller' => 'Amendments', 'action' => 'index', 'status' => 'Evaluated', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Committee') ? 'active' : ''; ?>"><?= $this->Html->link('<b>5.</b> Committee '. $aCommittee , ['controller' => 'Amendments', 'action' => 'index', 'status' => 'Committee', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Correspondence') ? 'active' : ''; ?>"><?= $this->Html->link('<b>6.</b> Correspondence '. $aCorrespondence , ['controller' => 'Amendments', 'action' => 'index', 'status' => 'Correspondence', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'ApplicantResponse') ? 'active' : ''; ?>"><?= $this->Html->link('<b>7.</b> Response '. $aApplicantResponse , ['controller' => 'Amendments', 'action' => 'index', 'status' => 'ApplicantResponse', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'Presented') ? 'active' : ''; ?>"><?= $this->Html->link('<b>8.</b> Presented '. $aPresented , ['controller' => 'Amendments', 'action' => 'index', 'status' => 'Presented', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> </li>
            <li class="<?= (isset($this->request->query['status']) && $this->request->query['status'] == 'FinalStage') ? 'active' : ''; ?>"><?= $this->Html->link('<b>8.</b> FinalStage '. $aFinalStage , ['controller' => 'Amendments', 'action' => 'index', 'status' => 'FinalStage', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> </li>
          </ul>
        <?php } ?>
    </li> 
    <?php } ?>

    <?php } ?>   
    <li class="<?=  ($this->request->params['controller'] === 'Reports') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-bar-chart" aria-hidden="true"></i> &nbsp;REPORTS', ['controller' => 'Reports', 'action' => 'index', 'prefix' => false, 'plugin' => false ], array('escape' => false)); ?>
      <?php if (($prefix == 'manager' || $prefix == 'evaluator') && ($this->request->params['controller'] === 'Reports')) { ?>
          <ul class="nav van-<?= $prefix ?>">
            <li class="<?= ($this->request->params['action'] == 'protocolsPerYear') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Protocols Per Year ', ['controller' => 'Reports', 'action' => 'protocolsPerYear', 'prefix' => false, 'plugin' => false ], array('escape' => false)); ?> 
            </li>
            <li class="<?= ($this->request->params['action'] == 'protocolsPerPhase') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Protocols Per Phase ', ['controller' => 'Reports', 'action' => 'protocolsPerPhase', 'prefix' => false, 'plugin' => false ], array('escape' => false)); ?> 
            </li>
            <li class="<?= ($this->request->params['action'] == 'researchArea') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Research Area', ['controller' => 'Reports', 'action' => 'researchArea', 'prefix' => false, 'plugin' => false ], array('escape' => false)); ?> 
            </li>
            <li class="<?= ($this->request->params['action'] == 'timelinesForReview') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Timelines for Review', ['controller' => 'Reports', 'action' => 'timelinesForReview', 'prefix' => false, 'plugin' => false ], array('escape' => false)); ?> 
            </li>
            <li class="<?= ($this->request->params['action'] == 'processingStatus') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Processing Status', ['controller' => 'Reports', 'action' => 'processingStatus', 'prefix' => false, 'plugin' => false ], array('escape' => false)); ?> 
            </li>
            <li class="<?= ($this->request->params['action'] == 'amendmentsPerYear') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Amendments Per Year', ['controller' => 'Reports', 'action' => 'amendmentsPerYear', 'prefix' => false, 'plugin' => false ], array('escape' => false)); ?> 
            </li>
            <li class="<?= ($this->request->params['action'] == 'notificationsPerYear') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Notifications Per Year', ['controller' => 'Reports', 'action' => 'notificationsPerYear', 'prefix' => false, 'plugin' => false ], array('escape' => false)); ?> 
            </li>
          </ul>
        <?php } ?>
    </li>
    <?php if( $prefix == 'admin') { ?>
     <li class="<?=  ($this->request->params['controller'] == 'Users' && $this->request->params['action'] != 'dashboard') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-users" aria-hidden="true"></i> &nbsp; USERS', ['controller' => 'Users', 'action' => 'index', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Messages') ? 'active' : ''; ?>">
          <?php
            echo $this->Html->link('<i class="fa fa-file-code-o" aria-hidden="true"></i> &nbsp; Message Templates', ['controller' => 'Messages', 'action' => 'index', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); 
          ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Sites') ? 'active' : ''; ?>">
          <?php
            echo $this->Html->link('<i class="fa fa-code" aria-hidden="true"></i> &nbsp; Front end Pages', ['controller' => 'Sites', 'action' => 'index', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); 
          ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Stages') ? 'active' : ''; ?>">
          <?php
            echo $this->Html->link('<i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp; STAGES', ['controller' => 'Stages', 'action' => 'index', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); 
          ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Logs') ? 'active' : ''; ?>">
      <?php
        echo $this->Html->link('<i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp; SYSTEM LOGS', ['controller' => 'Logs', 'action' => 'index', 'prefix' => $prefix, 'plugin' => 'DatabaseLog'], array('escape' => false, 'class' => 'btn-zangu')); 
      ?>
    </li>
    <?php }; ?>
    <li class="<?=  ($this->request->params['controller'] == 'Pages') ? 'active' : ''; ?>">
        <?php
          echo $this->Html->link('<i class="fa fa-calendar"></i> COMMITTEE DATES',
            array('controller' => 'Pages', 'action'=>'calendar', 'prefix' => false, 'plugin' => false  ), array('escape' => false ));
        ?>
        <?php if (($prefix != 'applicant' || $prefix != 'director_general') && ($this->request->params['action'] === 'calendar') or 
                in_array('calendar', $this->request->getParam('pass'))) { ?>
            <ul class="nav van-<?= $prefix ?>">
              <li class="<?= ($this->request->params['controller'] == 'Sites') ? 'active' : ''; ?>"><?= $this->Html->link('<i class="fa fa-minus" aria-hidden="true"></i> Edit page ', ['controller' => 'Sites', 'action' => 'calendar', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?> 
              </li>
            </ul>
        <?php } ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Feedbacks') ? 'active' : ''; ?>">
          <?php
            echo $this->Html->link('<i class="fa fa-comment-o" aria-hidden="true"></i> &nbsp; USER FEEDBACK', ['controller' => 'Feedbacks', 'action' => 'index', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); 
          ?>
    </li>
    <li class="<?=  ($this->request->params['controller'] == 'Notifications') ? 'active' : ''; ?>">
      <?= $this->Html->link('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> &nbsp; ALERTS'.$ncount, ['controller' => 'Notifications', 'action' => 'index', 'prefix' => $prefix, 'plugin' => false ], array('escape' => false)); ?>
    </li>
  </ul>