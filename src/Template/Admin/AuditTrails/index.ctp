
<!-- Start -->
<?php $this->start('sidebar'); ?>
<?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<h1 class="page-header">Audit Trail</h1>

<div class="paginator">
    <ul class="pagination pagination-sm">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
</div>
<p><small><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of <b>{{count}}</b> total')]) ?></small></p>

<div class="stages index large-9 medium-8 columns content">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('model') ?></th>
                <th scope="col"><?= $this->Paginator->sort('message') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ip') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>

            <?php
            $c = 0;

            foreach ($auditTrails as $auditTrail) : ?>
                <?php $c++; ?>
                <tr>
                    <td><?= $c ?></td>
                    <td><?= h($auditTrail->model) ?></td>
                    <td><?= h($auditTrail->message) ?></td>
                    <td><?= h($auditTrail->ip) ?></td>
                    <td><?= h($auditTrail->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<span class="label label-primary">View</span>', ['controller' => 'AuditTrails', 'action' => 'view', $auditTrail->id, 'prefix' => $prefix], array('escape' => false));  ?>
                        <?= $this->Form->postLink(
                            '<span class="label label-danger">Delete</span>',
                            ['action' => 'delete', $auditTrail->id],
                            [
                                'confirm' => __('Are you sure you want to delete # {0}?', $auditTrail->id),
                                'escapeTitle' => false,
                                'style' => 'text-decoration: none;'
                            ]
                        ) ?>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>