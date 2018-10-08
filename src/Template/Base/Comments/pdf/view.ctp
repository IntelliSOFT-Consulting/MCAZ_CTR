<?php
  use Cake\Utility\Hash;
  $this->Html->css('bootstrap/comments.css', ['block' => true]);
  $this->Html->script('comments/comments', ['block' => true]);
?>

  <div class="row">
    <div class="col-xs-12">
      <h4 class="text-center"><label class="text-info"><u>PVCT Committee Feedback</u></label></h4>
      <hr>
    <?php
      if(!empty($application->committee_reviews)) {
        echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download ', ['controller' => 'Applications', 'action' => 'committee-feedback', '_ext' => 'pdf', $application->id, 'All'], ['escape' => false, 'class' => 'btn btn-success btn-sm']);              
      }
    ?>
    </div>
  </div>

  <?= $this->element('pdf/common_header')?>
  <div class="row">
    <div class="col-xs-12">
      <h4>Preamble</h4>
      <p>The application was tabled at the PVCT Committee Meeting and the applicant was requested to address the following issues:</p>
    </div>  
  </div>
  
  <div class="row">
    <div class="col-xs-12">   
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th scope="col">Committee query</th>
                        <th scope="col">Applicant's response</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $i = 0; ?>
                  <?php foreach ($application->comments as $comment): ?>
                  <?php $i++ ?>
                    <tr>
                      <td><?= $i ?></td>
                      <td>
                        <?=  $comment->content ?>
                        <div>
                          <label class="control-label">File(s)</label>
                          <?php foreach ($comment->attachments as $attachment) { ?>                  
                              <p class="form-control-static text-info text-left"><?php
                                   echo $this->Html->link($attachment->file, substr($attachment->dir, 8) . '/' . $attachment->file, ['fullBase' => true]);
                              ?></p>
                              <p><?= $attachment['description'] ?></p>
                              <?php } ?>
                        </div> 
                      </td>
                      <td>
                        <?php foreach($comment->responses as $response): ?>    
                          <p><?= $response->content ?></p>    
                          <div>
                          <label class="control-label">File(s)</label>
                          <?php foreach ($response->attachments as $attachment) { ?>                  
                              <p class="form-control-static text-info text-left"><?php
                                   echo $this->Html->link($attachment->file, substr($attachment->dir, 8) . '/' . $attachment->file, ['fullBase' => true]);
                              ?></p>
                              <p><?= $attachment['description'] ?></p>
                              <?php } ?>    
                          </div> 
                        <?php endforeach; ?>
                      </td>
                    </tr>
                    <tr>
                      <td></td>      
                      <td colspan="2" class="evaluator-comment" 
                          data-type="wysihtml5" data-pk="<?= $comment->id ?>" 
                          data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'evaluator-comment',  'prefix' => $prefix, $comment->id, '_ext' => 'json']); ?>" 
                          data-name="review"
                          data-title="Enter evaluator's comment">
                          <p>
                          <?php //echo (empty($application->evaluation_header->study_design)) ? $application->design_controlled : $application->evaluation_header->study_design ?>
                          <?=  ($comment->review) ? $comment->review : 'Evaluator\'s comment' ?>
                          </p>                    
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
  </div>
