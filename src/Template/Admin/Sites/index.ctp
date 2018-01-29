<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<h1 class="page-header">Front End Pages</h1>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('content') ?></th>
                <th scope="col" class="actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sites as $site): ?>
            <tr>
                <td><b><?= h($site->description) ?></b></td>
                <td><?php echo $site->content;//  $this->Text->truncate($site->content, 255, ['html' => true]) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="label label-primary">View</span>', ['action' => 'view', $site->id, 'prefix' => $prefix], array('escape' => false));  ?>
                    <?= $this->Html->link('<span class="label label-success">Edit</span>', ['action' => 'edit', $site->id, 'prefix' => $prefix], array('escape' => false));  ?>    
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
