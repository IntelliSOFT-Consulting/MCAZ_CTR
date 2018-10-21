<?php
  $this->Html->script('ckeditor/ckeditor', ['block' => true]);
  $this->Html->script('ckeditor/config', ['block' => true]);
  $this->Html->script('ckeditor/adapters/jquery', ['block' => true]);
  $numb = 1;
  use Cake\Utility\Hash;
?>
  
  <br>
  <?php if($this->request->params['_ext'] != 'pdf') { ?>
    <div class="amend-form">
      <h5 class="text-center"><u>INTERNAL COMMENTS/QUERIES</u></h5>
      <div class="row">
        <div class="col-xs-8">    
          <?php echo $this->element('comments/list', ['comments' => $amendment->evaluation_comments]) ?> 
        </div>
        <div class="col-xs-4 lefty">
          <?php if(!in_array("9", Hash::extract($amendment->application_stages, '{n}.stage_id'))) { ?>
          <?php  
                echo $this->element('comments/add', [
                          'model' => ['model_id' => $amendment->id, 'foreign_key' => $amendment->id, 
                                      'model' => 'Amendments', 'category' => 'evaluation', 'url' => 'add-from-evaluations']]) 
          ?>
          <?php } ?>
        </div>
      </div>
    </div>
  <?php } ?>

    <div class="row">
      <div class="col-xs-12">      
        <?= $this->Flash->render() ?>
        <?php $this->ValidationMessages->display($application->errors()) ?>
            <h2 class="text-center">Evaluation Report(s)</h2>
            <hr>

            <?php if(count($amendment->assign_evaluators) > 0 && in_array("3", Hash::extract($amendment->application_stages, '{n}.stage_id'))) { ?> 
          <?php
              echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download All ', ['controller' => 'Amendments', 'action' => 'review', '_ext' => 'pdf', $amendment->id, 'All', ], ['escape' => false, 'class' => 'btn btn-info btn-sm']);
                    ?>
      </div>
    </div>

  <?= $this->element('pdf/amendment_header')?>

      <div class="row">
        <div class="col-xs-12">          
          <?php
            if (!empty($amendment->evaluations)) {
              echo "<h3 class='text-center'>Previous Evaluation(s)</h3>";
            }
          ?>
          <?= $this->element('amendments/evaluation_reports', ["evaluations" => $amendment->evaluations]) ?>
        </div>
      </div>

      <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseReview" aria-expanded="false" aria-controls="collapseReview">
        Evaluation Form. Click to review
      </button>

      <div class="row collapse" id="collapseReview" >
        <div class="col-xs-12">
         <?php 
         echo $this->Form->create($amendment, ['type' => 'file', 'url' => ['action' => 'add-review']]); ?>
              <div class="row">
                <div class="col-xs-12">
                <?php
                      echo $this->Form->control('application_pr_id', ['type' => 'hidden', 'value' => $amendment->id, 'escape' => false, 'templates' => 'table_form']);
                      echo $this->Form->control('evaluation_pr_id', ['type' => 'hidden', 'value' => (($amendment->evaluations[$ekey]['id']) ?? 100), 'escape' => false, 'templates' => 'table_form']);
                      echo $this->Form->control('evaluations.'.$ekey.'.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
                      echo $this->Form->control('evaluations.'.$ekey.'.user_id', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.id'), 'templates' => 'table_form']);
                ?>

                <table class="table table-bordered table-condensed">
                  <thead>
                    <tr class="active">
                      <th colspan="3">PREAMBLE </th>
                    </tr>
                  </thead>
                  <tbody>                    
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <!-- <label>Responsible Technical Officer’s Comments</label> -->
                            <?php
                              echo $this->Form->control('evaluations.'.$ekey.'.vulnerable_population_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                            ?>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr class="active">
                      <td colspan="3"><strong>Introduction </strong></td>
                    </tr>                    
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <!-- <label>Responsible Technical Officer’s Comments</label> -->
                            <?php
                              echo $this->Form->control('evaluations.'.$ekey.'.scientific_issues_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                            ?>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr class="active">
                      <td colspan="3"><strong>Proposed Amendments </strong></td>
                    </tr>
                   
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <!-- <label>Responsible Technical Officer’s Comments</label> -->
                            <?php
                              echo $this->Form->control('evaluations.'.$ekey.'.informed_consent_text', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                            ?>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr class="active">
                      <td colspan="3"><strong>Evaluator’s Comments </strong></td>
                    </tr>
                    
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>Responsible Technical Officer’s Comments</label>
                            <?php
                              echo $this->Form->control('evaluations.'.$ekey.'.other_materials_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                            ?>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr class="active">
                      <td colspan="3"><strong>INFORMATION TO BE COMMUNICATED TO APPLICANT  </strong></td>
                    </tr>
                    
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <!-- <label>Responsible Technical Officer’s Comments</label> -->
                            <?php
                              echo $this->Form->control('evaluations.'.$ekey.'.clinical_trials_text', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                            ?>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr class="active">
                      <td colspan="3"><strong>RECOMMENDATION </strong></td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <?php
                              echo $this->Form->control('evaluations.'.$ekey.'.recommendations', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                            ?>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-12"> 
                            <label>File Attachment</label>
                            <?php
                              echo $this->Form->control('evaluations.'.$ekey.'.file', ['type' => 'file', 'label' => false, 'escape' => false, 'templates' => 'table_form']);
                            ?>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td colspan="3">
                        <div class="row">
                          <div class="col-xs-6">
                            <?php
                              // echo $this->Form->control('evaluations.'.$ekey.'.signature', ['type' => 'checkbox', 'label' => 'Attach signature', 'escape' => false, 'templates' => 'app_form']);
                              
                      echo "<div class='control-label'><label>Signature<label></div>";
                      echo $this->Form->control('evaluations.'.$ekey.'.signature', ['type' => 'hidden', 'value' => 1, 'templates' => 'table_form']);
                            ?>
                          </div>
                          <div class="col-xs-4">
                            <?php          
                              echo ($this->request->session()->read('Auth.User.dir')) ?  "<img src='".$this->Url->build(substr($this->request->session()->read('Auth.User.dir'), 8) . '/' . $this->request->session()->read('Auth.User.file'), true)."' style='width: 70%;' alt=''>"  : '';
                            ?>
                          </div>
                          <div class="col-xs-2"> </div>
                        </div>
                      </td>
                    </tr>
                    
                  </tbody>
                </table>

                </div>          
              </div>
              <div class="form-group"> 
                  <div class="col-sm-12"> 
                    <button type="submit" class="btn btn-primary active" id="registerUser"><i class="fa fa-save" aria-hidden="true"></i> Submit</button>
                  </div> 
              </div>
           <?php echo $this->Form->end() ?>
           <?php } ?>
        </div>
      </div>

<script type="text/javascript">
    $(function(){
      // console.log('waa gwan');
      $("#collapseReview textarea").each(function(){
          // this.value = this.value.replace("AFFURL",producturl);
          // console.log('woi gwan');
          // console.log($(this).attr('id'));
          CKEDITOR.replace($(this).attr('id'));
      });
    });
  // CKEDITOR.replace('evaluations-100-vulnerable-population-comments');
  // CKEDITOR.replace('evaluations-100-scientific-issues-comments');
  // CKEDITOR.replace('evaluations-100-informed-consent-text');
  // CKEDITOR.replace('evaluations-100-other-materials-comments');
  // CKEDITOR.replace('evaluations-100-clinical-trials-text');
  // // CKEDITOR.replace('evaluations-100-biological-materials-comments');
  // CKEDITOR.replace('evaluations-100-recommendations');
</script>