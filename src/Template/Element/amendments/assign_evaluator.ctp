<?php
  use Cake\Utility\Hash;
?>
  <div class="row">
    <div class="col-xs-12">
      <h4 class="text-center">Assign Amendment to Evaluators</h4>
      <hr>
    <?php
      if(count($amendment->assign_evaluators)>0)    echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download All ', ['controller' => 'Amendments', 'action' => 'evaluator', '_ext' => 'pdf', $amendment->id, 'All', ], ['escape' => false, 'class' => 'btn btn-info btn-sm']);
              ?>
    </div>
  </div>

  <div class="row">
    <div class="col-xs-12">
      <div class="row">
        <div class="col-xs-12">
          <h4 class="text-center">Internal Evaluator(s)</h4>
          <?php foreach ($amendment->assign_evaluators as $evaluator) { 
              if($evaluator->category === 'internal') {
            ?>
          <div class="thumbnail">
            <p class="topper"><small><em class="text-success">assigned on: <?= $evaluator['created'] ?> by <?= $evaluator->user->name ?></em></small></p>
        <?php
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Amendments', 'action' => 'evaluator', '_ext' => 'pdf', $evaluator->id, ], ['escape' => false, 'class' => 'btn btn-xs btn-success active']);
        ?>
            <form>
              <div class="form-group">
                <label>Internal Evaluator</label>
                <p class="form-control-static"><?= $this->cell('Signature::index', [$evaluator->assigned_to]) ?></p>
              </div>
              <div class="form-group">
                <label>User Message</label>
                <p class="form-control-static"><?= $evaluator->user_message ?></p>
              </div>      
              </form>        
              <!-- <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Remove</button> -->
              <?= $this->Form->postLink(
                        '<span class="fa fa-trash" aria-hidden="true"></span> Remove',
                        ['action' => 'remove-evaluator', $evaluator->id],
                        ['confirm' => 'Are you sure you want to remove '.$all_evaluators->toArray()[$evaluator->assigned_to].' from '.$amendment->protocol_no, 'escape' => false,
                          'class' => 'btn btn-warning btn-xs active']
                    )
              ?>
            
          </div>
          <?php } }  ?>

        <?php 
        if($prefix == 'manager' && in_array("2", Hash::extract($amendment->application_stages, '{n}.stage_id'))) { ?>
        <hr>
            <?php echo $this->Form->create($amendment, ['url' => ['action' => 'assign-evaluator']]);
             ?>
              <div class="row">
                <div class="col-xs-12">
                <?php
                      echo $this->Form->control('application_pr_id', ['type' => 'hidden', 'value' => $amendment->id, 'escape' => false, 'templates' => 'table_form']);
                      echo $this->Form->control('assign_evaluators.100.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
                      echo $this->Form->control('assign_evaluators.100.user_id', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.id'), 'templates' => 'table_form']);
                      echo $this->Form->control('assign_evaluators.100.category', ['type' => 'hidden', 'value' => 'internal', 'templates' => 'table_form']);
                      echo $this->Form->control('assign_evaluators.100.assigned_to', ['type' => 'select', 
                        'options' => $internal_evaluators, 'empty' => true, 'escape' => false, 'templates' => 'app_form']);
                      echo $this->Form->control('assign_evaluators.100.user_message', ['label' => '<label class="text-success">User Message</label>', 'escape' => false, 'templates' => 'textarea_form']);
                ?>
                </div>          
              </div>
              <div class="form-group"> 
                  <div class="col-sm-offset-4 col-sm-8"> 
                    <button type="submit" class="btn btn-primary active" id="registerUser"><i class="fa fa-save" aria-hidden="true"></i> Assign</button>
                  </div> 
                </div>
           <?php echo $this->Form->end() ?>
           <?php } ?>           
        </div>
      </div>
    </div>
   
  </div>