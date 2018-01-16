<?php $this->start('sidebar'); ?>
    <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>



<h1 class="page-header">Message</h1>


<?= $this->Html->link('<i class="fa fa-file-code-o" aria-hidden="true"></i> Add Message Template', ['controller' => 'messages', 'action' => 'add', 'prefix' => 'admin'], array('escape' => false, 'class' => 'btn btn-info')); ?> &nbsp;
<?= $this->Html->link('<i class="fa fa-list-ul" aria-hidden="true"></i> List Message Templates', ['controller' => 'messages', 'action' => 'index', 'prefix' => 'admin'], array('escape' => false, 'class' => 'btn btn-success')); ?> &nbsp;
<hr>

<div class="messages view large-9 medium-8 columns content">
    <h3><?= h($message->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($message->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($message->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($message->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($message->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($message->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph($message->content, ['escape' => false]); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($message->description)); ?>
    </div>
</div>
