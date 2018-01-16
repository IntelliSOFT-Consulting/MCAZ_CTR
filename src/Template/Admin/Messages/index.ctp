<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<h1 class="page-header">Messages</h1>

<?= $this->Html->link('<i class="fa fa-file-code-o" aria-hidden="true"></i> Add Message Template', ['controller' => 'messages', 'action' => 'add', 'prefix' => 'admin'], array('escape' => false, 'class' => 'btn btn-info')); ?>
<hr>
<?php
    $colors = ['info' => 'light-blue', 'warning' => 'orange', 'success' => 'green', 'danger' => 'red'];
?> 
<div class="table-responsive">
    <table class="table table-striped table-condensed">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subject') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('style') ?></th>
                <th scope="col"><?= $this->Paginator->sort('priority') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($messages as $message): ?>
            <tr>
                <td><?= $this->Number->format($message->id) ?></td>
                <td><?= h($message->name) ?></td>
                <td><?= h($message->subject) ?></td>
                <td><?= h($message->type) ?></td>
                <td><span class="label label-<?= $message->style ?>"><?php echo (isset($message->style)) ? $colors[$message->style] : '' ; ?></span></td>
                <td><?= h($message->priority) ?></td>
                 <td>
                    <?= $this->Html->link('<span class="label label-primary">View</span>', ['action' => 'view', $message->id, 'prefix' => $prefix], array('escape' => false));  ?>
                    <?= $this->Html->link('<span class="label label-success">Edit</span>', ['action' => 'edit', $message->id, 'prefix' => $prefix], array('escape' => false));  ?>       

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
