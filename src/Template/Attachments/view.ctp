<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Attachment $attachment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Attachment'), ['action' => 'edit', $attachment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Attachment'), ['action' => 'delete', $attachment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Attachments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attachment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sadrs'), ['controller' => 'Sadrs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sadr'), ['controller' => 'Sadrs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sadr Followups'), ['controller' => 'SadrFollowups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sadr Followup'), ['controller' => 'SadrFollowups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pqmps'), ['controller' => 'Pqmps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pqmp'), ['controller' => 'Pqmps', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="attachments view large-9 medium-8 columns content">
    <h3><?= h($attachment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sadr') ?></th>
            <td><?= $attachment->has('sadr') ? $this->Html->link($attachment->sadr->id, ['controller' => 'Sadrs', 'action' => 'view', $attachment->sadr->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sadr Followup') ?></th>
            <td><?= $attachment->has('sadr_followup') ? $this->Html->link($attachment->sadr_followup->id, ['controller' => 'SadrFollowups', 'action' => 'view', $attachment->sadr_followup->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pqmp') ?></th>
            <td><?= $attachment->has('pqmp') ? $this->Html->link($attachment->pqmp->id, ['controller' => 'Pqmps', 'action' => 'view', $attachment->pqmp->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Filename') ?></th>
            <td><?= h($attachment->filename) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mimetype') ?></th>
            <td><?= h($attachment->mimetype) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dir') ?></th>
            <td><?= h($attachment->dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= h($attachment->file) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Basename') ?></th>
            <td><?= h($attachment->basename) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dirname') ?></th>
            <td><?= h($attachment->dirname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Checksum') ?></th>
            <td><?= h($attachment->checksum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Model') ?></th>
            <td><?= h($attachment->model) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alternative') ?></th>
            <td><?= h($attachment->alternative) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Group') ?></th>
            <td><?= h($attachment->group) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($attachment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Filesize') ?></th>
            <td><?= $this->Number->format($attachment->filesize) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Foreign Key') ?></th>
            <td><?= $this->Number->format($attachment->foreign_key) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($attachment->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($attachment->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($attachment->description)); ?>
    </div>
</div>
