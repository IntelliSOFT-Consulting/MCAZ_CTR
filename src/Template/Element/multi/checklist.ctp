<?php
  //   $this->Html->script('multi/checklist', array('block' => true));
  // $add_checklist = '<p><button class="btn btn-mini tiptip add-checklist" data-original-title="Add a file"
  //                               style="margin-left:10px;" type="button">&nbsp;<i class="icon-plus-sign"></i>&nbsp; </button>';

?>
<h5>CHECKLIST <span class="sterix">*</span></h5>
<hr>
<?php

    echo $this->Form->control('applicant_covering_letter', 
                ['type' => 'checkbox', 'label' => 'Cover Letter <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label>1. </label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div id="CoverLetter" class="checkcontrols000" title="cover_letter">
<?php
    if (!empty($application['cover_letters'])) {
        echo $this->Html->link($application['cover_letters'][0]->file, substr($application['cover_letters'][0]->dir, 8) . '/' . $application['cover_letters'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('cover_letters.0.file', ['type' => 'file','label' => 'Attach Cover Letter']);
    }
?>
</div>
<?php
    echo $this->Form->control('applicant_protocol', 
                ['type' => 'checkbox', 'label' => 'Application fee receipt <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label>2. </label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div id="Protocol" class="checkcontrols0000" title="protocol">
<?php
 if (!empty($application['protocols'])) {
        echo $this->Html->link($application['protocols'][0]->file, substr($application['protocols'][0]->dir, 8) . '/' . $application['protocols'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('protocols.0.file', ['type' => 'file','label' => 'Attach ...']);
    }
?>
</div>
<?php
    echo $this->Form->control('applicant_protocol', 
                ['type' => 'checkbox', 'label' => 'MC10 Application form <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label>3. </label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div id="Protocol" class="checkcontrols0000" title="protocol">
<?php
 if (!empty($application['protocols'])) {
        echo $this->Html->link($application['protocols'][0]->file, substr($application['protocols'][0]->dir, 8) . '/' . $application['protocols'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('protocols.0.file', ['type' => 'file','label' => 'Attach ...']);
    }
?>
</div>
<?php
    echo $this->Form->control('applicant_protocol', 
                ['type' => 'checkbox', 'label' => 'Study Protocol <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label>4. </label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div id="Protocol" class="checkcontrols0000" title="protocol">
<?php
 if (!empty($application['protocols'])) {
        echo $this->Html->link($application['protocols'][0]->file, substr($application['protocols'][0]->dir, 8) . '/' . $application['protocols'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('protocols.0.file', ['type' => 'file','label' => 'Attach ...']);
    }
?>
</div>
<?php
    echo $this->Form->control('applicant_protocol', 
                ['type' => 'checkbox', 'label' => 'Informed Consent Form(s) <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label>5. </label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div id="Protocol" class="checkcontrols0000" title="protocol">
<?php
 if (!empty($application['protocols'])) {
        echo $this->Html->link($application['protocols'][0]->file, substr($application['protocols'][0]->dir, 8) . '/' . $application['protocols'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('protocols.0.file', ['type' => 'file','label' => 'Attach ...']);
    }
?>
</div>
<?php
    echo $this->Form->control('applicant_protocol', 
                ['type' => 'checkbox', 'label' => 'Proof of insurance cover <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label>6. </label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div id="Protocol" class="checkcontrols0000" title="protocol">
<?php
 if (!empty($application['protocols'])) {
        echo $this->Html->link($application['protocols'][0]->file, substr($application['protocols'][0]->dir, 8) . '/' . $application['protocols'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('protocols.0.file', ['type' => 'file','label' => 'Attach ...']);
    }
?>
</div>
<?php
    echo $this->Form->control('applicant_protocol', 
                ['type' => 'checkbox', 'label' => 'Signed declaration by investigators(PI and co-PIs) to comply with GCP <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label>7. </label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div id="Protocol" class="checkcontrols0000" title="protocol">
<?php
 if (!empty($application['protocols'])) {
        echo $this->Html->link($application['protocols'][0]->file, substr($application['protocols'][0]->dir, 8) . '/' . $application['protocols'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('protocols.0.file', ['type' => 'file','label' => 'Attach ...']);
    }
?>
</div>
<?php
    echo $this->Form->control('applicant_protocol', 
                ['type' => 'checkbox', 'label' => 'viii. Details of study medicines and concomitant medicines <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label>8. </label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div id="Protocol" class="checkcontrols0000" title="protocol">
<?php
 if (!empty($application['protocols'])) {
        echo $this->Html->link($application['protocols'][0]->file, substr($application['protocols'][0]->dir, 8) . '/' . $application['protocols'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('protocols.0.file', ['type' => 'file','label' => 'Attach ...']);
    }
?>
</div>
<?php
    echo $this->Form->control('applicant_protocol', 
                ['type' => 'checkbox', 'label' => 'Patient information leaflet', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label>9. </label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div id="Protocol" class="checkcontrols0000" title="protocol">
<?php
 if (!empty($application['protocols'])) {
        echo $this->Html->link($application['protocols'][0]->file, substr($application['protocols'][0]->dir, 8) . '/' . $application['protocols'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('protocols.0.file', ['type' => 'file','label' => 'Attach ...']);
    }
?>
</div>
<?php
    echo $this->Form->control('applicant_protocol', 
                ['type' => 'checkbox', 'label' => 'Investigators Brochure', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label>10. </label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div id="Protocol" class="checkcontrols0000" title="protocol">
<?php
 if (!empty($application['protocols'])) {
        echo $this->Html->link($application['protocols'][0]->file, substr($application['protocols'][0]->dir, 8) . '/' . $application['protocols'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('protocols.0.file', ['type' => 'file','label' => 'Attach ...']);
    }
?>
</div>
<?php
    echo $this->Form->control('applicant_protocol', 
                ['type' => 'checkbox', 'label' => 'CVs for the study coordinator', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label>11. </label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]);
?>
<div id="Protocol" class="checkcontrols0000" title="protocol">
<?php
 if (!empty($application['protocols'])) {
        echo $this->Html->link($application['protocols'][0]->file, substr($application['protocols'][0]->dir, 8) . '/' . $application['protocols'][0]->file, ['fullBase' => true]);
    } else {
      echo $this->Form->control('protocols.0.file', ['type' => 'file','label' => 'Attach ...']);
    }
?>
</div>

