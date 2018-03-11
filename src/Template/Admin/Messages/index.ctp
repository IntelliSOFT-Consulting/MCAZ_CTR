<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<h1 class="page-header">Messages</h1>

<?= $this->Html->link('<i class="fa fa-file-code-o" aria-hidden="true"></i> Add Message Template', ['controller' => 'messages', 'action' => 'add', 'prefix' => 'admin'], array('escape' => false, 'class' => 'btn btn-info')); ?>
<hr>
<?php
    $colors = ['info' => 'light-blue', 'warning' => 'orange', 'success' => 'green', 'danger' => 'red'];
?> 

<?= $this->Form->create(null, ['valueSources' => 'query', 'templates' => 'clear_form']) ?>
<div class="well">
    <div class="row">
      <div class="col-xs-10">
        <h5 class="text-center"><small><em>Use wildcard <span class="sterix fa fa-asterisk" aria-hidden="true"></span> to match any character e.g. ed* to match Eddy, Eddie, Edward etc.</em></small></h5>
        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <?php
                            echo $this->Form->control('name', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*name*']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('subject', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*subject*']);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('content', 
                                ['label' => false, 'templates' => 'clear_form', 'placeholder' => '*content*']);
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-xs-2">
        <br>
        <button type="submit" class="btn btn-primary btn-sm" id="search" 
                style="margin-bottom: 4px;" ><i class="fa fa-search-plus" aria-hidden="true"></i> Search</button>
        <?php
            echo $this->Html->link('<i class="fa fa-close" aria-hidden="true"></i> Reset', ['action' => 'index'], ['class' => 'btn btn-default btn-sm', 'escape' => false]);
        ?>
    </div>
    </div>
</div>
<?= $this->Form->end() ?>

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
                <td><span class="label label-<?= $message->style ?>"><?php echo (!empty($message->style)) ? $colors[$message->style] : '' ; ?></span></td>
                <td><?= h($message->priority) ?></td>
                 <td>
                    <?= $this->Html->link('<span class="label label-primary">View</span>', ['action' => 'view', $message->id, 'prefix' => $prefix], array('escape' => false));  ?>
                    <?= $this->Html->link('<span class="label label-success">Edit</span>', ['action' => 'edit', $message->id, 'prefix' => $prefix], array('escape' => false));  ?>       

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
