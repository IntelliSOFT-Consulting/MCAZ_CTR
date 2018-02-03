    <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      Clinical Trials Registry</h3> 
      
    <h2 class="text-center">Finance </h2>
    <hr>

  <?= $this->element('pdf/common_header')?>

  <?php foreach ($finance_approvals as $finance_approval) { ?>
  <div class="ctr-groups">
        <p class="topper"><small><em class="text-success">created: <?= $finance_approval['created'] ?></em></small></p>
      <form class="form-horizontal">
        <div class="form-group">
          <label class="col-xs-4 control-label">MCAZ Comments</label>
          <div class="col-xs-8">
          <p class="form-control-static"><?= $finance_approval['public_comments'] ?></p>
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-xs-4 control-label">Outcome</label>
          <div class="col-xs-8">
          <p class="form-control-static"><?= $finance_approval['outcome'] ?></p>
          </div> 
        </div>   
        <div class="form-group">
          <label class="col-xs-4 control-label">Outcome Date</label>
          <div class="col-xs-8">
          <p class="form-control-static"><?= $finance_approval['outcome_date'] ?></p>
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-xs-4 control-label">Attachment</label>
          <div class="col-xs-8">
          <p class="form-control-static"><?php if (!empty($finance_approval['file'])) {
                          echo $this->Html->link($finance_approval->file, substr($finance_approval->dir, 8) . '/' . $finance_approval->file, ['fullBase' => true]);
                      }  ?></p>
          </div> 
        </div>      
      </form>              
    </div>
    <?php } ?>