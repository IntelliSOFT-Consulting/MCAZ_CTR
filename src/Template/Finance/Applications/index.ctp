<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

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
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('protocol_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('public_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scientific_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col">Finance Approvals</th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th> 
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($applications as $application): ?>
            <tr>
                <td><?= $this->Number->format($application->id) ?></td>
                <td><?php
                      echo $this->Html->link((($application->submitted == 2) ? $application->protocol_no : $application->created), ['action' => 'view', $application->id, 'prefix' => $prefix, 'status' => $application->status], ['escape' => false, 'class' => 'btn-zangu']) ; 
                      ?>
                  </td>
                <td><?= h($application->public_title) ?></td>
                <td><?= h($application->scientific_title) ?></td>
                <td><?php 
                      echo ($application->approved) ? '<b>'.$application->approved.'</b>
                               <br>'.$application->status : $application->status ; 
                      echo '<hr class="finance"><br><b>Assigned to:</b><br>';
                      foreach ($application->assign_evaluators as $evaluator) {
                          // echo $all_evaluators->toArray()[$evaluator->user_id].' <i class="fa fa-arrow-right" aria-hidden="true"></i> '.$all_evaluators->toArray()[$evaluator->assigned_to].'<br>';
                          echo $this->cell('Signature::index', [$evaluator->assigned_to]).' <span class="muted">by '.$this->cell('Signature::index', [$evaluator->user_id]).'</span><hr class="finance">';
                      }
                    ?>
                </td>
                <td>
                    <?php 
                      foreach ($application->finance_approvals as $finance_approval) {
                        // get user name if user_id is not null
                        $user= null;
                        if ($finance_approval->user) {
                          $user= $finance_approval->user->name;
                        }
                        echo '<b>Outcome: </b>'.$finance_approval->outcome.' <span class="muted">'.$finance_approval->outcome_date.' by '.$user.'</span><br>';
                        echo "<p>".$finance_approval->internal_comments."</p>";
                        echo "<p>".$finance_approval->public_comments."</p><hr class='finance'>";
                      }
                    ?>
                </td>
                <td><?= h($application->created) ?></td>         
                <td>
                               
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
