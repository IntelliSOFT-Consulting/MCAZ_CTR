<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InvestigatorContact $investigatorContact
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Investigator Contact'), ['action' => 'edit', $investigatorContact->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Investigator Contact'), ['action' => 'delete', $investigatorContact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $investigatorContact->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Investigator Contacts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Investigator Contact'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="investigatorContacts view large-9 medium-8 columns content">
    <h3><?= h($investigatorContact->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= $investigatorContact->has('application') ? $this->Html->link($investigatorContact->application->id, ['controller' => 'Applications', 'action' => 'view', $investigatorContact->application->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Given Name') ?></th>
            <td><?= h($investigatorContact->given_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Middle Name') ?></th>
            <td><?= h($investigatorContact->middle_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Family Name') ?></th>
            <td><?= h($investigatorContact->family_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Qualification') ?></th>
            <td><?= h($investigatorContact->qualification) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Professional Address') ?></th>
            <td><?= h($investigatorContact->professional_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telephone') ?></th>
            <td><?= h($investigatorContact->telephone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($investigatorContact->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($investigatorContact->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($investigatorContact->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($investigatorContact->modified) ?></td>
        </tr>
    </table>
</div>
