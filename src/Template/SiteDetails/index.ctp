<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SiteDetail[]|\Cake\Collection\CollectionInterface $siteDetails
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Site Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="siteDetails index large-9 medium-8 columns content">
    <h3><?= __('Site Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('application_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('county_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('site_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('physical_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact_details') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact_person') ?></th>
                <th scope="col"><?= $this->Paginator->sort('site_capacity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('misc') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($siteDetails as $siteDetail): ?>
            <tr>
                <td><?= $this->Number->format($siteDetail->id) ?></td>
                <td><?= $siteDetail->has('application') ? $this->Html->link($siteDetail->application->id, ['controller' => 'Applications', 'action' => 'view', $siteDetail->application->id]) : '' ?></td>
                <td><?= $this->Number->format($siteDetail->county_id) ?></td>
                <td><?= h($siteDetail->site_name) ?></td>
                <td><?= h($siteDetail->physical_address) ?></td>
                <td><?= h($siteDetail->contact_details) ?></td>
                <td><?= h($siteDetail->contact_person) ?></td>
                <td><?= h($siteDetail->site_capacity) ?></td>
                <td><?= h($siteDetail->misc) ?></td>
                <td><?= h($siteDetail->created) ?></td>
                <td><?= h($siteDetail->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $siteDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $siteDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $siteDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $siteDetail->id)]) ?>
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
