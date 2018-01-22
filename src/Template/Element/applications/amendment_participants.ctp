
          <h5>4.0 Participants </h5>
          <div class="col-sm-12">
          <?php
            echo $this->Form->control('participants_description', array(
              'label' =>  '<hr>Participants Description <i class="sterix fa fa-asterisk" aria-hidden="true"> </i> <small>(e.g age group of persons/animals, type or class of persons/animals, sex etc)</small>', 'escape' => false,
              'templates' => 'textarea_form'
            ));
            echo $this->Form->control('number_participants', array(
              'label' =>  'Expected Number of participants in Zimbabwe <i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
               'type'=>'number',
               'escape' => false 
            ));
            echo $this->Form->control('total_enrolment_per_site', array(
              'label' => array('class' => 'control-label required',
                      'text' => 'Total enrolment in each site: (if competitive enrolment, state minimum and maximum number per site.)  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>'), 'escape' => false 
            ));
            echo $this->Form->control('total_participants_worldwide', array(
              'label' =>  'Total participants worldwide  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 
               'type'=>'number',
               'escape' => false 
            ));

            echo $this->Form->control('participants_justification', array(
              'label' =>  '<hr>Justification <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
              'templates' => 'textarea_form'
            ));
          ?>
          </div>
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
              'label' => 'Infant and toddler (29 days - 23 months)'
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
          <hr>
          <?php
             echo $this->element('applications/amended_participants');
          ?>