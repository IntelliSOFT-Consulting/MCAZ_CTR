<?php
    $this->Html->script('multi/sites', array('inline' => false));
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
        <button title="add site" id="addsite_details" class="btn-mini multiple_sites_member_state_f" type="button">Add Site</button></small>)</h5>
    <hr>
    <div id="site_primary_detail">
    <?php
        echo $this->Form->input('site_details.0.id', ['templates' => 'table_form']);
        echo $this->Form->input('site_details.0.site_name', array(
            'label' =>  'Name of site',
        ));
        echo $this->Form->input('site_details.0.physical_address', array(
            'label' =>  'Physical address',
        ));
        echo $this->Form->input('site_details.0.contact_details', array(
            'label' => 'Contact details ',
        ));
        echo $this->Form->input('site_details.0.contact_person', array(
            'label' => 'Contact person',
        ));
        echo $this->Form->input('site_details.0.province_id', ['options' => $provinces, 'empty' => true]);

        echo $this->Html->tag('hr', '', array('id' => 'site_detailsHr0'));
    ?>
    </div>
    <div id="site_details">
    <?php
        if (!empty($this->request->data['site_details'])) {
            for ($i = 1; $i <= count($this->request->data['site_details'])-1; $i++) {
            ?>
            <div class="site-group">
            <?php
                echo $this->Html->tag('p', $i.' additional sites', array('class' => 'topper'));
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
                echo $this->Html->tag('div', '<button id="site_detailsButton'.$i.'" class="btn btn-mini btn-danger removesite_details" type="button">
                                                 Remove Site</button>', array(
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
