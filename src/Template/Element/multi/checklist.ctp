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
    // pr($application['cover_letters']);
        if (!empty($application['cover_letters'])) {
          for ($i = 0; $i <= count($application['cover_letters'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($application['cover_letters'][$i]->file, substr($application['cover_letters'][$i]->dir, 8) . '/' . $application['cover_letters'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$application['cover_letters'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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
                      ['type' => 'checkbox', 'label' => 'Practicing License for principal investigator or co-investigator '.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="fees" class="checkcontrols" title="fees">
    <?php
    // pr($application['fees']);
        if (!empty($application['fees'])) {
          for ($i = 0; $i <= count($application['fees'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($application['fees'][$i]->file, substr($application['fees'][$i]->dir, 8) . '/' . $application['fees'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$application['fees'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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
                      ['type' => 'checkbox', 'label' => 'Pharmacy License or Certificate  '.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="legal_forms" class="checkcontrols" title="legal_forms">
    <?php
    // pr($application['legal_forms']);
        if (!empty($application['legal_forms'])) {
          for ($i = 0; $i <= count($application['legal_forms'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($application['legal_forms'][$i]->file, substr($application['legal_forms'][$i]->dir, 8) . '/' . $application['legal_forms'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$application['legal_forms'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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
                      ['type' => 'checkbox', 'label' => 'Protocol (including relevant questionnaires, etc.) <i class="sterix fa fa-asterisk" aria-hidden="true"></i>'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="protocols" class="checkcontrols" title="protocols">
    <?php
    // pr($application['protocols']);
        if (!empty($application['protocols'])) {
          for ($i = 0; $i <= count($application['protocols'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($application['protocols'][$i]->file, substr($application['protocols'][$i]->dir, 8) . '/' . $application['protocols'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$application['protocols'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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
                      ['type' => 'checkbox', 'label' => 'Patient information leaflet(s) and informed consent(s) including vernacular versions and English back translations  '.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="leaflets" class="checkcontrols" title="leaflets">
    <?php
        if (!empty($application['leaflets'])) {
          for ($i = 0; $i <= count($application['leaflets'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($application['leaflets'][$i]->file, substr($application['leaflets'][$i]->dir, 8) . '/' . $application['leaflets'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$application['leaflets'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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
                      ['type' => 'checkbox', 'label' => 'Investigators brochure and / or all package insert(s) '.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="brochures" class="checkcontrols" title="brochures">
    <?php
        if (!empty($application['brochures'])) {
          for ($i = 0; $i <= count($application['brochures'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($application['brochures'][$i]->file, substr($application['brochures'][$i]->dir, 8) . '/' . $application['brochures'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$application['brochures'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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
                      ['type' => 'checkbox', 'label' => 'Investigator\'s CV(s) in required format <i class="sterix fa fa-asterisk" aria-hidden="true"></i>'.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="investigator_cvs" class="checkcontrols" title="investigator_cvs">
    <?php
        if (!empty($application['investigator_cvs'])) {
          for ($i = 0; $i <= count($application['investigator_cvs'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($application['investigator_cvs'][$i]->file, substr($application['investigator_cvs'][$i]->dir, 8) . '/' . $application['investigator_cvs'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$application['investigator_cvs'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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
                      ['type' => 'checkbox', 'label' => 'Signed declaration(s) by investigator(s) to comply with GCP '.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="declarations" class="checkcontrols" title="declarations">
    <?php
        if (!empty($application['declarations'])) {
          for ($i = 0; $i <= count($application['declarations'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($application['declarations'][$i]->file, substr($application['declarations'][$i]->dir, 8) . '/' . $application['declarations'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$application['declarations'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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
                      ['type' => 'checkbox', 'label' => 'CV(s) and signed declaration(s) by study coordinator and/or monitor '.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="study_monitors" class="checkcontrols" title="study_monitors">
    <?php
        if (!empty($application['study_monitors'])) {
          for ($i = 0; $i <= count($application['study_monitors'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($application['study_monitors'][$i]->file, substr($application['study_monitors'][$i]->dir, 8) . '/' . $application['study_monitors'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$application['study_monitors'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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
                      ['type' => 'checkbox', 'label' => 'Monitoring plan by sponsor/PI/monitor throughout study '.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="monitoring_plans" class="checkcontrols" title="monitoring_plans">
    <?php
        if (!empty($application['monitoring_plans'])) {
          for ($i = 0; $i <= count($application['monitoring_plans'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($application['monitoring_plans'][$i]->file, substr($application['monitoring_plans'][$i]->dir, 8) . '/' . $application['monitoring_plans'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$application['monitoring_plans'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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
                      ['type' => 'checkbox', 'label' => 'Signed Declaration by sponsor and national PI to comply with GCP  '.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="pi_declarations" class="checkcontrols" title="pi_declarations">
    <?php
        if (!empty($application['pi_declarations'])) {
          for ($i = 0; $i <= count($application['pi_declarations'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($application['pi_declarations'][$i]->file, substr($application['pi_declarations'][$i]->dir, 8) . '/' . $application['pi_declarations'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$application['pi_declarations'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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
                      ['type' => 'checkbox', 'label' => 'Signed financial declaration by sponsor and national PI for study sponsorship  '.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="study_sponsorships" class="checkcontrols" title="study_sponsorships">
    <?php
        if (!empty($application['study_sponsorships'])) {
          for ($i = 0; $i <= count($application['study_sponsorships'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($application['study_sponsorships'][$i]->file, substr($application['study_sponsorships'][$i]->dir, 8) . '/' . $application['study_sponsorships'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$application['study_sponsorships'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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
                      ['type' => 'checkbox', 'label' => 'Pharmacy plan for local trial site  '.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="pharmacy_plans" class="checkcontrols" title="pharmacy_plans">
    <?php
        if (!empty($application['pharmacy_plans'])) {
          for ($i = 0; $i <= count($application['pharmacy_plans'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($application['pharmacy_plans'][$i]->file, substr($application['pharmacy_plans'][$i]->dir, 8) . '/' . $application['pharmacy_plans'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$application['pharmacy_plans'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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
                      ['type' => 'checkbox', 'label' => 'MCAZ Pharmacy license (where applicable)  '.$add_checklist, 'escape' => false, 'templates' => 'checklist_form']);
      ?>
    </div>
    <div id="pharmacy_licenses" class="checkcontrols" title="pharmacy_licenses">
    <?php
        if (!empty($application['pharmacy_licenses'])) {
          for ($i = 0; $i <= count($application['pharmacy_licenses'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($application['pharmacy_licenses'][$i]->file, substr($application['pharmacy_licenses'][$i]->dir, 8) . '/' . $application['pharmacy_licenses'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$application['pharmacy_licenses'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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
        if (!empty($application['study_medicines'])) {
          for ($i = 0; $i <= count($application['study_medicines'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($application['study_medicines'][$i]->file, substr($application['study_medicines'][$i]->dir, 8) . '/' . $application['study_medicines'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$application['study_medicines'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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
        if (!empty($application['insurance_certificates'])) {
          for ($i = 0; $i <= count($application['insurance_certificates'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($application['insurance_certificates'][$i]->file, substr($application['insurance_certificates'][$i]->dir, 8) . '/' . $application['insurance_certificates'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$application['insurance_certificates'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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
        if (!empty($application['generic_insurances'])) {
          for ($i = 0; $i <= count($application['generic_insurances'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($application['generic_insurances'][$i]->file, substr($application['generic_insurances'][$i]->dir, 8) . '/' . $application['generic_insurances'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$application['generic_insurances'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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
        if (!empty($application['ethics_approvals'])) {
          for ($i = 0; $i <= count($application['ethics_approvals'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($application['ethics_approvals'][$i]->file, substr($application['ethics_approvals'][$i]->dir, 8) . '/' . $application['ethics_approvals'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$application['ethics_approvals'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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
        if (!empty($application['ethics_letters'])) {
          for ($i = 0; $i <= count($application['ethics_letters'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($application['ethics_letters'][$i]->file, substr($application['ethics_letters'][$i]->dir, 8) . '/' . $application['ethics_letters'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$application['ethics_letters'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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
        if (!empty($application['country_approvals'])) {
          for ($i = 0; $i <= count($application['country_approvals'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($application['country_approvals'][$i]->file, substr($application['country_approvals'][$i]->dir, 8) . '/' . $application['country_approvals'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$application['country_approvals'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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
        if (!empty($application['advertisments'])) {
          for ($i = 0; $i <= count($application['advertisments'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($application['advertisments'][$i]->file, substr($application['advertisments'][$i]->dir, 8) . '/' . $application['advertisments'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$application['advertisments'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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
        if (!empty($application['safety_monitors'])) {
          for ($i = 0; $i <= count($application['safety_monitors'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($application['safety_monitors'][$i]->file, substr($application['safety_monitors'][$i]->dir, 8) . '/' . $application['safety_monitors'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$application['safety_monitors'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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
        if (!empty($application['biological_products'])) {
          for ($i = 0; $i <= count($application['biological_products'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($application['biological_products'][$i]->file, substr($application['biological_products'][$i]->dir, 8) . '/' . $application['biological_products'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$application['biological_products'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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
        if (!empty($application['dossiers'])) {
          for ($i = 0; $i <= count($application['dossiers'])-1; $i++) { ?>
          <div style="margin-top: 5px; margin-bottom: 5px;">
          <?php
            echo $this->Html->link($application['dossiers'][$i]->file, substr($application['dossiers'][$i]->dir, 8) . '/' . $application['dossiers'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
            echo '&nbsp;<button value="'.$application['dossiers'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_link">
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



