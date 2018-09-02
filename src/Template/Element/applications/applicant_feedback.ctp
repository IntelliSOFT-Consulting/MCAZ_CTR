<?php
  use Cake\Utility\Hash;
  $this->Html->script('applicant_feedback', ['block' => true]);
?>
<div class="row">
  <div class="col-xs-12">
  	<div id="tabers">
  		<ul>
	      <li><a href="#tabers-1">1. Communications</a></li>
	      <li><a href="#tabers-2">2. Committee Feedback</a></li>
	      <li><a href="#tabers-3">3. Approvals</a></li>
	    </ul>  
	    <div id="tabers-1">
		   <?= $this->element('applications/applicant_request_info') ?>
		</div>
	  	<div id="tabers-2">
		   <?= $this->element('applications/applicant_committee_feedback') ?>
		</div>
		<div id="tabers-3">
		   <?= $this->element('applications/applicant_approvals') ?>
		</div>
	 </div>
  </div>
</div>