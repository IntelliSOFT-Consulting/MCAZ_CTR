<?php
    $this->Html->script('multi/organizations', array('block' => true));
?>
<h5>10.0 ORGANISATIONS TO WHOM THE SPONSOR HAS TRANSFERRED TRIAL RELATED DUTIES AND FUNCTIONS (<small>repeat as needed for multiple organisations
                    - <button type="button" class="btn btn-primary btn-xs" id="addorganizations" title="add organization">Add organizations</button></small>) </h5>
<div class="ctr-groups">
    <?php
        echo $this->Form->input('organisations_transferred_', array(
            'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'], 'escape' => false,
            'label' => 'Has the sponsor transferred any major or all the sponsor&rsquo;s trial related duties and functions to another organisation or third party? <span class="sterix">*</span>',
        ));
    ?>
    <small><em>Repeat as necessary for multiple organizations</em></small>
    <div id="organization_primary">
    <?php
        echo $this->Form->input('organizations.0.id', ['templates' => 'table_form']);
        echo $this->Form->input('organizations.0.organization', array(
            'label' => 'organizations',
        ));
        echo $this->Form->input('organizations.0.contact_person', array(
            'label' => 'Name of contact person',
        ));
        echo $this->Form->input('organizations.0.address', array(
            'label' => 'Address',
        ));
        echo $this->Form->input('organizations.0.telephone_number', array(
            'label' => 'Telephone Number',
        ));


        echo $this->Form->input('organizations.0.all_tasks', array(
            'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
            'label' => 'All tasks of the sponsor'
        ));

        echo $this->Form->input('organizations.0.monitoring', array(
            'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No']            
        )); 

        echo $this->Form->input('organizations.0.regulatory', array(
            'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
            'label' => 'Regulatory (e.g. preparation of applications to CA and ethics committee)'
        ));

        echo $this->Form->input('organizations.0.investigator_recruitment', array(
            'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
        ));
        echo $this->Form->input('organizations.0.ivrs_treatment_randomisation', array(
            'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
            'label' => 'IVRS &mdash; treatment randomisation', 'escape' => false
        ));

        echo $this->Form->input('organizations.0.data_management', array(
            'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
            'label' => 'Data management'
        ));

        echo $this->Form->input('organizations.0.e_data_capture', array(
            'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
            'label' => 'E-data capture',
        ));

        echo $this->Form->input('organizations.0.quality_assurance_auditing', array(
            'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
            'label' => 'Quality assurance auditing',
        ));

        echo $this->Form->input('organizations.0.statistical_analysis', array(
            'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
            'label' => 'Statistical analysis',
        ));

        echo $this->Form->input('organizations.0.medical_writing', array(
            'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
            'label' => 'Medical Writing',
        ));

        echo $this->Form->input('organizations.0.other_duties', array(
            'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
            'label' => 'Other duties subcontracted'
        ));

        echo $this->Form->input('organizations.0.other_duties_specify', array(
            'label' => 'If yes to other, please specify',
        ));
    ?>
    </div>
    <hr>

    <!--REPEATING SECTION-->
    <div id="organization_multis">
    <?php
    if (!empty($this->request->data['organizations'])) {
        for ($i = 1; $i <= count($this->request->data['organizations'])-1; $i++) {
        ?>
    <div class="organization-group">
    <?php
        echo $this->Form->input('organizations'.$i.'id', ['templates' => 'table_form']);
        echo $this->Form->input('organizations.'.$i.'.organization', array(
            'label' => 'organizations',
        ));
        echo $this->Form->input('organizations.'.$i.'.contact_person', array(
            'label' => 'Name of contact person',
        ));
        echo $this->Form->input('organizations.'.$i.'.address', array(
            'label' => 'Address',
        ));
        echo $this->Form->input('organizations.'.$i.'.telephone_number', array(
            'label' => 'Telephone Number',
        ));


        echo $this->Form->input('organizations.'.$i.'.all_tasks', array(
            'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
            'label' => 'All tasks of the sponsor'
        ));

        echo $this->Form->input('organizations.'.$i.'.monitoring', array(
            'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No']            
        )); 

        echo $this->Form->input('organizations.'.$i.'.regulatory', array(
            'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
            'label' => 'Regulatory (e.g. preparation of applications to CA and ethics committee)'
        ));

        echo $this->Form->input('organizations.'.$i.'.investigator_recruitment', array(
            'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
        ));
        echo $this->Form->input('organizations.'.$i.'.ivrs_treatment_randomisation', array(
            'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
            'label' => 'IVRS &mdash; treatment randomisation'
        ));

        echo $this->Form->input('organizations.'.$i.'.data_management', array(
            'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
            'label' => 'Data management'
        ));

        echo $this->Form->input('organizations.'.$i.'.e_data_capture', array(
            'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
            'label' => 'E-data capture',
        ));

        echo $this->Form->input('organizations.'.$i.'.quality_assurance_auditing', array(
            'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
            'label' => 'Quality assurance auditing',
        ));

        echo $this->Form->input('organizations.'.$i.'.statistical_analysis', array(
            'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
            'label' => 'Statistical analysis',
        ));

        echo $this->Form->input('organizations.'.$i.'.medical_writing', array(
            'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
            'label' => 'Medical Writing',
        ));

        echo $this->Form->input('organizations.'.$i.'.other_duties', array(
            'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
            'label' => 'Other duties subcontracted'
        ));

        echo $this->Form->input('organizations.'.$i.'.other_duties_specify', array(
            'label' => 'If yes to other, please specify',
        ));

        echo $this->Html->tag('div', '<button id="organizationsButton'.$i.'" type="button" class="btn btn-mini btn-danger removeorganizations">
                                    Remove organizations</button>', array(
                    'class' => 'controls', 'escape' => false));
        echo $this->Html->tag('hr', '', array('id' => 'organizationsHr'.$i.''));
            ?>
        </div>
    <?php
        }
      }
    ?>
    </div>
</div>
