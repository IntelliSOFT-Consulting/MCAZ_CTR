<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StorageCondition $storageCondition
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Storage Condition'), ['action' => 'edit', $storageCondition->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Storage Condition'), ['action' => 'delete', $storageCondition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storageCondition->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Storage Conditions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Storage Condition'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sdrugs'), ['controller' => 'Sdrugs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sdrug'), ['controller' => 'Sdrugs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="storageConditions view large-9 medium-8 columns content">
    <h3><?= h($storageCondition->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= $storageCondition->has('application') ? $this->Html->link($storageCondition->application->id, ['controller' => 'Applications', 'action' => 'view', $storageCondition->application->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sdrug') ?></th>
            <td><?= $storageCondition->has('sdrug') ? $this->Html->link($storageCondition->sdrug->id, ['controller' => 'Sdrugs', 'action' => 'view', $storageCondition->sdrug->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Batch Details') ?></th>
            <td><?= h($storageCondition->batch_details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Manu Process') ?></th>
            <td><?= h($storageCondition->manu_process) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Neg Seventy') ?></th>
            <td><?= h($storageCondition->neg_seventy) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Neg Twenty') ?></th>
            <td><?= h($storageCondition->neg_twenty) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pos Five') ?></th>
            <td><?= h($storageCondition->pos_five) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Model') ?></th>
            <td><?= h($storageCondition->model) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($storageCondition->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pdrug Id') ?></th>
            <td><?= $this->Number->format($storageCondition->pdrug_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pos Twenty Five') ?></th>
            <td><?= $this->Number->format($storageCondition->pos_twenty_five) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pos Thirty') ?></th>
            <td><?= $this->Number->format($storageCondition->pos_thirty) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pos Forty') ?></th>
            <td><?= $this->Number->format($storageCondition->pos_forty) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($storageCondition->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($storageCondition->updated_at) ?></td>
        </tr>
    </table>
</div>
