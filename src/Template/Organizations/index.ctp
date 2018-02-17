<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Organization[]|\Cake\Collection\CollectionInterface $organizations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Organization'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="organizations index large-9 medium-8 columns content">
    <h3><?= __('Organizations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('application_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('organization') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact_person') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telephone_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('all_tasks') ?></th>
                <th scope="col"><?= $this->Paginator->sort('monitoring') ?></th>
                <th scope="col"><?= $this->Paginator->sort('regulatory') ?></th>
                <th scope="col"><?= $this->Paginator->sort('investigator_recruitment') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ivrs_treatment_randomisation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_management') ?></th>
                <th scope="col"><?= $this->Paginator->sort('e_data_capture') ?></th>
                <th scope="col"><?= $this->Paginator->sort('susar_reporting') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quality_assurance_auditing') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statistical_analysis') ?></th>
                <th scope="col"><?= $this->Paginator->sort('medical_writing') ?></th>
                <th scope="col"><?= $this->Paginator->sort('other_duties') ?></th>
                <th scope="col"><?= $this->Paginator->sort('misc') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($organizations as $organization): ?>
            <tr>
                <td><?= $this->Number->format($organization->id) ?></td>
                <td><?= $organization->has('application') ? $this->Html->link($organization->application->id, ['controller' => 'Applications', 'action' => 'view', $organization->application->id]) : '' ?></td>
                <td><?= h($organization->organization) ?></td>
                <td><?= h($organization->contact_person) ?></td>
                <td><?= h($organization->address) ?></td>
                <td><?= h($organization->telephone_number) ?></td>
                <td><?= h($organization->all_tasks) ?></td>
                <td><?= h($organization->monitoring) ?></td>
                <td><?= h($organization->regulatory) ?></td>
                <td><?= h($organization->investigator_recruitment) ?></td>
                <td><?= h($organization->ivrs_treatment_randomisation) ?></td>
                <td><?= h($organization->data_management) ?></td>
                <td><?= h($organization->e_data_capture) ?></td>
                <td><?= h($organization->susar_reporting) ?></td>
                <td><?= h($organization->quality_assurance_auditing) ?></td>
                <td><?= h($organization->statistical_analysis) ?></td>
                <td><?= h($organization->medical_writing) ?></td>
                <td><?= h($organization->other_duties) ?></td>
                <td><?= h($organization->misc) ?></td>
                <td><?= h($organization->created) ?></td>
                <td><?= h($organization->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $organization->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $organization->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $organization->id], ['confirm' => __('Are you sure you want to delete # {0}?', $organization->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
