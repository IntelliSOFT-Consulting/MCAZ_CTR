<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr $sadr
 */
?>
<div class="row">
  <div class="col-md-12"><h3 class="text-center">Spontenous Adverse Drug Reaction (ADR) Report Form</h3>  
    <div class="row">
      <div class="col-md-12"><h5 class="text-center">Identities of Reporter, Patient and Institute will remain confidential</h5></div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-12">
    <?= $this->Form->create($sadr, ['type' => 'file']) ?>
        
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
