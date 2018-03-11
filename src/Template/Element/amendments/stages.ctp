<?php
  $this->Html->css('stages.css', ['block' => true]);
?>

<h3 class="page-header text-center"><?= $amendment->protocol_no ?></h3>

  <div class="row">
    <div class="col-xs-12">
      <h4 class="text-center"><label class="text-warning"><u>PVCT Committee Reviews</u></label></h4>
      <hr>
    <?php
      if($this->request->params['_ext'] != 'pdf') {
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Stages ', ['controller' => 'Amendments', 'action' => 'stages', '_ext' => 'pdf', $amendment->id, 'All'], ['escape' => false, 'class' => 'btn btn-info btn-sm']);              
      }
    ?>
    </div>
  </div>
  <br>

<div class="row">
    <div class="col-xs-3"></div>
    <div class="col-xs-6">
      <div class="row stages text-center"> 
        <div class="col-xs-12">   
          <span class="stages-on">
            START
          </span>
        </div>
      </div>
    <?php 
        $prev_date = null;
        foreach ($amendment->application_stages as $application_stage) {
          $curr_date = (($application_stage->alt_date)) ?? $application_stage->stage_date;
    ?>
    <div class="row stages text-center"> 
        <div class="col-xs-12">            
            <p><i class="fa fa-long-arrow-down" aria-hidden="true"></i> &nbsp; <?= (!empty($prev_date)) ? $curr_date->diffInDays($prev_date) : 0; ?> Days</p>
            <span class="stages-view">
                <?= $application_stage->stage->description ?><br>
                <?= $application_stage->stage->name ?><br>
                <?= $curr_date->i18nFormat('dd-MM-yyyy'); ?>
            </span> 
            <?php $prev_date = $curr_date ?>
        </div> 
    </div>
    <?php
        }
    ?>
    </div>
    <div class="col-xs-3"> </div>
</div>