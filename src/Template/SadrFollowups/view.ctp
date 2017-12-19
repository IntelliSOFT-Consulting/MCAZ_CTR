<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SadrFollowup $sadrFollowup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sadr Followup'), ['action' => 'edit', $sadrFollowup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sadr Followup'), ['action' => 'delete', $sadrFollowup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sadrFollowup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sadr Followups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sadr Followup'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Counties'), ['controller' => 'Counties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New County'), ['controller' => 'Counties', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sadrs'), ['controller' => 'Sadrs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sadr'), ['controller' => 'Sadrs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Designations'), ['controller' => 'Designations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Designation'), ['controller' => 'Designations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Feedbacks'), ['controller' => 'Feedbacks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Feedback'), ['controller' => 'Feedbacks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sadr List Of Drugs'), ['controller' => 'SadrListOfDrugs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sadr List Of Drug'), ['controller' => 'SadrListOfDrugs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sadrFollowups view large-9 medium-8 columns content">
    <h3><?= h($sadrFollowup->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $sadrFollowup->has('user') ? $this->Html->link($sadrFollowup->user->name, ['controller' => 'Users', 'action' => 'view', $sadrFollowup->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('County') ?></th>
            <td><?= $sadrFollowup->has('county') ? $this->Html->link($sadrFollowup->county->id, ['controller' => 'Counties', 'action' => 'view', $sadrFollowup->county->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sadr') ?></th>
            <td><?= $sadrFollowup->has('sadr') ? $this->Html->link($sadrFollowup->sadr->id, ['controller' => 'Sadrs', 'action' => 'view', $sadrFollowup->sadr->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Designation') ?></th>
            <td><?= $sadrFollowup->has('designation') ? $this->Html->link($sadrFollowup->designation->name, ['controller' => 'Designations', 'action' => 'view', $sadrFollowup->designation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Outcome') ?></th>
            <td><?= h($sadrFollowup->outcome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Email') ?></th>
            <td><?= h($sadrFollowup->reporter_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Phone') ?></th>
            <td><?= h($sadrFollowup->reporter_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sadrFollowup->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Submitted') ?></th>
            <td><?= $this->Number->format($sadrFollowup->submitted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Emails') ?></th>
            <td><?= $this->Number->format($sadrFollowup->emails) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Device') ?></th>
            <td><?= $this->Number->format($sadrFollowup->device) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Notified') ?></th>
            <td><?= $this->Number->format($sadrFollowup->notified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($sadrFollowup->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($sadrFollowup->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $sadrFollowup->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description Of Reaction') ?></h4>
        <?= $this->Text->autoParagraph(h($sadrFollowup->description_of_reaction)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Attachments') ?></h4>
        <?php if (!empty($sadrFollowup->attachments)): ?>
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
            <?php foreach ($sadrFollowup->attachments as $attachments): ?>
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
        <?php if (!empty($sadrFollowup->feedbacks)): ?>
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
            <?php foreach ($sadrFollowup->feedbacks as $feedbacks): ?>
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
        <?php if (!empty($sadrFollowup->messages)): ?>
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
            <?php foreach ($sadrFollowup->messages as $messages): ?>
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
    <div class="related">
        <h4><?= __('Related Sadr List Of Drugs') ?></h4>
        <?php if (!empty($sadrFollowup->sadr_list_of_drugs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sadr Id') ?></th>
                <th scope="col"><?= __('Sadr Followup Id') ?></th>
                <th scope="col"><?= __('Dose Id') ?></th>
                <th scope="col"><?= __('Route Id') ?></th>
                <th scope="col"><?= __('Frequency Id') ?></th>
                <th scope="col"><?= __('Drug Name') ?></th>
                <th scope="col"><?= __('Brand Name') ?></th>
                <th scope="col"><?= __('Dose') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('Stop Date') ?></th>
                <th scope="col"><?= __('Indication') ?></th>
                <th scope="col"><?= __('Suspected Drug') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sadrFollowup->sadr_list_of_drugs as $sadrListOfDrugs): ?>
            <tr>
                <td><?= h($sadrListOfDrugs->id) ?></td>
                <td><?= h($sadrListOfDrugs->sadr_id) ?></td>
                <td><?= h($sadrListOfDrugs->sadr_followup_id) ?></td>
                <td><?= h($sadrListOfDrugs->dose_id) ?></td>
                <td><?= h($sadrListOfDrugs->route_id) ?></td>
                <td><?= h($sadrListOfDrugs->frequency_id) ?></td>
                <td><?= h($sadrListOfDrugs->drug_name) ?></td>
                <td><?= h($sadrListOfDrugs->brand_name) ?></td>
                <td><?= h($sadrListOfDrugs->dose) ?></td>
                <td><?= h($sadrListOfDrugs->start_date) ?></td>
                <td><?= h($sadrListOfDrugs->stop_date) ?></td>
                <td><?= h($sadrListOfDrugs->indication) ?></td>
                <td><?= h($sadrListOfDrugs->suspected_drug) ?></td>
                <td><?= h($sadrListOfDrugs->created) ?></td>
                <td><?= h($sadrListOfDrugs->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SadrListOfDrugs', 'action' => 'view', $sadrListOfDrugs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SadrListOfDrugs', 'action' => 'edit', $sadrListOfDrugs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SadrListOfDrugs', 'action' => 'delete', $sadrListOfDrugs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sadrListOfDrugs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
