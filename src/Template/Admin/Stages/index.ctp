<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<h1 class="page-header">Stages</h1>

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
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('min_day') ?></th>
                <th scope="col"><?= $this->Paginator->sort('max_day') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('allowance') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stages as $stage): ?>
            <tr>
                <td><?= $this->Number->format($stage->id) ?></td>
                <td><?= h($stage->name) ?></td>
                <td><?= h($stage->description) ?></td>
                <td><?= h($stage->min_day) ?></td>
                <td><?= h($stage->max_day) ?></td>
                <td><?= h($stage->duration) ?></td>
                <td><?= h($stage->allowance) ?></td>
                <td class="actions">                    
                    <?= $this->Html->link('<span class="label label-primary">View</span>', ['controller' => 'Stages', 'action' => 'view', $stage->id, 'prefix' => $prefix], array('escape' => false));  ?>
                    <?= $this->Html->link('<span class="label label-success">Edit</span>', ['controller' => 'Stages', 'action' => 'edit', $stage->id, 'prefix' => $prefix], array('escape' => false));  ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
