<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SadrOtherDrug $sadrOtherDrug
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sadr Other Drug'), ['action' => 'edit', $sadrOtherDrug->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sadr Other Drug'), ['action' => 'delete', $sadrOtherDrug->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sadrOtherDrug->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sadr Other Drugs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sadr Other Drug'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sadrs'), ['controller' => 'Sadrs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sadr'), ['controller' => 'Sadrs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sadrOtherDrugs view large-9 medium-8 columns content">
    <h3><?= h($sadrOtherDrug->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sadr') ?></th>
            <td><?= $sadrOtherDrug->has('sadr') ? $this->Html->link($sadrOtherDrug->sadr->id, ['controller' => 'Sadrs', 'action' => 'view', $sadrOtherDrug->sadr->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Drug Name') ?></th>
            <td><?= h($sadrOtherDrug->drug_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Suspected Drug') ?></th>
            <td><?= h($sadrOtherDrug->suspected_drug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sadrOtherDrug->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($sadrOtherDrug->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stop Date') ?></th>
            <td><?= h($sadrOtherDrug->stop_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($sadrOtherDrug->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($sadrOtherDrug->modified) ?></td>
        </tr>
    </table>
</div>
