<?php $this->start('sidebar'); ?>
    <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>


<h1 class="page-header">Feedback</h1>

<?= $this->Html->link('<i class="fa fa-list-ul" aria-hidden="true"></i> List Feedbacks', ['action' => 'index'], array('escape' => false, 'class' => 'btn btn-success')); ?> &nbsp;
<br><br>

<div class="feedbacks view large-9 medium-8 columns content">
    <table class="table vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($feedback->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><b><?= $feedback->email ?></b>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Message') ?></th>
            <td><b><?= $feedback->subject ?></b>
                <?= $feedback->message ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($feedback->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($feedback->modified) ?></td>
        </tr>
        <tr>
            <td colspan="2">                
                    <?php if(!$feedback->deleted) { ?>
                    <?= $this->Form->postLink('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', ['action' => 'delete', $feedback->id], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $feedback->id), 'class' => 'btn btn-danger']);  ?> 
                    <?php } ?>
            </td>
        </tr>
    </table>
</div>
