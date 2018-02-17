<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InvestigatorContact[]|\Cake\Collection\CollectionInterface $investigatorContacts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Investigator Contact'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="investigatorContacts index large-9 medium-8 columns content">
    <h3><?= __('Investigator Contacts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('application_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('given_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('middle_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('family_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('qualification') ?></th>
                <th scope="col"><?= $this->Paginator->sort('professional_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telephone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($investigatorContacts as $investigatorContact): ?>
            <tr>
                <td><?= $this->Number->format($investigatorContact->id) ?></td>
                <td><?= $investigatorContact->has('application') ? $this->Html->link($investigatorContact->application->id, ['controller' => 'Applications', 'action' => 'view', $investigatorContact->application->id]) : '' ?></td>
                <td><?= h($investigatorContact->given_name) ?></td>
                <td><?= h($investigatorContact->middle_name) ?></td>
                <td><?= h($investigatorContact->family_name) ?></td>
                <td><?= h($investigatorContact->qualification) ?></td>
                <td><?= h($investigatorContact->professional_address) ?></td>
                <td><?= h($investigatorContact->telephone) ?></td>
                <td><?= h($investigatorContact->email) ?></td>
                <td><?= h($investigatorContact->created) ?></td>
                <td><?= h($investigatorContact->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $investigatorContact->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $investigatorContact->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $investigatorContact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $investigatorContact->id)]) ?>
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
