<?php  if ($this->fetch('is-applicant') == 'true') { ?>
  <div class="row-fluid">
    <div class="span12">
      <h4>15. Final Study Report <small>For complete and approved trials</small></h4>
        <hr>
        <div class="row-fluid">
          <div class="span10">
            <?php          
              if ($this->fetch('is-applicant') == 'true') {
                 echo $this->Form->input('final_report', array(
                      'label' => array('class' => 'control-nolabel required', 'text' => 'Executive summary'),
                      'between'=>'<div class="nocontrols">', 'placeholder' => 'final report' , 'class' => 'input-large',
                      'value' => $application['Application']['final_report']
                    ));
               } else {
                  echo $application['Application']['final_report'];
               }
            ?>
            <hr>        
            <?php
                echo $this->element('multi/documents');
            ?>
          </div><!--/span10-->
          <div class="span2">
            <br>
            <?php
              if ($this->fetch('is-applicant') == 'true') {
                echo $this->Form->button('<i class="icon-save"></i> Save', array(
                    'name' => 'submitReport',
                    // 'onclick'=>"return confirm('Are you sure you wish to submit the form to PPB? You will not be able to edit it later.');",
                    'class' => 'btn btn-info btn-block',
                    'id' => 'ApplicationViewSaveReport', 
                    'div' => false,
                    'type' => 'button'
                  ));
              }
            ?>
          </div> <!-- span2 -->
      </div>
    </div>
  </div><!--/row-->
<?php } else { ?>
  <div class="row-fluid">
    <div class="span12">
      <h4>15. Final Study Report <small>For complete and approved trials</small></h4>
        <hr>

            <?php      
               echo $application['Application']['final_report'];
            ?>
            <hr>        
            <?php
                echo $this->element('multi/documents');
            ?>

    </div>
  </div><!--/row-->
<?php } ?>
