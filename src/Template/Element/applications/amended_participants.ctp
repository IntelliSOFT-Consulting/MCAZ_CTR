<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\application $amendment
 */
    // $this->Html->script('multi/list_of_drugs', array('inline' => false));
    $this->Html->script('multi/participants', ['block' => true]);
?>
    <div class="row">
      <div class="col-xs-12">
        <h5>Particulars of persons  who will take part in the clinical Trial <small>
        Name, Occupation, Address, Date and place of birth. (attach letter of consent)</small></h5>
        <h5>Add Participant: <button type="button" class="btn btn-primary btn-xs" id="addParticipant">
                          Add <i class="fa fa-plus"></i>
                        </button></h5>
      </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <table id="participantsTable"  class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th> Name </th>
                    <th> Occupation </th>
                    <th> Address </th>
                    <th> Date of Birth </th>
                    <th> Place of Birth</th>
                    <th> Consent Letter </th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>                 
              
              <?php 
                //Dynamic fields
                if (!empty($amendment['participants'])) {
                  for ($i = 0; $i <= count($amendment['participants'])-1; $i++) { 
                    // pr($amendment);
              ?>

                  <tr>
                    <td><?= $i+1; ?></td>
                    <td><?php
                             echo $this->Form->input('participants.'.$i.'.id', ['templates' => 'app_form'])  ;
                             echo $this->Form->control('participants.'.$i.'.name', ['label' => false,
                                  'templates' => 'table_form' ]);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('participants.'.$i.'.occupation', ['label' => false, 'templates' => 'table_form' ]);
                        ?>
                    </td>                    
                    <td>
                        <?php
                            echo $this->Form->control('participants.'.$i.'.address', ['label' => false, 'templates' => 'table_form' ]);
                        ?>
                    </td>                 
                    <td><?php
                            echo $this->Form->control('participants.'.$i.'.date_of_birth', ['label' => false, 'type' => 'text','templates' => 'dates_form']);
                        ?>
                    </td>
                    <td><?php
                            echo $this->Form->control('participants.'.$i.'.place_of_birth', ['label' => false, 'templates' => 'table_form' ]);
                        ?>
                    </td>
                    <td>
                        <?php
                        if(empty($amendment['participants'][$i]->file)) {
                            echo $this->Form->control('participants.'.$i.'.file', [
                                'type' => 'file',
                                'label' => false, 
                                'templates' => 'table_form'
                                ]);
                          } else {
                        echo $this->Html->link($amendment['participants'][$i]->file, substr($amendment['participants'][$i]->dir, 8) . '/' . $amendment['participants'][$i]->file, ['fullBase' => true]);
                      }
                        ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-default btn-sm remove-participant"  value="<?php if (isset($amendment['participants'][$i]['id'])) { echo $amendment['participants'][$i]['id']; } ?>" >
                          <i class="fa fa-trash-o"></i>
                        </button>
                    </td>
                  </tr>
                  <?php } } ; ?>

                </tbody>
          </table>
        </div><!--/span-->
    </div><!--/row-->
    <hr>