<?php
  $this->assign('MyApplications', 'active');
  $this->Html->script('ckeditor/ckeditor', ['block' => true]);
  $this->Html->script('ckeditor/config', ['block' => true]);
  $this->Html->script('ckeditor/adapters/jquery', ['block' => true]);
      // $this->Html->script('jUpload/vendor/jquery.ui.widget.js', ['block' => true]);
      // $this->Html->script('jUpload/jquery.iframe-transport.js', ['block' => true]);
      // $this->Html->script('jUpload/jquery.fileupload.js', ['block' => true]);
  // pr($this->request->data);
?>
<div class="row">
  <?= $this->fetch('header'); ?>
  <?= $this->Flash->render() ?>
</div>
<div class="row">
  <?= $this->Form->create($application, ['type' => 'file']); ?>
    <div class="col-md-10">
      <div id="tabs">
        <ul>
          <li><a href="#tabs-1">1. Abstract</a></li>
          <li><a href="#tabs-2">2. Investigator</a></li>
          <li><a href="#tabs-3">3. Sponsor</a></li>
          <li><a href="#tabs-4">4. Participants</a></li>
          <li><a href="#tabs-5">5. Sites</a></li>
          <li><a href="#tabs-6">6. Placebo</a></li>
          <li><a href="#tabs-7">7. Criteria</a></li>
          <li><a href="#tabs-8">8. Scope</a></li>
          <li><a href="#tabs-9">9. Design</a></li>
          <li><a href="#tabs-10">10. Organizations</a></li>
          <li><a href="#tabs-11">11. Other details</a></li>
          <li><a href="#tabs-12">12. Checklist </a></li>
          <li><a href="#tabs-13">13. Declaration</a></li>
          <li><a href="#tabs-14">14. Notifications</a></li>
          <li><a href="#tabs-15">15. Financials</a></li>
        </ul>
        <div id="tabs-1">
          <?php
            echo $this->Form->control('study_title', array(
              'label' => 'Study Title <i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
              'escape' => false,
              'templates' =>'textarea_form'
            ));
            echo $this->Form->control('short_title', array(
              'label' => 'Short Title <i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
              'escape' => false
            )); 
            echo $this->Form->control('abstract_of_study', array(
              'label' =>  '<hr>ABSTRACT OF THE STUDY <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
              'templates' => 'textarea_form'
            ));
            // echo $this->Form->control('protocol_no', array(
              // 'label' =>  'Protocol No:<i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
              // , 'escape' => false
            // ));
            echo $this->Form->control('version_no', array(
              'label' =>  'Version No: <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false
            ));
            // echo $this->Form->control('title', ['class' => 'datepickers', 'templates' => [
            //   'input' => '<div class="col-sm-6"><input type="{{type}}" name="{{name}}" {{attrs}} /></div>',]]);
            echo $this->Form->control('date_of_protocol', ['type' => 'text', 'class' => 'datepickers', 'templates' => [
              'input' => '<div class="col-sm-6"><input type="{{type}}" name="{{name}}" {{attrs}} /></div>',]]);
            echo $this->Form->control('study_drug', array(
              'label' =>  'Study Drug <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false
            ));
            echo $this->Form->control('disease_condition', array(
              'label' =>  'Disease condition being investigated <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false
            ));


            echo $this->Form->control('product_type_biologicals', 
                ['type' => 'checkbox', 'label' => 'Biologicals', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label>Product Type <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]
               );
            echo "<div class='row'><div class='col-sm-offset-4 col-sm-8'> ";
              echo $this->Form->control('product_type_proteins', 
                ['type' => 'checkbox', 'label' => 'Proteins', 'templates' => 'checkbox_inline_form']);
              echo $this->Form->control('product_type_immunologicals', 
                ['type' => 'checkbox', 'label' => 'Immunologicals', 'templates' => 'checkbox_inline_form']);
              echo $this->Form->control('product_type_vaccines', 
                ['type' => 'checkbox', 'label' => 'Vaccines', 'templates' => 'checkbox_inline_form']);
              echo $this->Form->control('product_type_hormones', 
                ['type' => 'checkbox', 'label' => 'Hormones', 'templates' => 'checkbox_inline_form']);
              echo $this->Form->control('product_type_toxoid', 
                ['type' => 'checkbox', 'label' => 'Toxoid', 'templates' => 'checkbox_inline_form']);
            echo "</div></div>";

            echo $this->Form->control('product_type_chemical', 
                ['type' => 'checkbox', 'label' => 'Chemical', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]
               );
            echo $this->Form->control('product_type_chemical_name', array(
              'label' => ' ', 
              'placeholder' => 'generic name'
            ));

            echo $this->Form->control('product_type_medical_device', 
                ['type' => 'checkbox', 'label' => 'Medical Device', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]
               );
            echo $this->Form->control('product_type_medical_device_name', array(
              'label' => ' ', 'placeholder' => ''
            ));

            echo $this->element('multi/previous_dates'); 

            echo $this->Form->control('approval_date', array(
              'type' => 'text', 
              'label' => 'Approval Date of Protocol <i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
              'escape'=> false,
              'class' => 'datepickers', 'templates' => [
              'input' => '<div class="col-sm-6"><input type="{{type}}" name="{{name}}" {{attrs}} /></div>',]
            ));
          ?>
        </div>
        <div id="tabs-2">
                    <h5>2.0 CO-ORDINATING INVESTIGATOR (<em>for multicentre trials in Zimbabwe</em>) </h5>
          <hr>
          <?php
            echo $this->Form->control('investigator1_given_name', array(
              'label' =>  'Given name <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false
            ));
            echo $this->Form->control('investigator1_middle_name', array(
              'label' => array('class' => 'control-label', 'text' => 'Middle name, if applicable'), 'escape' => false
            ));
            echo $this->Form->control('investigator1_family_name', array(
              'label' =>  'Family name <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false
            ));
            echo $this->Form->control('investigator1_qualification', array(
              'label' =>  'Qualification <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false
            ));
            echo $this->Form->control('investigator1_professional_address', array(
              'label' =>  'Professional address <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false
            ));
            echo $this->Form->control('investigator1_telephone', array(
              'label' =>  'Telephone number <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false
            ));
            echo $this->Form->control('investigator1_email', array(
              'type' => 'email', 'label' =>  'email address <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false
            ));
          ?>
          <hr>
          <?php
             echo $this->element('multi/investigators');
          ?>
        </div>
        <div id="tabs-3" >
          <?php
            echo $this->element('multi/sponsors');
          ?>
        </div>
        <div id="tabs-4">
          <h5>4.0 PARTICIPANTS (SUBJECTS)</h5>
          <hr>
          <?php
            echo $this->Form->control('number_participants', array(
              'label' =>  'Expected Number of participants <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false 
            ));
            echo $this->Form->control('total_enrolment_per_site', array(
              'label' => array('class' => 'control-label required',
                      'text' => 'Total enrolment in each site: (if competitive enrolment, state minimum and maximum number per site.)  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>'), 'escape' => false 
            ));
            echo $this->Form->control('total_participants_worldwide', array(
              'label' =>  'Total participants worldwide  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false
            ));
          ?>
          <hr>
          <h5>4.1 AGE SPAN</h5>
          <hr>
          <?php
            echo $this->Form->control('population_less_than_18_years', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Less than 18 years?'
            ));
          ?>
          <div class="ctr-groups">
            <p class="topper"><em class="text-success">If Yes, Specify</em></p>
          <?php
            echo $this->Form->control('population_utero', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'In Utero'
            ));
            echo $this->Form->control('population_preterm_newborn', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Preterm Newborn Infants (up to gestational age < 37 weeks?'
            ));
            echo $this->Form->control('population_newborn', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Newborn (0-28 days)'
            ));
            echo $this->Form->control('population_infant_and_toddler', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'nfant and toddler (29 days - 23 months)'
            ));
            echo $this->Form->control('population_children', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Children (2-12 years)'
            ));
            echo $this->Form->control('population_adolescent', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Adolescent (13-17 years)'
            ));
          ?>
          </div>

          <?php
            echo $this->Form->control('population_above_18', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => '18 Years and over'
            ));
          ?>
          <div class="ctr-groups">
            <p class="topper"><em class="text-success">If Yes, Specify</em></p>
          <?php
            echo $this->Form->control('population_adult', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Adult (18-65 years)'
            ));
            echo $this->Form->control('population_elderly', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Elderly (> 65 years)'
            ));
          ?>
          </div>
          <hr>
          <h5>4.2 GROUP OF TRIAL SUBJECTS</h5>
          <hr>
          <?php
            echo $this->Form->control('subjects_healthy', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Healty volunteers'
            ));
            echo $this->Form->control('subjects_vulnerable_populations', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Specific vulnerable populations'
            ));
          ?>
          <div class="ctr-groups">
            <p class="topper"><em class="text-success">Specific vulnerable populations</em></p>
          <?php
            echo $this->Form->control('subjects_patients', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Patients'
            ));
            echo $this->Form->control('subjects_women_child_bearing', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Women of child bearing potential'
            ));
            echo $this->Form->control('subjects_women_using_contraception', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Women of child bearing potential using contraception'
            ));
            echo $this->Form->control('subjects_pregnant_women', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Pregnant women'
            ));
            echo $this->Form->control('subjects_nursing_women', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No', 'Unclear' => 'Unclear'],
              'label' => 'Nursing Women'
            ));
            echo $this->Form->control('subjects_emergency_situation', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Emergency situation'
            ));
            echo $this->Form->control('subjects_incapable_consent', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Subjects incapable of giving consent personally?'
            ));
            echo $this->Form->control('subjects_specify', array(
              'label' =>  'If yes, specify'
            ));
            echo $this->Form->control('subjects_others', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Others?'
            ));
            echo $this->Form->control('subjects_others_specify', array(
              'label' =>  'If yes, specify'
            ));
          ?>
          </div>
          <hr>
          <h5>4.3 GENDER <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5>
          <hr>
          <?php
            echo $this->Form->control('gender_female', ['type' => 'checkbox', 'label' => 'Female', 'templates' => 'checkbox_form']);
            echo $this->Form->control('gender_male', ['type' => 'checkbox', 'label' => 'Male', 'templates' => 'checkbox_form']);
          ?>
        </div>
        <div id="tabs-5">
          <h5>TICK AND PROVIDE NECESSARY DETAILS AS APPROPRIATE</h5>
          <hr>
          <h5>5.0 Number of Sites</h5>

          <?php
            echo $this->Form->control('single_site_member_state', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Singel site in Zimbabwe'
            ));
            echo $this->Form->control('location_of_area', array(
              'label' => '<b>If yes</b>, name of site', 'escape' => false
            ));
            echo $this->Form->control('single_site_physical_address', array(
              'label' => 'Physical address', 'escape' => false
            ));
            echo $this->Form->control('single_site_contact_person', array(
              'label' => 'Contact person', 'escape' => false,
            ));
            echo $this->Form->control('single_site_telephone', array(
              'label' => 'Telephone', 'escape' => false,
            ));

            echo $this->element('multi/sites');

            echo $this->Form->control('multiple_countries', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No']
            ));
            echo $this->Form->control('multiple_member_states', array(
              'label' => 'Number of states anticipated in the trial'
            ));
            echo $this->Form->control('multi_country_list', array(
              'label' => 'If yes above, list the countries'
            ));

          ?>
          <hr> <h5>5.1</h5>
          <?php
            echo $this->Form->control('staff_numbers', array(
              'label' => '<h5> Capacity of Site(s)  <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5> <h5> Number of staff, names, qualifications, experience
              -- including study co-ordinators, site facilities, emergency facilities, other relevant infrastructure)  </h5>', 'escape' => false 
            ));
          ?>
        </div>
        <div id="tabs-6">
          <?php  echo $this->element('multi/placebos');?>
        </div>
        <div id="tabs-7">
          <?php
            echo $this->Form->control('principal_inclusion_criteria', array(
              'label' => ' <hr><h5>7.0 PRINCIPAL INCLUSION CRITERIA <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5>', 
              'escape' => false, 'templates' => 'textarea_form'
            ));
            echo $this->Form->control('principal_exclusion_criteria', array(
              'label' => '<hr><h5>7.1 PRINCIPAL EXCLUSION CRITERIA <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5> ', 
              'escape' => false, 'templates' => 'textarea_form'
            ));
            echo $this->Form->control('primary_end_points', array(
              'label' => '<hr><h5>7.2 PRIMARY END POINTS <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5> ', 
              'escape' => false, 'templates' => 'textarea_form'
            ));
          ?>
        </div>
        <div id="tabs-8">
          <hr>
          <h5>8.0 SCOPE OF THE TRIAL -  <i class="sterix fa fa-asterisk" aria-hidden="true"></i> <small>Tick all boxes where applicable</small></h5>
          <div class="row">
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
                ['type' => 'checkbox', 'label' => 'Parmacokinetic', 'templates' => 'checkbox_form']);
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
            ['type' => 'checkbox', 'label' => 'If other, please specify', 'templates' => 'checkbox_form']);
          echo $this->Form->control('trial_therapeutic_exploratory', 
            ['type' => 'checkbox', 'label' => 'Therapeutic exploratory (Phase II)', 'templates' => 'checkbox_form']);
          echo $this->Form->control('trial_therapeutic_confirmatory', 
            ['type' => 'checkbox', 'label' => 'Therapeutic confirmatory (Phase III)', 'templates' => 'checkbox_form']);
          echo $this->Form->control('trial_therapeutic_use', 
            ['type' => 'checkbox', 'label' => 'Therapeutic use (Phase IV)', 'templates' => 'checkbox_form']);

          ?>
        </div>
        <div id="tabs-9">
          <h5>9.0 DESIGN OF THE TRIAL</h5>
          <hr>
          <?php
            echo $this->Form->control('design_controlled', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Controlled <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false
            ));
          ?>
          <div class="ctr-groups">
            <p class="topper"><em class="text-success">If Yes, Specify</em></p>
          <?php
            echo $this->Form->control('design_controlled_randomised', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Randomised'
            ));
            echo $this->Form->control('design_controlled_open', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Open'
            ));
            echo $this->Form->control('design_controlled_single_blind', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Single Blind'
            ));
            echo $this->Form->control('design_controlled_double_blind', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Double Blind'
            ));
            echo $this->Form->control('design_controlled_parallel_group', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Parallel group'
            ));
            echo $this->Form->control('design_controlled_cross_over', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Cross over ',
            ));
            echo $this->Form->control('design_controlled_other', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Other'
            ));
            echo $this->Form->control('design_controlled_specify', array(
              'label' => 'If yes to other, specify'
            ));
            echo $this->Form->control('design_controlled_comparator', array(
              'label' => 'If controlled, specify the comparator'
            ));
            echo $this->Form->control('design_controlled_other_medicinal', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Other medicinal product(s)',
            ));
            echo $this->Form->control('design_controlled_placebo', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Placebo'
            ));
            echo $this->Form->control('design_controlled_medicinal_other', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Other'
            ));
            echo $this->Form->control('design_controlled_medicinal_specify', array(
              'label' => 'If yes to other, specify'
            ));
          ?>
          </div>
        </div>
        <div id="tabs-10">
          <?php echo $this->element('multi/organizations');?>
        </div>
        <div id="tabs-11">
          <h5>11.0 OTHER DETAILS</h5>
          <hr>
          <?php
            echo $this->Form->control('other_details_explanation', array(
              'label' => '<h5> 11.1 If the trial is to be conducted in Zimbabwe and not in the host country of the applicant / sponsor, provide an explanation <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5>', 'escape' => false,
              'templates' => 'textarea_form'
            ));
            echo $this->Form->control('estimated_duration', array(
              'label' => '11.2 Estimated duration of trial <i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
              'escape' => false
            ));
            echo $this->Form->control('other_details_regulatory_notapproved', array(
              'label' => '<h5> 11.3 Name other Regulatory Authorities to
                which applications to do this trial have been submitted, but approval has not yet been granted. Include date(s)
                of application: <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5>', 
              'escape' => false, 'templates' => 'textarea_form'
            ));
            echo $this->Form->control('other_details_regulatory_approved', array(
              'label' => '<h5> 11.4 Name other Regulatory Authorities
                which have approved this trial, date(s) of approval and number of sites per country. <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5>', 'escape' => false, 'templates' => 'textarea_form'
            ));
            echo $this->Form->control('other_details_regulatory_rejected', array(
              'label' => '<h5> 11.5 if applicable, name other Regulatory Authorities or Ethics Committees which have rejected this trial and give reasons for rejection:</h5>', 'escape' => false , 'templates' => 'textarea_form'
            ));
            echo $this->Form->control('other_details_regulatory_halted', array(
              'label' => '<h5> 11.6 If applicable, details of and reasons for this trial having been halted at any stage by other Regulatory Authorities:</h5>', 'escape' => false, 'templates' => 'textarea_form'
            ));
          ?>
        </div>

        <div id="tabs-12">
          <?php echo $this->element('multi/checklist'); ?>
        </div>
        <div id="tabs-13">
          <h5>DECLARATION BY APPLICANT</h5>
          <hr>
          <p>We, the undersigned have submitted all requested and required documentation, and have disclosed all
            information which may influence the approval of this application. </p>

          <p>We, the undersigned, agree to ensure that if the above-said clinical trial is approved, it will be conducted
            according to the submitted protocol and Zimbabwean legal, ethical and regulatory requirements. </p>

          <?php
            echo $this->Form->control('declaration_applicant', array(
              'label' =>  'Applicant (local contact) <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false
            ));
            echo $this->Form->control('declaration_date1', 
              ['type' => 'text', 'class' => 'datepickers', 'label' => 'Date', 'templates' => [
              'input' => '<div class="col-sm-6"><input type="{{type}}" name="{{name}}" {{attrs}} /></div>',]]
            );
            echo $this->Form->control('declaration_principal_investigator', array(
              'label' =>  'National Principal Investigator / National Co-ordinator / Other (state designation) <i class="sterix fa fa-asterisk" aria-hidden="true"></i>','escape' => false
            ));
            echo $this->Form->control('declaration_date2', 
              ['type' => 'text', 'class' => 'datepickers', 'label' => 'Date', 'templates' => [
              'input' => '<div class="col-sm-6"><input type="{{type}}" name="{{name}}" {{attrs}} /></div>',]]
            );
          ?>
        </div>
        <div id="tabs-14">
          <!-- <p>Insert attachments here</p> -->
          <?php
            //echo $this->element('multi/attachments');
            echo $this->Form->control('notification', array(
              'label' => '<i class="icon-comment-alt"></i> Any other comment(s)', 'escape' => false
            ));
          ?>
        </div>
        <div id="tabs-15">
          <?php
            echo $this->element('multi/attachments');
          ?>
        </div>
      </div>
  </div>
  <div class="col-md-2">
    <div data-spy="affix" class="my-sidebar">
    <div class="well">
      <button name="saveReport" value="1" id="applicationSave" class="btn btn-primary" type="submit"
              id="SadrSaveChanges" title="Save & continue editing"
              data-content="Save changes to form without submitting it. The form will still be available for further editing.">
                  <span class="fa fa-edit" aria-hidden="true"></span> Save changes
      </button>
      <hr>
      <button name="submitReport" value="2" id="applicationSubmit" class="btn btn-success" type="submit"
                        onclick="return confirm('Are you sure you wish to submit the form to MCAZ? You will not be able to edit it later.');"
                >
                  <span class="fa fa-send" aria-hidden="true"></span> Submit to MCAZ
      </button>
      <hr>
      <button name="cancelReport" value="1" id="applicationCancel" class="btn btn-default" type="submit"
                        onclick="return confirm('Are you sure you wish to cancel the report?');"
                >
                  <span class="fa fa-close" aria-hidden="true"></span> Cancel
                </button>
      <hr>
      <?php
        // echo $this->Html->link('<button class="btn btn-primary"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF </button>', ['controller' => 'Applications', 'action' => 'view', 'ext' => 'pdf', $application->id, 'prefix' => $prefix], ['escape' => false]);
              ?>

    </div>
    </div>
  </div>
  <?= $this->Form->end() ?>
