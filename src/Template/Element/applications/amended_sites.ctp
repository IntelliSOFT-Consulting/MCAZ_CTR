<?php
    $this->Html->script('multi/sites', ['block' => true]);
?>
<div class="ctr-groups">
    <?php
        echo $this->Form->input('multiple_sites_member_state', array(
            'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
            'label' => 'Multiple sites in Zimbabwe ',
        ));

        echo $this->Form->input('number_of_sites', array(
            'label' =>  'Number of sites anticipated in Zimbabwe',
        ));

    ?>
    <h5 class="controls">Details of Site(s) (<small>Repeat as necessary
        <button title="add site" id="addSiteDetail" class="btn btn-primary btn-xs multiple_sites_member_state_f" type="button">Add Site</button></small>)</h5>
    <hr>
    <div id="site_primary_detail">
    <?php
        echo $this->Form->input('single_site_name', array(
            'label' =>  'Name of site',
        ));
        echo $this->Form->input('single_site_physical_address1', array(
            'label' =>  'Physical address',
        ));
        echo $this->Form->input('single_site_contact_details', array(
            'label' => 'Contact details ',
        ));
        echo $this->Form->input('single_site_contact_person1', array(
            'label' => 'Contact person',
        ));
        echo $this->Form->input('single_site_province_id', ['label' => 'Province', 'options' => $provinces, 'empty' => true]);

        echo $this->Html->tag('hr', '', array('id' => 'site_detailsHr0'));
    ?>
    </div>
    <div id="site_details">
    <?php
        if (!empty($amendment['site_details'])) {
            for ($i = 0; $i <= count($amendment['site_details'])-1; $i++) {
            ?>
            <div class="site-group">
            <?php
                echo $this->Html->tag('p', ($i+1).' additional sites', array('class' => 'topper'));
                echo $this->Form->input('site_details.'.$i.'.id', ['templates' => 'table_form']);
                echo $this->Form->input('site_details.'.$i.'.site_name', array(
                    'label' => 'Name of site',
                ));
                echo $this->Form->input('site_details.'.$i.'.physical_address', array(
                    'label' =>  'Physical address',
                ));
                echo $this->Form->input('site_details.'.$i.'.contact_details', array(
                    'label' => 'Contact details ',
                ));
                echo $this->Form->input('site_details.'.$i.'.contact_person', array(
                    'label' => 'Contact person',
                ));
                echo $this->Form->input('site_details.'.$i.'.province_id', ['options' => $provinces, 'empty' => true]);
                echo $this->Html->tag('div', '<button id="site_detailsButton'.$i.'" class="btn btn-xs btn-danger removesite_details" type="button"><i class="fa fa-trash-o"></i> Remove Site</button>', array(
                            'class' => 'controls', 'escape' => false));
                echo $this->Html->tag('hr', '', array('id' => 'site_detailsHr'.$i));
            ?>
            </div>
            <?php
            }
        }
    ?>
    </div>
</div>
