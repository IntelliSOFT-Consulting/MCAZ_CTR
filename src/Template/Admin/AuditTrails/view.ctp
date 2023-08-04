<?php $this->start('sidebar'); ?>
<?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<h1 class="page-header">Audit Trail</h1>


<?= $this->Html->link('<i class="fa fa-list" aria-hidden="true"></i> Audit Trails', ['controller' => 'AuditTrails', 'action' => 'index'], array('escape' => false, 'class' => 'btn btn-primary')); ?> &nbsp;

<div class="row">
    <div class="col-xs-12">
        <dl class="dl-horizontal">
            <dt>Model</dt>
            <dd><?= h($auditTrail->model) ?></dd>
            <dt>IP Address</dt>
            <dd><?= h($auditTrail->ip) ?></dd>
            <dt scope="row"><?= __('Message') ?></dt>
            <dd><?= h($auditTrail->message) ?></dd>
            <dt>Created</dt>
            <dd><?= h($auditTrail->created) ?></dd>
        </dl>

    </div>
</div>


 