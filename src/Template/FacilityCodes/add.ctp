<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FacilityCode $facilityCode
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Facility Codes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="facilityCodes form large-9 medium-8 columns content">
    <?= $this->Form->create($facilityCode) ?>
    <fieldset>
        <legend><?= __('Add Facility Code') ?></legend>
        <?php
            echo $this->Form->control('facility_code');
            echo $this->Form->control('facility_name');
            echo $this->Form->control('province');
            echo $this->Form->control('county');
            echo $this->Form->control('district');
            echo $this->Form->control('division');
            echo $this->Form->control('type');
            echo $this->Form->control('owner');
            echo $this->Form->control('location');
            echo $this->Form->control('sub_location');
            echo $this->Form->control('description_of_location');
            echo $this->Form->control('constituency');
            echo $this->Form->control('nearest_town');
            echo $this->Form->control('beds');
            echo $this->Form->control('cots');
            echo $this->Form->control('official_landline');
            echo $this->Form->control('official_fax');
            echo $this->Form->control('official_mobile');
            echo $this->Form->control('official_email');
            echo $this->Form->control('official_address');
            echo $this->Form->control('official_alternate_number');
            echo $this->Form->control('town');
            echo $this->Form->control('post_code');
            echo $this->Form->control('in_charge');
            echo $this->Form->control('job_title_of_in_charge');
            echo $this->Form->control('open_24hrs');
            echo $this->Form->control('open_weekends');
            echo $this->Form->control('operational_status');
            echo $this->Form->control('anc');
            echo $this->Form->control('art');
            echo $this->Form->control('beoc');
            echo $this->Form->control('blood');
            echo $this->Form->control('caes_sec');
            echo $this->Form->control('ceoc');
            echo $this->Form->control('c_imci');
            echo $this->Form->control('epi');
            echo $this->Form->control('fp');
            echo $this->Form->control('growm');
            echo $this->Form->control('hbc');
            echo $this->Form->control('hct');
            echo $this->Form->control('ipd');
            echo $this->Form->control('opd');
            echo $this->Form->control('outreach');
            echo $this->Form->control('pmtct');
            echo $this->Form->control('rad_xray');
            echo $this->Form->control('rhtc_rhdc');
            echo $this->Form->control('tb_diag');
            echo $this->Form->control('tb_labs');
            echo $this->Form->control('tb_treat');
            echo $this->Form->control('Youth');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
