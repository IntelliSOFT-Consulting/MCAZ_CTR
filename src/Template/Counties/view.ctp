<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\County $county
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit County'), ['action' => 'edit', $county->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete County'), ['action' => 'delete', $county->id], ['confirm' => __('Are you sure you want to delete # {0}?', $county->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Counties'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New County'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pqmps'), ['controller' => 'Pqmps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pqmp'), ['controller' => 'Pqmps', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sadr Followups'), ['controller' => 'SadrFollowups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sadr Followup'), ['controller' => 'SadrFollowups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sadrs'), ['controller' => 'Sadrs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sadr'), ['controller' => 'Sadrs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sub Counties'), ['controller' => 'SubCounties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sub County'), ['controller' => 'SubCounties', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="counties view large-9 medium-8 columns content">
    <h3><?= h($county->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('County Name') ?></th>
            <td><?= h($county->county_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($county->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($county->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($county->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Pqmps') ?></h4>
        <?php if (!empty($county->pqmps)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('County Id') ?></th>
                <th scope="col"><?= __('Sub County Id') ?></th>
                <th scope="col"><?= __('Country Id') ?></th>
                <th scope="col"><?= __('Designation Id') ?></th>
                <th scope="col"><?= __('Facility Name') ?></th>
                <th scope="col"><?= __('Facility Code') ?></th>
                <th scope="col"><?= __('Facility Address') ?></th>
                <th scope="col"><?= __('Facility Phone') ?></th>
                <th scope="col"><?= __('Brand Name') ?></th>
                <th scope="col"><?= __('Generic Name') ?></th>
                <th scope="col"><?= __('Batch Number') ?></th>
                <th scope="col"><?= __('Manufacture Date') ?></th>
                <th scope="col"><?= __('Expiry Date') ?></th>
                <th scope="col"><?= __('Receipt Date') ?></th>
                <th scope="col"><?= __('Name Of Manufacturer') ?></th>
                <th scope="col"><?= __('Country Of Origin') ?></th>
                <th scope="col"><?= __('Supplier Name') ?></th>
                <th scope="col"><?= __('Supplier Address') ?></th>
                <th scope="col"><?= __('Product Formulation') ?></th>
                <th scope="col"><?= __('Product Formulation Specify') ?></th>
                <th scope="col"><?= __('Colour Change') ?></th>
                <th scope="col"><?= __('Separating') ?></th>
                <th scope="col"><?= __('Powdering') ?></th>
                <th scope="col"><?= __('Caking') ?></th>
                <th scope="col"><?= __('Moulding') ?></th>
                <th scope="col"><?= __('Odour Change') ?></th>
                <th scope="col"><?= __('Mislabeling') ?></th>
                <th scope="col"><?= __('Incomplete Pack') ?></th>
                <th scope="col"><?= __('Complaint Other') ?></th>
                <th scope="col"><?= __('Complaint Other Specify') ?></th>
                <th scope="col"><?= __('Complaint Description') ?></th>
                <th scope="col"><?= __('Require Refrigeration') ?></th>
                <th scope="col"><?= __('Product At Facility') ?></th>
                <th scope="col"><?= __('Returned By Client') ?></th>
                <th scope="col"><?= __('Stored To Recommendations') ?></th>
                <th scope="col"><?= __('Other Details') ?></th>
                <th scope="col"><?= __('Comments') ?></th>
                <th scope="col"><?= __('Reporter Name') ?></th>
                <th scope="col"><?= __('Reporter Email') ?></th>
                <th scope="col"><?= __('Contact Number') ?></th>
                <th scope="col"><?= __('Emails') ?></th>
                <th scope="col"><?= __('Submitted') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Device') ?></th>
                <th scope="col"><?= __('Notified') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($county->pqmps as $pqmps): ?>
            <tr>
                <td><?= h($pqmps->id) ?></td>
                <td><?= h($pqmps->user_id) ?></td>
                <td><?= h($pqmps->county_id) ?></td>
                <td><?= h($pqmps->sub_county_id) ?></td>
                <td><?= h($pqmps->country_id) ?></td>
                <td><?= h($pqmps->designation_id) ?></td>
                <td><?= h($pqmps->facility_name) ?></td>
                <td><?= h($pqmps->facility_code) ?></td>
                <td><?= h($pqmps->facility_address) ?></td>
                <td><?= h($pqmps->facility_phone) ?></td>
                <td><?= h($pqmps->brand_name) ?></td>
                <td><?= h($pqmps->generic_name) ?></td>
                <td><?= h($pqmps->batch_number) ?></td>
                <td><?= h($pqmps->manufacture_date) ?></td>
                <td><?= h($pqmps->expiry_date) ?></td>
                <td><?= h($pqmps->receipt_date) ?></td>
                <td><?= h($pqmps->name_of_manufacturer) ?></td>
                <td><?= h($pqmps->country_of_origin) ?></td>
                <td><?= h($pqmps->supplier_name) ?></td>
                <td><?= h($pqmps->supplier_address) ?></td>
                <td><?= h($pqmps->product_formulation) ?></td>
                <td><?= h($pqmps->product_formulation_specify) ?></td>
                <td><?= h($pqmps->colour_change) ?></td>
                <td><?= h($pqmps->separating) ?></td>
                <td><?= h($pqmps->powdering) ?></td>
                <td><?= h($pqmps->caking) ?></td>
                <td><?= h($pqmps->moulding) ?></td>
                <td><?= h($pqmps->odour_change) ?></td>
                <td><?= h($pqmps->mislabeling) ?></td>
                <td><?= h($pqmps->incomplete_pack) ?></td>
                <td><?= h($pqmps->complaint_other) ?></td>
                <td><?= h($pqmps->complaint_other_specify) ?></td>
                <td><?= h($pqmps->complaint_description) ?></td>
                <td><?= h($pqmps->require_refrigeration) ?></td>
                <td><?= h($pqmps->product_at_facility) ?></td>
                <td><?= h($pqmps->returned_by_client) ?></td>
                <td><?= h($pqmps->stored_to_recommendations) ?></td>
                <td><?= h($pqmps->other_details) ?></td>
                <td><?= h($pqmps->comments) ?></td>
                <td><?= h($pqmps->reporter_name) ?></td>
                <td><?= h($pqmps->reporter_email) ?></td>
                <td><?= h($pqmps->contact_number) ?></td>
                <td><?= h($pqmps->emails) ?></td>
                <td><?= h($pqmps->submitted) ?></td>
                <td><?= h($pqmps->active) ?></td>
                <td><?= h($pqmps->device) ?></td>
                <td><?= h($pqmps->notified) ?></td>
                <td><?= h($pqmps->created) ?></td>
                <td><?= h($pqmps->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Pqmps', 'action' => 'view', $pqmps->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pqmps', 'action' => 'edit', $pqmps->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pqmps', 'action' => 'delete', $pqmps->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pqmps->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sadr Followups') ?></h4>
        <?php if (!empty($county->sadr_followups)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('County Id') ?></th>
                <th scope="col"><?= __('Sadr Id') ?></th>
                <th scope="col"><?= __('Designation Id') ?></th>
                <th scope="col"><?= __('Description Of Reaction') ?></th>
                <th scope="col"><?= __('Outcome') ?></th>
                <th scope="col"><?= __('Reporter Email') ?></th>
                <th scope="col"><?= __('Reporter Phone') ?></th>
                <th scope="col"><?= __('Submitted') ?></th>
                <th scope="col"><?= __('Emails') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Device') ?></th>
                <th scope="col"><?= __('Notified') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($county->sadr_followups as $sadrFollowups): ?>
            <tr>
                <td><?= h($sadrFollowups->id) ?></td>
                <td><?= h($sadrFollowups->user_id) ?></td>
                <td><?= h($sadrFollowups->county_id) ?></td>
                <td><?= h($sadrFollowups->sadr_id) ?></td>
                <td><?= h($sadrFollowups->designation_id) ?></td>
                <td><?= h($sadrFollowups->description_of_reaction) ?></td>
                <td><?= h($sadrFollowups->outcome) ?></td>
                <td><?= h($sadrFollowups->reporter_email) ?></td>
                <td><?= h($sadrFollowups->reporter_phone) ?></td>
                <td><?= h($sadrFollowups->submitted) ?></td>
                <td><?= h($sadrFollowups->emails) ?></td>
                <td><?= h($sadrFollowups->active) ?></td>
                <td><?= h($sadrFollowups->device) ?></td>
                <td><?= h($sadrFollowups->notified) ?></td>
                <td><?= h($sadrFollowups->created) ?></td>
                <td><?= h($sadrFollowups->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SadrFollowups', 'action' => 'view', $sadrFollowups->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SadrFollowups', 'action' => 'edit', $sadrFollowups->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SadrFollowups', 'action' => 'delete', $sadrFollowups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sadrFollowups->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sadrs') ?></h4>
        <?php if (!empty($county->sadrs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('County Id') ?></th>
                <th scope="col"><?= __('Sub County Id') ?></th>
                <th scope="col"><?= __('Designation Id') ?></th>
                <th scope="col"><?= __('Vigiflow Id') ?></th>
                <th scope="col"><?= __('Report Title') ?></th>
                <th scope="col"><?= __('Report Type') ?></th>
                <th scope="col"><?= __('Name Of Institution') ?></th>
                <th scope="col"><?= __('Institution Code') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Contact') ?></th>
                <th scope="col"><?= __('Patient Name') ?></th>
                <th scope="col"><?= __('Ip No') ?></th>
                <th scope="col"><?= __('Date Of Birth') ?></th>
                <th scope="col"><?= __('Age Group') ?></th>
                <th scope="col"><?= __('Patient Address') ?></th>
                <th scope="col"><?= __('Ward') ?></th>
                <th scope="col"><?= __('Gender') ?></th>
                <th scope="col"><?= __('Known Allergy') ?></th>
                <th scope="col"><?= __('Known Allergy Specify') ?></th>
                <th scope="col"><?= __('Pregnant') ?></th>
                <th scope="col"><?= __('Pregnancy Status') ?></th>
                <th scope="col"><?= __('Weight') ?></th>
                <th scope="col"><?= __('Height') ?></th>
                <th scope="col"><?= __('Diagnosis') ?></th>
                <th scope="col"><?= __('Date Of Onset Of Reaction') ?></th>
                <th scope="col"><?= __('Description Of Reaction') ?></th>
                <th scope="col"><?= __('Severity') ?></th>
                <th scope="col"><?= __('Action Taken') ?></th>
                <th scope="col"><?= __('Outcome') ?></th>
                <th scope="col"><?= __('Causality') ?></th>
                <th scope="col"><?= __('Any Other Comment') ?></th>
                <th scope="col"><?= __('Reporter Name') ?></th>
                <th scope="col"><?= __('Reporter Email') ?></th>
                <th scope="col"><?= __('Reporter Phone') ?></th>
                <th scope="col"><?= __('Submitted') ?></th>
                <th scope="col"><?= __('Emails') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Device') ?></th>
                <th scope="col"><?= __('Notified') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($county->sadrs as $sadrs): ?>
            <tr>
                <td><?= h($sadrs->id) ?></td>
                <td><?= h($sadrs->user_id) ?></td>
                <td><?= h($sadrs->county_id) ?></td>
                <td><?= h($sadrs->sub_county_id) ?></td>
                <td><?= h($sadrs->designation_id) ?></td>
                <td><?= h($sadrs->vigiflow_id) ?></td>
                <td><?= h($sadrs->report_title) ?></td>
                <td><?= h($sadrs->report_type) ?></td>
                <td><?= h($sadrs->name_of_institution) ?></td>
                <td><?= h($sadrs->institution_code) ?></td>
                <td><?= h($sadrs->address) ?></td>
                <td><?= h($sadrs->contact) ?></td>
                <td><?= h($sadrs->patient_name) ?></td>
                <td><?= h($sadrs->ip_no) ?></td>
                <td><?= h($sadrs->date_of_birth) ?></td>
                <td><?= h($sadrs->age_group) ?></td>
                <td><?= h($sadrs->patient_address) ?></td>
                <td><?= h($sadrs->ward) ?></td>
                <td><?= h($sadrs->gender) ?></td>
                <td><?= h($sadrs->known_allergy) ?></td>
                <td><?= h($sadrs->known_allergy_specify) ?></td>
                <td><?= h($sadrs->pregnant) ?></td>
                <td><?= h($sadrs->pregnancy_status) ?></td>
                <td><?= h($sadrs->weight) ?></td>
                <td><?= h($sadrs->height) ?></td>
                <td><?= h($sadrs->diagnosis) ?></td>
                <td><?= h($sadrs->date_of_onset_of_reaction) ?></td>
                <td><?= h($sadrs->description_of_reaction) ?></td>
                <td><?= h($sadrs->severity) ?></td>
                <td><?= h($sadrs->action_taken) ?></td>
                <td><?= h($sadrs->outcome) ?></td>
                <td><?= h($sadrs->causality) ?></td>
                <td><?= h($sadrs->any_other_comment) ?></td>
                <td><?= h($sadrs->reporter_name) ?></td>
                <td><?= h($sadrs->reporter_email) ?></td>
                <td><?= h($sadrs->reporter_phone) ?></td>
                <td><?= h($sadrs->submitted) ?></td>
                <td><?= h($sadrs->emails) ?></td>
                <td><?= h($sadrs->active) ?></td>
                <td><?= h($sadrs->device) ?></td>
                <td><?= h($sadrs->notified) ?></td>
                <td><?= h($sadrs->created) ?></td>
                <td><?= h($sadrs->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sadrs', 'action' => 'view', $sadrs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sadrs', 'action' => 'edit', $sadrs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sadrs', 'action' => 'delete', $sadrs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sadrs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sub Counties') ?></h4>
        <?php if (!empty($county->sub_counties)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('County Id') ?></th>
                <th scope="col"><?= __('Sub County Name') ?></th>
                <th scope="col"><?= __('County Name') ?></th>
                <th scope="col"><?= __('Province') ?></th>
                <th scope="col"><?= __('Pop 2009') ?></th>
                <th scope="col"><?= __('RegVoters') ?></th>
                <th scope="col"><?= __('AreaSqKms') ?></th>
                <th scope="col"><?= __('CAWards') ?></th>
                <th scope="col"><?= __('MainEthnicGroup') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($county->sub_counties as $subCounties): ?>
            <tr>
                <td><?= h($subCounties->id) ?></td>
                <td><?= h($subCounties->county_id) ?></td>
                <td><?= h($subCounties->sub_county_name) ?></td>
                <td><?= h($subCounties->county_name) ?></td>
                <td><?= h($subCounties->Province) ?></td>
                <td><?= h($subCounties->Pop_2009) ?></td>
                <td><?= h($subCounties->RegVoters) ?></td>
                <td><?= h($subCounties->AreaSqKms) ?></td>
                <td><?= h($subCounties->CAWards) ?></td>
                <td><?= h($subCounties->MainEthnicGroup) ?></td>
                <td><?= h($subCounties->created) ?></td>
                <td><?= h($subCounties->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SubCounties', 'action' => 'view', $subCounties->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SubCounties', 'action' => 'edit', $subCounties->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SubCounties', 'action' => 'delete', $subCounties->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subCounties->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($county->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Designation Id') ?></th>
                <th scope="col"><?= __('County Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Confirm Password') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Group Id') ?></th>
                <th scope="col"><?= __('Name Of Institution') ?></th>
                <th scope="col"><?= __('Institution Address') ?></th>
                <th scope="col"><?= __('Institution Code') ?></th>
                <th scope="col"><?= __('Institution Contact') ?></th>
                <th scope="col"><?= __('Ward') ?></th>
                <th scope="col"><?= __('Phone No') ?></th>
                <th scope="col"><?= __('Forgot Password') ?></th>
                <th scope="col"><?= __('Initial Email') ?></th>
                <th scope="col"><?= __('Is Active') ?></th>
                <th scope="col"><?= __('Is Admin') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($county->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->designation_id) ?></td>
                <td><?= h($users->county_id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->confirm_password) ?></td>
                <td><?= h($users->name) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->group_id) ?></td>
                <td><?= h($users->name_of_institution) ?></td>
                <td><?= h($users->institution_address) ?></td>
                <td><?= h($users->institution_code) ?></td>
                <td><?= h($users->institution_contact) ?></td>
                <td><?= h($users->ward) ?></td>
                <td><?= h($users->phone_no) ?></td>
                <td><?= h($users->forgot_password) ?></td>
                <td><?= h($users->initial_email) ?></td>
                <td><?= h($users->is_active) ?></td>
                <td><?= h($users->is_admin) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
