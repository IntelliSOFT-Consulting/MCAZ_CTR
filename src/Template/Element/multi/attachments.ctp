<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr $sadr
 */
    // $this->Html->script('multi/list_of_drugs', array('inline' => false));
    $this->Html->script('multi/attachments', ['block' => true]);

    if (isset($sadr['attachments'])) {
        $att = $sadr['attachments'];
    } elseif (isset($aefi['attachments'])) {
        $att = $aefi['attachments'];
    } elseif (isset($adr['attachments'])) {
        $att = $adr['attachments'];
    }
?>

    <div class="row">
        <div class="col-md-12">
            <h4>Do you have files that you would like to attach? click on the button to add them: <button type="button" class="btn btn-info btn-sm" id="addAttachment">
                          <i class="fa fa-plus"></i>
                        </button></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="attachmentsTable"  class="table table-bordered">
                <thead>
                  <tr>
                    <th> # </th>
                    <th> FILE </th>
                    <th> DESCRIPTION OF CONTENTS</th>
                    <th>  </th>
                  </tr>
                </thead>
                <tbody>                  
              <?php 
                //Dynamic fields
                if (!empty($att)) {
                  for ($i = 0; $i <= count($att)-1; $i++) { 
              ?>

                  <tr>
                    <td><?= $i+1; ?></td>
                    <td><p class="text-info text-left"><?php
                             echo $this->Form->input('attachments.'.$i.'.id', ['templates' => 'table_form']);
                             echo $this->Html->link($att[$i]->file, '../'.substr($att[$i]->dir, 8) . '/' . $att[$i]->file);
                        ?></p>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('attachments.'.$i.'.description', ['label' => false, 'templates' => 'table_form']);
                        ?>
                    </td>                    
                    <td>
                        <button  type="button" class="btn btn-default btn-sm remove-attachment"  value="<?php if (isset($att[$i]['id'])) { echo $att[$i]['id']; } ?>" >
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
