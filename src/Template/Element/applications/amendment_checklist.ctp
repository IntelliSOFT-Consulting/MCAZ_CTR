<?php
  $this->Html->script('multi/checklist', array('block' => true));
  $add_checklist = '<button class="btn btn-default btn-xs tiptip add-checklist" data-toggle="tooltip" title="Add a file"
                                style="margin-left:10px;" type="button">&nbsp;<i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; </button>';
  $numb = 1;
?>
<h5><b>CHECKLIST <span class="sterix">*</span></b>:<br>
In-house CHECKLIST for Completeness of an application to conduct a clinical trial </h5>
<hr>
<div class="row">
  <div class="col-sm-1 checkbox">
    <label><?= $numb++ ?>.</label>
  </div>
  <div class="col-sm-11">
    <div class="checkcontrols">
      <?php

          echo $this->Form->control('applicant_covering_letter', 
                      ['type' => 'checkbox', 'label' => 'Covering Letter <i class="sterix fa fa-asterisk" aria-hidden="true"></i>'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="cover_letters" class="checkcontrols" title="cover_letters">
    <?php
    // pr($amendment['cover_letters']);
        if (!empty($amendment['cover_letters'])) {
          for ($i = 0; $i <= count($amendment['cover_letters'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($amendment['cover_letters'][$i]->file, substr($amendment['cover_letters'][$i]->dir, 8) . '/' . $amendment['cover_letters'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$amendment['cover_letters'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
              &nbsp;<i class="fa fa-trash"></i>&nbsp;</button>';
          ?>
        </div>
        <?php
          }
        } 
    ?>
    </div>
  </div>
</div>




