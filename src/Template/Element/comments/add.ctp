<?php
  $this->Html->css('bootstrap/comments.css', ['block' => true]);
  $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.3.2/tinymce.min.js', ['block' => true]);
  $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.3.2/jquery.tinymce.min.js', ['block' => true]);
  $this->Html->script('comments/comments', ['block' => true]);
?>

<!-- <div class="row"> -->
  <!-- <div class="col-xs-12"> -->
    <div class="bs-example">
      <?php echo $this->Form->create(null, ['type' => 'file','url' => ['controller' => 'Comments', 'action' => $model['url'], 'prefix' => $prefix]]); ?>
                  <?php
                        echo $this->Form->control('model_id', ['type' => 'hidden', 'value' => $model['model_id'], 'escape' => false, 'templates' => 'table_form']);
                        echo $this->Form->control('foreign_key', ['type' => 'hidden', 'value' => $model['foreign_key'], 'templates' => 'comment_form']);
                        echo $this->Form->control('model', ['type' => 'hidden', 'value' => $model['model'], 'templates' => 'table_form']);
                        echo $this->Form->control('category', ['type' => 'hidden', 'value' => $model['category'], 'templates' => 'table_form']);
                        echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.id'), 'templates' => 'table_form']);
                        echo $this->Form->control('sender', ['escape' => false, 'templates' => 'comment_form']);
                        echo $this->Form->control('subject', ['label' => 'Subject', 'templates' => 'comment_form']);
                        echo $this->Form->control('content', ['label' => 'Content', 'type' => 'textarea', 'templates' => 
                              [
                              'inputContainer' => '<div class="{{type}}{{required}}">{{content}}</div>',
                              'textarea' => '<textarea class="form-control" rows=3 name="{{name}}"{{attrs}}>{{value}}</textarea>',]]);                     
                  ?>
                  <div class="row">
                      <div class="col-xs-12">
                          <h6 class="muted"><b>Attach File(s) </b>
                              <button type="button" class="btn btn-primary btn-xs" id="addUpload">&nbsp;<i class="fa fa-plus"></i>&nbsp;</button>
                          </h6>
                        <hr>
                      <div id="uploadsTable">

                      </div>
                      </div>
                  </div>
            <div class="form-group"> 
                <div class="col-xs-12"> 
                  <button type="submit" class="btn btn-success active"><i class="fa fa-save" aria-hidden="true"></i> Submit</button>
                </div> 
            </div>
         <?php echo $this->Form->end() ?>
    </div>
  <!-- </div> -->
<!-- </div> -->