
          <h5>9.0 DESIGN OF THE TRIAL</h5>
          <hr>
          <?php
            echo $this->Form->control('design_controlled', array(
              'type' => 'radio',  
              'templates' => 'radio_form', 'options' => ['Opened' => 'Opened', 'Controlled' => 'Controlled'],
              'label' => 'Type of trial <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false
            ));
          ?>
          <div class="ctr-groups">
            <p class="topper"><em class="text-success">'If controlled'</em></p>
          <?php
            echo $this->Form->control('design_controlled_randomised', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Randomised'
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
              'escape' => false,
              'label' => 'Other medicinal product(s)',
            ));
            echo $this->Form->control('design_controlled_placebo', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'escape' => false,
              'label' => 'Placebo'
            ));
            echo $this->Form->control('design_controlled_medicinal_other', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'escape' => false,
              'label' => 'Other'
            ));
            echo $this->Form->control('design_controlled_medicinal_specify', array(
              'label' => 'If yes to other, specify'
            ));
          ?>
          </div>