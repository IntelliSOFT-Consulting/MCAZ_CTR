<?php

            echo $this->Form->control('public_title', array(
              'label' => 'PUBLIC TITLE/ACRONYM',
              'escape' => false
            ));
            echo $this->Form->control('scientific_title', array(
              'label' => 'Scientific Title <i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
              'escape' => false
            )); 


            echo '<label>Contact for Public Queries</label><br/>';
            echo $this->Form->control('public_contact_name', array(
              'label' => 'Name<i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
              'escape' => false
            )); 
            echo $this->Form->control('public_contact_designation', array(
              'label' => 'Designation<i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
              'escape' => false
            )); 
            echo $this->Form->control('public_contact_email', array(
              'label' => 'Email<i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
              'escape' => false
            )); 
            echo $this->Form->control('public_contact_phone', array(
              'label' => 'Phone number <i class="sterix fa fa-asterisk aria-hidden="true"></i>',
              'escape' => false
            )); 
            echo $this->Form->control('public_contact_postal', array(
              'label' => 'Postal Address<i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
              'escape' => false
            )); 
            echo $this->Form->control('public_contact_affiliation', array(
              'label' => 'Affiliation ',
              'escape' => false
            )); 


            echo '<label>Contact for Scientific Queries</label><br/>';
            echo $this->Form->control('scientific_contact_name', array(
              'label' => 'Name<i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
              'escape' => false
            )); 
            echo $this->Form->control('scientific_contact_designation', array(
              'label' => 'Designation<i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
              'escape' => false
            )); 
            echo $this->Form->control('scientific_contact_email', array(
              'label' => 'Email<i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
              'escape' => false
            )); 
            echo $this->Form->control('scientific_contact_phone', array(
              'label' => 'Phone number <i class="sterix fa fa-asterisk aria-hidden="true"></i>',
              'escape' => false
            )); 
            echo $this->Form->control('scientific_contact_postal', array(
              'label' => 'Postal Address<i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
              'escape' => false
            )); 
            echo $this->Form->control('scientific_contact_affiliation', array(
              'label' => 'Affiliation ',
              'escape' => false
            )); 

            echo $this->Form->control('countries_recruitment', array(
              'label' => 'Countries of Recruitment <i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
              'escape' => false,
              'templates' => 'textarea_form'
            ));

            echo $this->Form->control('abstract_of_study', array(
              'label' =>  '<hr>Purpose and Reason for Trial <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false,
              'templates' => 'textarea_form'
            ));
            // echo $this->Form->control('protocol_no', array(
              // 'label' =>  'Protocol No:<i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
              // , 'escape' => false
            // ));
            echo $this->Form->control('version_no', array(
              'label' =>  'Trial Indentifying Number', 'escape' => false
            ));
            // echo $this->Form->control('title', ['class' => 'datepickers', 'templates' => [
            //   'input' => '<div class="col-sm-6"><input type="{{type}}" name="{{name}}" {{attrs}} /></div>',]]);
            echo $this->Form->control('date_of_protocol', ['type' => 'text', 'class' => 'datepickers', 'templates' => [
              'input' => '<div class="col-sm-6"><input type="{{type}}" name="{{name}}" {{attrs}} /></div>',]]);
            echo $this->Form->control('study_drug', array(
              'label' =>  'Study Product <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'escape' => false
            ));
            

            /*
            echo $this->Form->control('product_type_biologicals', 
                ['type' => 'checkbox', 'label' => 'Biologicals', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"><label>Product Type <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]
               );
            echo "<div class='row'><div class='col-sm-offset-4 col-sm-8'> ";
              echo $this->Form->control('product_type_proteins', 
                ['type' => 'checkbox', 'label' => 'Proteins', 'templates' => 'checkbox_inline_form']);
              echo $this->Form->control('product_type_immunologicals', 
                ['type' => 'checkbox', 'label' => 'Immunologicals', 'templates' => 'checkbox_inline_form']);
              echo $this->Form->control('product_type_vaccines', 
                ['type' => 'checkbox', 'label' => 'Vaccines', 'templates' => 'checkbox_inline_form']);
              echo $this->Form->control('product_type_hormones', 
                ['type' => 'checkbox', 'label' => 'Hormones', 'templates' => 'checkbox_inline_form']);
              echo $this->Form->control('product_type_toxoid', 
                ['type' => 'checkbox', 'label' => 'Toxoid', 'templates' => 'checkbox_inline_form']);
            echo "</div></div>";
            */
            echo $this->Form->control('product_type_chemical', 
                ['type' => 'checkbox', 'label' => 'Chemical', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]
               );
            echo $this->Form->control('product_type_chemical_name', array(
              'label' => ' ', 
              'placeholder' => 'generic name'
            ));

            echo $this->Form->control('product_type_medical_device', 
                ['type' => 'checkbox', 'label' => 'Medical Device', 'escape' => false,
                 'templates' => [
                  'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
                  'inputContainer' => '<div class="form-group">
                      <div class="row">
                        <div class="col-sm-4 control-label"></div>
                            <div class="col-sm-8 {{required}}">
                                <div class="checkbox">{{content}}</div>
                              </div>
                          </div>
                      </div>']]
               );
            echo $this->Form->control('product_type_medical_device_name', array(
              'label' => ' ', 'placeholder' => ''
            ));

            echo $this->element('multi/previous_dates'); 

            echo $this->Form->control('approval_date', array(
              'type' => 'text', 
              'label' => 'Approval Date of Protocol <i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
              'escape'=> false,
              'class' => 'datepickers', 'templates' => [
              'input' => '<div class="col-sm-6"><input type="{{type}}" name="{{name}}" {{attrs}} /></div>',]
            ));
            echo $this->Form->control('protocol_version', array('escape' => false,
              'label' => 'Protocol Version No. <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 'placeholder' => ''
            ));
          ?>