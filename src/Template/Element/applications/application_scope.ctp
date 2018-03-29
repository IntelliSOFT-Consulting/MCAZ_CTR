
          <hr>
          <h5>8.0 SCOPE OF THE TRIAL -  <i class="sterix fa fa-asterisk" aria-hidden="true"></i> <small>Tick all boxes where applicable</small></h5>
          <div class="row">
            <div class="col-md-12">
              <?php
                echo $this->Form->control('disease_condition', array(
              'label' =>  'Health Condition(s) or Problem(s) Studied <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false
            ));
              ?>
            </div>
            <div class="col-md-4">
            <?php
              echo $this->Form->control('scope_diagnosis', 
                ['type' => 'checkbox', 'label' => 'Diagnosis', 'templates' => 'checkbox_form']);
              echo $this->Form->control('scope_prophylaxis', 
                ['type' => 'checkbox', 'label' => 'Prophylaxis', 'templates' => 'checkbox_form']);
              echo $this->Form->control('scope_therapy', 
                ['type' => 'checkbox', 'label' => 'Therapy', 'templates' => 'checkbox_form']);
              echo $this->Form->control('scope_safety', 
                ['type' => 'checkbox', 'label' => 'Safety', 'templates' => 'checkbox_form']);
              echo $this->Form->control('scope_efficacy', 
                ['type' => 'checkbox', 'label' => 'Efficacy', 'templates' => 'checkbox_form']);
              echo $this->Form->control('scope_pharmacokinetic', 
                ['type' => 'checkbox', 'label' => 'Pharmacokinetic', 'templates' => 'checkbox_form']);
              echo $this->Form->control('scope_pharmacodynamic', 
                ['type' => 'checkbox', 'label' => 'Pharmacodynamic', 'templates' => 'checkbox_form']);

            ?>
            </div>
            <div class="col-md-5">
            <?php
              echo $this->Form->control('scope_bioequivalence', 
                ['type' => 'checkbox', 'label' => 'Bioequivalence', 'templates' => 'checkbox_form']);
              echo $this->Form->control('scope_dose_response', 
                ['type' => 'checkbox', 'label' => 'Dose Response', 'templates' => 'checkbox_form']);
              echo $this->Form->control('scope_pharmacogenetic', 
                ['type' => 'checkbox', 'label' => 'Pharmacogenetic', 'templates' => 'checkbox_form']);
              echo $this->Form->control('scope_pharmacogenomic', 
                ['type' => 'checkbox', 'label' => 'Pharmacogenomic', 'templates' => 'checkbox_form']);
              echo $this->Form->control('scope_pharmacoecomomic', 
                ['type' => 'checkbox', 'label' => 'Pharmacoecomomic', 'templates' => 'checkbox_form']);
            ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
            <?php
            echo $this->Form->control('scope_others', 
              ['type' => 'checkbox', 'label' => 'Others', 'templates' => 'checkbox_form']);
            echo $this->Form->control('scope_others_specify', array(
                          'label' => 'If others, specify'));
            ?>
            </div>
          </div>
          <hr>
          <h5>8.1 TRIAL TYPE AND PHASE  <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5>
          <?php
          echo $this->Form->control('trial_human_pharmacology', 
            ['type' => 'checkbox', 'label' => 'Human pharmacology (Phase I)', 'templates' => 'checkbox_form']);
          ?>
          <h6>Is it:</h6>
          <?php
          echo $this->Form->control('trial_administration_humans', 
            ['type' => 'checkbox', 'label' => 'First administration to humans', 'templates' => 'checkbox_form']);
          echo $this->Form->control('trial_bioequivalence_study', 
            ['type' => 'checkbox', 'label' => 'Bioequivalence study', 'templates' => 'checkbox_form']);
          echo $this->Form->control('trial_other', 
            ['type' => 'checkbox', 'label' => 'Other ', 'templates' => 'checkbox_form']);

          echo $this->Form->control('trial_other_specify', 
            ['label' => 'If other, please specify']);
          echo $this->Form->control('trial_therapeutic_exploratory', 
            ['type' => 'checkbox', 'label' => 'Therapeutic exploratory (Phase II)', 'templates' => 'checkbox_form']);
          echo $this->Form->control('trial_therapeutic_confirmatory', 
            ['type' => 'checkbox', 'label' => 'Therapeutic confirmatory (Phase III)', 'templates' => 'checkbox_form']);
          echo $this->Form->control('trial_therapeutic_use', 
            ['type' => 'checkbox', 'label' => 'Therapeutic use (Phase IV)', 'templates' => 'checkbox_form']);

          ?>