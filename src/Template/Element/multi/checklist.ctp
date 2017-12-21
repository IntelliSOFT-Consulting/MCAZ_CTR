<?php
  //   $this->Html->script('multi/checklist', array('block' => true));
  // $add_checklist = '<p><button class="btn btn-mini tiptip add-checklist" data-original-title="Add a file"
  //                               style="margin-left:10px;" type="button">&nbsp;<i class="icon-plus-sign"></i>&nbsp; </button>';

?>
<h5><b>CHECKLIST <span class="sterix">*</span></b>:<br>
In-house CHECKLIST for Completeness of an application to conduct a clinical trial </h5>
<hr>
<?php

    echo $this->Form->control('applicant_covering_letter', 
                ['type' => 'checkbox', 'label' => 'Covering Letter <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label></label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div id="CoverLetter" class="checkcontrols000" title="cover_letter">
<?php
// pr($application['cover_letters']);
    if (!empty($application['cover_letters'][0]->file)) {
        echo $this->Html->link($application['cover_letters'][0]->file, substr($application['cover_letters'][0]->dir, 8) . '/' . $application['cover_letters'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('cover_letters.0.id', ['type' => 'hidden', 'templates' => 'table_form']);
      echo $this->Form->control('cover_letters.0.file', ['type' => 'file','label' => 'Attach']);
    }
?>
</div>
<?php

    echo $this->Form->control('applicant_fees', 
                ['type' => 'checkbox', 'label' => 'Application Fees <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label></label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div id="CoverLetter" class="checkcontrols000" title="cover_letter">
<?php
    if (!empty($application['fees'][0]->file)) {
        echo $this->Html->link($application['fees'][0]->file, substr($application['fees'][0]->dir, 8) . '/' . $application['fees'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('fees.0.id', ['type' => 'hidden', 'templates' => 'table_form']);
      echo $this->Form->control('fees.0.file', ['type' => 'file','label' => 'Attach']);
    }
?>
</div>
<?php

    echo $this->Form->control('applicant_mc10', 
                ['type' => 'checkbox', 'label' => 'Fully completed application MC 10 form in triplicate  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label></label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div id="CoverLetter" class="checkcontrols000" title="cover_letter">
<?php
    if (!empty($application['mc10_forms'][0]->file)) {
        echo $this->Html->link($application['mc10_forms'][0]->file, substr($application['mc10_forms'][0]->dir, 8) . '/' . $application['mc10_forms'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('mc10_forms.0.id', ['type' => 'hidden', 'templates' => 'table_form']);
      echo $this->Form->control('mc10_forms.0.file', ['type' => 'file','label' => 'Attach']);
    }
?>
</div>
<?php

    echo $this->Form->control('applicant_protocol', 
                ['type' => 'checkbox', 'label' => 'Protocol (including relevant questionnaires, etc.)  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label></label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div id="CoverLetter" class="checkcontrols000" title="cover_letter">
<?php
    if (!empty($application['protocols'][0]->file)) {
        echo $this->Html->link($application['protocols'][0]->file, substr($application['protocols'][0]->dir, 8) . '/' . $application['protocols'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('protocols.0.id', ['type' => 'hidden', 'templates' => 'table_form']);
      echo $this->Form->control('protocols.0.file', ['type' => 'file','label' => 'Attach']);
    }
?>
</div>
<?php

    echo $this->Form->control('applicant_patient_information', 
                ['type' => 'checkbox', 'label' => 'Patient information leaflet(s) and informed consent(s) including vernacular versions and English back translations  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label></label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div id="CoverLetter" class="checkcontrols000" title="cover_letter">
<?php
    if (!empty($application['leaflets'][0]->file)) {
        echo $this->Html->link($application['leaflets'][0]->file, substr($application['leaflets'][0]->dir, 8) . '/' . $application['leaflets'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('leaflets.0.id', ['type' => 'hidden', 'templates' => 'table_form']);
      echo $this->Form->control('leaflets.0.file', ['type' => 'file','label' => 'Attach']);
    }
?>
</div>
<?php

    echo $this->Form->control('applicant_investigators_brochure', 
                ['type' => 'checkbox', 'label' => ' Investigators brochure and / or all package insert(s) <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label></label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div>
<?php
    if (!empty($application['brochures'][0]->file)) {
        echo $this->Html->link($application['brochures'][0]->file, substr($application['brochures'][0]->dir, 8) . '/' . $application['brochures'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('brochures.0.id', ['type' => 'hidden', 'templates' => 'table_form']);
      echo $this->Form->control('brochures.0.file', ['type' => 'file','label' => 'Attach']);
    }
?>
</div>
<?php

    echo $this->Form->control('applicant_investigators_cv', 
                ['type' => 'checkbox', 'label' => 'Investigator\'s CV(s) in required format  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label></label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div>
<?php
    if (!empty($application['investigator_cvs'][0]->file)) {
        echo $this->Html->link($application['investigator_cvs'][0]->file, substr($application['investigator_cvs'][0]->dir, 8) . '/' . $application['investigator_cvs'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('investigator_cvs.0.id', ['type' => 'hidden', 'templates' => 'table_form']);
      echo $this->Form->control('investigator_cvs.0.file', ['type' => 'file','label' => 'Attach']);
    }
?>
</div>
<?php

    echo $this->Form->control('applicant_signed_declaration', 
                ['type' => 'checkbox', 'label' => 'Signed declaration(s) by investigator(s) to comply with GCP <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label></label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div>
<?php
    if (!empty($application['declarations'][0]->file)) {
        echo $this->Html->link($application['declarations'][0]->file, substr($application['declarations'][0]->dir, 8) . '/' . $application['declarations'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('declarations.0.id', ['type' => 'hidden', 'templates' => 'table_form']);
      echo $this->Form->control('declarations.0.file', ['type' => 'file','label' => 'Attach']);
    }
?>
</div>
<?php

    echo $this->Form->control('applicant_study_monitors', 
                ['type' => 'checkbox', 'label' => 'CV(s) and signed declaration(s) by study coordinator and/or monitor <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label></label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div>
<?php
    if (!empty($application['study_monitors'][0]->file)) {
        echo $this->Html->link($application['study_monitors'][0]->file, substr($application['study_monitors'][0]->dir, 8) . '/' . $application['study_monitors'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('study_monitors.0.id', ['type' => 'hidden', 'templates' => 'table_form']);
      echo $this->Form->control('study_monitors.0.file', ['type' => 'file','label' => 'Attach']);
    }
?>
</div>
<?php

    echo $this->Form->control('applicant_monitoring_plans', 
                ['type' => 'checkbox', 'label' => 'Monitoring plan by sponsor/PI/monitor throughout study <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label></label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div>
<?php
    if (!empty($application['monitoring_plans'][0]->file)) {
        echo $this->Html->link($application['monitoring_plans'][0]->file, substr($application['monitoring_plans'][0]->dir, 8) . '/' . $application['monitoring_plans'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('monitoring_plans.0.id', ['type' => 'hidden', 'templates' => 'table_form']);
      echo $this->Form->control('monitoring_plans.0.file', ['type' => 'file','label' => 'Attach']);
    }
?>
</div>
<?php

    echo $this->Form->control('applicant_pi_declaration', 
                ['type' => 'checkbox', 'label' => 'Signed Declaration by sponsor and national PI to comply with GCP  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label></label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div>
<?php
    if (!empty($application['pi_declarations'][0]->file)) {
        echo $this->Html->link($application['pi_declarations'][0]->file, substr($application['pi_declarations'][0]->dir, 8) . '/' . $application['pi_declarations'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('pi_declarations.0.id', ['type' => 'hidden', 'templates' => 'table_form']);
      echo $this->Form->control('pi_declarations.0.file', ['type' => 'file','label' => 'Attach']);
    }
?>
</div>
<?php

    echo $this->Form->control('applicant_study_sponsorship', 
                ['type' => 'checkbox', 'label' => 'Signed financial declaration by sponsor and national PI for study sponsorship  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label></label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div>
<?php
    if (!empty($application['study_sponsorships'][0]->file)) {
        echo $this->Html->link($application['study_sponsorships'][0]->file, substr($application['study_sponsorships'][0]->dir, 8) . '/' . $application['study_sponsorships'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('study_sponsorships.0.id', ['type' => 'hidden', 'templates' => 'table_form']);
      echo $this->Form->control('study_sponsorships.0.file', ['type' => 'file','label' => 'Attach']);
    }
?>
</div>

<?php

    echo $this->Form->control('applicant_pharmacy_plan', 
                ['type' => 'checkbox', 'label' => 'Pharmacy plan for local trial site  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label></label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div>
<?php
    if (!empty($application['pharmacy_plans'][0]->file)) {
        echo $this->Html->link($application['pharmacy_plans'][0]->file, substr($application['pharmacy_plans'][0]->dir, 8) . '/' . $application['pharmacy_plans'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('pharmacy_plans.0.id', ['type' => 'hidden', 'templates' => 'table_form']);
      echo $this->Form->control('pharmacy_plans.0.file', ['type' => 'file','label' => 'Attach']);
    }
?>
</div>
<?php

    echo $this->Form->control('applicant_pharmacy_license', 
                ['type' => 'checkbox', 'label' => 'MCAZ Pharmacy license (where applicable)  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label></label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div>
<?php
    if (!empty($application['pharmacy_licenses'][0]->file)) {
        echo $this->Html->link($application['pharmacy_licenses'][0]->file, substr($application['pharmacy_licenses'][0]->dir, 8) . '/' . $application['pharmacy_licenses'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('pharmacy_licenses.0.id', ['type' => 'hidden', 'templates' => 'table_form']);
      echo $this->Form->control('pharmacy_licenses.0.file', ['type' => 'file','label' => 'Attach']);
    }
?>
</div>
<?php

    echo $this->Form->control('applicant_study_medicines', 
                ['type' => 'checkbox', 'label' => 'Details of study medicines and concomitant medicines <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label></label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div>
<?php
    if (!empty($application['study_medicines'][0]->file)) {
        echo $this->Html->link($application['study_medicines'][0]->file, substr($application['study_medicines'][0]->dir, 8) . '/' . $application['study_medicines'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('study_medicines.0.id', ['type' => 'hidden', 'templates' => 'table_form']);
      echo $this->Form->control('study_medicines.0.file', ['type' => 'file','label' => 'Attach']);
    }
?>
</div>
<?php

    echo $this->Form->control('applicant_insurance_certificate', 
                ['type' => 'checkbox', 'label' => 'Proof of participants\' insurance certificate ', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label></label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div>
<?php
    if (!empty($application['insurance_certificates'][0]->file)) {
        echo $this->Html->link($application['insurance_certificates'][0]->file, substr($application['insurance_certificates'][0]->dir, 8) . '/' . $application['insurance_certificates'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('insurance_certificates.0.id', ['type' => 'hidden', 'templates' => 'table_form']);
      echo $this->Form->control('insurance_certificates.0.file', ['type' => 'file','label' => 'Attach']);
    }
?>
</div>
