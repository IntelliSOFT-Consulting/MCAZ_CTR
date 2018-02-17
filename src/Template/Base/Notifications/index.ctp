<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<h1 class="page-header">  <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Notifications</h1>

<?= $this->element('notifications/search') ?>

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

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('system_message', 'Message') ?></th>
                <th scope="col">Uri</th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notifications as $notification): ?>
            <tr class="<?= $notification->has('message') ? $notification->message->style : '' ?>">
                <td><?= $this->Number->format($notification->id) ?></td>
                <td><?= $notification->user_message ?><br>
                    <?= $notification->system_message ?></td>
                <td><p class="btn-zangu"><?php if(!empty($notification->model)) echo $this->Html->link($notification->model, ['controller' => $notification->model, 'action' => 'view', $notification->foreign_key], ['class' => 'btn-zangu', 'escape' => false]) ?></p></td>
                <td><?= h($notification->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="label label-primary">View</span>', ['action' => 'view', $notification->id], array('escape' => false));  ?>
                    <?= $this->Form->postLink(
                            '<span class="label label-danger">delete</span>',
                            ['action' => 'delete', $notification->id],
                            ['class' => 'btn-zangu', 'escape' => false, 'confirm' => __('Are you sure you want to delete notification {0}?', $notification->id)]
                        )
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
