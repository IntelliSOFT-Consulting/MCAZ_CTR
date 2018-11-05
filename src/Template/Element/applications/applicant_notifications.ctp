<?php
    $this->Html->script('multi/attachments', ['block' => true]);
?>
          
          <?php
            // echo $this->element('multi/attachments');
            // echo $this->Form->control('notification', ['label' => '<i class="fa fa-comment-o" aria-hidden="true"></i> Any other comment(s)', 
            //       'escape' => false,
            //       'templates' => [ 
            //           'label' => '<div class="checkbox col-sm-12"><label  style="font-weight: bold;" {{attrs}}>{{text}}</label></div>',
            //           'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
            //           'textarea' => '<div class="col-sm-12"><textarea class="form-control" rows="2" name="{{name}}"{{attrs}}>{{value}}</textarea></div>',]]);
          ?>

<div class="row">
    <div class="col-md-12">
        <h3 class="text-center text-success"><u>Notification(s) to MCAZ</u></h3>
        <h4 class="text-center">Site Activation Report, Protocol deviations, Clarification memos, DSMB reports, Safety Updates, Progress updates, Site Closure Report etc.</h4>
      	<h6 class="text-center muted">(Notifications may be submitted at any stage of the application process)</h6>
      <hr>
      <h5><i class="icon-file"></i> Do you have attachments that you would like to send to MCAZ? click on the button to add them:
        <button type="button" class="btn btn-primary btn-xs" id="addAttachment">&nbsp;<i class="fa fa-plus"></i>&nbsp;</button>
      </h5>
    </div>
</div>

 <?php echo $this->Form->create($application, ['type' => 'file','url' => ['action' => 'add-notifications']]); ?>
<div class="row">
    <div class="col-md-12">
        <table id="attachmentsTable"  class="table table-bordered table-condensed">
            <thead>
              <tr>
                <th> # </th>
                <th> File </th>
                <th> Text Description</th>
                <th> </th>
              </tr>
            </thead>
            <tbody>                  
          <?php 
            //Dynamic fields
          	echo $this->Form->control('application_pr_id', ['type' => 'hidden', 'value' => $application->id, 'escape' => false, 'templates' => 'table_form']);
            if (!empty($application['attachments'])) {
              for ($i = 0; $i <= count($application['attachments'])-1; $i++) { 
          ?>

              <tr>
                <td><?= $i+1; ?></td>
                <td><p class="text-info text-left"><?php
                         echo $this->Form->input('attachments.'.$i.'.id', ['type' => 'hidden', 'templates' => 'table_form']);
                         echo $this->Html->link($application['attachments'][$i]->file, substr($application['attachments'][$i]->dir, 8) . '/' . $application['attachments'][$i]->file, ['fullBase' => true]);
                    ?></p>
                </td>
                <td>
                    <?= $application['attachments'][$i]['description'] ?>
                </td>                    
                <td>
                	<?= $application['attachments'][$i]['created'] ?>
                </td>
              </tr>
              <?php } } ; ?>

            </tbody>
      </table>

        <div class="form-group"> 
            <div class="col-sm-12"> 
              <button type="submit" class="btn btn-success active" id="sendNotification"><i class="fa fa-save" aria-hidden="true"></i> Submit</button>
            </div> 
        </div>

    </div><!--/span-->
</div><!--/row-->
    <?php echo $this->Form->end() ?>
<hr>
