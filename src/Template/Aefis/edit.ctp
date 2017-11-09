<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aefi $aefi
 */
?>
<div class="row">
  <div class="col-md-12"><h3 class="text-center">Adverse Event After Immunization (AEFI) Report Form</h3>  
    <div class="row">
      <div class="col-md-12"><h5 class="text-center">ZIMBABWE REPORTING FORM FOR ADVERSE EVENTS FOLLOWING IMMUNIZATION (AEFI)</h5></div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-12">
    <?= $this->Form->create($aefi, ['type' => 'file']) ?>
        <div class="row">
          <div class="col-md-12"><h5 class="text-center">MCAZ Reference Number: <b id="aefi_pr_id"><?= $this->Util->generateXOR($aefi->id) ?></b></h5></div>          
        </div>

        <div class="row">
          <div class="col-md-6">
            <?php
                echo $this->Form->control('patient_name', ['label' => 'Patient first name: <span class="sterix">*</span>', 'escape' => false]);

                echo $this->Form->control('patient_surname', ['label' => 'Patient Surname: <span class="sterix">*</span>', 'escape' => false]);

                echo $this->Form->control('patient_next_of_kin', ['label' => 'Patient next of Kin: <span class="sterix">*</span>', 'escape' => false]);

                echo $this->Form->control('patient_address', ['label' => 'Patient\'s physical address: ', 'escape' => false]);

                echo $this->Form->control('patient_telephone', ['label' => 'Patient\'s telephone: ', 'escape' => false]);
                 
                echo $this->Form->control('date_of_birth', array(
                  'type' => 'date',
                  'label' => 'Date of Birth:',
                  'templates' => ['dateWidget' => '<div class="col-sm-6">{{day}}-{{month}}-{{year}}</div>',
                                  'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',],
                  'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,
                ));
            
                // echo $this->Form->control('age_group', ['type' => 'select',                      
                //      'options' => [
                //             'neonate' => 'neonate',
                //             'infant' => 'infant',
                //             'child' => 'child',
                //             'adolescent' => 'adolescent',
                //             'adult' =>'adult',
                //             'elderly'=>'elderly',
                //             ]
                //      , 'empty' => true]
                //                               );
                echo $this->Form->control('gender', ['type' => 'radio', 
                   'label' => '<b>Gender: <span class="sterix">*</span></b>', 'escape' => false,
                   'templates' => [
                     'radio' => '<input type="radio" class="radio-inline" name="{{name}}" value="{{value}}"{{attrs}}>', 
                     'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                     'nestingLabel' => '{{hidden}}<label class="radio-inline" {{attrs}}>{{input}}{{text}}</label>',
                   ],
                     'options' => ['Male' => 'Male', 'Female' => 'Female', 'Unknown' => 'Unknown']]);
                echo $this->Form->control('date_of_onset_of_reaction', array(
                  'type' => 'date',
                  'label' => 'Date of onset of Reaction:',
                  'templates' => ['dateWidget' => '<div class="col-sm-6">{{day}}-{{month}}-{{year}}</div>',
                                  'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',],
                  'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,
                ));
            ?>            
          </div>
          <div class="col-md-6">
            <?php
                echo $this->Form->control('name_of_institution', 
                  ['label' => ['text' => 'Clinic/Hospital Name: <span class="sterix">*</span>', 'escape' => false]]);                                
                echo $this->Form->control('institution_code', ['label' => 'Clinic/Hospital Number:']);
                echo $this->Form->control('reporter_name', ['label' => 'Reporter name']);
                echo $this->Form->control('reporter_email', ['label' => 'Reporter email']);
                echo $this->Form->control('reporter_phone', ['label' => 'Reporter phone']);
                echo $this->Form->input('designation_id', ['options' => $designations, 'empty' => true]);

                // echo $this->Form->control('ip_no', ['label' => 'VCT/OI/TB Number:']);
                // echo $this->Form->control('weight', ['label' => 'Weight (KGs)']);
                // echo $this->Form->control('height', ['label' => 'Height (meters)']);
            ?>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12"><h4 class="text-center">Vaccines/Diluents</h4></div>
        </div>

        <div class="row">
          <div class="col-md-12"><?php echo $this->element('multi/list_of_aefis');?></div>
        </div>    

    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
  </div>
</div>
