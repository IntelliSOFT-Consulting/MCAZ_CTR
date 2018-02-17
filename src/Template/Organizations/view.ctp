<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Organization $organization
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Organization'), ['action' => 'edit', $organization->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Organization'), ['action' => 'delete', $organization->id], ['confirm' => __('Are you sure you want to delete # {0}?', $organization->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Organizations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Organization'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="organizations view large-9 medium-8 columns content">
    <h3><?= h($organization->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= $organization->has('application') ? $this->Html->link($organization->application->id, ['controller' => 'Applications', 'action' => 'view', $organization->application->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Organization') ?></th>
            <td><?= h($organization->organization) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Person') ?></th>
            <td><?= h($organization->contact_person) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($organization->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telephone Number') ?></th>
            <td><?= h($organization->telephone_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('All Tasks') ?></th>
            <td><?= h($organization->all_tasks) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Monitoring') ?></th>
            <td><?= h($organization->monitoring) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Regulatory') ?></th>
            <td><?= h($organization->regulatory) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Investigator Recruitment') ?></th>
            <td><?= h($organization->investigator_recruitment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ivrs Treatment Randomisation') ?></th>
            <td><?= h($organization->ivrs_treatment_randomisation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Management') ?></th>
            <td><?= h($organization->data_management) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('E Data Capture') ?></th>
            <td><?= h($organization->e_data_capture) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Susar Reporting') ?></th>
            <td><?= h($organization->susar_reporting) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quality Assurance Auditing') ?></th>
            <td><?= h($organization->quality_assurance_auditing) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Statistical Analysis') ?></th>
            <td><?= h($organization->statistical_analysis) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Medical Writing') ?></th>
            <td><?= h($organization->medical_writing) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other Duties') ?></th>
            <td><?= h($organization->other_duties) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Misc') ?></th>
            <td><?= h($organization->misc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($organization->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($organization->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($organization->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Other Duties Specify') ?></h4>
        <?= $this->Text->autoParagraph(h($organization->other_duties_specify)); ?>
    </div>
</div>
