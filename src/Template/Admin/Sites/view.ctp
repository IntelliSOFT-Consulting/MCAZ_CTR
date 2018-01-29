<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?= $this->Html->link('<i class="fa fa-file-code-o" aria-hidden="true"></i> Edit content', ['action' => 'edit', $site->id], array('escape' => false, 'class' => 'btn btn-info')); ?> &nbsp;
<?= $this->Html->link('List Sites Templates', ['action' => 'index'], array('escape' => false, 'class' => 'btn btn-success')); ?> &nbsp;
<hr>
<h1 class="page-header text-center"><?= h($site->description) ?></h1>

<div class="row">
    <div class="col-sm-12">
            <h4><?= __('Content') ?></h4>
            <?= $site->content; ?>
    </div>
</div>
