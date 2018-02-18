<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<h1 class="page-header">Protocols
    :: <small style="font-size: small;"><i class="fa fa-search-plus" aria-hidden="true"></i> Search, 
              <i class="fa fa-filter" aria-hidden="true"></i>Filter </small>
</h1>

<?= $this->element('applications/public_search') ?>

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
                <th scope="col"><?= $this->Paginator->sort('protocol_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('public_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scientific_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_submitted') ?></th> 
                <th scope="col"><?= $this->Paginator->sort('approved_date', 'Date approved') ?></th> 
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($applications as $application):
                    if($application->submitted == 2 and $application->approved == 'Approved') { ?>
            <tr>
                <td><?php                    
                      echo $this->Html->link(( $application->protocol_no), ['action' => 'view', $application->id, 'prefix' => false], ['escape' => false, 'class' => 'btn-zangu']) ; 
                      ?>
                  </td>
                <td><?= h($application->public_title) ?></td>
                <td><?= h($application->scientific_title) ?></td>
                <td><?= h($application->date_submitted) ?></td>         
                <td><?= h($application->approved_date) ?></td>         
                <td>
                    <span class="label label-primary">                     
                     <?= $this->Html->link('View', ['action' => 'view', $application->id, 'prefix' => false], ['escape' => false, 'class' => 'label-link'])
                     ?>
                    </span> &nbsp;
                </td>
            </tr>
            <?php }
                endforeach; ?>
        </tbody>
    </table>
</div>
