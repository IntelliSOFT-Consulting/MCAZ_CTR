<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FacilityCode $facilityCode
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Facility Code'), ['action' => 'edit', $facilityCode->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Facility Code'), ['action' => 'delete', $facilityCode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $facilityCode->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Facility Codes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Facility Code'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="facilityCodes view large-9 medium-8 columns content">
    <h3><?= h($facilityCode->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Facility Code') ?></th>
            <td><?= h($facilityCode->facility_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Facility Name') ?></th>
            <td><?= h($facilityCode->facility_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Province') ?></th>
            <td><?= h($facilityCode->province) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('County') ?></th>
            <td><?= h($facilityCode->county) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('District') ?></th>
            <td><?= h($facilityCode->district) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Division') ?></th>
            <td><?= h($facilityCode->division) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($facilityCode->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Owner') ?></th>
            <td><?= h($facilityCode->owner) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($facilityCode->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub Location') ?></th>
            <td><?= h($facilityCode->sub_location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Constituency') ?></th>
            <td><?= h($facilityCode->constituency) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nearest Town') ?></th>
            <td><?= h($facilityCode->nearest_town) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Beds') ?></th>
            <td><?= h($facilityCode->beds) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cots') ?></th>
            <td><?= h($facilityCode->cots) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Official Landline') ?></th>
            <td><?= h($facilityCode->official_landline) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Official Fax') ?></th>
            <td><?= h($facilityCode->official_fax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Official Mobile') ?></th>
            <td><?= h($facilityCode->official_mobile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Official Email') ?></th>
            <td><?= h($facilityCode->official_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Official Address') ?></th>
            <td><?= h($facilityCode->official_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Official Alternate Number') ?></th>
            <td><?= h($facilityCode->official_alternate_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Town') ?></th>
            <td><?= h($facilityCode->town) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Post Code') ?></th>
            <td><?= h($facilityCode->post_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('In Charge') ?></th>
            <td><?= h($facilityCode->in_charge) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Job Title Of In Charge') ?></th>
            <td><?= h($facilityCode->job_title_of_in_charge) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Open 24hrs') ?></th>
            <td><?= h($facilityCode->open_24hrs) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Open Weekends') ?></th>
            <td><?= h($facilityCode->open_weekends) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Operational Status') ?></th>
            <td><?= h($facilityCode->operational_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Anc') ?></th>
            <td><?= h($facilityCode->anc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Art') ?></th>
            <td><?= h($facilityCode->art) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Beoc') ?></th>
            <td><?= h($facilityCode->beoc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Blood') ?></th>
            <td><?= h($facilityCode->blood) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Caes Sec') ?></th>
            <td><?= h($facilityCode->caes_sec) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ceoc') ?></th>
            <td><?= h($facilityCode->ceoc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('C Imci') ?></th>
            <td><?= h($facilityCode->c_imci) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Epi') ?></th>
            <td><?= h($facilityCode->epi) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fp') ?></th>
            <td><?= h($facilityCode->fp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Growm') ?></th>
            <td><?= h($facilityCode->growm) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hbc') ?></th>
            <td><?= h($facilityCode->hbc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hct') ?></th>
            <td><?= h($facilityCode->hct) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ipd') ?></th>
            <td><?= h($facilityCode->ipd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Opd') ?></th>
            <td><?= h($facilityCode->opd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Outreach') ?></th>
            <td><?= h($facilityCode->outreach) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pmtct') ?></th>
            <td><?= h($facilityCode->pmtct) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rad Xray') ?></th>
            <td><?= h($facilityCode->rad_xray) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rhtc Rhdc') ?></th>
            <td><?= h($facilityCode->rhtc_rhdc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tb Diag') ?></th>
            <td><?= h($facilityCode->tb_diag) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tb Labs') ?></th>
            <td><?= h($facilityCode->tb_labs) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tb Treat') ?></th>
            <td><?= h($facilityCode->tb_treat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Youth') ?></th>
            <td><?= h($facilityCode->Youth) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($facilityCode->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($facilityCode->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($facilityCode->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description Of Location') ?></h4>
        <?= $this->Text->autoParagraph(h($facilityCode->description_of_location)); ?>
    </div>
</div>
