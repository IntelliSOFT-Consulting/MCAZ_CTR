<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdrListOfDrug $adrListOfDrug
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Adr List Of Drug'), ['action' => 'edit', $adrListOfDrug->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Adr List Of Drug'), ['action' => 'delete', $adrListOfDrug->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adrListOfDrug->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Adr List Of Drugs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adr List Of Drug'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adrs'), ['controller' => 'Adrs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adr'), ['controller' => 'Adrs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Doses'), ['controller' => 'Doses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dose'), ['controller' => 'Doses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Frequencies'), ['controller' => 'Frequencies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Frequency'), ['controller' => 'Frequencies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adrListOfDrugs view large-9 medium-8 columns content">
    <h3><?= h($adrListOfDrug->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Adr') ?></th>
            <td><?= $adrListOfDrug->has('adr') ? $this->Html->link($adrListOfDrug->adr->id, ['controller' => 'Adrs', 'action' => 'view', $adrListOfDrug->adr->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Drug Name') ?></th>
            <td><?= h($adrListOfDrug->drug_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dosage') ?></th>
            <td><?= h($adrListOfDrug->dosage) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dose') ?></th>
            <td><?= $adrListOfDrug->has('dose') ? $this->Html->link($adrListOfDrug->dose->name, ['controller' => 'Doses', 'action' => 'view', $adrListOfDrug->dose->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Route') ?></th>
            <td><?= $adrListOfDrug->has('route') ? $this->Html->link($adrListOfDrug->route->name, ['controller' => 'Routes', 'action' => 'view', $adrListOfDrug->route->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Frequency') ?></th>
            <td><?= $adrListOfDrug->has('frequency') ? $this->Html->link($adrListOfDrug->frequency->name, ['controller' => 'Frequencies', 'action' => 'view', $adrListOfDrug->frequency->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Taking Drug') ?></th>
            <td><?= h($adrListOfDrug->taking_drug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Relationship To Sae') ?></th>
            <td><?= h($adrListOfDrug->relationship_to_sae) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($adrListOfDrug->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($adrListOfDrug->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stop Date') ?></th>
            <td><?= h($adrListOfDrug->stop_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($adrListOfDrug->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($adrListOfDrug->modified) ?></td>
        </tr>
    </table>
</div>
