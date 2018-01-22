
          <div>
          <?php
            echo $this->element('multi/investigators');
          ?>
          </div>
          <?php
             //echo $this->element('multi/investigators');
          ?>
          <h4> Business </h4>
          <div id="">
          <?php
            echo $this->Form->control('business_name', array(
              'label' =>  'Name of Company <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 
              'escape' => false
            ));
            echo $this->Form->control('business_office', array(
              'label' =>  'Registered Office <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 
              'escape' => false
            ));
             echo $this->Form->control('business_physical_address', array(
              'label' =>  'Physical address <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 
              'escape' => false
            ));
            echo $this->Form->control('business_telephone', array(
              'label' =>  'Telephone number <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 
              'escape' => false
            ));
            echo $this->Form->control('business_position', array( 'label' =>  'Position of applicant <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 
              'escape' => false
            ));
            
          ?>
          </div>
          <hr>