<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adr $adr
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Adr'), ['action' => 'edit', $adr->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Adr'), ['action' => 'delete', $adr->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adr->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Adrs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adr'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Designations'), ['controller' => 'Designations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Designation'), ['controller' => 'Designations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adr Lab Tests'), ['controller' => 'AdrLabTests', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adr Lab Test'), ['controller' => 'AdrLabTests', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adr List Of Drugs'), ['controller' => 'AdrListOfDrugs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adr List Of Drug'), ['controller' => 'AdrListOfDrugs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adr Other Drugs'), ['controller' => 'AdrOtherDrugs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adr Other Drug'), ['controller' => 'AdrOtherDrugs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adrs view large-9 medium-8 columns content">
    <h3><?= h($adr->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $adr->has('user') ? $this->Html->link($adr->user->name, ['controller' => 'Users', 'action' => 'view', $adr->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mrcz Protocol Number') ?></th>
            <td><?= h($adr->mrcz_protocol_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mcaz Protocol Number') ?></th>
            <td><?= h($adr->mcaz_protocol_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Principal Investigator') ?></th>
            <td><?= h($adr->principal_investigator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Name') ?></th>
            <td><?= h($adr->reporter_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Email') ?></th>
            <td><?= h($adr->reporter_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Designation') ?></th>
            <td><?= $adr->has('designation') ? $this->Html->link($adr->designation->name, ['controller' => 'Designations', 'action' => 'view', $adr->designation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Phone') ?></th>
            <td><?= h($adr->reporter_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name Of Institution') ?></th>
            <td><?= h($adr->name_of_institution) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Institution Code') ?></th>
            <td><?= h($adr->institution_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Study Title') ?></th>
            <td><?= h($adr->study_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Study Sponsor') ?></th>
            <td><?= h($adr->study_sponsor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Participant Number') ?></th>
            <td><?= h($adr->participant_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Report Type') ?></th>
            <td><?= h($adr->report_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Birth') ?></th>
            <td><?= h($adr->date_of_birth) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= h($adr->gender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Study Week') ?></th>
            <td><?= h($adr->study_week) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visit Number') ?></th>
            <td><?= h($adr->visit_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adverse Event Type') ?></th>
            <td><?= h($adr->adverse_event_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sae Type') ?></th>
            <td><?= h($adr->sae_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Toxicity Grade') ?></th>
            <td><?= h($adr->toxicity_grade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Previous Events') ?></th>
            <td><?= h($adr->previous_events) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Previous Events Number') ?></th>
            <td><?= h($adr->previous_events_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Saes') ?></th>
            <td><?= h($adr->total_saes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location Event') ?></th>
            <td><?= h($adr->location_event) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Research Involves') ?></th>
            <td><?= h($adr->research_involves) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Drug Investigational') ?></th>
            <td><?= h($adr->drug_investigational) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patient Other Drug') ?></th>
            <td><?= h($adr->patient_other_drug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Report To Mcaz') ?></th>
            <td><?= h($adr->report_to_mcaz) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Report To Mrcz') ?></th>
            <td><?= h($adr->report_to_mrcz) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Report To Sponsor') ?></th>
            <td><?= h($adr->report_to_sponsor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Report To Irb') ?></th>
            <td><?= h($adr->report_to_irb) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('D1 Consent Form') ?></th>
            <td><?= h($adr->d1_consent_form) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('D2 Brochure') ?></th>
            <td><?= h($adr->d2_brochure) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('D3 Changes Sae') ?></th>
            <td><?= h($adr->d3_changes_sae) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('D4 Consent Sae') ?></th>
            <td><?= h($adr->d4_consent_sae) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assess Risk') ?></th>
            <td><?= h($adr->assess_risk) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($adr->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Adverse Event') ?></th>
            <td><?= h($adr->date_of_adverse_event) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Site Awareness') ?></th>
            <td><?= h($adr->date_of_site_awareness) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Report To Mcaz Date') ?></th>
            <td><?= h($adr->report_to_mcaz_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Report To Mrcz Date') ?></th>
            <td><?= h($adr->report_to_mrcz_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Report To Sponsor Date') ?></th>
            <td><?= h($adr->report_to_sponsor_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Report To Irb Date') ?></th>
            <td><?= h($adr->report_to_irb_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($adr->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($adr->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Sae Description') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->sae_description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Location Event Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->location_event_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Research Involves Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->research_involves_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Name Of Drug') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->name_of_drug)); ?>
    </div>
    <div class="row">
        <h4><?= __('Medical History') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->medical_history)); ?>
    </div>
    <div class="row">
        <h4><?= __('Diagnosis') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->diagnosis)); ?>
    </div>
    <div class="row">
        <h4><?= __('Immediate Cause') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->immediate_cause)); ?>
    </div>
    <div class="row">
        <h4><?= __('Symptoms') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->symptoms)); ?>
    </div>
    <div class="row">
        <h4><?= __('Investigations') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->investigations)); ?>
    </div>
    <div class="row">
        <h4><?= __('Results') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->results)); ?>
    </div>
    <div class="row">
        <h4><?= __('Management') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->management)); ?>
    </div>
    <div class="row">
        <h4><?= __('Outcome') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->outcome)); ?>
    </div>
    <div class="row">
        <h4><?= __('Changes Explain') ?></h4>
        <?= $this->Text->autoParagraph(h($adr->changes_explain)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Adr Lab Tests') ?></h4>
        <?php if (!empty($adr->adr_lab_tests)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Adr Id') ?></th>
                <th scope="col"><?= __('Lab Test') ?></th>
                <th scope="col"><?= __('Abnormal Result') ?></th>
                <th scope="col"><?= __('Site Normal Range') ?></th>
                <th scope="col"><?= __('Collection Date') ?></th>
                <th scope="col"><?= __('Lab Value') ?></th>
                <th scope="col"><?= __('Lab Value Date') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($adr->adr_lab_tests as $adrLabTests): ?>
            <tr>
                <td><?= h($adrLabTests->id) ?></td>
                <td><?= h($adrLabTests->adr_id) ?></td>
                <td><?= h($adrLabTests->lab_test) ?></td>
                <td><?= h($adrLabTests->abnormal_result) ?></td>
                <td><?= h($adrLabTests->site_normal_range) ?></td>
                <td><?= h($adrLabTests->collection_date) ?></td>
                <td><?= h($adrLabTests->lab_value) ?></td>
                <td><?= h($adrLabTests->lab_value_date) ?></td>
                <td><?= h($adrLabTests->created) ?></td>
                <td><?= h($adrLabTests->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AdrLabTests', 'action' => 'view', $adrLabTests->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AdrLabTests', 'action' => 'edit', $adrLabTests->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AdrLabTests', 'action' => 'delete', $adrLabTests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adrLabTests->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Adr List Of Drugs') ?></h4>
        <?php if (!empty($adr->adr_list_of_drugs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Adr Id') ?></th>
                <th scope="col"><?= __('Drug Name') ?></th>
                <th scope="col"><?= __('Dosage') ?></th>
                <th scope="col"><?= __('Dose Id') ?></th>
                <th scope="col"><?= __('Route Id') ?></th>
                <th scope="col"><?= __('Frequency Id') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('Stop Date') ?></th>
                <th scope="col"><?= __('Taking Drug') ?></th>
                <th scope="col"><?= __('Relationship To Sae') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($adr->adr_list_of_drugs as $adrListOfDrugs): ?>
            <tr>
                <td><?= h($adrListOfDrugs->id) ?></td>
                <td><?= h($adrListOfDrugs->adr_id) ?></td>
                <td><?= h($adrListOfDrugs->drug_name) ?></td>
                <td><?= h($adrListOfDrugs->dosage) ?></td>
                <td><?= h($adrListOfDrugs->dose_id) ?></td>
                <td><?= h($adrListOfDrugs->route_id) ?></td>
                <td><?= h($adrListOfDrugs->frequency_id) ?></td>
                <td><?= h($adrListOfDrugs->start_date) ?></td>
                <td><?= h($adrListOfDrugs->stop_date) ?></td>
                <td><?= h($adrListOfDrugs->taking_drug) ?></td>
                <td><?= h($adrListOfDrugs->relationship_to_sae) ?></td>
                <td><?= h($adrListOfDrugs->created) ?></td>
                <td><?= h($adrListOfDrugs->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AdrListOfDrugs', 'action' => 'view', $adrListOfDrugs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AdrListOfDrugs', 'action' => 'edit', $adrListOfDrugs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AdrListOfDrugs', 'action' => 'delete', $adrListOfDrugs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adrListOfDrugs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Adr Other Drugs') ?></h4>
        <?php if (!empty($adr->adr_other_drugs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Adr Id') ?></th>
                <th scope="col"><?= __('Drug Name') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('Stop Date') ?></th>
                <th scope="col"><?= __('Relationship To Sae') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($adr->adr_other_drugs as $adrOtherDrugs): ?>
            <tr>
                <td><?= h($adrOtherDrugs->id) ?></td>
                <td><?= h($adrOtherDrugs->adr_id) ?></td>
                <td><?= h($adrOtherDrugs->drug_name) ?></td>
                <td><?= h($adrOtherDrugs->start_date) ?></td>
                <td><?= h($adrOtherDrugs->stop_date) ?></td>
                <td><?= h($adrOtherDrugs->relationship_to_sae) ?></td>
                <td><?= h($adrOtherDrugs->created) ?></td>
                <td><?= h($adrOtherDrugs->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AdrOtherDrugs', 'action' => 'view', $adrOtherDrugs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AdrOtherDrugs', 'action' => 'edit', $adrOtherDrugs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AdrOtherDrugs', 'action' => 'delete', $adrOtherDrugs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adrOtherDrugs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
