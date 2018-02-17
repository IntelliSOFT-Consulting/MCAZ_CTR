<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sponsor $sponsor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sponsor'), ['action' => 'edit', $sponsor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sponsor'), ['action' => 'delete', $sponsor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sponsor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sponsors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sponsor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sponsors view large-9 medium-8 columns content">
    <h3><?= h($sponsor->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= $sponsor->has('application') ? $this->Html->link($sponsor->application->id, ['controller' => 'Applications', 'action' => 'view', $sponsor->application->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sponsor') ?></th>
            <td><?= h($sponsor->sponsor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Person') ?></th>
            <td><?= h($sponsor->contact_person) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($sponsor->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telephone Number') ?></th>
            <td><?= h($sponsor->telephone_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fax Number') ?></th>
            <td><?= h($sponsor->fax_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cell Number') ?></th>
            <td><?= h($sponsor->cell_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email Address') ?></th>
            <td><?= h($sponsor->email_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sponsor->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($sponsor->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($sponsor->modified) ?></td>
        </tr>
    </table>
</div>
