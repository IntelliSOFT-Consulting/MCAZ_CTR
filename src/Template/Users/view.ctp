<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Designations'), ['controller' => 'Designations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Designation'), ['controller' => 'Designations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Counties'), ['controller' => 'Counties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New County'), ['controller' => 'Counties', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Aro'), ['controller' => 'Aros', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aro'), ['controller' => 'Aros', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Feedbacks'), ['controller' => 'Feedbacks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Feedback'), ['controller' => 'Feedbacks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pqmps'), ['controller' => 'Pqmps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pqmp'), ['controller' => 'Pqmps', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sadr Followups'), ['controller' => 'SadrFollowups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sadr Followup'), ['controller' => 'SadrFollowups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sadrs'), ['controller' => 'Sadrs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sadr'), ['controller' => 'Sadrs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Designation') ?></th>
            <td><?= $user->has('designation') ? $this->Html->link($user->designation->name, ['controller' => 'Designations', 'action' => 'view', $user->designation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('County') ?></th>
            <td><?= $user->has('county') ? $this->Html->link($user->county->id, ['controller' => 'Counties', 'action' => 'view', $user->county->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Confirm Password') ?></th>
            <td><?= h($user->confirm_password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Group') ?></th>
            <td><?= $user->has('group') ? $this->Html->link($user->group->name, ['controller' => 'Groups', 'action' => 'view', $user->group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name Of Institution') ?></th>
            <td><?= h($user->name_of_institution) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Institution Address') ?></th>
            <td><?= h($user->institution_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Institution Code') ?></th>
            <td><?= h($user->institution_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Institution Contact') ?></th>
            <td><?= h($user->institution_contact) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ward') ?></th>
            <td><?= h($user->ward) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone No') ?></th>
            <td><?= h($user->phone_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Forgot Password') ?></th>
            <td><?= $this->Number->format($user->forgot_password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Initial Email') ?></th>
            <td><?= $this->Number->format($user->initial_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Active') ?></th>
            <td><?= $user->is_active ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Admin') ?></th>
            <td><?= $user->is_admin ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Aros') ?></h4>
        <?php if (!empty($user->aro)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('Alias') ?></th>
                <th scope="col"><?= __('Lft') ?></th>
                <th scope="col"><?= __('Rght') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->aro as $aro): ?>
            <tr>
                <td><?= h($aro->id) ?></td>
                <td><?= h($aro->parent_id) ?></td>
                <td><?= h($aro->model) ?></td>
                <td><?= h($aro->foreign_key) ?></td>
                <td><?= h($aro->alias) ?></td>
                <td><?= h($aro->lft) ?></td>
                <td><?= h($aro->rght) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Aros', 'action' => 'view', $aro->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Aros', 'action' => 'edit', $aro->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Aros', 'action' => 'delete', $aro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aro->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Feedbacks') ?></h4>
        <?php if (!empty($user->feedbacks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Sadr Id') ?></th>
                <th scope="col"><?= __('Sadr Followup Id') ?></th>
                <th scope="col"><?= __('Pqmp Id') ?></th>
                <th scope="col"><?= __('Feedback') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->feedbacks as $feedbacks): ?>
            <tr>
                <td><?= h($feedbacks->id) ?></td>
                <td><?= h($feedbacks->email) ?></td>
                <td><?= h($feedbacks->user_id) ?></td>
                <td><?= h($feedbacks->sadr_id) ?></td>
                <td><?= h($feedbacks->sadr_followup_id) ?></td>
                <td><?= h($feedbacks->pqmp_id) ?></td>
                <td><?= h($feedbacks->feedback) ?></td>
                <td><?= h($feedbacks->created) ?></td>
                <td><?= h($feedbacks->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Feedbacks', 'action' => 'view', $feedbacks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Feedbacks', 'action' => 'edit', $feedbacks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Feedbacks', 'action' => 'delete', $feedbacks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feedbacks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pqmps') ?></h4>
        <?php if (!empty($user->pqmps)): ?>
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
            <?php foreach ($user->pqmps as $pqmps): ?>
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
        <?php if (!empty($user->sadr_followups)): ?>
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
            <?php foreach ($user->sadr_followups as $sadrFollowups): ?>
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
        <?php if (!empty($user->sadrs)): ?>
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
            <?php foreach ($user->sadrs as $sadrs): ?>
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
</div>
