<h5>TICK AND PROVIDE NECESSARY DETAILS AS APPROPRIATE</h5>
          <hr>
          <h5>5.0 Number of Sites</h5>

          <?php
            echo $this->Form->control('single_site_member_state', array(
              'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
              'label' => 'Single site in Zimbabwe'
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

            echo $this->element('applications/amended_sites');

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