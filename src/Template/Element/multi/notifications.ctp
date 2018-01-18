<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr $sadr
 */
    // $this->Html->script('multi/list_of_drugs', array('inline' => false));
    $this->Html->script('multi/notifications', ['block' => true]);

?>

    <div class="row">
        <div class="col-md-12">
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
                    <th colspan="2">  </th>
                  </tr>
                </thead>
                <tbody>                  

                  
                </tbody>
          </table>
        </div><!--/span-->
    </div><!--/row-->
    <hr>
