
<div class="row">
<h1 class="page-header"> Dashboard</h1>
    <div class="col-sm-7">
      <h6><em><small>Showing only unprocessed reports</small></em></h6>
      <div class="row">
        <div class="col-sm-6">
          <div class="row">
            <!-- begin -->
            <div class="col-xs-12 col-sm-12">
                <h3><?= $this->Html->link('<i class="fa fa-file" aria-hidden="true"></i> Applications', ['controller' => 'Applications', 'action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn-zangu')); ?> <small class="badge badge-application"><?= $this->Paginator->counter(['format' => __('{{count}}'), 'model' => 'Applications']) ?></small></h3>
                <ul class="list-unstyled">
                  <?php foreach ($applications as $application): ?>
                  <li><?= $this->Html->link($application->protocol_no, ['controller' => 'Applications', 'action' => 'view', $application->id]);?> </li>
                  <?php endforeach; ?>
                </ul>
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm">
                        <?= $this->Paginator->first('<< ', ['model' => 'Applications']) ?>
                        <?= $this->Paginator->prev('< ' , ['model' => 'Applications']) ?>
                        <?= $this->Paginator->next(' >', ['model' => 'Applications']) ?>
                        <?= $this->Paginator->last(' >>', ['model' => 'Applications']) ?>
                    </ul>
                </nav>        
                
            </div>
            <!-- end -->
          </div>
               
        </div>
        <div class="col-sm-6">
          <div class="row">
            <!-- begin -->
            <div class="col-xs-12 col-sm-12">
                <h3><?= $this->Html->link('<i class="fa fa-file-text-o" aria-hidden="true"></i> Amendments', ['controller' => 'Amendments', 'action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn-zangu')); ?> <small class="badge badge-application"><?= $this->Paginator->counter(['format' => __('{{count}}'), 'model' => 'Amendments']) ?></small></h3>
                <ul class="list-unstyled">
                  <?php foreach ($amendments as $amendment): ?>
                  <li><?= $this->Html->link($amendment->parent_application->protocol_no.'&nbsp; amendment '.$amendment->created->i18nFormat('dd-MM-yyyy').' &nbsp; &nbsp;', ['controller' => 'Amendments', 'action' => 'view', $amendment->id], ['escape' => false]);;?> </li>
                  <?php endforeach; ?>
                </ul>
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm">
                        <?= $this->Paginator->first('<< ', ['model' => 'Amendments']) ?>
                        <?= $this->Paginator->prev('< ' , ['model' => 'Amendments']) ?>
                        <?= $this->Paginator->next(' >', ['model' => 'Amendments']) ?>
                        <?= $this->Paginator->last(' >>', ['model' => 'Amendments']) ?>
                    </ul>
                </nav>        
                
            </div>
            <!-- end -->
          </div>
               
        </div>
      </div>
    </div>

    <div class="col-xs-6 col-sm-5 placeholder">
      <?= $this->Html->script('jquery/jquery.shorten', ['block' => true]); ?>
      <?= $this->cell('Notification'); ?>
    </div>
    

</div>
