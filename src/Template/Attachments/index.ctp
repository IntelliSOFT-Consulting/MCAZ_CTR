<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Attachment[]|\Cake\Collection\CollectionInterface $attachments
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Attachment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sadrs'), ['controller' => 'Sadrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr'), ['controller' => 'Sadrs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sadr Followups'), ['controller' => 'SadrFollowups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr Followup'), ['controller' => 'SadrFollowups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pqmps'), ['controller' => 'Pqmps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pqmp'), ['controller' => 'Pqmps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="attachments index large-9 medium-8 columns content">
    <h3><?= __('Attachments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sadr_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sadr_followup_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pqmp_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('filename') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mimetype') ?></th>
                <th scope="col"><?= $this->Paginator->sort('filesize') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dir') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file') ?></th>
                <th scope="col"><?= $this->Paginator->sort('basename') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dirname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('checksum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('model') ?></th>
                <th scope="col"><?= $this->Paginator->sort('foreign_key') ?></th>
                <th scope="col"><?= $this->Paginator->sort('alternative') ?></th>
                <th scope="col"><?= $this->Paginator->sort('group') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($attachments as $attachment): ?>
            <tr>
                <td><?= $this->Number->format($attachment->id) ?></td>
                <td><?= $attachment->has('sadr') ? $this->Html->link($attachment->sadr->id, ['controller' => 'Sadrs', 'action' => 'view', $attachment->sadr->id]) : '' ?></td>
                <td><?= $attachment->has('sadr_followup') ? $this->Html->link($attachment->sadr_followup->id, ['controller' => 'SadrFollowups', 'action' => 'view', $attachment->sadr_followup->id]) : '' ?></td>
                <td><?= $attachment->has('pqmp') ? $this->Html->link($attachment->pqmp->id, ['controller' => 'Pqmps', 'action' => 'view', $attachment->pqmp->id]) : '' ?></td>
                <td><?= h($attachment->filename) ?></td>
                <td><?= h($attachment->mimetype) ?></td>
                <td><?= $this->Number->format($attachment->filesize) ?></td>
                <td><?= h($attachment->dir) ?></td>
                <td><?= h($attachment->file) ?></td>
                <td><?= h($attachment->basename) ?></td>
                <td><?= h($attachment->dirname) ?></td>
                <td><?= h($attachment->checksum) ?></td>
                <td><?= h($attachment->model) ?></td>
                <td><?= $this->Number->format($attachment->foreign_key) ?></td>
                <td><?= h($attachment->alternative) ?></td>
                <td><?= h($attachment->group) ?></td>
                <td><?= h($attachment->created) ?></td>
                <td><?= h($attachment->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $attachment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $attachment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $attachment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachment->id)]) ?>
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
