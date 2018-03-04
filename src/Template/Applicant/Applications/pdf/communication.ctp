
    <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      Clinical Trials Registry</h3> 
      
    <h2 class="text-center">Communications</h2>
    <hr>

  <?= $this->element('pdf/common_header')?>
    <?php foreach ($request_infos as $request_info) {  ?>
          <div class="ctr-groups">
            <p class="topper"><small><em class="text-success"><?= $request_info['created'] ?> by <?= $request_info->user->name ?>, email <?= $request_info->user->email ?></em></small></p>
              <div class="amend-form">
                <form>
                  <div class="form-group">
                    <label>MCAZ comment</label>
                    <p class="form-control-static"><?= $request_info->mcaz_comment ?></p>
                  </div>
                  <div class="form-group">
                    <label>Applicant comment</label>
                    <p class="form-control-static"><?= $request_info->applicant_comment ?></p>
                  </div>
                  <div class="form-group">
                    <label class="col-xs-4 control-label">File</label>
                    <div class="col-xs-7">
                      <p class="form-control-static text-info text-left"><?php
                           echo $this->Html->link($request_info->file, substr($request_info->dir, 8) . '/' . $request_info->file, ['fullBase' => true]);
                      ?></p>
                    </div>
                  </div> 
                </form>  <br>
              </div>      
              <!-- <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Remove</button> -->
              <hr>
            
          </div>
          <?php } ?>