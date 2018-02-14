<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<h1 class="page-header">  <i class="fa fa-comment-o" aria-hidden="true"></i> User Feedback</h1>

<?= $this->element('feedbacks/search') ?>

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
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subject') ?></th>
                <th scope="col"><?= $this->Paginator->sort('feedback') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($feedbacks as $feedback): ?>
            <tr class="<?= $feedback->has('message') ? $feedback->message->style : '' ?>">
                <td><?= $this->Number->format($feedback->id) ?></td>
                <td><?= $feedback->email ?></td>
                <td><?= $feedback->subject ?></td>
                <td><?= $feedback->feedback ?></td>
                <td><?= h($feedback->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="label label-primary">View</span>', ['action' => 'view', $feedback->id], array('escape' => false));  ?>
                    <?php if(!$feedback->deleted) { ?>
                    <?= $this->Form->postLink('<span class="label label-danger">Delete</span>', ['action' => 'delete', $feedback->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $feedback->id), 'class' => 'label-link']);  ?> 
                    <?php } ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
