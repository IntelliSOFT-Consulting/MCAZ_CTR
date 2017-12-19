<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WhoDrug[]|\Cake\Collection\CollectionInterface $whoDrugs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Who Drug'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="whoDrugs index large-9 medium-8 columns content">
    <h3><?= __('Who Drugs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('MedId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('drug_record_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sequence_no_1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sequence_no_2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sequence_no_3') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sequence_no_4') ?></th>
                <th scope="col"><?= $this->Paginator->sort('generic') ?></th>
                <th scope="col"><?= $this->Paginator->sort('drug_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name_specifier') ?></th>
                <th scope="col"><?= $this->Paginator->sort('market_authorization_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('market_authorization_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('market_authorization_withdrawal_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company') ?></th>
                <th scope="col"><?= $this->Paginator->sort('marketing_authorization_holder') ?></th>
                <th scope="col"><?= $this->Paginator->sort('source_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('source_country') ?></th>
                <th scope="col"><?= $this->Paginator->sort('source_year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_group') ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_changed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($whoDrugs as $whoDrug): ?>
            <tr>
                <td><?= h($whoDrug->id) ?></td>
                <td><?= h($whoDrug->MedId) ?></td>
                <td><?= h($whoDrug->drug_record_number) ?></td>
                <td><?= h($whoDrug->sequence_no_1) ?></td>
                <td><?= h($whoDrug->sequence_no_2) ?></td>
                <td><?= h($whoDrug->sequence_no_3) ?></td>
                <td><?= h($whoDrug->sequence_no_4) ?></td>
                <td><?= h($whoDrug->generic) ?></td>
                <td><?= h($whoDrug->drug_name) ?></td>
                <td><?= h($whoDrug->name_specifier) ?></td>
                <td><?= h($whoDrug->market_authorization_number) ?></td>
                <td><?= h($whoDrug->market_authorization_date) ?></td>
                <td><?= h($whoDrug->market_authorization_withdrawal_date) ?></td>
                <td><?= h($whoDrug->country) ?></td>
                <td><?= h($whoDrug->company) ?></td>
                <td><?= h($whoDrug->marketing_authorization_holder) ?></td>
                <td><?= h($whoDrug->source_code) ?></td>
                <td><?= h($whoDrug->source_country) ?></td>
                <td><?= h($whoDrug->source_year) ?></td>
                <td><?= h($whoDrug->product_type) ?></td>
                <td><?= h($whoDrug->product_group) ?></td>
                <td><?= h($whoDrug->create_date) ?></td>
                <td><?= h($whoDrug->date_changed) ?></td>
                <td><?= h($whoDrug->created) ?></td>
                <td><?= h($whoDrug->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $whoDrug->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $whoDrug->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $whoDrug->id], ['confirm' => __('Are you sure you want to delete # {0}?', $whoDrug->id)]) ?>
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
