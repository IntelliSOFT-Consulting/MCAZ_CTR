<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr[]|\Cake\Collection\CollectionInterface $sadrs
 */
// pr($this);
// pr($sadrs);
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
        <ol><?php
           foreach($applications as $application) {            
              $ndata = (!empty($application['study_drug'])   ? $application['study_drug'] : date('d-m-Y h:i a', strtotime($application['created'])) );
              echo $this->Html->link('<li>'.$ndata.'</li>', array('controller' => 'applications', 'action' => 'edit', $application['id']),
                array('escape' => false));            
            }
           ?>
        </ol>
        <br>
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
