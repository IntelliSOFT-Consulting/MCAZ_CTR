<?php
    $this->Html->script('multi/medicines', ['block' => true]);
?>
<div class="ctr-groups" style="background-color: #f9f5f5; padding-left: 2px;">
    <h5 class="controls"><b>Other Medicines (</b><small>Repeat as necessary
        <button title="add medicine" id="addMedicineDetail" class="btn btn-primary btn-xs multiple_medicines_member_state_f" type="button">Add Medicine</button></small><b>)</b></h5>
    <hr>
    <div id="medicine_primary_detail">

    </div>
    <div id="medicines">
    <?php
        if (!empty($application['medicines'])) {
            for ($i = 0; $i <= count($application['medicines'])-1; $i++) {
            ?>
            <div class="medicine-group">
            <?php
                echo $this->Html->tag('p', ($i+1).' additional medicines', array('class' => 'topper'));
                echo $this->Form->input('medicines.'.$i.'.id', ['templates' => 'table_form']);
                echo $this->Form->input('medicines.'.$i.'.medicine_name', array(
                    'label' => 'Medicine Name  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
                    'escape' => false
                ));
                echo $this->Form->input('medicines.'.$i.'.quantity_required', array(
                    'label' =>  'Quantity of medicine required  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
                    'escape' => false
                ));
                
            echo $this->Form->control('medicines.'.$i.'.drug_details', array(
              'label' =>  '<hr> State the chemical composition, graphic and empirical formulae, animal pharmacology, toxicity and teratology as well as any clinical or field trials in humans or animals or any other relevant information or supply reports if available <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
              'templates' => 'textarea_form'));

            echo $this->Form->control('medicines.'.$i.'.medicine_reaction', array(
              'label' =>  'Adverse/ possible reactions to the medicine ', 
               'escape' => false, 'templates' => 'textarea_form'
            ));

            echo $this->Form->control('medicines.'.$i.'.medicine_therapeutic_effects', array(
              'label' =>  'Therapeutic effects of medicine', 
               'escape' => false 
            ));

            echo $this->Form->control('medicines.'.$i.'.medicine_registered', array(
              'label' =>  'a) Has the medicine been registered in the country of origin?',
              'escape' => false, 
              'type' => 'radio',  
              'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No']
            ));
          
            echo $this->Form->control('medicines.'.$i.'.medicine_registered_details', array(
              'label' =>  'State details/reason', 
               'escape' => false,
               'templates' => 'textarea_form' 
            ));
            echo $this->Form->control('medicines.'.$i.'.trials_origin_country', array(
              'label' =>  'b) Have clinical trials been conducted in the country of origin?',
              'escape' => false,
              'type' => 'radio',  
              'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No']
            ));

            echo $this->Form->control('medicines.'.$i.'.trial_origin_details', array(
              'label' =>  'State details/reason', 
               'escape' => false,
               'templates' => 'textarea_form' 
            ));

            echo $this->Form->control('medicines.'.$i.'.application_other_country', array(
              'label' =>  'c) Has application for registration been made in any other country?',
              'escape' => false,
              'type' => 'radio',  
              'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No']
            ));

            echo $this->Form->control('medicines.'.$i.'.application_other_country_details', array(
              'label' =>  'If Yes,State details/reason including the date on which the application was lodged', 
               'escape' => false,
               'templates' => 'textarea_form' 
            ));

             echo $this->Form->control('medicines.'.$i.'.registered_other_country', array(
              'label' =>  'd) Has the medicine been registered in any other country?',
              'escape' => false,
              'type' => 'radio',  
              'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No']
            ));

            echo $this->Form->control('medicines.'.$i.'.registered_other_country_details', array(
              'label' =>  'If Yes, State details/reason', 
               'escape' => false,
               'templates' => 'textarea_form' 
            ));

            echo $this->Form->control('medicines.'.$i.'.rejected_other_country', array(
              'label' =>  'e) Has the registration of the medicine been rejected/deferred /cancelled in any country?',
              'escape' => false,
              'type' => 'radio',  
              'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No']
            ));

            echo $this->Form->control('medicines.'.$i.'.rejected_other_country_details', array(
              'label' =>  'If Yes,State details/reason', 
               'escape' => false,
               'templates' => 'textarea_form' 
            ));

            echo $this->Form->control('medicines.'.$i.'.status_medicine', array(
              'label' =>  'f) What is the status of medicine in Zimbabwe?',
              'escape' => false,
              'type' => 'radio',  
              'templates' => 'radio_form', 'options' => ['Registered' => 'Registered', 'Unregistered ' => 'Unregistered', 'Application for registration submitted'=>'Application for registration submitted']
            ));

            echo $this->Form->control('medicines.'.$i.'.state_antidote', array(
              'label' =>  'State Antidote', 
               'escape' => false,
               'templates' => 'textarea_form' 
            ));

            echo $this->Form->control('medicines.'.$i.'.exemption_required', array(
              'label' =>  'State the quantity of the medicine for which exemption is required if the medicine is not registered', 
               'escape' => false,
               'templates' => 'textarea_form' 
            ));
                echo $this->Html->tag('div', '<button id="medicinesButton'.$i.'" class="btn btn-xs btn-danger removemedicines" type="button"><i class="fa fa-trash-o"></i> Remove Medicine</button>', array(
                            'class' => 'controls', 'escape' => false));
                echo $this->Html->tag('hr', '', array('id' => 'medicinesHr'.$i));
            ?>
            </div>
            <?php
            }
        }
    ?>
    </div>
</div>