</div>

<script type="text/javascript">
  $(function() {
    $( "#tabs" ).tabs({
      cookie: {
        expires: 1
      }
    });
    // $( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
        // $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );

    $( ".datepickers" ).datepicker({
      minDate:"-100Y", maxDate:"-0D", dateFormat:'dd-mm-yy', showButtonPanel:true, changeMonth:true, changeYear:true,
      buttonImageOnly:true, showAnim:'show', showOn:'both', buttonImage:'/img/calendar.gif'
    });

    ///---- Enable or disable based on checkbox
    enable_ecct();
    $("#ApplicationEcctNotApplicable").click(enable_ecct);
    enable_scope();
    $("#ApplicationScopeOthers").click(enable_scope);
    enable_trial();
    $("#ApplicationTrialOther").click(enable_trial);

    toggle_single_location();
    $('#ApplicationSingleSiteMemberStateYes').on("click", toggle_single_location);
    $('#ApplicationSingleSiteMemberStateNo').on("click", toggle_single_location);
    $('#ApplicationLocationOfArea').change(function() {
      $('#ApplicationSingleSiteMemberStateYes').attr('checked', 'checked');
      // $('#ApplicationSingleSiteMemberStateYes').click();
      toggle_single_location();
    });

    toggle_multisite_location();
    $('#ApplicationMultipleSitesMemberStateYes').on("click", toggle_multisite_location);
    $('#ApplicationMultipleSitesMemberStateNo').on("click", toggle_multisite_location);
    $('#ApplicationNumberOfSites, #ApplicationMultiSiteList').change(function() {
      $('#ApplicationMultipleSitesMemberStateYes').attr('checked', 'checked');
      // $('#ApplicationMultipleSitesMemberStateYes').click();
      toggle_multisite_location();
    });

    toggle_multicountry_location();
    $('#ApplicationMultipleCountriesYes').on("click", toggle_multicountry_location);
    $('#ApplicationMultipleCountriesNo').on("click", toggle_multicountry_location);
    $('#ApplicationMultipleMemberStates, #ApplicationMultiCountryList').change(function() {
      $('#ApplicationMultipleCountriesYes').attr('checked', 'checked');
      // $('#ApplicationMultipleCountriesYes').click();
      toggle_multicountry_location();
    });

    $('.population_utero, .population_preterm_newborn, .population_newborn, .population_infant_and_toddler, \
      .population_infant_and_toddler, .population_children, .population_adolescent').change(function() {
      if($(this).val() == 'Yes') {
        $('#ApplicationPopulationLessThan18YearsYes').attr('checked', 'checked');
      }
    });
      $('.population_less_than_18_years').change(function() {
          if($(this).val() == 'No') {
            $('#ApplicationPopulationUteroNo, #ApplicationPopulationPretermNewbornNo, #ApplicationPopulationNewbornNo,  \
              #ApplicationPopulationInfantAndToddlerNo, #ApplicationPopulationChildrenNo, \
              #ApplicationPopulationAdolescentNo').attr('checked', 'checked');
          }
      });

    $('.population_adult, .population_elderly').change(function() {
      if($(this).val() == 'Yes') {
        $('#ApplicationPopulationAbove18Yes').attr('checked', 'checked');
      }
    });
    $('.population_above_18').change(function() {
      if($(this).val() == 'No') {
        $('#ApplicationPopulationAdultNo, #ApplicationPopulationElderlyNo').attr('checked', 'checked');
      }
    });

    $('.subjects_patients, .subjects_women_child_bearing, .subjects_women_using_contraception, .subjects_pregnant_women, \
      .subjects_nursing_women, .subjects_emergency_situation, .subjects_incapable_consent, .subjects_others').change(function() {
        if($(this).val() == 'Yes') {
          $('#ApplicationSubjectsVulnerablePopulationsYes').attr('checked', 'checked');
        }
      });
      $('.subjects_vulnerable_populations').change(function() {
        if($(this).val() == 'No') {
          $('#ApplicationSubjectsPatientsNo, #ApplicationSubjectsWomenChildBearingNo, #ApplicationSubjectsWomenUsingContraceptionNo, \
            #ApplicationSubjectsPregnantWomenNo, #ApplicationSubjectsNursingWomenNo, #ApplicationSubjectsEmergencySituationNo, \
            #ApplicationSubjectsIncapableConsentNo, #ApplicationSubjectsOthersNo').attr('checked', 'checked');
          toggle_subjects_incapable();
          toggle_subjects_others();
        }
      });

    toggle_design_controlled();
    $('#ApplicationDesignControlledYes, #ApplicationDesignControlledNo').on("click", toggle_design_controlled);
    $('.design_controlled_').change(function() {
      if($(this).attr('id') == 'ApplicationDesignControlledSpecify'){
        $('#ApplicationDesignControlledOtherYes').attr('checked', 'checked');
      }
      if ($(this).attr('id') == 'ApplicationDesignControlledMedicinalSpecify'){
        $('#ApplicationDesignControlledMedicinalOtherYes').attr('checked', 'checked');
      }
      toggle_design_controlled();
    });

    toggle_subjects_incapable();
    $('#ApplicationSubjectsIncapableConsentYes, #ApplicationSubjectsIncapableConsentNo').on("click", toggle_subjects_incapable);
    $('#ApplicationSubjectsSpecify').change(function() {
      $('#ApplicationSubjectsIncapableConsentYes').attr('checked', 'checked');
      toggle_subjects_incapable();
    });

    toggle_subjects_others();
    $('#ApplicationSubjectsOthersYes, #ApplicationSubjectsOthersNo').on("click", toggle_subjects_others);
    $('#ApplicationSubjectsOthersSpecify').change(function() {
      $('#ApplicationSubjectsOthersYes').attr('checked', 'checked');
      toggle_subjects_others();
    });

  });

  ///---- Functions to be used. Probably to be moved to separate file??


  function enable_ecct() {
    if ($("#ApplicationEcctNotApplicable").is(':checked')){
      $("#ApplicationEcctRefNumber").attr("disabled", true);
    } else {
      $("#ApplicationEcctRefNumber").removeAttr("disabled");
    }
  }
  function enable_scope() {
    if ($("#ApplicationScopeOthers").is(':checked')){
      $("#ApplicationScopeOthersSpecify").removeAttr("readonly");
    } else {
      $("#ApplicationScopeOthersSpecify").attr("readonly", "readonly");
    }
  }
  function enable_trial() {
    if ($("#ApplicationTrialOther").is(':checked')){
      $("#ApplicationTrialOtherSpecify").removeAttr("readonly");
    } else {
      $("#ApplicationTrialOtherSpecify").attr("readonly", "readonly");
    }
  }


  function toggle_single_location() {
    if ($("#ApplicationSingleSiteMemberStateYes").is(":checked")) {
      $('.single_site_member_state_f').removeAttr('readonly');
      // $('.multiple_sites_member_state_f, .multiple_countries_f ').attr('readonly', 'readonly');
      $('.multiple_sites_member_state_f').attr('readonly', 'readonly');
      $('.multiple_sites_member_state_s').attr('disabled', 'disabled');
      $('#addSiteDetail').attr('disabled', 'disabled');
      // $('#ApplicationStaffNumbers').ckeditorGet().setReadOnly();
      // $('.multiple_sites_member_state, .multiple_countries').removeAttr('checked');
      $('#ApplicationMultipleSitesMemberStateNo').prop('checked', true);
      // $('#ApplicationMultipleSitesMemberStateNo, #ApplicationMultipleCountriesNo').prop('checked', true);
      $('.removeSiteDetail').each(function() {
        $(this).click();
      });
      // $('.multiple_sites_member_state_f, .multiple_countries_f').val('');
      $('.multiple_sites_member_state_f').val('');
      $('.multiple_sites_member_state_s').val('');
    }
    else if ($("#ApplicationSingleSiteMemberStateNo").is(":checked")) {
      $('.single_site_member_state_f').attr('readonly', 'readonly').val('');
    }
  }
  function toggle_multisite_location() {
    if ($("#ApplicationMultipleSitesMemberStateYes").is(":checked")) {
      $('.multiple_sites_member_state_f').removeAttr('readonly');
      $('.multiple_sites_member_state_s').removeAttr('disabled');
      // $('.single_site_member_state_f, .multiple_countries_f').attr('readonly', 'readonly');
      $('.single_site_member_state_f').attr('readonly', 'readonly');
      $('#addSiteDetail').removeAttr('disabled');
      // $('.single_site_member_state, .multiple_countries').prop('checked', false);
      $('#ApplicationSingleSiteMemberStateNo').prop('checked', true);
      // $('#ApplicationSingleSiteMemberStateNo, #ApplicationMultipleCountriesNo').prop('checked', true);
      // $('.single_site_member_state_f, .multiple_countries_f').val('');
      $('.single_site_member_state_f').val('');
    }
    else if ($("#ApplicationMultipleSitesMemberStateNo").is(":checked")) {
      $('.multiple_sites_member_state_f').attr('readonly', 'readonly').val('');
      $('.multiple_sites_member_state_s').attr('disabled', 'disabled').val('');
      $('#addSiteDetail').attr('disabled', 'disabled');
      // $('#ApplicationStaffNumbers').ckeditorGet().setReadOnly();
      $('.removeSiteDetail').each(function() {
        $(this).click();
      });
    }
  }
  function toggle_multicountry_location() {
    if ($("#ApplicationMultipleCountriesYes").is(":checked")) {
      $('.multiple_countries_f').removeAttr('readonly');
      // $('.single_site_member_state_f, .multiple_sites_member_state_f').attr('readonly', 'readonly');
      // $('.multiple_sites_member_state_s').attr('disabled', 'disabled');
      // $('#addSiteDetail').attr('disabled', 'disabled');
      // $('#ApplicationSingleSiteMemberStateNo, #ApplicationMultipleSitesMemberStateNo').prop('checked', true);
      // $('.removeSiteDetail').each(function() {
      //   $(this).click();
      // });
      // $('.single_site_member_state_f, .multiple_sites_member_state_f').val('');
      // $('.multiple_sites_member_state_s').val('');
    }
    else if ($("#ApplicationMultipleCountriesNo").is(":checked")) {
      $('.multiple_countries_f').attr('readonly', 'readonly').val('');
    }
  }

  function toggle_design_controlled() {
    if ($("#ApplicationDesignControlledYes").is(":checked")) {
      $('.design_controlled_').removeAttr('disabled');
      $('.design_controlled_f').removeAttr('readonly');
    }  else if ($("#ApplicationDesignControlledNo").is(":checked")) {
      $('.design_controlled_').removeAttr('checked').attr('disabled', 'disabled');
      $('.design_controlled_f').val('').attr('readonly', 'readonly');
      // $('.design_controlled_:input[type="text"]').val('');
      $('.design_controlled_f').val('');
    }

    if($('#ApplicationDesignControlledOtherNo').is(':checked')){
      $('#ApplicationDesignControlledSpecify').val('').attr('readonly', 'readonly');
    } else if ($('#ApplicationDesignControlledOtherYes').is(':checked')){
      $('#ApplicationDesignControlledSpecify').removeAttr('readonly');
    }
    if($('#ApplicationDesignControlledMedicinalOtherNo').is(':checked')){
      $('#ApplicationDesignControlledMedicinalSpecify').val('').attr('readonly', 'readonly');
    } else if ($('#ApplicationDesignControlledMedicinalOtherYes').is(':checked')){
      $('#ApplicationDesignControlledMedicinalSpecify').removeAttr('readonly');
    }
  }
  function toggle_subjects_incapable() {
    if ($("#ApplicationSubjectsIncapableConsentYes").is(":checked")) {
      $('#ApplicationSubjectsSpecify').removeAttr('readonly');
    }
    else if ($("#ApplicationSubjectsIncapableConsentNo").is(":checked")) {
      $('#ApplicationSubjectsSpecify').val('').attr('readonly', 'readonly');
    }
  }
  function toggle_subjects_others() {
    if ($("#ApplicationSubjectsOthersYes").is(":checked")) {
      $('#ApplicationSubjectsOthersSpecify').removeAttr('readonly');
    }
    else if ($("#ApplicationSubjectsOthersNo").is(":checked")) {
      $('#ApplicationSubjectsOthersSpecify').val('').attr('readonly', 'readonly');
    }
  }


  // CKEDITOR.replace( 'data[Application][study_title]' );
  CKEDITOR.replace( 'study-title' );
  CKEDITOR.replace( 'abstract-of-study');
  CKEDITOR.replace( 'principal-inclusion-criteria');
  CKEDITOR.replace( 'principal-exclusion-criteria');
  CKEDITOR.replace( 'primary-end-points');
  // CKEDITOR.replace( 'data[Application][staff_numbers]');
  CKEDITOR.replace( 'other-details-explanation');
</script>
