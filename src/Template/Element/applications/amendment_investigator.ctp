
          <div>
          <?php
            echo $this->element('multi/amendment_investigators');
          ?>
          </div>
          <?php
             //echo $this->element('multi/investigators');
          ?>
          <h4> Business </h4>
          <div id="">
          <?php
            echo $this->Form->control('business_name', array(
              'label' =>  'Name of Company', 
              'escape' => false
            ));
            echo $this->Form->control('business_office', array(
              'label' =>  'Registered Office', 
              'escape' => false
            ));
             echo $this->Form->control('business_physical_address', array(
              'label' =>  'Physical address', 
              'escape' => false
            ));
            echo $this->Form->control('business_telephone', array(
              'label' =>  'Telephone number', 
              'escape' => false
            ));
            echo $this->Form->control('business_position', array( 'label' =>  'Position of applicant', 
              'escape' => false
            ));
            
          ?>
          </div>
          <hr>