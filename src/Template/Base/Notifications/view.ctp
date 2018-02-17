<?php $this->start('sidebar'); ?>
    <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>


<h1 class="page-header">Notification</h1>

<?= $this->Html->link('<i class="fa fa-list-ul" aria-hidden="true"></i> List Notifications', ['action' => 'index'], array('escape' => false, 'class' => 'btn btn-success')); ?> &nbsp;
<?= $this->Form->postLink(
        '<span class="label label-danger">delete</span>',
        ['action' => 'delete', $notification->id],
        ['class' => 'btn-zangu', 'escape' => false, 'confirm' => __('Are you sure you want to delete notification {0}?', $notification->id)]
    )
?>
<br><br>

<div class="notifications view large-9 medium-8 columns content">
    <table class="table vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($notification->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Message') ?></th>
            <td><?= $notification->user_message ?>
                <?= $notification->system_message ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Uri') ?></th>
            <td><?php if(!empty($notification->model)) echo $this->Html->link($notification->model, ['controller' => $notification->model, 'action' => 'view', $notification->foreign_key]) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($notification->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($notification->modified) ?></td>
        </tr>
    </table>
</div>
