    <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      Clinical Trials Registry</h3> 
      
    <h2 class="text-center">Assigned Evaluators</h2>
    <hr>

  <?= $this->element('pdf/common_header')?>
          <?php foreach ($assign_evaluators as $evaluator) { 
            ?>
          <div class="thumbnail">
            <p class="topper"><small><em class="text-success">assigned on: <?= $evaluator['created'] ?></em></small></p>
            <form>
              <div class="form-group">
                <label>Internal Evaluator</label>
                <p class="form-control-static"><?= $all_evaluators->toArray()[$evaluator->assigned_to] ?></p>
              </div>
              <div class="form-group">
                <label>User Message</label>
                <p class="form-control-static"><?= $evaluator->user_message ?></p>
              </div>      
              </form>        
            
          </div>
          <?php }  ?>