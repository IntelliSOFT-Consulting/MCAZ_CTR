<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pdrug $pdrug
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pdrug'), ['action' => 'edit', $pdrug->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pdrug'), ['action' => 'delete', $pdrug->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pdrug->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pdrugs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pdrug'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Quality Assessments'), ['controller' => 'QualityAssessments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quality Assessment'), ['controller' => 'QualityAssessments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Storage Conditions'), ['controller' => 'StorageConditions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Storage Condition'), ['controller' => 'StorageConditions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pdrugs view large-9 medium-8 columns content">
    <h3><?= h($pdrug->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= $pdrug->has('application') ? $this->Html->link($pdrug->application->id, ['controller' => 'Applications', 'action' => 'view', $pdrug->application->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quality Assessment') ?></th>
            <td><?= $pdrug->has('quality_assessment') ? $this->Html->link($pdrug->quality_assessment->id, ['controller' => 'QualityAssessments', 'action' => 'view', $pdrug->quality_assessment->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pdrug->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Composition') ?></th>
            <td><?= $this->Number->format($pdrug->composition) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Composition Workspace') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->composition_workspace)); ?>
    </div>
    <div class="row">
        <h4><?= __('Composition Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($pdrug->composition_comment)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Storage Conditions') ?></h4>
        <?php if (!empty($pdrug->storage_conditions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Application Id') ?></th>
                <th scope="col"><?= __('Sdrug Id') ?></th>
                <th scope="col"><?= __('Pdrug Id') ?></th>
                <th scope="col"><?= __('Batch Details') ?></th>
                <th scope="col"><?= __('Manu Process') ?></th>
                <th scope="col"><?= __('Neg Seventy') ?></th>
                <th scope="col"><?= __('Neg Twenty') ?></th>
                <th scope="col"><?= __('Pos Five') ?></th>
                <th scope="col"><?= __('Pos Twenty Five') ?></th>
                <th scope="col"><?= __('Pos Thirty') ?></th>
                <th scope="col"><?= __('Pos Forty') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col"><?= __('Updated At') ?></th>
                <th scope="col"><?= __('Model') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pdrug->storage_conditions as $storageConditions): ?>
            <tr>
                <td><?= h($storageConditions->id) ?></td>
                <td><?= h($storageConditions->application_id) ?></td>
                <td><?= h($storageConditions->sdrug_id) ?></td>
                <td><?= h($storageConditions->pdrug_id) ?></td>
                <td><?= h($storageConditions->batch_details) ?></td>
                <td><?= h($storageConditions->manu_process) ?></td>
                <td><?= h($storageConditions->neg_seventy) ?></td>
                <td><?= h($storageConditions->neg_twenty) ?></td>
                <td><?= h($storageConditions->pos_five) ?></td>
                <td><?= h($storageConditions->pos_twenty_five) ?></td>
                <td><?= h($storageConditions->pos_thirty) ?></td>
                <td><?= h($storageConditions->pos_forty) ?></td>
                <td><?= h($storageConditions->created_at) ?></td>
                <td><?= h($storageConditions->updated_at) ?></td>
                <td><?= h($storageConditions->model) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StorageConditions', 'action' => 'view', $storageConditions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StorageConditions', 'action' => 'edit', $storageConditions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StorageConditions', 'action' => 'delete', $storageConditions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $storageConditions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
