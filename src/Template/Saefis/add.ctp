<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aefi $saefi
 */
?>
<div class="row">
  <div class="col-md-12"><h3 class="text-center has-error">Serious Adverse Event After Immunization (AEFI) Investigation Form</h3>  
    <div class="row">
      <div class="col-md-12"><h5 class="text-center has-error">(Only for Serious Adverse Events Following Immunization <i class="fa fa-minus" aria-hidden="true"></i>
 Death / Disability / Hospitalization / Cluster)</h5></div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-12">
    <?= $this->Form->create($saefi) ?>
        
        <div class="row">
          <div class="col-md-12"><h5 class="text-center">Enter your email address to start:</h5></div>
        </div>

       
        <div class="row">
        <div class="col-md-6">
          <?php
            //echo $this->Form->control('reporter_name', ['label' => 'Reporter name']);
            echo $this->Form->control('reporter_email', ['label' => 'Reporter email']);
          ?>
        </div><!--/span-->
        <div class="col-md-6">
          <?php
            //echo $this->Form->input('designation_id', ['options' => $designations, 'empty' => true]);

          ?>
        </div><!--/span-->
      </div><!--/row-->
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
  </div>
</div>
