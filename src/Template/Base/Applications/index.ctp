<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?=     $this->Html->script('jquery/readmore', ['block' => true]); ?>
<?=     $this->Html->script('selector', ['block' => true]); ?>
<?=     $this->Html->script('jquery/application_index', ['block' => true]); ?>

<h2 class="page-header"><?= isset($this->request->query['status']) ? $this->request->query['status'] : 'All' ?> Applications
    :: <small style="font-size: small;"><i class="fa fa-search-plus" aria-hidden="true"></i> Search, 
              <i class="fa fa-filter" aria-hidden="true"></i>Filter or  
              <i class="fa fa-download" aria-hidden="true"></i>  Download Reports</small>
</h2>

<?= $this->element('applications/search') ?>

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
                <th scope="col"> 
                <?= $this->Paginator->sort('id') ?>
            </th>
                <th scope="col"><?= $this->Paginator->sort('protocol_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('public_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scientific_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col">Stages</th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th> 
                <?php
                if(isset($this->request->query['status'])&&($this->request->query['status'])=="UnSubmitted"&&$prefix=="manager"){
                ?> 
                <th scope="col"><?= $this->Paginator->sort('Action') ?></th> 
               <?php
            }
            ?>
            </tr>
        </thead>
        <tbody>
         
            <?php  
            foreach ($applications as $application): ?> 
            <tr>

                <td>   
                    <?= $this->Number->format($application->id) ?></td>
                <td><?php
                      echo $this->Html->link((($application->submitted == 2) ? $application->protocol_no : $application->created), ['action' => 'view', $application->id, 'prefix' => $prefix, 'status' => $application->status], ['escape' => false, 'class' => 'btn-zangu']) ; 
                      ?>
                  </td>
                <td><?= h($application->public_title) ?></td>
                <td><?= h($application->scientific_title) ?></td>
                <td><div class="readmore"><?php 
                      echo ($application->approved) ? '<b>'.$application->approved.'</b>
                               <br>'.$application->status : $application->status ; 
                      echo '<br><hr class="finance"><b>Assigned to:</b><br>';
                      foreach ($application->assign_evaluators as $evaluator) {
                          // echo $all_evaluators->toArray()[$evaluator->user_id].' <i class="fa fa-arrow-right" aria-hidden="true"></i> '.$all_evaluators->toArray()[$evaluator->assigned_to].'<br>';
                          echo $this->cell('Signature::index', [$evaluator->assigned_to]).' <span class="muted">by '.$this->cell('Signature::index', [$evaluator->user_id]).'</span><hr class="finance">';
                      }
                    ?></div>
                </td>
                <td><div class="readmore">
                    <?php 
                        foreach ($application->application_stages as $application_stage) {
                            $nvar = (($application_stage->alt_date)) ?? $application_stage->stage_date->i18nFormat('dd-MM-yyyy');
                            echo "<p>".$application_stage->stage->name." - ".$nvar."</p>";
                        }
                    ?></div>
                </td>
                <td><?= h($application->created) ?></td>  
                <?php
                if(isset($this->request->query['status'])&&($this->request->query['status'])=="UnSubmitted" &&$prefix=="manager"){
                ?>                     
                <td><?php
               echo $this->Html->link('<span class="label label-danger">Delete </span>', ['action' => 'clear', $application->id, 'prefix' => $prefix, 'status' => $application->status], ['escape' => false,'confirm'=>__('Are you sure you want to delete # {0}?', $application->id), 'style' => 'color: white;']);
                ?>  
            </td>
                <?php
                
                }?>    
                <td>
                               
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
