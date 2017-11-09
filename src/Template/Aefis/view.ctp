<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aefi $aefi
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Aefi'), ['action' => 'edit', $aefi->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Aefi'), ['action' => 'delete', $aefi->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aefi->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Aefis'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aefi'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Designations'), ['controller' => 'Designations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Designation'), ['controller' => 'Designations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="aefis view large-9 medium-8 columns content">
    <h3><?= h($aefi->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $aefi->has('user') ? $this->Html->link($aefi->user->name, ['controller' => 'Users', 'action' => 'view', $aefi->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Designation') ?></th>
            <td><?= $aefi->has('designation') ? $this->Html->link($aefi->designation->name, ['controller' => 'Designations', 'action' => 'view', $aefi->designation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Report Type') ?></th>
            <td><?= h($aefi->report_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name Of Institution') ?></th>
            <td><?= h($aefi->name_of_institution) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Institution Code') ?></th>
            <td><?= h($aefi->institution_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patient Name') ?></th>
            <td><?= h($aefi->patient_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ip No') ?></th>
            <td><?= h($aefi->ip_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Birth') ?></th>
            <td><?= h($aefi->date_of_birth) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Age Group') ?></th>
            <td><?= h($aefi->age_group) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= h($aefi->gender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weight') ?></th>
            <td><?= h($aefi->weight) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Height') ?></th>
            <td><?= h($aefi->height) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Onset Of Reaction') ?></th>
            <td><?= h($aefi->date_of_onset_of_reaction) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of End Of Reaction') ?></th>
            <td><?= h($aefi->date_of_end_of_reaction) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration Type') ?></th>
            <td><?= h($aefi->duration_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration') ?></th>
            <td><?= h($aefi->duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Severity') ?></th>
            <td><?= h($aefi->severity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Severity Reason') ?></th>
            <td><?= h($aefi->severity_reason) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Outcome') ?></th>
            <td><?= h($aefi->outcome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Name') ?></th>
            <td><?= h($aefi->reporter_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Email') ?></th>
            <td><?= h($aefi->reporter_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reporter Phone') ?></th>
            <td><?= h($aefi->reporter_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($aefi->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Submitted') ?></th>
            <td><?= $this->Number->format($aefi->submitted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Emails') ?></th>
            <td><?= $this->Number->format($aefi->emails) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Device') ?></th>
            <td><?= $this->Number->format($aefi->device) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Notified') ?></th>
            <td><?= $this->Number->format($aefi->notified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($aefi->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($aefi->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $aefi->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description Of Reaction') ?></h4>
        <?= $this->Text->autoParagraph(h($aefi->description_of_reaction)); ?>
    </div>
    <div class="row">
        <h4><?= __('Medical History') ?></h4>
        <?= $this->Text->autoParagraph(h($aefi->medical_history)); ?>
    </div>
    <div class="row">
        <h4><?= __('Past Drug Therapy') ?></h4>
        <?= $this->Text->autoParagraph(h($aefi->past_drug_therapy)); ?>
    </div>
    <div class="row">
        <h4><?= __('Lab Test Results') ?></h4>
        <?= $this->Text->autoParagraph(h($aefi->lab_test_results)); ?>
    </div>
</div>
