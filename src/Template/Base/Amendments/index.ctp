<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<h1 class="page-header"><?= isset($this->request->query['status']) ? $this->request->query['status'] : 'All' ?> Applications
    :: <small style="font-size: small;"><i class="fa fa-search-plus" aria-hidden="true"></i> Search, 
              <i class="fa fa-filter" aria-hidden="true"></i>Filter or  
              <i class="fa fa-download" aria-hidden="true"></i>  Download Reports</small>
</h1>

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
                <th scope="col"><?= $this->Paginator->sort('protocol_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('public_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scientific_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col">Stages</th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th> 
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($amendments as $amendment): ?>
            <tr>
                <td><?= $this->Number->format($amendment->id) ?></td>
                <td><?php
                //pr($amendment->parent_application);
                   echo   $this->Html->link($amendment->protocol_no, ['action' => 'view', $amendment->id, 'prefix' => $prefix, 'status' => $amendment->status], ['escape' => false, 'class' => 'btn-zangu']) ; ?></td>
                <td><?= 
                        $this->Html->link(h($amendment->parent_application->public_title), ['action' => 'view', $amendment->id, 'prefix' => $prefix, 'status' => $amendment->status], ['escape' => false, 'class' => 'btn-zangu']) ;
                 ?></td>
                <td><?= h($amendment->parent_application->scientific_title) ?></td>
                <td><?= h($amendment->status) ?>
                    <?php 
                      echo ($amendment->approved) ? '<b>'.$amendment->approved.'</b>
                               <br>'.$amendment->status : $amendment->status ; 
                      echo '<br><b>Assigned to:</b><br>';
                      foreach ($amendment->assign_evaluators as $evaluator) {
                          // echo $all_evaluators->toArray()[$evaluator->user_id].' <i class="fa fa-arrow-right" aria-hidden="true"></i> '.$all_evaluators->toArray()[$evaluator->assigned_to].'<br>';
                          echo $this->cell('Signature::index', [$evaluator->assigned_to]).' <span class="muted">by '.$this->cell('Signature::index', [$evaluator->user_id]).'</span><br>';
                      }
                    ?>                
                </td>
                <td><?php 
                        foreach ($amendment->application_stages as $application_stage) {
                            $nvar = (($application_stage->alt_date)) ?? $application_stage->stage_date->i18nFormat('dd-MM-yyyy');
                            echo "<p>".$application_stage->stage->name." - ".$nvar."</p>";
                        }
                    ?></td>
                <td><?= h($amendment->modified) ?></td>         
                <td>
                               
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
