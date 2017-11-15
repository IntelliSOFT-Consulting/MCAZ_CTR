<div class="container">
  <div class="row">
    <div class="col-md-12">

      <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      Spontenous Adverse Drug Reaction (ADR) Report Form</h3>  
      <div class="row">
        <div class="col-md-12"><h5 class="text-center">Identities of Reporter, Patient and Institute will remain confidential</h5></div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12"><h5 class="text-center"> MCAZ Reference Number: <strong><?= $sadr->reference_number ?></strong></h5></div>          
  </div>

  <div class="row">
    <div class="col-xs-12"><h5 class="text-center">Patient details (to allow linkage with other reports)</h5></div>
  </div>

  <div class="row">
    <?= $this->Form->create($sadr, ['type' => 'file']) ?>
    <div class="col-xs-6">
            <?php
              echo $this->Form->control('name_of_institution', 
                    ['label' => ['text' => 'Clinic/Hospital Name ', 'escape' => false], 'type' => 'textarea']);
              echo $this->Form->control('patient_name', ['label' => 'Patient Initials <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false,]);
            ?>          
    </div>
    <div class="col-xs-6">
        <label for="name-of-institution">Clinic/Hospital Name: </label>
        Kenyatta National Hospital               
    </div>
    <?= $this->Form->end() ?>
  </div>
  <hr>

</div> 