<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SdrugsCondition $sdrugsCondition
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sdrugs Condition'), ['action' => 'edit', $sdrugsCondition->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sdrugs Condition'), ['action' => 'delete', $sdrugsCondition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sdrugsCondition->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sdrugs Conditions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sdrugs Condition'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sdrugs'), ['controller' => 'Sdrugs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sdrug'), ['controller' => 'Sdrugs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pdrugs'), ['controller' => 'Pdrugs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pdrug'), ['controller' => 'Pdrugs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sdrugsConditions view large-9 medium-8 columns content">
    <h3><?= h($sdrugsCondition->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= $sdrugsCondition->has('application') ? $this->Html->link($sdrugsCondition->application->id, ['controller' => 'Applications', 'action' => 'view', $sdrugsCondition->application->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sdrug') ?></th>
            <td><?= $sdrugsCondition->has('sdrug') ? $this->Html->link($sdrugsCondition->sdrug->id, ['controller' => 'Sdrugs', 'action' => 'view', $sdrugsCondition->sdrug->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Batch Details') ?></th>
            <td><?= h($sdrugsCondition->batch_details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Manu Process') ?></th>
            <td><?= h($sdrugsCondition->manu_process) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Neg Seventy') ?></th>
            <td><?= h($sdrugsCondition->neg_seventy) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Neg Twenty') ?></th>
            <td><?= h($sdrugsCondition->neg_twenty) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pos Five') ?></th>
            <td><?= h($sdrugsCondition->pos_five) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Model') ?></th>
            <td><?= h($sdrugsCondition->model) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sdrugsCondition->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pos Twenty Five') ?></th>
            <td><?= $this->Number->format($sdrugsCondition->pos_twenty_five) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pos Thirty') ?></th>
            <td><?= $this->Number->format($sdrugsCondition->pos_thirty) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pos Forty') ?></th>
            <td><?= $this->Number->format($sdrugsCondition->pos_forty) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($sdrugsCondition->created_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($sdrugsCondition->updated_at) ?></td>
        </tr>
    </table>
</div>
