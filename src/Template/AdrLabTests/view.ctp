<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdrLabTest $adrLabTest
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Adr Lab Test'), ['action' => 'edit', $adrLabTest->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Adr Lab Test'), ['action' => 'delete', $adrLabTest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adrLabTest->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Adr Lab Tests'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adr Lab Test'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adrs'), ['controller' => 'Adrs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adr'), ['controller' => 'Adrs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adrLabTests view large-9 medium-8 columns content">
    <h3><?= h($adrLabTest->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Adr') ?></th>
            <td><?= $adrLabTest->has('adr') ? $this->Html->link($adrLabTest->adr->id, ['controller' => 'Adrs', 'action' => 'view', $adrLabTest->adr->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lab Test') ?></th>
            <td><?= h($adrLabTest->lab_test) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Abnormal Result') ?></th>
            <td><?= h($adrLabTest->abnormal_result) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Site Normal Range') ?></th>
            <td><?= h($adrLabTest->site_normal_range) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lab Value') ?></th>
            <td><?= h($adrLabTest->lab_value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($adrLabTest->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Collection Date') ?></th>
            <td><?= h($adrLabTest->collection_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lab Value Date') ?></th>
            <td><?= h($adrLabTest->lab_value_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($adrLabTest->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($adrLabTest->modified) ?></td>
        </tr>
    </table>
</div>
