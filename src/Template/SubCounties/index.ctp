<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubCounty[]|\Cake\Collection\CollectionInterface $subCounties
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sub County'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Counties'), ['controller' => 'Counties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New County'), ['controller' => 'Counties', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pqmps'), ['controller' => 'Pqmps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pqmp'), ['controller' => 'Pqmps', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sadrs'), ['controller' => 'Sadrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr'), ['controller' => 'Sadrs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subCounties index large-9 medium-8 columns content">
    <h3><?= __('Sub Counties') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('county_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sub_county_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('county_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Province') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Pop_2009') ?></th>
                <th scope="col"><?= $this->Paginator->sort('RegVoters') ?></th>
                <th scope="col"><?= $this->Paginator->sort('AreaSqKms') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CAWards') ?></th>
                <th scope="col"><?= $this->Paginator->sort('MainEthnicGroup') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($subCounties as $subCounty): ?>
            <tr>
                <td><?= $this->Number->format($subCounty->id) ?></td>
                <td><?= $subCounty->has('county') ? $this->Html->link($subCounty->county->id, ['controller' => 'Counties', 'action' => 'view', $subCounty->county->id]) : '' ?></td>
                <td><?= h($subCounty->sub_county_name) ?></td>
                <td><?= h($subCounty->county_name) ?></td>
                <td><?= h($subCounty->Province) ?></td>
                <td><?= h($subCounty->Pop_2009) ?></td>
                <td><?= h($subCounty->RegVoters) ?></td>
                <td><?= h($subCounty->AreaSqKms) ?></td>
                <td><?= h($subCounty->CAWards) ?></td>
                <td><?= h($subCounty->MainEthnicGroup) ?></td>
                <td><?= h($subCounty->created) ?></td>
                <td><?= h($subCounty->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $subCounty->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $subCounty->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $subCounty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subCounty->id)]) ?>
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
