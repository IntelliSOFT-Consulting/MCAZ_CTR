<?php
  use Cake\Utility\Hash;
  $this->Html->script('applicant_feedback', ['block' => true]);
?>
<div class="row">
  <div class="col-xs-12">
  	<div id="tabers">
  		<ul>
	      <li><a href="#tabers-1">1. Communications</a></li>
	      <li><a href="#tabers-2">2. Committee</a></li>
	      <li><a href="#tabers-3">3. Director General</a></li>
	      <li><a href="#tabers-4">4. Approvals</a></li>
	    </ul>  
	    <div id="tabers-1">
		   <?= $this->element('applications/applicant_request_info') ?>
		</div>
	  	<div id="tabers-2">
		   <?= $this->element('applications/applicant_committee') ?>
		</div>
		<div id="tabers-3">
		   <?php echo $this->element('applications/applicant_dg') ?>
		</div>
		<div id="tabers-4">
		   <?= $this->element('applications/applicant_approvals') ?>
		</div>
	 </div>
  </div>
</div>