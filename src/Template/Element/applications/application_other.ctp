
          <h5>12.0 OTHER DETAILS</h5>
          <hr>
          <?php
            echo $this->Form->control('estimated_duration', array(
              'label' => '12.1 State the time period for the trial <i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
              'escape' => false
            ));

            echo $this->Form->control('other_details_explanation', array(
              'label' => '<h5> 12.2 If the trial is to be conducted in Zimbabwe and not in the host country of the applicant / sponsor, provide an explanation <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5>', 'escape' => false,
              'templates' => 'textarea_form'
            ));
            
            echo $this->Form->control('other_details_regulatory_notapproved', array(
              'label' => '<h5> 12.3 Name other Regulatory Authorities to
                which applications to do this trial have been submitted, but approval has not yet been granted. Include date(s)
                of application: <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5>', 
              'escape' => false, 'templates' => 'textarea_form'
            ));
            echo $this->Form->control('other_details_regulatory_approved', array(
              'label' => '<h5> 12.4 Name other Regulatory Authorities
                which have approved this trial, date(s) of approval and number of sites per country. <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5>', 'escape' => false, 'templates' => 'textarea_form'
            ));
            echo $this->Form->control('other_details_regulatory_rejected', array(
              'label' => '<h5> 12.5 if applicable, name other Regulatory Authorities or Ethics Committees which have rejected this trial and give reasons for rejection:</h5>', 'escape' => false , 'templates' => 'textarea_form'
            ));
            echo $this->Form->control('other_details_regulatory_halted', array(
              'label' => '<h5> 12.6 If applicable, details of and reasons for this trial having been halted at any stage by other Regulatory Authorities:</h5>', 'escape' => false, 'templates' => 'textarea_form'
            ));

            echo $this->Form->control('recording_effects', array(
              'label' => '<h5> 12.7 Recording of effects, give a description of the methods of recordings and times of recordings</h5>', 'escape' => false, 'templates' => 'textarea_form'
            ));

            echo $this->Form->control('tests_done', array(
              'label' => '<h5> 12.8 State the Clinical and laboratory tests, pharmacokinetic analysis etc that are to be carried out</h5>', 'escape' => false, 'templates' => 'textarea_form'
            ));

            echo $this->Form->control('recording_method', array(
              'label' => '<h5> 12.9 State the method of recording adverse reactions and provisions for dealing with the same and other complications <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5>', 'escape' => false, 'templates' => 'textarea_form'
            ));

            echo $this->Form->control('record_keeping', array(
              'label' => '<h5> 12.10 State the procedure for keeping participants lists and participant records for each participant taking part in the trial.
(Attachment or records for identification of persons) <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5>', 'escape' => false, 'templates' => 'textarea_form'
            ));

            echo $this->Form->control('trial_storage', array(
              'label' => '<h5><b> 12.11 State where will trial code will be kept and how it can it be broken in case of an emergency <i class="sterix fa fa-asterisk" aria-hidden="true"></i></b></h5>', 'escape' => false, 'templates' => 'textarea_form'
            ));

            echo $this->Form->control('measures_compliance', array(
              'label' => '<h5> 12.12 State measures to be implemented to ensure the safe handling of medicines and promote and control compliances with prescribed instructions <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5>', 'escape' => false, 'templates' => 'textarea_form'
            ));

            echo $this->Form->control('evalution_of_results', array(
              'label' => '<h5> 12.13 Evaluation of results, state the description of methodology (eg statistical methods) <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5>', 'escape' => false, 'templates' => 'textarea_form'
            ));

            echo $this->Form->control('inform_persons', array(
              'label' => '<h5> 12.14 State how the persons or owners of animals are to be informed about the trial <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5>', 'escape' => false, 'templates' => 'textarea_form'
            ));

            echo $this->Form->control('inform_staff', array(
              'label' => '<h5> 12.15  State how the staff involved are to be informed about the way the trial is to be conducted and about the procedures for medicine usage and administration and what to do in an emergency <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5>', 'escape' => false
            ));

            echo $this->Form->control('animal_particulars', array(
              'label' => '<h5> Particulars of the animals that will take part in the clinical Trial <small>Kind and breed of animal
Age of animal if known
Names and Addresses of owners of animals</small></h5>', 'escape' => false, 'templates' => 'textarea_form'
            ));
          ?>