<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SadrListOfDrug $sadrListOfDrug
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sadr List Of Drug'), ['action' => 'edit', $sadrListOfDrug->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sadr List Of Drug'), ['action' => 'delete', $sadrListOfDrug->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sadrListOfDrug->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sadr List Of Drugs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sadr List Of Drug'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sadrs'), ['controller' => 'Sadrs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sadr'), ['controller' => 'Sadrs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sadr Followups'), ['controller' => 'SadrFollowups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sadr Followup'), ['controller' => 'SadrFollowups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Doses'), ['controller' => 'Doses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dose'), ['controller' => 'Doses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Frequencies'), ['controller' => 'Frequencies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Frequency'), ['controller' => 'Frequencies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sadrListOfDrugs view large-9 medium-8 columns content">
    <h3><?= h($sadrListOfDrug->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sadr') ?></th>
            <td><?= $sadrListOfDrug->has('sadr') ? $this->Html->link($sadrListOfDrug->sadr->id, ['controller' => 'Sadrs', 'action' => 'view', $sadrListOfDrug->sadr->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sadr Followup') ?></th>
            <td><?= $sadrListOfDrug->has('sadr_followup') ? $this->Html->link($sadrListOfDrug->sadr_followup->id, ['controller' => 'SadrFollowups', 'action' => 'view', $sadrListOfDrug->sadr_followup->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dose') ?></th>
            <td><?= $sadrListOfDrug->has('dose') ? $this->Html->link($sadrListOfDrug->dose->name, ['controller' => 'Doses', 'action' => 'view', $sadrListOfDrug->dose->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Route') ?></th>
            <td><?= $sadrListOfDrug->has('route') ? $this->Html->link($sadrListOfDrug->route->name, ['controller' => 'Routes', 'action' => 'view', $sadrListOfDrug->route->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Frequency') ?></th>
            <td><?= $sadrListOfDrug->has('frequency') ? $this->Html->link($sadrListOfDrug->frequency->name, ['controller' => 'Frequencies', 'action' => 'view', $sadrListOfDrug->frequency->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Drug Name') ?></th>
            <td><?= h($sadrListOfDrug->drug_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Brand Name') ?></th>
            <td><?= h($sadrListOfDrug->brand_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dose') ?></th>
            <td><?= h($sadrListOfDrug->dose) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Indication') ?></th>
            <td><?= h($sadrListOfDrug->indication) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Suspected Drug') ?></th>
            <td><?= h($sadrListOfDrug->suspected_drug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sadrListOfDrug->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($sadrListOfDrug->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stop Date') ?></th>
            <td><?= h($sadrListOfDrug->stop_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($sadrListOfDrug->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($sadrListOfDrug->modified) ?></td>
        </tr>
    </table>
</div>
