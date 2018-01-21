
          <br/>
          <h4>3.0 Sponsor Details</h4>
          <?php
            echo $this->Form->control('money_source', array( 'label' =>  'Source of Funds', 
              'escape' => false
            ));
            //echo $this->element('multi/sponsors');
            //echo $this->element('multi/secondary_sponsor');
          ?>
          <h5>3.1 Primary Sponsor Details </h5>
          <div class="ctr-groups">
            <div id="sponsor_primary_contact">
            <?php
              echo $this->Form->input('sponsor_name', array(
                'label' => 'sponsors <span class="sterix">*</span>', 'escape' => false
              ));
              echo $this->Form->input('sponsor_contact_person', array(
                'label' => 'Contact Person', 'escape' => false
              ));
              echo $this->Form->input('sponsor_address', array(
                'label' => 'Address <span class="sterix">*</span>', 'escape' => false
              ));
              echo $this->Form->input('sponsor_telephone_number', array(
                'label' => 'Telephone Number <span class="sterix">*</span>', 'escape' => false
              ));
              echo $this->Form->input('sponsor_fax_number', array(
                'label' => 'Fax Number', 'escape' => false
              ));
              echo $this->Form->input('sponsor_cell_number', array(
                'label' => 'Mobile phone number <span class="sterix">*</span>', 'escape' => false
              ));
              echo $this->Form->input('sponsor_email_address', array(
                'type' => 'email',
                'label' => 'Email Address <span class="sterix">*</span>', 'escape' => false
              ));
              echo $this->Html->tag('hr', '', array('id' => 'sponsors'));
            ?>
            </div>
          </div>
          <?php
            echo $this->element('multi/sponsors');
          ?>
