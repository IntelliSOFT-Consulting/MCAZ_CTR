<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?php
  use Cake\Utility\Hash;
  $this->Html->css('bootstrap/bootstrap.vertical-tabs', ['block' => true]);
  $this->extend('/Element/applications/application_view');
?>


<?php $this->start('form-actions'); ?>
<div class="col-xs-10">
  <div class="tab-content">
     <?= $this->Flash->render() ?>
  <div role="tabpanel" class="tab-pane active" id="report">
    <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'view', '_ext' => 'pdf', $application->id, ], ['escape' => false, 'class' => 'btn btn-info active']);
    ?>
    <?php
    if($prefix == 'manager') {
      if($application->approved === 'Suspended') {
    ?>
        <a href="#" data-target="#reinstateModal" data-toggle="modal" class="btn btn-success active"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Reinstate Study </a>
    <?php
      } elseif($application->approved === 'Authorize') {        
        // echo $this->Html->link('<i class="fa fa-hand-paper-o" aria-hidden="true"></i> Suspend Study', ['controller' => 'Applications', 'action' => 'suspend', $application->id, ], ['escape' => false, 'class' => 'btn btn-warning ']);
        ?>
        <a href="#" data-target="#suspendModal" data-toggle="modal" class="btn btn-warning"><i class="fa fa-hand-paper-o" aria-hidden="true"></i> Suspend Study </a>
        <?php
      }
    }
    ?>

    <div class="modal fade" id="suspendModal" tabindex="-1" role="dialog" aria-labelledby="suspendModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Suspend Study?</h4>               
          </div>
    
          <form method="post" accept-charset="utf-8" action="/base/applications-base/suspend/<?= $application->id ?>">     
          <div class="modal-body">
           
              <div class="form-group">
                  <label for="message" class="control-label">Message:</label>
                  <textarea class="form-control" name="message" id="message"></textarea>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>

          </form>
        
        </div>
      </div>
    </div>

    <div class="modal fade" id="reinstateModal" tabindex="-1" role="dialog" aria-labelledby="reinstateModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Reinstate Study?</h4>               
          </div>
    
          <form method="post" accept-charset="utf-8" action="/base/applications-base/reinstate/<?= $application->id ?>">     
          <div class="modal-body">
           
              <div class="form-group">
                  <label for="message" class="control-label">Message:</label>
                  <textarea class="form-control" name="message" id="message"></textarea>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>

          </form>
        
        </div>
      </div>
    </div>

<?php $this->end(); ?>

<?php $this->start('tabs'); ?>
    <!-- Nav tabs -->    
    <?= $this->Html->script('application_view', ['block' => true]); ?>
    <?= $this->element('menus/tabs_menu') ?>
<?php $this->end(); ?>


<?php $this->start('endjs'); ?>
    </div> <!-- Firstly, close the first tab!! IMPORTANT -->

    <div role="tabpanel" class="tab-pane" id="finance">
        <?= $this->element('applications/finance') ?>
    </div>
  <?php if(in_array("Fees Complete", Hash::extract($application->finance_approvals, '{n}.outcome'))) { ?> 
    <div role="tabpanel" class="tab-pane" id="notification">
        <?= $this->element('applications/notifications') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="section75">
        <?= $this->element('applications/section75') ?>
    </div>
    <?php if($prefix === 'manager' or $prefix === 'director_general') { ?> 
    <div role="tabpanel" class="tab-pane" id="assign">
        <?= $this->element('applications/assign_evaluator') ?>
    </div>
    <?php } ?> 
    <div role="tabpanel" class="tab-pane" id="review">
        <?= $this->element('applications/evaluations') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="request">
        <?= $this->element('applications/request_info') ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="committee">
        <?= $this->element('applications/committee') ?>
    </div>
    <?php if($prefix === 'manager' or $prefix === 'director_general') { ?> 
    <div role="tabpanel" class="tab-pane" id="dg">
        <?= $this->element('applications/dg') ?>
    </div>
    <?php } ?> 
    <div role="tabpanel" class="tab-pane" id="gcp">
        <?= $this->element('applications/gcp') ?>
    </div>
    <!-- only visible in final stage 11   -->
      <?php if($application->approved === 'Authorize') { ?>    
        <div role="tabpanel" class="tab-pane" id="final">
            <?= $this->element('applications/final') ?>
        </div> 
      <?php } ?>
    <?php } ?>  
    <div role="tabpanel" class="tab-pane" id="stages">
        <?= $this->element('applications/stages') ?>
    </div>
    <?php if($application->approved === 'Declined') { ?>    
    <div role="tabpanel" class="tab-pane" id="appeals">
        <?= $this->element('applications/applicant_appeals') ?>
    </div>
    <?php } ?>  
  </div>
</div>

<div class="col-xs-2"> <!-- required for floating -->
  <ul class="nav nav-tabs nav-<?= $prefix ?> tabs-right" data-spy="affix" data-offset-top="60" role="tablist" id="myTab">
      <li role="presentation" class="active"><a href="#report" aria-controls="report" role="tab" data-toggle="tab">
        <b><?= ($application->submitted == 2) ? $application->protocol_no : $application->created ?></b></a></li>
      <?php if($application->submitted == 2) { ?>
      <li role="presentation"><a href="#finance" aria-controls="finance" role="tab" data-toggle="tab"><b>Finance</b></a></li>
    <?php if(in_array("Fees Complete", Hash::extract($application->finance_approvals, '{n}.outcome'))) { ?> 
      <li role="presentation"><a href="#notification" aria-controls="notification" role="tab" data-toggle="tab"><b>Notifications</b></a></li>    
      <li role="presentation"><a href="#section75" aria-controls="section75" role="tab" data-toggle="tab"><b>Section 75</b></a></li> 
      <?php if($prefix === 'manager' or $prefix === 'director_general') { ?>   
      <li role="presentation"><a href="#assign" aria-controls="assign" role="tab" data-toggle="tab"><b>Assign Evaluator(s)</b></a></li>
      <?php } ?> 
      <li role="presentation"><a href="#review" aria-controls="review" role="tab" data-toggle="tab"><b>Reviews</b></a></li>    
      <li role="presentation"><a href="#request" aria-controls="request" role="tab" data-toggle="tab"><b>Communications</b></a></li>    
      <li role="presentation"><a href="#committee" aria-controls="committee" role="tab" data-toggle="tab"><b>Committee</b></a></li>  
      <?php if($prefix === 'manager' or $prefix === 'director_general') { ?>   
      <li role="presentation"><a href="#dg" aria-controls="dg" role="tab" data-toggle="tab"><b>Director General</b></a></li> 
      <?php } ?> 
      <li role="presentation"><a href="#gcp" aria-controls="gcp" role="tab" data-toggle="tab"><b>GCP</b></a></li>   
      <?php } ?> 

      <?php if($application->approved === 'Authorize') { ?>
      <li role="presentation"><a href="#final" aria-controls="final" role="tab" data-toggle="tab"><b>Final Stage</b></a></li> 
      <?php } ?>       
    <?php } ?>       
      <li role="presentation"><a href="#stages" aria-controls="stages" role="tab" data-toggle="tab"><b>STAGES</b></a></li>  
      <?php if($application->approved === 'Declined') { ?>    
      <li role="presentation"><a href="#appeals" aria-controls="appeals" role="tab" data-toggle="tab"><b>Appeals</b></a></li> 
      <?php } ?>  
  </ul>
</div>

<?php $this->end(); ?>

