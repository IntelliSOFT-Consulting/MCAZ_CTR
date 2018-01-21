

          <?php  //echo $this->element('multi/placebos');
            echo '<label>6.1 Interventions</label>';
              echo $this->Form->control('drug_name', array(
              'label' =>  'Medicine Name  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 
               'escape' => false 
            ));
            echo $this->Form->control('quantity_excemption', array(
              'label' =>  'Quantity of medicine required  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 
               'escape' => false 
            ));

            echo $this->element('applications/amendment_medicines');

            echo $this->Form->control('drug_details', array(
              'label' =>  '<hr> State the chemical composition, graphic and empirical formulae, animal pharmacology, toxicity and teratology as well as any clinical or field trials in humans or animals or any other relevant information or supply reports if available <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
              'templates' => 'textarea_form'));

            echo $this->Form->control('medicine_reaction', array(
              'label' =>  'Adverse/ possible reactions to the medicine ', 
               'escape' => false 
            ));

            echo $this->Form->control('medicine_therapeutic_effects', array(
              'label' =>  'Therapeutic effects of medicine', 
               'escape' => false 
            ));

            echo $this->Form->control('medicine_registered', array(
              'label' =>  'a)Has the medicine been registered in the country?',
              'escape' => false, 
              'type' => 'radio',  
              'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No']
            ));
            
            
            /*if (!empty($amendment['registrations'][0]->file)) {
                echo "<p> <b>Registration Certificate:</b> ".$this->Html->link($amendment['registrations'][0]->file, substr($amendment['registrations'][0]->dir, 8) . '/' . $amendment['registrations'][0]->file, ['fullBase' => true])."</p>";
            } else {*/

          ?><!-- 
                echo $this->Form->control('registrations.0.id', ['type' => 'hidden', 'templates' => 'table_form']);
                echo $this->Form->control('registrations.0.file', ['type' => 'file','label' => 'Attach valid certificate of registration']); -->
            <div id="registrations" class="checkcontrols" title="registrations">              
              <?php
              echo '<label>If YES attach a valid certificate of registration in respect of such medicine issued by the appropriate authority established for the registration of medicine in the country of origin shall accompany this application '.$add_fileinput.'</label>';
                // echo $add_fileinput;
                  if (!empty($amendment['registrations'])) {
                    for ($i = 0; $i <= count($amendment['registrations'])-1; $i++) { ?>
                    <div style="margin-top: 5px; margin-bottom: 5px;">
                    <?php
                      echo $this->Html->link($amendment['registrations'][$i]->file, substr($amendment['registrations'][$i]->dir, 8) . '/' . $amendment['registrations'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
                      echo '&nbsp;<button value="'.$amendment['registrations'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_input">
                        &nbsp;<i class="fa fa-trash"></i>&nbsp;</button>';
                    ?>
                  </div>
                  <?php
                    }
                  } 
              ?>
            </div>

          <?php
            // }
            echo $this->Form->control('medicine_registered_details', array(
              'label' =>  'State details/reason', 
               'escape' => false,
               'templates' => 'textarea_form' 
            ));
            echo $this->Form->control('trials_origin_country', array(
              'label' =>  'b)Have clinical trials been conducted in the country of origin?',
              'escape' => false,
              'type' => 'radio',  
              'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No']
            ));

            echo $this->Form->control('trial_origin_details', array(
              'label' =>  'State details/reason', 
               'escape' => false,
               'templates' => 'textarea_form' 
            ));

            echo $this->Form->control('application_other_country', array(
              'label' =>  'c)Has application for registration been made in any other country?',
              'escape' => false,
              'type' => 'radio',  
              'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No']
            ));

            echo $this->Form->control('application_other_country_details', array(
              'label' =>  'If Yes,State details/reason including the date on which the application was lodged', 
               'escape' => false,
               'templates' => 'textarea_form' 
            ));

             echo $this->Form->control('registered_other_country', array(
              'label' =>  'd)Has the medicine registered in any other country?',
              'escape' => false,
              'type' => 'radio',  
              'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No']
            ));

            echo $this->Form->control('registered_other_country_details', array(
              'label' =>  'If Yes, State details/reason', 
               'escape' => false,
               'templates' => 'textarea_form' 
            ));

            echo $this->Form->control('rejected_other_country', array(
              'label' =>  'e) Has the registration of the medicine been rejected/deferred /cancelled in any country?',
              'escape' => false,
              'type' => 'radio',  
              'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No']
            ));

            echo $this->Form->control('rejected_other_country_details', array(
              'label' =>  'If Yes,State details/reason', 
               'escape' => false,
               'templates' => 'textarea_form' 
            ));

            echo $this->Form->control('administration_route', array(
              'label' =>  'Administration route, dosage, dosage interval and period for the medicine being tested and the medicine being used as a control', 
               'escape' => false,
               'templates' => 'textarea_form' 
            ));

            echo $this->Form->control('status_medicine', array(
              'label' =>  'f) What is the status of medicine in Zimbabwe?',
              'escape' => false,
              'type' => 'radio',  
              'templates' => 'radio_form', 'options' => ['Registered' => 'Registered', 'Unregistered ' => 'Unregistered', 'Application for registration submitted'=>'Application for registration submitted']
            ));

            echo $this->Form->control('state_antidote', array(
              'label' =>  'State Antidote', 
               'escape' => false,
               'templates' => 'textarea_form' 
            ));

            echo $this->Form->control('exemption_required', array(
              'label' =>  'State the quantity of the medicine for which exemption is required if the medicine is not registered', 
               'escape' => false,
               'templates' => 'textarea_form' 
            ));

            //echo $this->element('multi/list_of_medicine');

          echo '<label>6.3</label>';
            echo $this->Form->control('given_concomitantly', array(
              'label' =>  'Will medicine be given concomitantly?',
              'escape' => false,
              'type' => 'radio',  
              'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No']
            ));
            echo $this->Form->control('concomitant_medicine', array(
              'label' =>  'If YES, state the name of the other medicines', 
               'escape' => false 
            ));

            echo $this->Form->control('concurrent_medicine', array(
              'label' =>  ' State whether the person already on another medicine will be given the experimential medicine at the same time or will be taken off the medicine',
              'escape' => false,
              'type' => 'radio',  
              'templates' => 'radio_form', 'options' => ['Concurrenlty' => 'Concurrenlty', 'Taken off medicine' => 'Taken off medicine']
            ));

            echo $this->Form->control('safety', array(
              'label' => 'State measures to be implemented to ensure the safe handling of medicines and promote and control compliances with the prescribed instructions<i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 
              'escape' => false, 
              'templates' => 'textarea_form'
            ));
          ?>