
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