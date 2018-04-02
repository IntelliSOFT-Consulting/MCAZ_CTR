
    <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      Clinical Trials Registry</h3> 
      
    <h2 class="text-center">Communications</h2>
    <hr>

  <?= $this->element('pdf/common_header')?>
    <?php foreach ($appeals as $appeal) {  ?>
          <div class="ctr-groups">
            <p class="topper"><small><em class="text-success"><?= $appeal['created'] ?> by <?= $appeal->user->name ?>, email <?= $appeal->user->email ?></em></small></p>
              <div class="amend-form">
                <form>
                  <div class="form-group">
                    <label>MCAZ comment</label>
                    <p class="form-control-static"><?= $appeal->comment ?></p>
                  </div>
                  <div class="form-group">
                    <label class="control-label">File(s)</label>
                    <?php foreach ($appeal->attachments as $attachment) { ?>                  
                        <p class="form-control-static text-info text-left"><?php
                             echo $this->Html->link($attachment->file, substr($attachment->dir, 8) . '/' . $attachment->file, ['fullBase' => true]);
                        ?></p>
                        <p><?= $attachment['description'] ?></p>
                        <?php } ?>
                  </div> 
                </form>  <br>
              </div>      
              <!-- <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Remove</button> -->
              <hr>
            
          </div>
          <?php } ?>