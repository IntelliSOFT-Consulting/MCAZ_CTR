<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr $sadr
 */
    // $this->Html->script('multi/list_of_drugs', array('inline' => false));
    $this->Html->script('multi/attachments', ['block' => true]);

?>

    <div class="row">
        <div class="col-md-12">
            <h4>14. Notification(s) -
          <small class="muted">(Notifications may include files (pictures, scanned documents, pdf, word documents) or generic updates</small></h4>
          <hr>
          <h5><i class="icon-file"></i> Do you have attachments that you would like to send to MCAZ? click on the button to add them:
            <button type="button" class="btn btn-primary btn-xs" id="addAttachment">&nbsp;<i class="fa fa-plus"></i>&nbsp;</button>
          </h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="attachmentsTable"  class="table table-bordered table-condensed">
                <thead>
                  <tr>
                    <th> # </th>
                    <th> File </th>
                    <th> Text Description</th>
                    <th>  </th>
                  </tr>
                </thead>
                <tbody>                  
              <?php 
                //Dynamic fields
                if (!empty($amendment['attachments'])) {
                  for ($i = 0; $i <= count($amendment['attachments'])-1; $i++) { 
              ?>

                  <tr>
                    <td><?= $i+1; ?></td>
                    <td><p class="text-info text-left"><?php
                             echo $this->Form->input('attachments.'.$i.'.id', ['templates' => 'table_form']);
                             echo $this->Html->link($amendment['attachments'][$i]->file, substr($amendment['attachments'][$i]->dir, 8) . '/' . $amendment['attachments'][$i]->file, ['fullBase' => true]);
                        ?></p>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('attachments.'.$i.'.description', ['label' => false, 'templates' => 'table_form']);
                        ?>
                    </td>                    
                    <td>
                        <button  type="button" class="btn btn-default btn-sm remove-attachment"  value="<?php if (isset($amendment['attachments'][$i]['id'])) { echo $amendment['attachments'][$i]['id']; } ?>" >
                          <i class="fa fa-minus"></i>
                        </button>
                    </td>
                  </tr>
                  <?php } } ; ?>

                </tbody>
          </table>
        </div><!--/span-->
    </div><!--/row-->
    <hr>

          
          <?php
            //echo $this->element('multi/attachments');
            echo $this->Form->control('notification', ['label' => '<i class="fa fa-comment-o" aria-hidden="true"></i> Any other comment(s)', 
                  'escape' => false,
                  'templates' => [ 
                      'label' => '<div class="checkbox col-sm-12"><label  style="font-weight: bold;" {{attrs}}>{{text}}</label></div>',
                      'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                      'textarea' => '<div class="col-sm-12"><textarea class="form-control" rows="2" name="{{name}}"{{attrs}}>{{value}}</textarea></div>',]]);
          ?>