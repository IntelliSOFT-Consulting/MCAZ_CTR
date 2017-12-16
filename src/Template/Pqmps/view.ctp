<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pqmp $pqmp
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pqmp'), ['action' => 'edit', $pqmp->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pqmp'), ['action' => 'delete', $pqmp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pqmp->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pqmps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pqmp'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Counties'), ['controller' => 'Counties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New County'), ['controller' => 'Counties', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sub Counties'), ['controller' => 'SubCounties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sub County'), ['controller' => 'SubCounties', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Designations'), ['controller' => 'Designations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Designation'), ['controller' => 'Designations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Feedbacks'), ['controller' => 'Feedbacks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Feedback'), ['controller' => 'Feedbacks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pqmps view large-9 medium-8 columns content">
    <h3><?= h($pqmp->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $pqmp->has('user') ? $this->Html->link($pqmp->user->name, ['controller' => 'Users', 'action' => 'view', $pqmp->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('County') ?></th>
            <td><?= $pqmp->has('county') ? $this->Html->link($pqmp->county->id, ['controller' => 'Counties', 'action' => 'view', $pqmp->county->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub County') ?></th>
            <td><?= $pqmp->has('sub_county') ? $this->Html->link($pqmp->sub_county->id, ['controller' => 'SubCounties', 'action' => 'view', $pqmp->sub_county->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= $pqmp->has('country') ? $this->Html->link($pqmp->country->name, ['controller' => 'Countries', 'action' => 'view', $pqmp->country->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Designation') ?></th>
            <td><?= $pqmp->has('designation') ? $this->Html->link($pqmp->designation->name, ['controller' => 'Designations', 'action' => 'view', $pqmp->designation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Facility Name') ?></th>
            <td><?= h($pqmp->facility_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Facility Code') ?></th>
            <td><?= h($pqmp->facility_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Facility Address') ?></th>
            <td><?= h($pqmp->facility_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Facility Phone') ?></th>
            <td><?= h($pqmp->facility_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Brand Name') ?></th>
            <td><?= h($pqmp->brand_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Generic Name') ?></th>
            <td><?= h($pqmp->generic_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Batch Number') ?></th>
            <td><?= h($pqmp->batch_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Manufacture Date') ?></th>
            <td><?= h($pqmp->manufacture_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name Of Manufacturer') ?></th>
            <td><?= h($pqmp->name_of_manufacturer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country Of Origin') ?></th>
            <td><?= h($pqmp->country_of_origin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supplier Name') ?></th>
            <td><?= h($pqmp->supplier_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supplier Address') ?></th>
            <td><?= h($pqmp->supplier_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Formulation') ?></th>
            <td><?= h($pqmp->product_formulation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Formulation Specify') ?></th>
            <td><?= h($pqmp->product_formulation_specify) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Require Refrigeration') ?></th>
            <td><?= h($pqmp->require_refrigeration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product At Facility') ?></th>
            <td><?= h($pqmp->product_at_facility) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Returned By Client') ?></th>
            <td><?= h($pqmp->returned_by_client) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stored To Recommendations') ?></th>
            <td><?= h($pqmp->stored_to_recommendations) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Name') ?></th>
            <td><?= h($pqmp->reporter_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Email') ?></th>
            <td><?= h($pqmp->reporter_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Number') ?></th>
            <td><?= h($pqmp->contact_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pqmp->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Emails') ?></th>
            <td><?= $this->Number->format($pqmp->emails) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Submitted') ?></th>
            <td><?= $this->Number->format($pqmp->submitted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Device') ?></th>
            <td><?= $this->Number->format($pqmp->device) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Notified') ?></th>
            <td><?= $this->Number->format($pqmp->notified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expiry Date') ?></th>
            <td><?= h($pqmp->expiry_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Receipt Date') ?></th>
            <td><?= h($pqmp->receipt_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($pqmp->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($pqmp->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Colour Change') ?></th>
            <td><?= $pqmp->colour_change ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Separating') ?></th>
            <td><?= $pqmp->separating ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Powdering') ?></th>
            <td><?= $pqmp->powdering ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Caking') ?></th>
            <td><?= $pqmp->caking ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Moulding') ?></th>
            <td><?= $pqmp->moulding ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Odour Change') ?></th>
            <td><?= $pqmp->odour_change ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mislabeling') ?></th>
            <td><?= $pqmp->mislabeling ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Incomplete Pack') ?></th>
            <td><?= $pqmp->incomplete_pack ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Complaint Other') ?></th>
            <td><?= $pqmp->complaint_other ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $pqmp->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Complaint Other Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($pqmp->complaint_other_specify)); ?>
    </div>
    <div class="row">
        <h4><?= __('Complaint Description') ?></h4>
        <?= $this->Text->autoParagraph(h($pqmp->complaint_description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Other Details') ?></h4>
        <?= $this->Text->autoParagraph(h($pqmp->other_details)); ?>
    </div>
    <div class="row">
        <h4><?= __('Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($pqmp->comments)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Attachments') ?></h4>
        <?php if (!empty($pqmp->attachments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sadr Id') ?></th>
                <th scope="col"><?= __('Sadr Followup Id') ?></th>
                <th scope="col"><?= __('Pqmp Id') ?></th>
                <th scope="col"><?= __('Filename') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Mimetype') ?></th>
                <th scope="col"><?= __('Filesize') ?></th>
                <th scope="col"><?= __('Dir') ?></th>
                <th scope="col"><?= __('File') ?></th>
                <th scope="col"><?= __('Basename') ?></th>
                <th scope="col"><?= __('Dirname') ?></th>
                <th scope="col"><?= __('Checksum') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col"><?= __('Foreign Key') ?></th>
                <th scope="col"><?= __('Alternative') ?></th>
                <th scope="col"><?= __('Group') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pqmp->attachments as $attachments): ?>
            <tr>
                <td><?= h($attachments->id) ?></td>
                <td><?= h($attachments->sadr_id) ?></td>
                <td><?= h($attachments->sadr_followup_id) ?></td>
                <td><?= h($attachments->pqmp_id) ?></td>
                <td><?= h($attachments->filename) ?></td>
                <td><?= h($attachments->description) ?></td>
                <td><?= h($attachments->mimetype) ?></td>
                <td><?= h($attachments->filesize) ?></td>
                <td><?= h($attachments->dir) ?></td>
                <td><?= h($attachments->file) ?></td>
                <td><?= h($attachments->basename) ?></td>
                <td><?= h($attachments->dirname) ?></td>
                <td><?= h($attachments->checksum) ?></td>
                <td><?= h($attachments->model) ?></td>
                <td><?= h($attachments->foreign_key) ?></td>
                <td><?= h($attachments->alternative) ?></td>
                <td><?= h($attachments->group) ?></td>
                <td><?= h($attachments->created) ?></td>
                <td><?= h($attachments->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Attachments', 'action' => 'view', $attachments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Attachments', 'action' => 'edit', $attachments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Attachments', 'action' => 'delete', $attachments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Feedbacks') ?></h4>
        <?php if (!empty($pqmp->feedbacks)): ?>
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
            <?php foreach ($pqmp->feedbacks as $feedbacks): ?>
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
        <h4><?= __('Related Messages') ?></h4>
        <?php if (!empty($pqmp->messages)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sadr Id') ?></th>
                <th scope="col"><?= __('Pqmp Id') ?></th>
                <th scope="col"><?= __('Sadr Followup Id') ?></th>
                <th scope="col"><?= __('Sender') ?></th>
                <th scope="col"><?= __('Receiver') ?></th>
                <th scope="col"><?= __('Subject') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Sent') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pqmp->messages as $messages): ?>
            <tr>
                <td><?= h($messages->id) ?></td>
                <td><?= h($messages->sadr_id) ?></td>
                <td><?= h($messages->pqmp_id) ?></td>
                <td><?= h($messages->sadr_followup_id) ?></td>
                <td><?= h($messages->sender) ?></td>
                <td><?= h($messages->receiver) ?></td>
                <td><?= h($messages->subject) ?></td>
                <td><?= h($messages->message) ?></td>
                <td><?= h($messages->sent) ?></td>
                <td><?= h($messages->created) ?></td>
                <td><?= h($messages->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Messages', 'action' => 'view', $messages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Messages', 'action' => 'edit', $messages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Messages', 'action' => 'delete', $messages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $messages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
