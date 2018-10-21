<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

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
                    <?php 
                      $i = 1;
                      foreach ($applications as $application): ?>
                    <li><?php 
                                if($application->submitted == 2) {
                                  echo $i++.'. '.$this->Html->link('<span class="text-success">'.$application->protocol_no.' <small class="muted">'.$application->approved.'-'.$application->status.'</small>', ['controller' => 'Applications', 'action' => 'view', $application->id], ['escape' => false]);
                                } else {
                                  echo $i++.'. '.$this->Html->link(
                                    (!empty($application['public_title'])   ? $application['public_title'] : date('d-m-Y h:i a', strtotime($application['created'])) )
                                    .' &nbsp; &nbsp;<i class="fa fa-pencil" aria-hidden="true"></i>', ['controller' => 'Applications', 'action' => 'edit', $application->id], ['escape' => false]);
                                }
                                
                               ?></li>
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
            <!-- begin -->
            <div class="col-xs-12 col-sm-12">
                <h3><?= $this->Html->link('<i class="fa fa-file-text" aria-hidden="true"></i> Section 75', ['controller' => 'Applications', 'action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn-zangu')); ?> <small class="badge badge-application"><?= $this->Paginator->counter(['format' => __('{{count}}'), 'model' => 'SeventyFives']) ?></small></h3>                
                  <ul class="list-unstyled">
                    <?php 
                      $i = 1;
                      foreach ($seventy_fives as $seventy_five): ?>
                    <li><?php 
                          echo $i++.'. '.$this->Text->truncate($seventy_five->applicant_review_comment, 37).$this->Html->link('<span class="text-info">view</view>', ['controller' => 'Applications', 'action' => 'view', $seventy_five->application->id], ['escape' => false]);
                                
                               ?></li>
                    <?php endforeach; ?>
                  </ul>
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm">
                        <?= $this->Paginator->first('<< ', ['model' => 'SeventyFives']) ?>
                        <?= $this->Paginator->prev('< ' , ['model' => 'SeventyFives']) ?>
                        <?= $this->Paginator->next(' >', ['model' => 'SeventyFives']) ?>
                        <?= $this->Paginator->last(' >>', ['model' => 'SeventyFives']) ?>
                    </ul>
                </nav>        
                
            </div>
            <!-- end -->
          </div>
               
        </div>
        <div class="col-sm-6">
          <div class="row">
            <!-- begin -->
            <?php if($this->request->session()->read('Auth.User.group_id') != 6) { ?>
            <div class="col-xs-12 col-sm-12">
                <h3><?= $this->Html->link('<i class="fa fa-file-text-o" aria-hidden="true"></i> Amendments', ['controller' => 'Amendments', 'action' => 'index', 'prefix' => $prefix], array('escape' => false, 'class' => 'btn-zangu')); ?> <small class="badge badge-application"><?= $this->Paginator->counter(['format' => __('{{count}}'), 'model' => 'Amendments']) ?></small></h3>
                
                <ul class="list-unstyled">
                  <?php 
                    $i = 1;
                    foreach ($amendments as $amendment): ?>
                  <li><?php 
                      // pr($amendment);
                          if($amendment->submitted == 2) {
                            echo $i++.'. '.$this->Html->link('<span class="text-success">'.$amendment->protocol_no.' <small class="muted">'.$amendment->status.'</small>', ['controller' => 'Amendments', 'action' => 'view', $amendment->id], ['escape' => false]);
                          } else {
                            echo $i++.'. '.$this->Html->link($amendment->parent_application->protocol_no.'&nbsp; amendment '.$amendment->created->i18nFormat('dd-MM-yyyy').' &nbsp; &nbsp;<i class="fa fa-pencil" aria-hidden="true"></i>', ['controller' => 'Applications', 'action' => 'amendment', $amendment->id], ['escape' => false]);
                          }
                              
                          ?></li>
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
            <?php } ?>
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
