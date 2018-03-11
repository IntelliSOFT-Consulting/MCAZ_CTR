<!-- <div class="row"> -->
    <!-- <div class="col-xs-12"> -->
      <?php 
        foreach ($comments as $key => $comment) {
      ?>
      <a class="btn btn-link" role="button" data-toggle="collapse" href="#comment<?= $comment->id ?>" aria-expanded="false" 
            aria-controls="comment<?= $comment->id ?>">
        <?= ($key+1).'.  '.$comment->sender.' <small><em>'.$comment->created.'</em></small> <br><small class="muted">'.$comment->category.'</small>' ?>
      </a>
        <div id="comment<?= $comment->id ?>" class="bs-example <?= ($this->request->params['_ext'] != 'pdf') ? 'collapse' : ''; ?>">
              <form>
                <div class="form-group">
                  <label class="control-label">Sender</label>
                  <div>
                    <p class="form-control-static"><?= $comment->sender ?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Subject</label>
                  <div>
                    <p class="form-control-static"><?= $comment->subject ?></p>
                  </div>
                </div> 
                <div class="form-group">
                  <label class="control-label">Content</label>
                  <div>
                  <p class="form-control-static"><?= $comment['content'] ?></p>
                  </div> 
                </div> 
                <div class="form-group">
                  <label class="control-label">File(s)</label>
                  <?php foreach ($comment->attachments as $attachment) { ?>                  
                      <p class="form-control-static text-info text-left"><?php
                           echo $this->Html->link($attachment->file, substr($attachment->dir, 8) . '/' . $attachment->file, ['fullBase' => true]);
                      ?></p>
                      <p><?= $attachment['description'] ?></p>
                      <?php } ?>
                </div> 
              </form> 
        </div><br>
        <?php } ?>
    <!-- </div> -->
<!-- </div> -->