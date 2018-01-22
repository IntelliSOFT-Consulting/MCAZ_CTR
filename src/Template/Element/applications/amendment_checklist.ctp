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

<div class="row">
  <div class="col-sm-1 checkbox">
    <label><?= $numb++ ?>.</label>
  </div>
  <div class="col-sm-11">
    <div class="checkcontrols">
      <?php

          echo $this->Form->control('applicant_fees', 
                      ['type' => 'checkbox', 'label' => 'Practicing License for principal investigator or co-investigator <i class="sterix fa fa-asterisk" aria-hidden="true"></i>'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="fees" class="checkcontrols" title="fees">
    <?php
    // pr($amendment['fees']);
        if (!empty($amendment['fees'])) {
          for ($i = 0; $i <= count($amendment['fees'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($amendment['fees'][$i]->file, substr($amendment['fees'][$i]->dir, 8) . '/' . $amendment['fees'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$amendment['fees'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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

<div class="row">
  <div class="col-sm-1 checkbox">
    <label><?= $numb++ ?>.</label>
  </div>
  <div class="col-sm-11">
    <div class="checkcontrols">
      <?php

          echo $this->Form->control('applicant_mc10', 
                      ['type' => 'checkbox', 'label' => 'Pharmacy License or Certificate  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="legal_forms" class="checkcontrols" title="legal_forms">
    <?php
    // pr($amendment['legal_forms']);
        if (!empty($amendment['legal_forms'])) {
          for ($i = 0; $i <= count($amendment['legal_forms'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($amendment['legal_forms'][$i]->file, substr($amendment['legal_forms'][$i]->dir, 8) . '/' . $amendment['legal_forms'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$amendment['legal_forms'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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

<div class="row">
  <div class="col-sm-1 checkbox">
    <label><?= $numb++ ?>.</label>
  </div>
  <div class="col-sm-11">
    <div class="checkcontrols">
      <?php

          echo $this->Form->control('applicant_protocol', 
                      ['type' => 'checkbox', 'label' => 'Protocol (including relevant questionnaires, etc.)  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="protocols" class="checkcontrols" title="protocols">
    <?php
    // pr($amendment['protocols']);
        if (!empty($amendment['protocols'])) {
          for ($i = 0; $i <= count($amendment['protocols'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($amendment['protocols'][$i]->file, substr($amendment['protocols'][$i]->dir, 8) . '/' . $amendment['protocols'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$amendment['protocols'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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

<div class="row">
  <div class="col-sm-1 checkbox">
    <label><?= $numb++ ?>.</label>
  </div>
  <div class="col-sm-11">
    <div class="checkcontrols">
      <?php

          echo $this->Form->control('applicant_patient_information', 
                      ['type' => 'checkbox', 'label' => 'Patient information leaflet(s) and informed consent(s) including vernacular versions and English back translations  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="leaflets" class="checkcontrols" title="leaflets">
    <?php
        if (!empty($amendment['leaflets'])) {
          for ($i = 0; $i <= count($amendment['leaflets'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($amendment['leaflets'][$i]->file, substr($amendment['leaflets'][$i]->dir, 8) . '/' . $amendment['leaflets'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$amendment['leaflets'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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

<div class="row">
  <div class="col-sm-1 checkbox">
    <label><?= $numb++ ?>.</label>
  </div>
  <div class="col-sm-11">
    <div class="checkcontrols">
      <?php

          echo $this->Form->control('applicant_investigators_brochure', 
                      ['type' => 'checkbox', 'label' => 'Investigators brochure and / or all package insert(s) <i class="sterix fa fa-asterisk" aria-hidden="true"></i>'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="brochures" class="checkcontrols" title="brochures">
    <?php
        if (!empty($amendment['brochures'])) {
          for ($i = 0; $i <= count($amendment['brochures'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($amendment['brochures'][$i]->file, substr($amendment['brochures'][$i]->dir, 8) . '/' . $amendment['brochures'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$amendment['brochures'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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

<div class="row">
  <div class="col-sm-1 checkbox">
    <label><?= $numb++ ?>.</label>
  </div>
  <div class="col-sm-11">
    <div class="checkcontrols">
      <?php

          echo $this->Form->control('applicant_investigators_cv', 
                      ['type' => 'checkbox', 'label' => 'Investigator\'s CV(s) in required format  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="investigator_cvs" class="checkcontrols" title="investigator_cvs">
    <?php
        if (!empty($amendment['investigator_cvs'])) {
          for ($i = 0; $i <= count($amendment['investigator_cvs'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($amendment['investigator_cvs'][$i]->file, substr($amendment['investigator_cvs'][$i]->dir, 8) . '/' . $amendment['investigator_cvs'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$amendment['investigator_cvs'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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

<div class="row">
  <div class="col-sm-1 checkbox">
    <label><?= $numb++ ?>.</label>
  </div>
  <div class="col-sm-11">
    <div class="checkcontrols">
      <?php

          echo $this->Form->control('applicant_signed_declaration', 
                      ['type' => 'checkbox', 'label' => 'Signed declaration(s) by investigator(s) to comply with GCP <i class="sterix fa fa-asterisk" aria-hidden="true"></i>'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="declarations" class="checkcontrols" title="declarations">
    <?php
        if (!empty($amendment['declarations'])) {
          for ($i = 0; $i <= count($amendment['declarations'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($amendment['declarations'][$i]->file, substr($amendment['declarations'][$i]->dir, 8) . '/' . $amendment['declarations'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$amendment['declarations'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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

<div class="row">
  <div class="col-sm-1 checkbox">
    <label><?= $numb++ ?>.</label>
  </div>
  <div class="col-sm-11">
    <div class="checkcontrols">
      <?php
          echo $this->Form->control('applicant_study_monitors', 
                      ['type' => 'checkbox', 'label' => 'CV(s) and signed declaration(s) by study coordinator and/or monitor <i class="sterix fa fa-asterisk" aria-hidden="true"></i>'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="study_monitors" class="checkcontrols" title="study_monitors">
    <?php
        if (!empty($amendment['study_monitors'])) {
          for ($i = 0; $i <= count($amendment['study_monitors'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($amendment['study_monitors'][$i]->file, substr($amendment['study_monitors'][$i]->dir, 8) . '/' . $amendment['study_monitors'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$amendment['study_monitors'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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

<div class="row">
  <div class="col-sm-1 checkbox">
    <label><?= $numb++ ?>.</label>
  </div>
  <div class="col-sm-11">
    <div class="checkcontrols">
      <?php
          echo $this->Form->control('applicant_monitoring_plans', 
                      ['type' => 'checkbox', 'label' => 'Monitoring plan by sponsor/PI/monitor throughout study <i class="sterix fa fa-asterisk" aria-hidden="true"></i>'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="monitoring_plans" class="checkcontrols" title="monitoring_plans">
    <?php
        if (!empty($amendment['monitoring_plans'])) {
          for ($i = 0; $i <= count($amendment['monitoring_plans'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($amendment['monitoring_plans'][$i]->file, substr($amendment['monitoring_plans'][$i]->dir, 8) . '/' . $amendment['monitoring_plans'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$amendment['monitoring_plans'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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

<div class="row">
  <div class="col-sm-1 checkbox">
    <label><?= $numb++ ?>.</label>
  </div>
  <div class="col-sm-11">
    <div class="checkcontrols">
      <?php
          echo $this->Form->control('applicant_pi_declaration', 
                      ['type' => 'checkbox', 'label' => 'Signed Declaration by sponsor and national PI to comply with GCP  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="pi_declarations" class="checkcontrols" title="pi_declarations">
    <?php
        if (!empty($amendment['pi_declarations'])) {
          for ($i = 0; $i <= count($amendment['pi_declarations'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($amendment['pi_declarations'][$i]->file, substr($amendment['pi_declarations'][$i]->dir, 8) . '/' . $amendment['pi_declarations'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$amendment['pi_declarations'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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

<div class="row">
  <div class="col-sm-1 checkbox">
    <label><?= $numb++ ?>.</label>
  </div>
  <div class="col-sm-11">
    <div class="checkcontrols">
      <?php
          echo $this->Form->control('applicant_study_sponsorship', 
                      ['type' => 'checkbox', 'label' => 'Signed financial declaration by sponsor and national PI for study sponsorship  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="study_sponsorships" class="checkcontrols" title="study_sponsorships">
    <?php
        if (!empty($amendment['study_sponsorships'])) {
          for ($i = 0; $i <= count($amendment['study_sponsorships'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($amendment['study_sponsorships'][$i]->file, substr($amendment['study_sponsorships'][$i]->dir, 8) . '/' . $amendment['study_sponsorships'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$amendment['study_sponsorships'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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

<div class="row">
  <div class="col-sm-1 checkbox">
    <label><?= $numb++ ?>.</label>
  </div>
  <div class="col-sm-11">
    <div class="checkcontrols">
      <?php
          echo $this->Form->control('applicant_pharmacy_plan', 
                      ['type' => 'checkbox', 'label' => 'Pharmacy plan for local trial site  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="pharmacy_plans" class="checkcontrols" title="pharmacy_plans">
    <?php
        if (!empty($amendment['pharmacy_plans'])) {
          for ($i = 0; $i <= count($amendment['pharmacy_plans'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($amendment['pharmacy_plans'][$i]->file, substr($amendment['pharmacy_plans'][$i]->dir, 8) . '/' . $amendment['pharmacy_plans'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$amendment['pharmacy_plans'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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

<div class="row">
  <div class="col-sm-1 checkbox">
    <label><?= $numb++ ?>.</label>
  </div>
  <div class="col-sm-11">
    <div class="checkcontrols">
      <?php
          echo $this->Form->control('applicant_pharmacy_license', 
                      ['type' => 'checkbox', 'label' => 'MCAZ Pharmacy license (where applicable)  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="pharmacy_licenses" class="checkcontrols" title="pharmacy_licenses">
    <?php
        if (!empty($amendment['pharmacy_licenses'])) {
          for ($i = 0; $i <= count($amendment['pharmacy_licenses'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($amendment['pharmacy_licenses'][$i]->file, substr($amendment['pharmacy_licenses'][$i]->dir, 8) . '/' . $amendment['pharmacy_licenses'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$amendment['pharmacy_licenses'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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

<div class="row">
  <div class="col-sm-1 checkbox">
    <label><?= $numb++ ?>.</label>
  </div>
  <div class="col-sm-11">
    <div class="checkcontrols">
      <?php
          echo $this->Form->control('applicant_study_medicines', 
                      ['type' => 'checkbox', 'label' => 'Details of study medicines and concomitant medicines'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="study_medicines" class="checkcontrols" title="study_medicines">
    <?php
        if (!empty($amendment['study_medicines'])) {
          for ($i = 0; $i <= count($amendment['study_medicines'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($amendment['study_medicines'][$i]->file, substr($amendment['study_medicines'][$i]->dir, 8) . '/' . $amendment['study_medicines'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$amendment['study_medicines'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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

<div class="row">
  <div class="col-sm-1 checkbox">
    <label><?= $numb++ ?>.</label>
  </div>
  <div class="col-sm-11">
    <div class="checkcontrols">
      <?php
          echo $this->Form->control('applicant_insurance_certificate', 
                      ['type' => 'checkbox', 'label' => 'Proof of participants\' insurance certificate'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="insurance_certificates" class="checkcontrols" title="insurance_certificates">
    <?php
        if (!empty($amendment['insurance_certificates'])) {
          for ($i = 0; $i <= count($amendment['insurance_certificates'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($amendment['insurance_certificates'][$i]->file, substr($amendment['insurance_certificates'][$i]->dir, 8) . '/' . $amendment['insurance_certificates'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$amendment['insurance_certificates'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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

<div class="row">
  <div class="col-sm-1 checkbox">
    <label><?= $numb++ ?>.</label>
  </div>
  <div class="col-sm-11">
    <div class="checkcontrols">
      <?php
          echo $this->Form->control('applicant_generic_insurance', 
                      ['type' => 'checkbox', 'label' => 'Letter endorsing generic insurance certificate'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="generic_insurances" class="checkcontrols" title="generic_insurances">
    <?php
        if (!empty($amendment['generic_insurances'])) {
          for ($i = 0; $i <= count($amendment['generic_insurances'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($amendment['generic_insurances'][$i]->file, substr($amendment['generic_insurances'][$i]->dir, 8) . '/' . $amendment['generic_insurances'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$amendment['generic_insurances'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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

<div class="row">
  <div class="col-sm-1 checkbox">
    <label><?= $numb++ ?>.</label>
  </div>
  <div class="col-sm-11">
    <div class="checkcontrols">
      <?php
          echo $this->Form->control('applicant_ethics_approval', 
                      ['type' => 'checkbox', 'label' => 'Ethics approval, in country of origin and local MRCZ approval'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="ethics_approvals" class="checkcontrols" title="ethics_approvals">
    <?php
        if (!empty($amendment['ethics_approvals'])) {
          for ($i = 0; $i <= count($amendment['ethics_approvals'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($amendment['ethics_approvals'][$i]->file, substr($amendment['ethics_approvals'][$i]->dir, 8) . '/' . $amendment['ethics_approvals'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$amendment['ethics_approvals'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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

<div class="row">
  <div class="col-sm-1 checkbox">
    <label><?= $numb++ ?>.</label>
  </div>
  <div class="col-sm-11">
    <div class="checkcontrols">
      <?php
          echo $this->Form->control('applicant_ethics_letter', 
                      ['type' => 'checkbox', 'label' => 'Copy of letter applying for ethics committee approval'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="ethics_letters" class="checkcontrols" title="ethics_letters">
    <?php
        if (!empty($amendment['ethics_letters'])) {
          for ($i = 0; $i <= count($amendment['ethics_letters'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($amendment['ethics_letters'][$i]->file, substr($amendment['ethics_letters'][$i]->dir, 8) . '/' . $amendment['ethics_letters'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$amendment['ethics_letters'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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

<div class="row">
  <div class="col-sm-1 checkbox">
    <label><?= $numb++ ?>.</label>
  </div>
  <div class="col-sm-11">
    <div class="checkcontrols">
      <?php
          echo $this->Form->control('applicant_country_approvals', 
                      ['type' => 'checkbox', 'label' => 'Proof of approval of study by the National Regulatory Authority in country of origin '.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="country_approvals" class="checkcontrols" title="country_approvals">
    <?php
        if (!empty($amendment['country_approvals'])) {
          for ($i = 0; $i <= count($amendment['country_approvals'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($amendment['country_approvals'][$i]->file, substr($amendment['country_approvals'][$i]->dir, 8) . '/' . $amendment['country_approvals'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$amendment['country_approvals'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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

<div class="row">
  <div class="col-sm-1 checkbox">
    <label><?= $numb++ ?>.</label>
  </div>
  <div class="col-sm-11">
    <div class="checkcontrols">
      <?php
          echo $this->Form->control('applicant_advertisments', 
                      ['type' => 'checkbox', 'label' => 'Copy/ies of recruitment advertisement(s)'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="advertisments" class="checkcontrols" title="advertisments">
    <?php
        if (!empty($amendment['advertisments'])) {
          for ($i = 0; $i <= count($amendment['advertisments'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($amendment['advertisments'][$i]->file, substr($amendment['advertisments'][$i]->dir, 8) . '/' . $amendment['advertisments'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$amendment['advertisments'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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

<div class="row">
  <div class="col-sm-1 checkbox">
    <label><?= $numb++ ?>.</label>
  </div>
  <div class="col-sm-11">
    <div class="checkcontrols">
      <?php
          echo $this->Form->control('applicant_electronic_versions', 
                      ['type' => 'checkbox', 'label' => 'Electronic versions of the application form + protocol on CD or flash disk'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="electronic_versions" class="checkcontrols" title="electronic_versions">
    <?php
        if (!empty($amendment['electronic_versions'])) {
          for ($i = 0; $i <= count($amendment['electronic_versions'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($amendment['electronic_versions'][$i]->file, substr($amendment['electronic_versions'][$i]->dir, 8) . '/' . $amendment['electronic_versions'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$amendment['electronic_versions'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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

<div class="row">
  <div class="col-sm-1 checkbox">
    <label><?= $numb++ ?>.</label>
  </div>
  <div class="col-sm-11">
    <div class="checkcontrols">
      <?php
          echo $this->Form->control('applicant_safety_monitoring', 
                      ['type' => 'checkbox', 'label' => 'Proof of Provision of Data Safety Monitoring Board (DSMB/DMC) Committee'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="safety_monitors" class="checkcontrols" title="safety_monitors">
    <?php
        if (!empty($amendment['safety_monitors'])) {
          for ($i = 0; $i <= count($amendment['safety_monitors'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($amendment['safety_monitors'][$i]->file, substr($amendment['safety_monitors'][$i]->dir, 8) . '/' . $amendment['safety_monitors'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$amendment['safety_monitors'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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

<div class="row">
  <div class="col-sm-1 checkbox">
    <label><?= $numb++ ?>.</label>
  </div>
  <div class="col-sm-11">
    <div class="checkcontrols">
      <?php
          echo $this->Form->control('applicant_biological_products', 
                      ['type' => 'checkbox', 'label' => 'Proof of application to the local Bio Safety Board for biological products e.g. vaccines'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="biological_products" class="checkcontrols" title="biological_products">
    <?php
        if (!empty($amendment['biological_products'])) {
          for ($i = 0; $i <= count($amendment['biological_products'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($amendment['biological_products'][$i]->file, substr($amendment['biological_products'][$i]->dir, 8) . '/' . $amendment['biological_products'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$amendment['biological_products'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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

<div class="row">
  <div class="col-sm-1 checkbox">
    <label><?= $numb++ ?>.</label>
  </div>
  <div class="col-sm-11">
    <div class="checkcontrols">
      <?php
          echo $this->Form->control('applicant_dossier', 
                      ['type' => 'checkbox', 'label' => 'Pharmaceutical dossier for a new investigational drug (NID) product including stability data 
generated from 3 batches to support the shelf life claim and storage conditions. 
(N.B) If study products are generic products not yet registered and specifically 
manufactured as \'trial batches\' for the study then a pharmaceutical dossier is also required.'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="dossiers" class="checkcontrols" title="dossiers">
    <?php
        if (!empty($amendment['dossiers'])) {
          for ($i = 0; $i <= count($amendment['dossiers'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($amendment['dossiers'][$i]->file, substr($amendment['dossiers'][$i]->dir, 8) . '/' . $amendment['dossiers'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$amendment['dossiers'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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



