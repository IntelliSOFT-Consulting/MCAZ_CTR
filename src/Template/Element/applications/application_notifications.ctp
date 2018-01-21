
          
          <?php
            echo $this->element('multi/attachments');
            echo $this->Form->control('notification', ['label' => '<i class="fa fa-comment-o" aria-hidden="true"></i> Any other comment(s)', 
                  'escape' => false,
                  'templates' => [ 
                      'label' => '<div class="checkbox col-sm-12"><label  style="font-weight: bold;" {{attrs}}>{{text}}</label></div>',
                      'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                      'textarea' => '<div class="col-sm-12"><textarea class="form-control" rows="2" name="{{name}}"{{attrs}}>{{value}}</textarea></div>',]]);
          ?>