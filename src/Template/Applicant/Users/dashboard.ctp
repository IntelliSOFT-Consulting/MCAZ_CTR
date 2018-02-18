<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr[]|\Cake\Collection\CollectionInterface $sadrs
 */
// pr($this);

  $this->assign('Dashboard', 'active');
?>

<div class="row">
    <div class="col-md-4">
        <div class="thumbnail">
          <img alt="" src="/img/authenticated/text.png">
          <div class="caption">
          <h4>New Application</h4>
          <?php
            echo $this->Form->create('Application');
            // echo $this->Form->control('email_address', array('type' => 'email', 'value' => $this->request->session()->read('Auth.User.email')));
            echo $this->Form->control('email_address', ['label' => 'Email Address', 'type' => 'text',      
                    'value' => $this->request->session()->read('Auth.User.email'),             
                    'templates' =>[    
                      'label' => '<label {{attrs}}>{{text}}</label>',
                      'inputContainer' => '<div class="col-sm-11 {{type}}{{required}}">{{content}}</div>',
                      'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>']]);
                  
            echo $this->Form->button('Create');
            echo $this->Form->end();
          ?>
          <hr>
          <p><i class="fa fa-minus"></i> <span class="label label-info">NOTE!</span> Fields marked with <span class="sterix">
              <i class="fa fa-asterisk" aria-hidden="true"></i> </span> are mandatory and your application will not be submitted to MCAZ without first completing them.</p>
          <p><i class="fa fa-minus"></i> Notifications will be sent to the email address entered above</p>

          </div>
        </div>
    </div>

    <!-- recent protocols -->
    <div class="col-md-4">        
      <div class="thumbnail">
        <img alt="" src="/img/authenticated/preferences_composer.png">
        <div class="caption">
        <h4>Recent Protocols</h4>
        <ul class="list-unstyled">
          <?php 
            $i = 1;
            foreach ($applications as $application): ?>
          <li><?php 
                      if($application->submitted == 2) {
                        echo $i++.'. '.$this->Html->link('<span class="text-success">'.$application->protocol_no.' &nbsp; &nbsp;<i class="fa fa-check" aria-hidden="true"></i></span>', ['controller' => 'Applications', 'action' => 'view', $application->id], ['escape' => false]);
                      } else {
                        echo $i++.'. '.$this->Html->link(
                          (!empty($application['public_title'])   ? $application['public_title'] : date('d-m-Y h:i a', strtotime($application['created'])) )
                          .' &nbsp; &nbsp;<i class="fa fa-pencil" aria-hidden="true"></i>', ['controller' => 'Applications', 'action' => 'edit', $application->id], ['escape' => false]);
                      }
                      
                     ?></li>
          <?php endforeach; ?>
        </ul>
        <nav aria-label="Page navigation">
            <h6><small><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total'), 'model' => 'Applications']) ?></small></h6>
            <ul class="pagination pagination-sm">
                <?= $this->Paginator->first('<< ', ['model' => 'Applications']) ?>
                <?= $this->Paginator->prev('< ' , ['model' => 'Applications']) ?>
                <?= $this->Paginator->next(' >', ['model' => 'Applications']) ?>
                <?= $this->Paginator->last(' >>', ['model' => 'Applications']) ?>
            </ul>
        </nav>  
        <hr>
        
        <h4>Recent Amendments</h4>
        <ul class="list-unstyled">
          <?php 
            $i = 1;
            foreach ($amendments as $amendment): ?>
          <li><?php 
              // pr($amendment);
                  if($amendment->submitted == 2) {
                    echo $i++.'. '.$this->Html->link('<span class="text-success">'.$amendment->parent_application->protocol_no.'&nbsp; amendment '.$amendment->created->i18nFormat('dd-MM-yyyy').' &nbsp; &nbsp;<i class="fa fa-check" aria-hidden="true"></i></span>', ['controller' => 'Applications', 'action' => 'view', $amendment->parent_application->id], ['escape' => false]);
                  } else {
                    echo $i++.'. '.$this->Html->link($amendment->parent_application->protocol_no.'&nbsp; amendment '.$amendment->created->i18nFormat('dd-MM-yyyy').' &nbsp; &nbsp;<i class="fa fa-pencil" aria-hidden="true"></i>', ['controller' => 'Applications', 'action' => 'view', $amendment->parent_application->id], ['escape' => false]);
                  }
                      
                     ?></li>
          <?php endforeach; ?>
        </ul>
        <nav aria-label="Page navigation">
            <h6><small><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total'), 'model' => 'Amendments']) ?></small></h6>
            <ul class="pagination pagination-sm">
                <?= $this->Paginator->first('<< ', ['model' => 'Amendments']) ?>
                <?= $this->Paginator->prev('< ' , ['model' => 'Amendments']) ?>
                <?= $this->Paginator->next(' >', ['model' => 'Amendments']) ?>
                <?= $this->Paginator->last(' >>', ['model' => 'Amendments']) ?>
            </ul>
        </nav>  
        <?php echo $this->Html->link('<i class="fa fa-link"></i> View All Applications', array('controller' => 'Users', 'action' => 'dashboard', 'prefix' => $prefix),
            array('escape' => false, 'class' => 'btn btn-default'));?>
        </div>
      </div>
    </div>

    <!-- notifications -->
    <div class="col-md-4">
        <div class="thumbnail">
          <img alt="" src="/img/authenticated/preferences_desktop_notification.png">
          <div class="caption">
          <h4>Notifications <small>Actions that require your attention.</small></h4>
          <?= $this->Html->script('jquery/jquery.shorten', ['block' => true]); ?>
          <?= $this->cell('Notification'); ?>    
          </div>
        </div>  
    </div>
</div>
