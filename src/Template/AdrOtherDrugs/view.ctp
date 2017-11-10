<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdrOtherDrug $adrOtherDrug
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Adr Other Drug'), ['action' => 'edit', $adrOtherDrug->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Adr Other Drug'), ['action' => 'delete', $adrOtherDrug->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adrOtherDrug->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Adr Other Drugs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adr Other Drug'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adrs'), ['controller' => 'Adrs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adr'), ['controller' => 'Adrs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adrOtherDrugs view large-9 medium-8 columns content">
    <h3><?= h($adrOtherDrug->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Adr') ?></th>
            <td><?= $adrOtherDrug->has('adr') ? $this->Html->link($adrOtherDrug->adr->id, ['controller' => 'Adrs', 'action' => 'view', $adrOtherDrug->adr->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Drug Name') ?></th>
            <td><?= h($adrOtherDrug->drug_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Relationship To Sae') ?></th>
            <td><?= h($adrOtherDrug->relationship_to_sae) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($adrOtherDrug->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($adrOtherDrug->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stop Date') ?></th>
            <td><?= h($adrOtherDrug->stop_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($adrOtherDrug->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($adrOtherDrug->modified) ?></td>
        </tr>
    </table>
</div>
