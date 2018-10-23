<?php
  $this->assign('MyApplications', 'active');
  $checked = '<i class="fa fa-check-square-o" aria-hidden="true"></i>';
  $nChecked = '<i class="fa fa-square-o" aria-hidden="true"></i>';
  $numb = 1;
?>

<span id="amendment_cnt" style="display: none;"> <?= count($application['amendments'])?></span>

<div class="row">
  <div class="col-xs-12">
       <?php
           echo $this->fetch('form-actions');
       ?>
      <div id="tabs">
      <?php 
          echo $this->fetch('tabs');
      ?>
      <div id="tabs-1">
          <table class="table table-condensed vertical-table">
            <tr><th><label>PUBLIC TITLE/ACRONYM</label></th>
                <td <?php if($prefix == 'applicant') { ?> id="public-title" 
                    data-type="wysihtml5" data-pk="<?= $application->id ?>" 
                    data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'approvalEdit',  'prefix' => 'applicant', $application->id, '_ext' => 'json']); ?>" 
                    data-name="public_title"
                    data-title="Update public title" <?php } ?>><p><?= $application->public_title ?></p></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['public_title'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->public_title ?></td>
               </tr>
             <?php   } } ?>
            <tr><th><label>Scientific Title</label></th>
              <td <?php if($prefix == 'applicant') { ?> id="scientific-title" 
                    data-type="wysihtml5" data-pk="<?= $application->id ?>" 
                    data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'approvalEdit',  'prefix' => 'applicant', $application->id, '_ext' => 'json']); ?>" 
                    data-name="scientific_title"
                    data-title="Update scientific title" <?php } ?>><span><?= $application->scientific_title ?></span></td></tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['scientific_title'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->scientific_title ?></td>
               </tr>
             <?php   } } ?>
            <tr><td colspan="2"> <label>Contact for Public Queries</label> </td></tr>
            <tr>
              <th>
                <label>Name <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td  <?php if($prefix == 'applicant') { ?> id="public-contact-name" 
                    data-type="text" data-pk="<?= $application->id ?>" 
                    data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'approvalEdit',  'prefix' => 'applicant', $application->id, '_ext' => 'json']); ?>" 
                    data-name="public_contact_name"
                    data-title="Update public name" <?php } ?>><span><?= $application->public_contact_name ?></span></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['public_contact_name'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->public_contact_name ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th>
                <label>Designation <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td <?php if($prefix == 'applicant') { ?> id="public-contact-designation" 
                    data-type="text" data-pk="<?= $application->id ?>" 
                    data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'approvalEdit',  'prefix' => 'applicant', $application->id, '_ext' => 'json']); ?>" 
                    data-name="public_contact_designation"
                    data-title="Update public designation" <?php } ?>><span><?= $application->public_contact_designation ?></span></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['public_contact_designation'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->public_contact_designation ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th>
                <label>Email <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td  <?php if($prefix == 'applicant') { ?> id="public-contact-email" 
                    data-type="text" data-pk="<?= $application->id ?>" 
                    data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'approvalEdit',  'prefix' => 'applicant', $application->id, '_ext' => 'json']); ?>" 
                    data-name="public_contact_email"
                    data-title="Update public email" <?php } ?>><span><?= $application->public_contact_email ?></span></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['public_contact_email'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->public_contact_email ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th>
                <label>Phone number <i class="sterix fa fa-asterisk aria-hidden="true"></i></label>
              </th>
              <td <?php if($prefix == 'applicant') { ?> id="public-contact-phone" 
                    data-type="text" data-pk="<?= $application->id ?>" 
                    data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'approvalEdit',  'prefix' => 'applicant', $application->id, '_ext' => 'json']); ?>" 
                    data-name="public_contact_phone"
                    data-title="Update public phone" <?php } ?>><?= $application->public_contact_phone ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['public_contact_phone'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->public_contact_phone ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th>
                <label>Postal Address<i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td <?php if($prefix == 'applicant') { ?> id="public-contact-postal" 
                    data-type="text" data-pk="<?= $application->id ?>" 
                    data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'approvalEdit',  'prefix' => 'applicant', $application->id, '_ext' => 'json']); ?>" 
                    data-name="public_contact_postal"
                    data-title="Update public postal" <?php } ?>><?= $application->public_contact_postal ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['public_contact_postal'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->public_contact_postal ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th>
                <label>Affiliation</label>
              </th>
              <td <?php if($prefix == 'applicant') { ?> id="public-contact-affiliation" 
                    data-type="text" data-pk="<?= $application->id ?>" 
                    data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'approvalEdit',  'prefix' => 'applicant', $application->id, '_ext' => 'json']); ?>" 
                    data-name="public_contact_affiliation"
                    data-title="Update public title" <?php } ?>><?= $application->public_contact_affiliation ?></td>
            </tr>            
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['public_contact_affiliation'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->public_contact_affiliation ?></td>
               </tr>
             <?php   } } ?>
            <tr><td colspan="2"> <label>Contact for Scientific Queries</label> </td></tr>
            <tr>
              <th>
                <label>Name <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td <?php if($prefix == 'applicant') { ?> id="scientific-contact-name" 
                    data-type="text" data-pk="<?= $application->id ?>" 
                    data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'approvalEdit',  'prefix' => 'applicant', $application->id, '_ext' => 'json']); ?>" 
                    data-name="scientific_contact_name"
                    data-title="Update scientific contact name" <?php } ?>><?= $application->scientific_contact_name ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['scientific_contact_name'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->scientific_contact_name ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th>
                <label>Designation <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td <?php if($prefix == 'applicant') { ?> id="scientific-contact-designation" 
                    data-type="text" data-pk="<?= $application->id ?>" 
                    data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'approvalEdit',  'prefix' => 'applicant', $application->id, '_ext' => 'json']); ?>" 
                    data-name="scientific_contact_designation"
                    data-title="Update scientific designation" <?php } ?>><?= $application->scientific_contact_designation ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['scientific_contact_designation'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->scientific_contact_designation ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th>
                <label>Email <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td <?php if($prefix == 'applicant') { ?> id="scientific-contact-email" 
                    data-type="text" data-pk="<?= $application->id ?>" 
                    data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'approvalEdit',  'prefix' => 'applicant', $application->id, '_ext' => 'json']); ?>" 
                    data-name="scientific_contact_email"
                    data-title="Update scientific contact email" <?php } ?>><?= $application->scientific_contact_email ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['scientific_contact_email'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->scientific_contact_email ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th>
                <label>Phone number <i class="sterix fa fa-asterisk aria-hidden="true"></i></label>
              </th>
              <td <?php if($prefix == 'applicant') { ?> id="scientific-contact-phone" 
                    data-type="text" data-pk="<?= $application->id ?>" 
                    data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'approvalEdit',  'prefix' => 'applicant', $application->id, '_ext' => 'json']); ?>" 
                    data-name="scientific_contact_phone"
                    data-title="Update scientific contact phone" <?php } ?>><?= $application->scientific_contact_phone ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['scientific_contact_phone'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->scientific_contact_phone ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th>
                <label>Postal Address<i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td <?php if($prefix == 'applicant') { ?> id="scientific-contact-postal" 
                    data-type="text" data-pk="<?= $application->id ?>" 
                    data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'approvalEdit',  'prefix' => 'applicant', $application->id, '_ext' => 'json']); ?>" 
                    data-name="scientific_contact_postal"
                    data-title="Update scientific_contact_postal" <?php } ?>><?= $application->scientific_contact_postal ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['scientific_contact_postal'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->scientific_contact_postal ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th>
                <label>Affiliation</label>
              </th>
              <td <?php if($prefix == 'applicant') { ?> id="scientific-contact-affiliation" 
                    data-type="text" data-pk="<?= $application->id ?>" 
                    data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'approvalEdit',  'prefix' => 'applicant', $application->id, '_ext' => 'json']); ?>" 
                    data-name="scientific_contact_affiliation"
                    data-title="Update scientific_contact_affiliation" <?php } ?>><?= $application->scientific_contact_affiliation ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['scientific_contact_affiliation'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->scientific_contact_affiliation ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <td colspan="2"><label>Countries of Recruitment <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></td>
            </tr>
            <tr>              
              <td colspan="2"  <?php if($prefix == 'applicant') { ?> id="countries-recruitment" 
                    data-type="wysihtml5" data-pk="<?= $application->id ?>" 
                    data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'approvalEdit',  'prefix' => 'applicant', $application->id, '_ext' => 'json']); ?>" 
                    data-name="countries_recruitment"
                    data-title="Update countries of recruitment" <?php } ?>>
                <?= $application->countries_recruitment ?>
              </td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['countries_recruitment'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->countries_recruitment ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <td colspan="2"><label>Purpose and Reason for Trial <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></td>
            </tr>
            <tr>              
              <td colspan="2">
                <?= $application->abstract_of_study ?>
              </td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['abstract_of_study'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->abstract_of_study ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th>
                <label>Trial Indentifying Number</label>
              </th>
              <td><?= $application->version_no ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['version_no'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->version_no ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th>
                <label>Date Of Protocol</label>
              </th>
              <td><?= $application->date_of_protocol ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['date_of_protocol'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->date_of_protocol ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th>
                <label>Study Product <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td><?= $application->study_drug ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['study_drug'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->study_drug ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th>           </th>
              <td><label><?= ($application->product_type_chemical) ? $checked : $nChecked; ?> Chemical</label></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['product_type_chemical'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->product_type_chemical ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th>           </th>
              <td><?= $application->product_type_chemical_name ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['product_type_chemical_name'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->product_type_chemical_name ?></td>
               </tr>
             <?php   } } ?>             
            <tr>
              <th>           </th>
              <td><label><?= ($application->product_type_biologicals) ? $checked : $nChecked; ?> Biological</label></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['product_type_biologicals'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->product_type_biologicals ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th>           </th>
              <td><?= $application->product_type_biologicals_name ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['product_type_biologicals_name'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->product_type_biologicals_name ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th>           </th>
              <td><label><?= ($application->product_type_medical_device) ? $checked : $nChecked; ?> Medical Device</label></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['product_type_medical_device'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->product_type_medical_device ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th>           </th>
              <td><?= $application->product_type_medical_device_name ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['product_type_medical_device_name'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->product_type_medical_device_name ?></td>
               </tr>
             <?php   } } ?>
            
            <tr>
              <th>
                <label>Protocol Version No.  <span class="sterix">*</span></label></label>
              </th>
              <td><?= $application->protocol_version ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['protocol_version'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->protocol_version ?></td>
               </tr>
             <?php   } } ?>
          </table>

          
            <?= $this->fetch('application_abstract') ?>
      </div>

      <div id="tabs-2">
          <table class="table table-condensed vertical-table">            
            <tr>
              <td colspan="2"><label>PRINCIPAL INVESTIGATOR</label></td>
            </tr>
            <tr>
              <th>
                <label>Full names <span class="sterix">*</span></label>
              </th>
              <td><?= $application->investigator_contacts[0]['given_name'] ?></td>
            </tr>
            <tr>
              <th>
                <label>Date Of Birth</label>
              </th>
              <td><?= $application->investigator_contacts[0]['date_of_birth'] ?></td>
            </tr>
            <tr>
              <th>
                <label>Qualification <span class="sterix">*</span></label>
              </th>
              <td><?= $application->investigator_contacts[0]['qualification'] ?></td>
            </tr>
            <tr>
              <th>
                <label>Professional address <span class="sterix">*</span></label>
              </th>
              <td><?= $application->investigator_contacts[0]['professional_address'] ?></td>
            </tr>
            <tr>
              <th>
                <label>Telephone number <span class="sterix">*</span></label>
              </th>
              <td><?= $application->investigator_contacts[0]['telephone'] ?></td>
            </tr>
            <tr>
              <th>
                <label>email address <span class="sterix">*</span></label>
              </th>
              <td><?= $application->investigator_contacts[0]['email'] ?></td>
            </tr>
          </table>

          <hr>
          <?php
           if (!empty($application['investigator_contacts'])) {
            for ($i = 1; $i <= count($application['investigator_contacts'])-1; $i++) {
          ?>
          <table class="table table-condensed vertical-table">            
            <tr>
              <td colspan="2"><label>CO-ORDINATING INVESTIGATOR</label></td>
            </tr>
            <tr>
              <th>
                <label>Full names <span class="sterix">*</span></label>
              </th>
              <td><?= $application->investigator_contacts[$i]['given_name'] ?></td>
            </tr>
            <tr>
              <th>
                <label>Date Of Birth</label>
              </th>
              <td><?= $application->investigator_contacts[$i]['date_of_birth'] ?></td>
            </tr>
            <tr>
              <th>
                <label>Qualification <span class="sterix">*</span></label>
              </th>
              <td><?= $application->investigator_contacts[$i]['qualification'] ?></td>
            </tr>
            <tr>
              <th>
                <label>Professional address <span class="sterix">*</span></label>
              </th>
              <td><?= $application->investigator_contacts[$i]['professional_address'] ?></td>
            </tr>
            <tr>
              <th>
                <label>Telephone number <span class="sterix">*</span></label>
              </th>
              <td><?= $application->investigator_contacts[$i]['telephone'] ?></td>
            </tr>
            <tr>
              <th>
                <label>email address <span class="sterix">*</span></label>
              </th>
              <td><?= $application->investigator_contacts[$i]['email'] ?></td>
            </tr>
          </table>
          <?php
            } }
          ?>

          <!-- repeating amendments -->
          <hr>


          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['investigator_contacts'])){
                for ($i = 0; $i <= count($amendment['investigator_contacts'])-1; $i++) {
          ?>
          <table class="table table-condensed vertical-table">            
            <tr>
              <td colspan="2"><label>INVESTIGATOR </label></td>
            </tr>
            <tr class="amender">
              <th>
                <?php echo $key+1; ?> &nbsp; <label>Full names <span class="sterix">*</span></label>
              </th>
              <td><?= $amendment->investigator_contacts[$i]['given_name'] ?></td>
            </tr>
            <tr class="amender">
              <th>
                <?php echo $key+1; ?> &nbsp; <label>Date Of Birth</label>
              </th>
              <td><?= $amendment->investigator_contacts[$i]['date_of_birth'] ?></td>
            </tr>
            <tr class="amender">
              <th>
                <?php echo $key+1; ?> &nbsp; <label>Qualification <span class="sterix">*</span></label>
              </th>
              <td><?= $amendment->investigator_contacts[$i]['qualification'] ?></td>
            </tr>
            <tr class="amender">
              <th>
                <?php echo $key+1; ?> &nbsp; <label>Professional address <span class="sterix">*</span></label>
              </th>
              <td><?= $amendment->investigator_contacts[$i]['professional_address'] ?></td>
            </tr>
            <tr class="amender">
              <th>
                <?php echo $key+1; ?> &nbsp; <label>Telephone number <span class="sterix">*</span></label>
              </th>
              <td><?= $amendment->investigator_contacts[$i]['telephone'] ?></td>
            </tr>
            <tr class="amender">
              <th>
                <?php echo $key+1; ?> &nbsp; <label>email address <span class="sterix">*</span></label>
              </th>
              <td><?= $amendment->investigator_contacts[$i]['email'] ?></td>
            </tr>
          </table>
          <?php
            } } }
          ?>
          <!-- end -->

          <table class="table table-condensed vertical-table">
            <tr><td colspan="2"> <label>Business</label> </td></tr>
            <tr>
              <th>
                <label>Name of Company <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td><?= $application->business_name ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['business_name'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->business_name ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th>
                <label>Registered Office <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td><?= $application->business_office ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['business_office'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->business_office ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th>
                <label>Physical address <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td><?= $application->business_physical_address ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['business_physical_address'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->business_physical_address ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th>
                <label>Telephone number <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td><?= $application->business_telephone ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['business_telephone'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->business_telephone ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th>
                <label>Position of applicant <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td><?= $application->business_position ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['business_position'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->business_position ?></td>
               </tr>
             <?php   } } ?>
          </table>

            <?= $this->fetch('application_investigator') ?>
      </div>

      <div id="tabs-3">
          <table class="table table-condensed vertical-table">  
            <tr>
              <td colspan="2">
              <br/>
              <h4>3.0 Sponsor Details</h4>
              </td>
            </tr>
            <tr>
              <th><label>Source of Funds</label></th>
              <td <?php if($prefix == 'applicant') { ?> id="money-source" 
                    data-type="text" data-pk="<?= $application->id ?>" 
                    data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'approvalEdit',  'prefix' => 'applicant', $application->id, '_ext' => 'json']); ?>" 
                    data-name="money_source"
                    data-title="Update money source" <?php } ?>><?= $application->money_source ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['money_source'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->money_source ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <td colspan="2">
              <br/>
              <h5>3.1 Primary Sponsor Details</h5>
              </td>
            </tr>
            <tr>
              <th><label>Sponsors <span class="sterix">*</span></label></th>
              <td><?= $application->sponsor_name ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['sponsor_name'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->sponsor_name ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th><label>Contact Person</label></th>
              <td><?= $application->sponsor_contact_person ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['sponsor_contact_person'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->sponsor_contact_person ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th><label>Address <span class="sterix">*</span></label></th>
              <td><?= $application->sponsor_address ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['sponsor_address'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->sponsor_address ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th><label>Telephone Number <span class="sterix">*</span></label></th>
              <td><?= $application->sponsor_telephone_number ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['sponsor_telephone_number'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->sponsor_telephone_number ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th><label>Fax Number</label></th>
              <td><?= $application->sponsor_fax_number ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['sponsor_fax_number'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->sponsor_fax_number ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th><label>Mobile phone number <span class="sterix">*</span></label></th>
              <td><?= $application->sponsor_cell_number ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['sponsor_cell_number'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->sponsor_cell_number ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th><label>Email Address <span class="sterix">*</span></label></th>
              <td><?= $application->sponsor_email_address ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['sponsor_email_address'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->sponsor_email_address ?></td>
               </tr>
             <?php   } } ?>


            <tr>
              <td colspan="2">
              <br/>
              <h5>3.2 Secondary Sponsor Details </h5>
              </td>
            </tr>

            <?php
            if (!empty($application['sponsors'])) {
             for ($i = 0; $i <= count($application['sponsors'])-1; $i++) {
            ?>
            <tr>
              <th><label>Sponsors </label></th>
              <td><?= $application->sponsors[$i]['sponsor'] ?></td>
            </tr>
            <tr>
              <th><label>Contact Person</label></th>
              <td><?= $application->sponsors[$i]['contact_person'] ?></td>
            </tr>
            <tr>
              <th><label>Address </label></th>
              <td><?= $application->sponsors[$i]['address'] ?></td>
            </tr>
            <tr>
              <th><label>Telephone Number </label></th>
              <td><?= $application->sponsors[$i]['telephone_number'] ?></td>
            </tr>
            <tr>
              <th><label>Fax Number</label></th>
              <td><?= $application->sponsors[$i]['fax_number'] ?></td>
            </tr>
            <tr>
              <th><label>Mobile phone number </label></th>
              <td><?= $application->sponsors[$i]['cell_number'] ?></td>
            </tr>
            <tr>
              <th><label>Email Address </label></th>
              <td><?= $application->sponsors[$i]['email_address'] ?></td>
            </tr>
            <tr><td colspan="2"></td></tr>
            <?php 
              }
            }
           ?>

            <?php

            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['sponsors'])){
                for ($i = 0; $i <= count($amendment['sponsors'])-1; $i++) {
            ?>
            <tr>
              <th><?php echo $key+1; ?> &nbsp; <label>sponsors </label></th>
              <td><?= $amendment->sponsors[$i]['sponsor'] ?></td>
            </tr>
            <tr>
              <th><?php echo $key+1; ?> &nbsp; <label>Contact Person</label></th>
              <td><?= $amendment->sponsors[$i]['contact_person'] ?></td>
            </tr>
            <tr>
              <th><?php echo $key+1; ?> &nbsp; <label>Address </label></th>
              <td><?= $amendment->sponsors[$i]['address'] ?></td>
            </tr>
            <tr>
              <th><?php echo $key+1; ?> &nbsp; <label>Telephone Number </label></th>
              <td><?= $amendment->sponsors[$i]['telephone_number'] ?></td>
            </tr>
            <tr>
              <th><?php echo $key+1; ?> &nbsp; <label>Fax Number</label></th>
              <td><?= $amendment->sponsors[$i]['fax_number'] ?></td>
            </tr>
            <tr>
              <th><?php echo $key+1; ?> &nbsp; <label>Mobile phone number </label></th>
              <td><?= $amendment->sponsors[$i]['cell_number'] ?></td>
            </tr>
            <tr>
              <th><?php echo $key+1; ?> &nbsp; <label>Email Address </label></th>
              <td><?= $amendment->sponsors[$i]['email_address'] ?></td>
            </tr>
            <tr><td colspan="2"></td></tr>
            <?php 
              }
            } }
           ?>
          </table>

            <?= $this->fetch('application_sponsor') ?>
      </div>

      <div id="tabs-4">
        <table class="table table-condensed vertical-table">  
          <tr>
            <td colspan="2">
            <br/>
            <h5>4.0 Participants </h5>
            </td>
          </tr>
          <tr>
              <td colspan="2"><label>Participants Description <i class="sterix fa fa-asterisk" aria-hidden="true"> </i> <small class="muted">(e.g age group of persons/animals, type or class of persons/animals, sex etc)</small></label></td>
          </tr>
          <tr>              
            <td colspan="2">
              <?= $application->participants_description ?>
            </td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['participants_description'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->participants_description ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Expected Number of participants in Zimbabwe <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></th>
            <td><?= $application->number_participants ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['number_participants'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->number_participants ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Total enrolment in each site: (if competitive enrolment, state minimum and maximum number per site.)  <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></th>
            <td><?= $application->total_enrolment_per_site ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['total_enrolment_per_site'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->total_enrolment_per_site ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Total participants worldwide  <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></th>
            <td><?= $application->total_participants_worldwide ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['total_participants_worldwide'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->total_participants_worldwide ?></td>
               </tr>
             <?php   } } ?>
          <tr>
              <td colspan="2"><label>Justification <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></td>
          </tr>
          <tr>              
            <td colspan="2">
              <?= $application->participants_justification ?>
            </td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['participants_justification'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->participants_justification ?></td>
               </tr>
             <?php   } } ?>
          <tr>
              <td colspan="2"><h5>4.1 AGE SPAN</h5></td>
          </tr>
          <tr>
            <th><label>Less than 18 years?</label></th>
            <td><?= $application->population_less_than_18_years ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['population_less_than_18_years'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->population_less_than_18_years ?></td>
               </tr>
             <?php   } } ?>
          <tr>
              <td colspan="2"><p class="topper"><em class="text-success">If Yes, Specify</em></p></td>
          </tr>
          <tr>
            <th><label>In Utero</label></th>
            <td><?= $application->population_utero ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['population_utero'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->population_utero ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Preterm Newborn Infants (up to gestational age < 37 weeks?</label></th>
            <td><?= $application->population_preterm_newborn ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['population_preterm_newborn'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->population_preterm_newborn ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Newborn (0-28 days)</label></th>
            <td><?= $application->population_newborn ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['population_newborn'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->population_newborn ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Infant and toddler (29 days - 23 months)</label></th>
            <td><?= $application->population_infant_and_toddler ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['population_infant_and_toddler'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->population_infant_and_toddler ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Children (2-12 years)</label></th>
            <td><?= $application->population_children ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['population_children'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->population_children ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Adolescent (13-17 years)</label></th>
            <td><?= $application->population_adolescent ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['population_adolescent'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->population_adolescent ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>18 Years and over</label></th>
            <td><?= $application->population_above_18 ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['population_above_18'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->population_above_18 ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Adult (18-65 years)</label></th>
            <td><?= $application->population_adult ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['population_adult'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->population_adult ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Elderly (> 65 years)</label></th>
            <td><?= $application->population_elderly ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['population_elderly'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->population_elderly ?></td>
               </tr>
             <?php   } } ?>
          <tr>
              <td colspan="2"><h5>4.2 GROUP OF TRIAL PARTICIPANTS</h5></td>
          </tr>
          <tr>
            <th><label>Healty volunteers</label></th>
            <td><?= $application->subjects_healthy ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['subjects_healthy'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->subjects_healthy ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Specific vulnerable populations</label></th>
            <td><?= $application->subjects_vulnerable_populations ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['subjects_vulnerable_populations'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->subjects_vulnerable_populations ?></td>
               </tr>
             <?php   } } ?>
          <tr><td colspan="2">
            <p class="topper"><em class="text-success">Specific vulnerable populations</em></p>
             </td>
          </tr>
          <tr>
            <th><label>Patients</label></th>
            <td><?= $application->subjects_patients ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['subjects_patients'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->subjects_patients ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Women of child bearing potential</label></th>
            <td><?= $application->subjects_women_child_bearing ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['subjects_women_child_bearing'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->subjects_women_child_bearing ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Women of child bearing potential using contraception</label></th>
            <td><?= $application->subjects_women_using_contraception ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['subjects_women_using_contraception'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->subjects_women_using_contraception ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Pregnant women</label></th>
            <td><?= $application->subjects_pregnant_women ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['subjects_pregnant_women'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->subjects_pregnant_women ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Nursing Women</label></th>
            <td><?= $application->subjects_nursing_women ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['subjects_nursing_women'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->subjects_nursing_women ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Emergency situation</label></th>
            <td><?= $application->subjects_emergency_situation ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['subjects_emergency_situation'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->subjects_emergency_situation ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Participants incapable of giving consent personally?</label></th>
            <td><?= $application->subjects_incapable_consent ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['subjects_incapable_consent'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->subjects_incapable_consent ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>If yes, specify</label></th>
            <td><?= $application->subjects_specify ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['subjects_specify'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->subjects_specify ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Others?</label></th>
            <td><?= $application->subjects_others ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['subjects_others'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->subjects_others ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>If yes, specify</label></th>
            <td><?= $application->subjects_others_specify ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['subjects_others_specify'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->subjects_others_specify ?></td>
               </tr>
             <?php   } } ?>
          <tr>
              <td colspan="2"><h5>4.3 GENDER <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5></td>
          </tr>
          <tr>
            <th>           </th>
            <td><label><?= ($application->gender_female) ? $checked : $nChecked; ?> Female</label></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['gender_female'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= ($amendment->gender_female) ? $checked : $nChecked; ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th>           </th>
            <td><label><?= ($application->gender_male) ? $checked : $nChecked; ?> Male</label></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['gender_male'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= ($amendment->gender_male) ? $checked : $nChecked; ?></td>
               </tr>
             <?php   } } ?>
        </table>
        
        <table class="table table-bordered table-condensed">
          <thead>
            <tr>
              <th> # </th>
              <th> Name </th>
              <th> Occupation</th>
              <th> Address</th>
              <th> Date of Birth</th>
              <th> Place of Birth</th>
              <th> Consent Letter </th>
            </tr>
          </thead>
          <tbody>                  
          <?php 
          //Dynamic fields
          if (!empty($application['participants'])) {
            for ($i = 0; $i <= count($application['participants'])-1; $i++) { 
          ?>

            <tr>
              <td><?= $i+1; ?></td>
              <td><?= $application->participants[$i]['name']; ?> </td>   
              <td><?= $application->participants[$i]['occupation']; ?> </td>   
              <td><?= $application->participants[$i]['address']; ?> </td>   
              <td><?= $application->participants[$i]['date_of_birth']; ?> </td>   
              <td><?= $application->participants[$i]['place_of_birth']; ?> </td>   
              <td><p class="text-info text-left"><?php
                       echo $this->Html->link($application['participants'][$i]->file, substr($application['participants'][$i]->dir, 8) . '/' . $application['participants'][$i]->file, ['fullBase' => true]);
                  ?></p>
              </td>
            </tr>
            <?php } } ; ?>

          </tbody>
        </table>

        <?php
          foreach($application['amendments'] as $key => $amendment) {
            if($amendment['submitted'] == 2 && !empty($amendment['participants'])) {
        ?>
        <table class="table table-bordered table-condensed">
          <thead>
            <tr class="amender">
              <th colspan="7"><?php echo $key+1; ?></th>
            </tr>
            <tr>
              <th> # </th>
              <th> Name </th>
              <th> Occupation</th>
              <th> Address</th>
              <th> Date of Birth</th>
              <th> Place of Birth</th>
              <th> Consent Letter </th>
            </tr>
          </thead>
          <tbody>                  
          <?php 
          //Dynamic fields

          for ($i = 0; $i <= count($amendment['participants'])-1; $i++) {
            if (!empty($amendment['participants'])) {
              for ($i = 0; $i <= count($amendment['participants'])-1; $i++) { 
          ?>

            <tr>
              <td><?= $i+1; ?></td>
              <td><?= $amendment->participants[$i]['name']; ?> </td>   
              <td><?= $amendment->participants[$i]['occupation']; ?> </td>   
              <td><?= $amendment->participants[$i]['address']; ?> </td>   
              <td><?= $amendment->participants[$i]['date_of_birth']; ?> </td>   
              <td><?= $amendment->participants[$i]['place_of_birth']; ?> </td>   
              <td><p class="text-info text-left"><?php
                       echo $this->Html->link($amendment['participants'][$i]->file, substr($amendment['participants'][$i]->dir, 8) . '/' . $amendment['participants'][$i]->file, ['fullBase' => true]);
                  ?></p>
              </td>
            </tr>
            <?php } } } ; ?>
          </tbody>
        </table>        
          <?php } } ?>

            <?= $this->fetch('application_participants') ?>
       </div>


      <div id="tabs-5">
        <table class="table table-condensed vertical-table">  
          <tr>
            <td colspan="2">
              <h5>TICK AND PROVIDE NECESSARY DETAILS AS APPROPRIATE</h5>
              <hr>
              <h5>5.0 Number of Sites</h5>
            </td>
          </tr>  
          <tr>
            <th><label>Single site in Zimbabwe</label></th>
            <td><?= $application->single_site_member_state ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['single_site_member_state'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->single_site_member_state ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label><b>If yes</b>, name of site</label></th>
            <td><?= $application->location_of_area ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['location_of_area'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->location_of_area ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Physical address</label></th>
            <td><?= $application->single_site_physical_address ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['single_site_physical_address'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->single_site_physical_address ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Contact person</label></th>
            <td><?= $application->single_site_contact_person ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['single_site_contact_person'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->single_site_contact_person ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Telephone</label></th>
            <td><?= $application->single_site_telephone ?></td>
          </tr> 
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['single_site_telephone'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->single_site_telephone ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Multiple sites in Zimbabwe</label></th>
            <td><?= $application->multiple_sites_member_state ?></td>
          </tr> 
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['multiple_sites_member_state'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->multiple_sites_member_state ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Number of sites anticipated in Zimbabwe</label></th>
            <td><?= $application->number_of_sites ?></td>
          </tr> 
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['number_of_sites'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->number_of_sites ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <td colspan="2">
              <h5 class="controls">Details of Site(s) (<small>Repeat as necessary
              </small>)</h5>
            </td>
          </tr> 
          <tr>
            <th><label>Name of site</label></th>
            <td><?= $application->single_site_name ?></td>
          </tr> 
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['single_site_name'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->single_site_name ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Physical address</label></th>
            <td><?= $application->single_site_physical_address ?></td>
          </tr> 
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['single_site_physical_address'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->single_site_physical_address ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Contact details</label></th>
            <td><?= $application->single_site_contact_details ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['single_site_contact_details'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->single_site_contact_details ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Contact person</label></th>
            <td><?= $application->single_site_contact_person ?></td>
          </tr> 
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['single_site_contact_person'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->single_site_contact_person ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Province</label></th>
            <td><?= ($application->single_site_province_id) ? $provinces->toArray()[$application->single_site_province_id] : '' ?></td>
          </tr> 
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['single_site_province_id'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= ($amendment->single_site_province_id) ? $provinces->toArray()[$amendment->single_site_province_id] : '' ?></td>
               </tr>
             <?php   } } ?>
          <tr><td colspan="2"></td></tr>

          <?php
            if (!empty($application['site_details'])) {
             for ($i = 0; $i <= count($application['site_details'])-1; $i++) {
            ?>
            <tr>
              <th><label>Name of site <span class="sterix">*</span></label></th>
              <td><?= $application->site_details[$i]['site_name'] ?></td>
            </tr>
            <tr>
              <th><label>Physical address</label></th>
              <td><?= $application->site_details[$i]['physical_address'] ?></td>
            </tr>
            <tr>
              <th><label>Contact details <span class="sterix">*</span></label></th>
              <td><?= $application->site_details[$i]['contact_details'] ?></td>
            </tr>
            <tr>
              <th><label>Contact person <span class="sterix">*</span></label></th>
              <td><?= $application->site_details[$i]['contact_person'] ?></td>
            </tr>
            <tr>
              <th><label>Province</label></th>
              <td><?= ($application->site_details[$i]['province_id']) ? $provinces->toArray()[$application->site_details[$i]['province_id']] : '' ?></td>
            </tr>
            <tr><td colspan="2"></td></tr>
            <?php 
              }
            }
           ?>


          <?php

            foreach($application['amendments'] as $key => $amendment) {
              //echo "im here?? :(";
              //pr($amendment->site_details);
              if($amendment['submitted'] == 2 && !empty($amendment['site_details'])){
                for ($i = 0; $i <= count($amendment['site_details'])-1; $i++) {
            ?>
            <tr class="amender">
              <th><?php echo $key+1; ?> <label>Name of site <span class="sterix">*</span></label></th>
              <td><?= $amendment->site_details[$i]['site_name'] ?></td>
            </tr>
            <tr class="amender">
              <th><?php echo $key+1; ?> <label>Physical address</label></th>
              <td><?= $amendment->site_details[$i]['physical_address'] ?></td>
            </tr>
            <tr class="amender">
              <th><?php echo $key+1; ?> <label>Contact details <span class="sterix">*</span></label></th>
              <td><?= $amendment->site_details[$i]['contact_details'] ?></td>
            </tr>
            <tr class="amender">
              <th><?php echo $key+1; ?> <label>Contact person <span class="sterix">*</span></label></th>
              <td><?= $amendment->site_details[$i]['contact_person'] ?></td>
            </tr>
            <tr class="amender">
              <th><?php echo $key+1; ?> <label>Province</label></th>
              <td><?= ($amendment->site_details[$i]['province_id']) ? $provinces->toArray()[$amendment->site_details[$i]['province_id']] : '' ?></td>
            </tr>
            <tr><td colspan="2"></td></tr>
            <?php 
              }
            } }
           ?>

            <tr>
              <th><label>Multiple Countries</label></th>
              <td><?= $application->multiple_countries ?></td>
            </tr> 
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['multiple_countries'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->multiple_countries ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th><label>Number of countries anticipated in the trial</label></th>
              <td><?= $application->multiple_member_states ?></td>
            </tr> 
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['multiple_member_states'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->multiple_member_states ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th><label>If yes above, list the countries</label></th>
              <td><?= $application->multi_country_list ?></td>
            </tr> 
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['multi_country_list'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->multi_country_list ?></td>
               </tr>
             <?php   } } ?>
        </table>

            <?= $this->fetch('application_sites') ?>
      </div>


      <div id="tabs-6">
        <table class="table table-condensed vertical-table">  
          <tr>
            <td colspan="2">
              <h5>6.1 Interventions</h5>
            </td>
          </tr>  
          <tr>
            <th><label>Medicine Name  <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></th>
            <td <?php if($prefix == 'applicant') { ?> id="drug-name" 
                    data-type="text" data-pk="<?= $application->id ?>" 
                    data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'approvalEdit',  'prefix' => 'applicant', $application->id, '_ext' => 'json']); ?>" 
                    data-name="drug_name"
                    data-title="Update medicine name" <?php } ?>><?= $application->drug_name ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['drug_name'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->drug_name ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Quantity of medicine required  <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></th>
            <td <?php if($prefix == 'applicant') { ?> id="quantity-excemption" 
                    data-type="wysihtml5" data-pk="<?= $application->id ?>" 
                    data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'approvalEdit',  'prefix' => 'applicant', $application->id, '_ext' => 'json']); ?>" 
                    data-name="quantity_excemption"
                    data-title="Update quantity of medicine" <?php } ?>><?= $application->quantity_excemption ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['quantity_excemption'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->quantity_excemption ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <td colspan="2">
              <h5 class="controls">Other Medicines (<small>Repeat as necessary
              </small>)</h5>
            </td>
          </tr> 

          <?php
            if (!empty($application['medicines'])) {
             for ($i = 0; $i <= count($application['medicines'])-1; $i++) {
            ?>
            <tr>
              <th><label>Medicine Name <span class="sterix">*</span></label></th>
              <td><?= $application->medicines[$i]['medicine_name'] ?></td>
            </tr>
            <tr>
              <th><label>Quantity of medicine required</label></th>
              <td><?= $application->medicines[$i]['quantity_required'] ?></td>
            </tr>
            <tr><td colspan="2"></td></tr>
            <?php 
              }
            }
           ?>
            
            <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['medicines'])){
                for ($i = 0; $i <= count($amendment['medicines'])-1; $i++) {
            ?>
            <tr class="amender">
              <th><?php echo $key+1; ?> <label>Medicine Name <span class="sterix">*</span></label></th>
              <td><?= $amendment->medicines[$i]['medicine_name'] ?></td>
            </tr>
            <tr class="amender">
              <th><?php echo $key+1; ?> <label>Quantity of medicine required</label></th>
              <td><?= $amendment->medicines[$i]['quantity_required'] ?></td>
            </tr>
            <tr><td colspan="2"></td></tr>
            <?php 
              } } }
           ?>

           <tr>
             <td colspan="2"><label>State the chemical composition, graphic and empirical formulae, animal pharmacology, toxicity and teratology as well as any clinical or field trials in humans or animals or any other relevant information or supply reports if available <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></td>
           </tr>
           <tr>
             <td colspan="2">
               <?= $application['drug_details'] ?>
             </td>
           </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['drug_details'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->drug_details ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th><label>Adverse/ possible reactions to the medicine</label></th>
              <td><?= $application->medicine_reaction ?></td>
            </tr> 
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['medicine_reaction'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->medicine_reaction ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th><label>Therapeutic effects of medicine</label></th>
              <td><?= $application->medicine_therapeutic_effects ?></td>
            </tr> 
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['medicine_therapeutic_effects'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->medicine_therapeutic_effects ?></td>
               </tr>
             <?php   } } ?>

           <tr>
             <td colspan="2"><label>6.2</label></td>
           </tr>
            <tr>
              <th><label>a) Has the medicine been registered in the country of origin?</label></th>
              <td><?= $application->medicine_registered ?></td>
            </tr> 
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['medicine_registered'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->medicine_registered ?></td>
               </tr>
             <?php   } } ?>
           <tr>
             <td colspan="2"><label>If YES attach a valid certificate of registration in respect of such medicine issued by the appropriate authority established for the registration of medicine in the country of origin shall accompany this application</label></td>
           </tr>
           <tr>
             <td colspan="2">
               <?php
               if (!empty($application['registrations'])) {
                    for ($i = 0; $i <= count($application['registrations'])-1; $i++) { 
                      echo $this->Html->link($application['registrations'][$i]->file, substr($application['registrations'][$i]->dir, 8) . '/' . $application['registrations'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
           </tr>

           <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['registrations'])){
                for ($i = 0; $i <= count($amendment['registrations'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['registrations'][$i]->file, substr($amendment['registrations'][$i]->dir, 8) . '/' . $amendment['registrations'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>

           <tr>
             <td colspan="2"><label>State details/reason</label></td>
           </tr>
           <tr>
             <td colspan="2">
               <?= $application->medicine_registered_details ?>
             </td>
           </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['medicine_registered_details'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->medicine_registered_details ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th><label>b) Have clinical trials been conducted in the country of origin?</label></th>
              <td><?= $application->trials_origin_country ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['trials_origin_country'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->trials_origin_country ?></td>
               </tr>
             <?php   } } ?>
           <tr>
             <td colspan="2"><label>State details/reason</label></td>
           </tr>
           <tr>
             <td colspan="2">
               <?= $application->trial_origin_details ?>
             </td>
           </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['trial_origin_details'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->trial_origin_details ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th><label>c) Has application for registration been made in any other country?</label></th>
              <td><?= $application->application_other_country ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['application_other_country'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->application_other_country ?></td>
               </tr>
             <?php   } } ?>
           <tr>
             <td colspan="2"><label>If Yes,State details/reason including the date on which the application was lodged</label></td>
           </tr>
           <tr>
             <td colspan="2">
               <?= $application->application_other_country_details ?>
             </td>
           </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['application_other_country_details'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->application_other_country_details ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th><label>d) Has the medicine been registered in any other country?</label></th>
              <td><?= $application->registered_other_country ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['registered_other_country'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->registered_other_country ?></td>
               </tr>
             <?php   } } ?>
           <tr>
             <td colspan="2"><label>If Yes, State details/reason</label></td>
           </tr>
           <tr>
             <td colspan="2">
               <?= $application->registered_other_country_details ?>
             </td>
           </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['registered_other_country_details'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->registered_other_country_details ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th><label>e) Has the registration of the medicine been rejected/deferred /cancelled in any country?</label></th>
              <td><?= $application->rejected_other_country ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['rejected_other_country'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->rejected_other_country ?></td>
               </tr>
             <?php   } } ?>
           <tr>
             <td colspan="2"><label>If Yes,State details/reason</label></td>
           </tr>
           <tr>
             <td colspan="2">
               <?= $application->rejected_other_country_details ?>
             </td>
           </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['rejected_other_country_details'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->rejected_other_country_details ?></td>
               </tr>
             <?php   } } ?>
           <tr>
             <td colspan="2"><label>Administration route, dosage, dosage interval and period for the medicine being tested and the medicine being used as a control</label></td>
           </tr>
           <tr>
             <td colspan="2">
               <?= $application->administration_route ?>
             </td>
           </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['administration_route'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->administration_route ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th><label>f) What is the status of medicine in Zimbabwe?</label></th>
              <td><?= $application->status_medicine ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['status_medicine'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->status_medicine ?></td>
               </tr>
             <?php   } } ?>
           <tr>
             <td colspan="2"><label>State Antidote</label></td>
           </tr>
           <tr>
             <td colspan="2">
               <?= $application->state_antidote ?>
             </td>
           </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['state_antidote'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->state_antidote ?></td>
               </tr>
             <?php   } } ?>
           <tr>
             <td colspan="2"><label>State the quantity of the medicine for which exemption is required if the medicine is not registered</label></td>
           </tr>
           <tr>
             <td colspan="2">
               <?= $application->exemption_required ?>
             </td>
           </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['exemption_required'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->exemption_required ?></td>
               </tr>
             <?php   } } ?>
           <tr>
             <td colspan="2"><label>6.3</label></td>
           </tr>
            <tr>
              <th><label>Will medicine be given concomitantly?</label></th>
              <td><?= $application->given_concomitantly ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['given_concomitantly'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->given_concomitantly ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th><label>State whether the person already on another medicine will be given the experimential medicine at the same time or will be taken off the medicine</label></th>
              <td><?= $application->concurrent_medicine ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['concurrent_medicine'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->concurrent_medicine ?></td>
               </tr>
             <?php   } } ?>
           <tr>
             <td colspan="2"><label>State measures to be implemented to ensure the safe handling of medicines and promote and control compliances with the prescribed instructions<i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></td>
           </tr>
           <tr>
             <td colspan="2">
               <?= $application->safety ?>
             </td>
           </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['safety'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->safety ?></td>
               </tr>
             <?php   } } ?>
        </table>

            <?= $this->fetch('application_interventions') ?>
      </div>

      <div id="tabs-7">
        <table class="table table-condensed vertical-table">  
           <tr>
             <td colspan="2"><label>7.0 PRINCIPAL INCLUSION CRITERIA <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></td>
           </tr>
           <tr>
             <td colspan="2" <?php if($prefix == 'applicant') { ?> id="principal-inclusion-criteria" 
                    data-type="wysihtml5" data-pk="<?= $application->id ?>" 
                    data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'approvalEdit',  'prefix' => 'applicant', $application->id, '_ext' => 'json']); ?>" 
                    data-name="principal_inclusion_criteria"
                    data-title="Update principal_inclusion_criteria" <?php } ?>>
               <?= $application->principal_inclusion_criteria ?>
             </td>
           </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['principal_inclusion_criteria'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->principal_inclusion_criteria ?></td>
               </tr>
             <?php   } } ?>
           <tr>
             <td colspan="2"><label>7.1 PRINCIPAL EXCLUSION CRITERIA <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></td>
           </tr>
           <tr>
             <td colspan="2" <?php if($prefix == 'applicant') { ?> id="principal-exclusion-criteria" 
                    data-type="wysihtml5" data-pk="<?= $application->id ?>" 
                    data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'approvalEdit',  'prefix' => 'applicant', $application->id, '_ext' => 'json']); ?>" 
                    data-name="principal_exclusion_criteria"
                    data-title="Update principal_exclusion_criteria" <?php } ?>>
               <?= $application->principal_exclusion_criteria ?>
             </td>
           </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['principal_exclusion_criteria'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->principal_exclusion_criteria ?></td>
               </tr>
             <?php   } } ?>
           <tr>
             <td colspan="2"><label>7.2 PRIMARY END POINTS <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></td>
           </tr>
           <tr>
             <td colspan="2" <?php if($prefix == 'applicant') { ?> id="primary-end-points" 
                    data-type="wysihtml5" data-pk="<?= $application->id ?>" 
                    data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'approvalEdit',  'prefix' => 'applicant', $application->id, '_ext' => 'json']); ?>" 
                    data-name="primary_end_points"
                    data-title="Update primary_end_points" <?php } ?>>
               <?= $application->primary_end_points ?>
             </td>
           </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['primary_end_points'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->primary_end_points ?></td>
               </tr>
             <?php   } } ?>
        </table>

            <?= $this->fetch('application_criteria') ?>
      </div>

      <div id="tabs-8">
        <table class="table table-condensed vertical-table"> 
          <tr>
            <td colspan="2">
              <h5>8.0 SCOPE OF THE TRIAL -  <i class="sterix fa fa-asterisk" aria-hidden="true"></i> <small>Tick all boxes where applicable</small></h5>
            </td>
          </tr> 
          
          <tr>
            <th><label>Health Condition(s) or Problem(s) Studied <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></th>
            <td <?php if($prefix == 'applicant') { ?> id="disease-condition" 
                    data-type="wysihtml5" data-pk="<?= $application->id ?>" 
                    data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'approvalEdit',  'prefix' => 'applicant', $application->id, '_ext' => 'json']); ?>" 
                    data-name="disease_condition"
                    data-title="Update health condition" <?php } ?>><?= $application->disease_condition ?></td>
          </tr>
          <tr>
            <td><label><?= ($application->scope_diagnosis) ? $checked : $nChecked; ?> Diagnosis</label></td>
            <td><label><?= ($application->scope_bioequivalence) ? $checked : $nChecked; ?> Bioequivalence</label></td>
          </tr>          
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['scope_diagnosis'])){      ?>
              <tr class="amender"><td colspan="2"><?php echo $key+1; ?></td></tr>
              <tr> <td colspan="2"><label><?= ($amendment->scope_diagnosis) ? $checked : $nChecked; ?> Diagnosis</label></td>  </tr>
             <?php   } } ?>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['scope_bioequivalence'])){      ?>
              <tr class="amender"><td colspan="2"><?php echo $key+1; ?></td></tr>
              <tr> <td colspan="2"><label><?= ($application->scope_bioequivalence) ? $checked : $nChecked; ?> Bioequivalence</label></td>  </tr>
             <?php   } } ?>
          <tr>
            <td><label><?= ($application->scope_prophylaxis) ? $checked : $nChecked; ?> Prophylaxis</label></td>
            <td><label><?= ($application->scope_dose_response) ? $checked : $nChecked; ?> Dose Response</label></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['scope_prophylaxis'])){      ?>
              <tr class="amender"><td colspan="2"><?php echo $key+1; ?></td></tr>
              <tr> <td colspan="2"><label><?= ($application->scope_prophylaxis) ? $checked : $nChecked; ?> Prophylaxis</label></td>  </tr>
             <?php   } } ?>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['scope_dose_response'])){      ?>
              <tr class="amender"><td colspan="2"><?php echo $key+1; ?></td></tr>
              <tr> <td colspan="2"><label><?= ($application->scope_dose_response) ? $checked : $nChecked; ?> Dose Response</label></td>  </tr>
             <?php   } } ?>
          <tr>
            <td><label><?= ($application->scope_therapy) ? $checked : $nChecked; ?> Therapy</label></td>
            <td><label><?= ($application->scope_pharmacogenetic) ? $checked : $nChecked; ?> Pharmacogenetic</label></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['scope_therapy'])){      ?>
              <tr class="amender"><td colspan="2"><?php echo $key+1; ?></td></tr>
              <tr> <td colspan="2"><label><?= ($application->scope_therapy) ? $checked : $nChecked; ?> Therapy</label></td>  </tr>
             <?php   } } ?>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['scope_pharmacogenetic'])){      ?>
              <tr class="amender"><td colspan="2"><?php echo $key+1; ?></td></tr>
              <tr> <td colspan="2"><label><?= ($application->scope_pharmacogenetic) ? $checked : $nChecked; ?> Pharmacogenetic</label></td>  </tr>
             <?php   } } ?>
          <tr>
            <td><label><?= ($application->scope_safety) ? $checked : $nChecked; ?> Safety</label></td>
            <td><label><?= ($application->scope_pharmacogenomic) ? $checked : $nChecked; ?> Pharmacogenomic</label></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['scope_safety'])){      ?>
              <tr class="amender"><td colspan="2"><?php echo $key+1; ?></td></tr>
              <tr> <td colspan="2"><label><?= ($application->scope_safety) ? $checked : $nChecked; ?> Safety</label></td>  </tr>
             <?php   } } ?>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['scope_pharmacogenomic'])){      ?>
              <tr class="amender"><td colspan="2"><?php echo $key+1; ?></td></tr>
              <tr> <td colspan="2"><label><?= ($application->scope_pharmacogenomic) ? $checked : $nChecked; ?> Pharmacogenomic</label></td>  </tr>
             <?php   } } ?>
          <tr>
            <td><label><?= ($application->scope_efficacy) ? $checked : $nChecked; ?> Efficacy</label></td>
            <td><label><?= ($application->scope_pharmacoecomomic) ? $checked : $nChecked; ?> Pharmacoecomomic</label></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['scope_efficacy'])){      ?>
              <tr class="amender"><td colspan="2"><?php echo $key+1; ?></td></tr>
              <tr> <td colspan="2"><label><?= ($application->scope_efficacy) ? $checked : $nChecked; ?> Efficacy</label></td>  </tr>
             <?php   } } ?>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['scope_pharmacoecomomic'])){      ?>
              <tr class="amender"><td colspan="2"><?php echo $key+1; ?></td></tr>
              <tr> <td colspan="2"><label><?= ($application->scope_pharmacoecomomic) ? $checked : $nChecked; ?> Pharmacoecomomic</label></td>  </tr>
             <?php   } } ?>

          <tr>
            <td><label><?= ($application->scope_pharmacokinetic) ? $checked : $nChecked; ?> Pharmacokinetic</label></td>
            <td> </td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['scope_pharmacokinetic'])){      ?>
              <tr class="amender"><td colspan="2"><?php echo $key+1; ?></td></tr>
              <tr> <td colspan="2"><label><?= ($application->scope_pharmacokinetic) ? $checked : $nChecked; ?> Pharmacokinetic</label></td>  </tr>
             <?php   } } ?>
          <tr>
            <td><label><?= ($application->scope_pharmacodynamic) ? $checked : $nChecked; ?> Pharmacodynamic</label></td>
            <td> </td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['scope_pharmacodynamic'])){      ?>
              <tr class="amender"><td colspan="2"><?php echo $key+1; ?></td></tr>
              <tr> <td colspan="2"><label><?= ($application->scope_pharmacodynamic) ? $checked : $nChecked; ?> Pharmacodynamic</label></td>  </tr>
             <?php   } } ?>
          <tr>
            <td><label><?= ($application->scope_others) ? $checked : $nChecked; ?> Others</label></td>
            <td> </td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['scope_others'])){      ?>
              <tr class="amender"><td colspan="2"><?php echo $key+1; ?></td></tr>
              <tr> <td colspan="2"><label><?= ($application->scope_others) ? $checked : $nChecked; ?> Others</label></td>  </tr>
             <?php   } } ?>


            <tr>
              <th><label>If others, specify</label></th>
              <td><?= $application->scope_others_specify ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['scope_others_specify'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->scope_others_specify ?></td>
               </tr>
             <?php   } } ?>

            <tr>
              <td colspan="2">
                <h5>8.1 TRIAL TYPE AND PHASE  <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5>
              </td>
            </tr>            
            <tr>
              <td><label><?= ($application->trial_human_pharmacology) ? $checked : $nChecked; ?> Human pharmacology (Phase I)</label></td>
              <td> </td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['trial_human_pharmacology'])){      ?>
              <tr class="amender"><td colspan="2"><?php echo $key+1; ?></td></tr>
              <tr> <td colspan="2"><label><?= ($application->trial_human_pharmacology) ? $checked : $nChecked; ?> Human pharmacology (Phase I)</label></td>  </tr>
             <?php   } } ?>

            <tr>
              <td colspan="2"><h6>Is it:</h6></td>
            </tr>
            <tr>
              <td colspan="2"><label><?= ($application->trial_administration_humans) ? $checked : $nChecked; ?> First administration to humans</label></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['trial_administration_humans'])){      ?>
              <tr class="amender"><td colspan="2"><?php echo $key+1; ?></td></tr>
              <tr> <td colspan="2"><label><?= ($application->trial_administration_humans) ? $checked : $nChecked; ?> First administration to humans</label></td>  </tr>
             <?php   } } ?>
            <tr>
              <td colspan="2"><label><?= ($application->trial_bioequivalence_study) ? $checked : $nChecked; ?> Bioequivalence study</label></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['trial_bioequivalence_study'])){      ?>
              <tr class="amender"><td colspan="2"><?php echo $key+1; ?></td></tr>
              <tr> <td colspan="2"><label><?= ($application->trial_bioequivalence_study) ? $checked : $nChecked; ?> Bioequivalence study</label></td>  </tr>
             <?php   } } ?>
            <tr>
              <td colspan="2"><label><?= ($application->trial_other) ? $checked : $nChecked; ?> Other</label></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['trial_other'])){      ?>
              <tr class="amender"><td colspan="2"><?php echo $key+1; ?></td></tr>
              <tr> <td colspan="2"><label><?= ($application->trial_other) ? $checked : $nChecked; ?> Other</label></td>  </tr>
             <?php   } } ?>
            <tr>
              <td colspan="2"><label>If other, please specify: <?= $application->trial_other_specify ?></label></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['trial_other_specify'])){      ?>
              <tr class="amender"><td colspan="2"><?php echo $key+1; ?></td></tr>
              <tr> <td colspan="2"><label>If other, please specify: <?= $application->trial_other_specify ?> </label></td>  </tr>
             <?php   } } ?>
            <tr>
              <td colspan="2"><label><?= ($application->trial_therapeutic_exploratory) ? $checked : $nChecked; ?> Therapeutic exploratory (Phase II)</label></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['trial_therapeutic_exploratory'])){      ?>
              <tr class="amender"><td colspan="2"><?php echo $key+1; ?></td></tr>
              <tr> <td colspan="2"><label><?= ($application->trial_therapeutic_exploratory) ? $checked : $nChecked; ?> Therapeutic exploratory (Phase II)</label></td>  </tr>
             <?php   } } ?>
            <tr>
              <td colspan="2"><label><?= ($application->trial_therapeutic_confirmatory) ? $checked : $nChecked; ?> Therapeutic confirmatory (Phase III)</label></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['trial_therapeutic_confirmatory'])){      ?>
              <tr class="amender"><td colspan="2"><?php echo $key+1; ?></td></tr>
              <tr> <td colspan="2"><label><?= ($application->trial_therapeutic_confirmatory) ? $checked : $nChecked; ?> Therapeutic confirmatory (Phase III)</label></td>  </tr>
             <?php   } } ?>
            <tr>
              <td colspan="2"><label><?= ($application->trial_therapeutic_use) ? $checked : $nChecked; ?> Therapeutic use (Phase IV)</label></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['trial_therapeutic_use'])){      ?>
              <tr class="amender"><td colspan="2"><?php echo $key+1; ?></td></tr>
              <tr> <td colspan="2"><label><?= ($application->trial_therapeutic_use) ? $checked : $nChecked; ?> Therapeutic use (Phase IV)</label></td>  </tr>
             <?php   } } ?>
        </table>

            <?= $this->fetch('application_scope') ?>
      </div>

      <div id="tabs-9">
        <table class="table table-condensed vertical-table">
          <tr>
            <td colspan="2"><h5>9.0 DESIGN OF THE TRIAL</h5></td>
          </tr> 
          <tr>
            <th><label>Type of trial <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></th>
            <td><?= $application->design_controlled ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['design_controlled'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->design_controlled ?></td>
               </tr>
             <?php   } } ?>
          <tr>
              <td colspan="2"><p class="topper"><em class="text-success">If controlled</em></p></td>
          </tr>
          <tr>
            <th><label>Randomised</label></th>
            <td><?= $application->design_controlled_randomised ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['design_controlled_randomised'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->design_controlled_randomised ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Single Blind</label></th>
            <td><?= $application->design_controlled_single_blind ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['design_controlled_single_blind'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->design_controlled_single_blind ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Double Blind</label></th>
            <td><?= $application->design_controlled_double_blind ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['design_controlled_double_blind'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->design_controlled_double_blind ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Parallel group</label></th>
            <td><?= $application->design_controlled_parallel_group ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['design_controlled_parallel_group'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->design_controlled_parallel_group ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Cross over</label></th>
            <td><?= $application->design_controlled_cross_over ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['design_controlled_cross_over'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->design_controlled_cross_over ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Other</label></th>
            <td><?= $application->design_controlled_other ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['design_controlled_other'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->design_controlled_other ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>If yes to other, specify</label></th>
            <td><?= $application->design_controlled_specify ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['design_controlled_specify'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->design_controlled_specify ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>If controlled, specify the comparator</label></th>
            <td><?= $application->design_controlled_comparator ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['design_controlled_comparator'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->design_controlled_comparator ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Other medicinal product(s)</label></th>
            <td><?= $application->design_controlled_other_medicinal ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['design_controlled_other_medicinal'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->design_controlled_other_medicinal ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Placebo</label></th>
            <td><?= $application->design_controlled_placebo ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['design_controlled_placebo'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->design_controlled_placebo ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Other</label></th>
            <td><?= $application->design_controlled_medicinal_other ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['design_controlled_medicinal_other'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->design_controlled_medicinal_other ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>If yes to other, specify</label></th>
            <td><?= $application->design_controlled_medicinal_specify ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['design_controlled_medicinal_specify'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->design_controlled_medicinal_specify ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Other</label></th>
            <td><?= $application->design_controlled_other ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['design_controlled_other'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->design_controlled_other ?></td>
               </tr>
             <?php   } } ?>
        </table>

            <?= $this->fetch('application_design') ?>
      </div>


      <div id="tabs-10">
        <table class="table table-condensed vertical-table">
          <tr>
            <td colspan="2"><label>10.1 Ethical Considerations</label></td>
          </tr> 
          <tr>
            <td colspan="2"><label>State any ethical or moral considerations relating to the trial giving details <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></td>
          </tr> 
          <tr>
            <td colspan="2"><?= $application->ethic_considerations ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['ethic_considerations'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->ethic_considerations ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <td colspan="2"><label>Company who will insure the participants in the proposed trial</label></td>
          </tr> 
          <tr>
            <th><label>Company Name</label></th>
            <td><?= $application->insurance_company ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['insurance_company'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->insurance_company ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <th><label>Company Address</label></th>
            <td><?= $application->insurance_address ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['insurance_address'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->insurance_address ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <td colspan="2">
              <label>(Allow attachment for a letter from the insurance company indicating company\'s consent to the proposed insurance and a copy of the proposed insurance policy)</label>
            </td>
          </tr>
           <tr>
             <td colspan="2">
               <?php
               if (!empty($application['policies'])) {
                    for ($i = 0; $i <= count($application['policies'])-1; $i++) { 
                      echo $this->Html->link($application['policies'][$i]->file, substr($application['policies'][$i]->dir, 8) . '/' . $application['policies'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
           </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['policies'])){
                for ($i = 0; $i <= count($amendment['policies'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['policies'][$i]->file, substr($amendment['policies'][$i]->dir, 8) . '/' . $amendment['policies'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
          <tr>
            <th><label>State the amount of insurance in respect of each participant</label></th>
            <td><?= $application->insurance_amount ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['insurance_amount'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->insurance_amount ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <td colspan="2">Other</td>
          </tr>
          <tr>
            <th><label>If no insurance company, provide details</label></th>
            <td><?= $application->other_insurance ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['other_insurance'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->other_insurance ?></td>
               </tr>
             <?php   } } ?>
          <tr>
             <td colspan="2">
               <?php
               if (!empty($application['details'])) {
                    for ($i = 0; $i <= count($application['details'])-1; $i++) { 
                      echo $this->Html->link($application['details'][$i]->file, substr($application['details'][$i]->dir, 8) . '/' . $application['details'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
           </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['details'])){
                for ($i = 0; $i <= count($amendment['details'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['details'][$i]->file, substr($amendment['details'][$i]->dir, 8) . '/' . $amendment['details'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
          <tr>
            <td colspan="2">
              <label>10.2 Ethical Reviews</label>
              <br/>The Ethics review process of the trial record in the primary register database comprises of:<br>              
            </td>
          </tr>          
          <tr>
            <th><label>10.2.1 Status</label></th>
            <td><?= $application->ethical_review_status ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['ethical_review_status'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->ethical_review_status ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <td colspan="2">
              <label>If approved, proof of approval / if pending, proof of submission:</label>           
            </td>
          </tr>  
           <tr>
             <td colspan="2">
               <?php
               if (!empty($application['proofs'])) {
                    for ($i = 0; $i <= count($application['proofs'])-1; $i++) { 
                      echo $this->Html->link($application['proofs'][$i]->file, substr($application['proofs'][$i]->dir, 8) . '/' . $application['proofs'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
           </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['proofs'])){
                for ($i = 0; $i <= count($amendment['proofs'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['proofs'][$i]->file, substr($amendment['proofs'][$i]->dir, 8) . '/' . $amendment['proofs'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>

          <tr>
            <th><label>10.2.2 Date of Approval</label></th>
            <td><?= $application->date_of_approval_ethics ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['date_of_approval_ethics'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->date_of_approval_ethics ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <td colspan="2"><h5>10.2.3 Name and contact details of Ethics committee(s) <small>where necessary, Click button to add more </small></h5></td>
          </tr>
          
          <?php
            if (!empty($application['committees'])) {
             for ($i = 0; $i <= count($application['committees'])-1; $i++) {
            ?>
            <tr>
              <th><label>Ethics Committee Name <span class="sterix">*</span></label></th>
              <td><?= $application->committees[$i]['name'] ?></td>
            </tr>
            <tr>
              <th><label>Postal Address <span class="sterix">*</span></label></th>
              <td><?= $application->committees[$i]['address'] ?></td>
            </tr>
            <tr>
              <th><label>Telephone Number <span class="sterix">*</span></label></th>
              <td><?= $application->committees[$i]['telephone_number'] ?></td>
            </tr>
            <tr>
              <th><label>Email Address <span class="sterix">*</span></label></th>
              <td><?= $application->committees[$i]['email_address'] ?></td>
            </tr>
            <tr><td colspan="2"></td></tr>
            <?php 
              }
            }
           ?>

            <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['committees'])){
                for ($i = 0; $i <= count($amendment['committees'])-1; $i++) {
            ?>
            <tr class="amender">
              <th><?php echo $key+1; ?> <label>Ethics Committee Name <span class="sterix">*</span></label></th>
              <td><?= $amendment->committees[$i]['name'] ?></td>
            </tr>
            <tr class="amender">
              <th><?php echo $key+1; ?> <label>Postal Address <span class="sterix">*</span></label></th>
              <td><?= $amendment->committees[$i]['address'] ?></td>
            </tr>
            <tr class="amender">
              <th><?php echo $key+1; ?> <label>Telephone Number <span class="sterix">*</span></label></th>
              <td><?= $amendment->committees[$i]['telephone_number'] ?></td>
            </tr>
            <tr class="amender">
              <th><?php echo $key+1; ?> <label>Email Address <span class="sterix">*</span></label></th>
              <td><?= $amendment->committees[$i]['email_address'] ?></td>
            </tr>
            <tr><td colspan="2"></td></tr>
            <?php 
              }
            } }
           ?>

        </table>

            <?= $this->fetch('application_ethics') ?>
      </div>

      <div id="tabs-11">
        <table class="table table-condensed vertical-table">
          <tr>
            <td colspan="2">
              <h5>11.0 OTHER DETAILS</h5>
            </td>
          </tr>
          <tr>
            <th><label>11.1 State the time period for the trial <i class="sterix fa fa-asterisk" aria-hidden="true"></i> </label></th>
            <td><?= $application->estimated_duration ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['estimated_duration'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->estimated_duration ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <td colspan="2"><h5> 11.2 If the trial is to be conducted in Zimbabwe and not in the host country of the applicant / sponsor, provide an explanation <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5></td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->other_details_explanation ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['other_details_explanation'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->other_details_explanation ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <td colspan="2"> <h5> 11.3 Name other Regulatory Authorities to
                which applications to do this trial have been submitted, but approval has not yet been granted. Include date(s)
                of application: </h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->other_details_regulatory_notapproved ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['other_details_regulatory_notapproved'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->other_details_regulatory_notapproved ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <td colspan="2"> <h5> 11.4 Name other Regulatory Authorities
                which have approved this trial, date(s) of approval and number of sites per country. </h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->other_details_regulatory_approved ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['other_details_regulatory_approved'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->other_details_regulatory_approved ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <td colspan="2"> <h5> 11.5 if applicable, name other Regulatory Authorities or Ethics Committees which have rejected this trial and give reasons for rejection:</h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->other_details_regulatory_rejected ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['other_details_regulatory_rejected'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->other_details_regulatory_rejected ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <td colspan="2"> <h5> 11.6 If applicable, details of and reasons for this trial having been halted at any stage by other Regulatory Authorities:</h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->other_details_regulatory_halted ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['other_details_regulatory_halted'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->other_details_regulatory_halted ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <td colspan="2"> <h5> 11.7 Recording of effects, give a description of the methods of recordings and times of recordings</h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->recording_effects ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['recording_effects'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->recording_effects ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <td colspan="2"> <h5> 11.8 State the Clinical and laboratory tests, pharmacokinetic analysis etc that are to be carried out</h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->tests_done ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['tests_done'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->tests_done ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <td colspan="2"> <h5> 11.9 State the method of recording adverse reactions and provisions for dealing with the same and other complications <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->recording_method ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['recording_method'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->recording_method ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <td colspan="2"> <h5> 11.10 State the procedure for keeping participants lists and participant records for each participant taking part in the trial.
(Attachment or records for identification of persons) <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->record_keeping ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['record_keeping'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->record_keeping ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <td colspan="2"> <h5><b> 11.11 State where will trial code will be kept and how it can it be broken in case of an emergency <i class="sterix fa fa-asterisk" aria-hidden="true"></i></b></h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->trial_storage ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['trial_storage'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->trial_storage ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <td colspan="2"> <h5> 11.12 State measures to be implemented to ensure the safe handling of medicines and promote and control compliances with prescribed instructions <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->measures_compliance ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['measures_compliance'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->measures_compliance ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <td colspan="2"> <h5> 11.13 Evaluation of results, state the description of methodology (eg statistical methods) <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->evalution_of_results ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['evalution_of_results'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->evalution_of_results ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <td colspan="2"> <h5> 11.14 State how the persons or owners of animals are to be informed about the trial <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->inform_persons ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['inform_persons'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->inform_persons ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <td colspan="2"> <h5> 11.15  State how the staff involved are to be informed about the way the trial is to be conducted and about the procedures for medicine usage and administration and what to do in an emergency <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->inform_staff ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['inform_staff'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->inform_staff ?></td>
               </tr>
             <?php   } } ?>
          <tr>
            <td colspan="2"> <h5> Particulars of the animals that will take part in the clinical Trial <small>Kind and breed of animal
Age of animal if known
Names and Addresses of owners of animals</small></h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->animal_particulars ?></td>
          </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['animal_particulars'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->animal_particulars ?></td>
               </tr>
             <?php   } } ?>
        </table>

            <?= $this->fetch('application_other') ?>
      </div>

      <div id="tabs-12">
        <table class="table table-condensed vertical-table">
          <tr>
            <td colspan="2">
              <h5><b>CHECKLIST <span class="sterix">*</span></b>:<br>
              In-house CHECKLIST for Completeness of an application to conduct a clinical trial </h5>
            </td>
          </tr>

          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_covering_letter) ? $checked : $nChecked; ?> Covering Letter <i class="sterix fa fa-asterisk" aria-hidden="true"></i>
              </label>
              <br>
               <?php
               if (!empty($application['cover_letters'])) {
                    for ($i = 0; $i <= count($application['cover_letters'])-1; $i++) { 
                      echo $this->Html->link($application['cover_letters'][$i]->file, substr($application['cover_letters'][$i]->dir, 8) . '/' . $application['cover_letters'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
          </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['cover_letters'])){
                for ($i = 0; $i <= count($amendment['cover_letters'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['cover_letters'][$i]->file, substr($amendment['cover_letters'][$i]->dir, 8) . '/' . $amendment['cover_letters'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_fees) ? $checked : $nChecked; ?> Practicing License for principal investigator or co-investigator <i class="sterix fa fa-asterisk" aria-hidden="true"></i>
              </label>
              <br>
               <?php
               if (!empty($application['fees'])) {
                    for ($i = 0; $i <= count($application['fees'])-1; $i++) { 
                      echo $this->Html->link($application['fees'][$i]->file, substr($application['fees'][$i]->dir, 8) . '/' . $application['fees'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
          </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['fees'])){
                for ($i = 0; $i <= count($amendment['fees'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['fees'][$i]->file, substr($amendment['fees'][$i]->dir, 8) . '/' . $amendment['fees'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_mc10) ? $checked : $nChecked; ?> Pharmacy License or Certificate  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>
              </label>
              <br>
               <?php
               if (!empty($application['legal_forms'])) {
                    for ($i = 0; $i <= count($application['legal_forms'])-1; $i++) { 
                      echo $this->Html->link($application['legal_forms'][$i]->file, substr($application['legal_forms'][$i]->dir, 8) . '/' . $application['legal_forms'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
          </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['legal_forms'])){
                for ($i = 0; $i <= count($amendment['legal_forms'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['legal_forms'][$i]->file, substr($amendment['legal_forms'][$i]->dir, 8) . '/' . $amendment['legal_forms'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>

          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_protocol) ? $checked : $nChecked; ?> Protocol (including relevant questionnaires, etc.)  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>
              </label>
              <br>
               <?php
               if (!empty($application['protocols'])) {
                    for ($i = 0; $i <= count($application['protocols'])-1; $i++) { 
                      echo $this->Html->link($application['protocols'][$i]->file, substr($application['protocols'][$i]->dir, 8) . '/' . $application['protocols'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
          </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['protocols'])){
                for ($i = 0; $i <= count($amendment['protocols'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['protocols'][$i]->file, substr($amendment['protocols'][$i]->dir, 8) . '/' . $amendment['protocols'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_patient_information) ? $checked : $nChecked; ?> Patient information leaflet(s) and informed consent(s) including vernacular versions and English back translations  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>
              </label>
              <br>
               <?php
               if (!empty($application['leaflets'])) {
                    for ($i = 0; $i <= count($application['leaflets'])-1; $i++) { 
                      echo $this->Html->link($application['leaflets'][$i]->file, substr($application['leaflets'][$i]->dir, 8) . '/' . $application['leaflets'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
           </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['leaflets'])){
                for ($i = 0; $i <= count($amendment['leaflets'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['leaflets'][$i]->file, substr($amendment['leaflets'][$i]->dir, 8) . '/' . $amendment['leaflets'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_investigators_brochure) ? $checked : $nChecked; ?> Investigators brochure and / or all package insert(s) <i class="sterix fa fa-asterisk" aria-hidden="true"></i>
              </label>
              <br>
               <?php
               if (!empty($application['brochures'])) {
                    for ($i = 0; $i <= count($application['brochures'])-1; $i++) { 
                      echo $this->Html->link($application['brochures'][$i]->file, substr($application['brochures'][$i]->dir, 8) . '/' . $application['brochures'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
           </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['brochures'])){
                for ($i = 0; $i <= count($amendment['brochures'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['brochures'][$i]->file, substr($amendment['brochures'][$i]->dir, 8) . '/' . $amendment['brochures'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_investigators_cv) ? $checked : $nChecked; ?> Investigator's CV(s) in required format  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>
              </label>
              <br>
               <?php
               if (!empty($application['investigator_cvs'])) {
                    for ($i = 0; $i <= count($application['investigator_cvs'])-1; $i++) { 
                      echo $this->Html->link($application['investigator_cvs'][$i]->file, substr($application['investigator_cvs'][$i]->dir, 8) . '/' . $application['investigator_cvs'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
           </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['investigator_cvs'])){
                for ($i = 0; $i <= count($amendment['investigator_cvs'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['investigator_cvs'][$i]->file, substr($amendment['investigator_cvs'][$i]->dir, 8) . '/' . $amendment['investigator_cvs'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_signed_declaration) ? $checked : $nChecked; ?> Signed declaration(s) by investigator(s) to comply with GCP <i class="sterix fa fa-asterisk" aria-hidden="true"></i>
              </label>
              <br>
               <?php
               if (!empty($application['declarations'])) {
                    for ($i = 0; $i <= count($application['declarations'])-1; $i++) { 
                      echo $this->Html->link($application['declarations'][$i]->file, substr($application['declarations'][$i]->dir, 8) . '/' . $application['declarations'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
           </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['declarations'])){
                for ($i = 0; $i <= count($amendment['declarations'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['declarations'][$i]->file, substr($amendment['declarations'][$i]->dir, 8) . '/' . $amendment['declarations'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_study_monitors) ? $checked : $nChecked; ?> CV(s) and signed declaration(s) by study coordinator and/or monitor <i class="sterix fa fa-asterisk" aria-hidden="true"></i>
              </label>
              <br>
               <?php
               if (!empty($application['study_monitors'])) {
                    for ($i = 0; $i <= count($application['study_monitors'])-1; $i++) { 
                      echo $this->Html->link($application['study_monitors'][$i]->file, substr($application['study_monitors'][$i]->dir, 8) . '/' . $application['study_monitors'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
           </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['study_monitors'])){
                for ($i = 0; $i <= count($amendment['study_monitors'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['study_monitors'][$i]->file, substr($amendment['study_monitors'][$i]->dir, 8) . '/' . $amendment['study_monitors'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_monitoring_plans) ? $checked : $nChecked; ?> Monitoring plan by sponsor/PI/monitor throughout study <i class="sterix fa fa-asterisk" aria-hidden="true"></i>
              </label>
              <br>
               <?php
               if (!empty($application['monitoring_plans'])) {
                    for ($i = 0; $i <= count($application['monitoring_plans'])-1; $i++) { 
                      echo $this->Html->link($application['monitoring_plans'][$i]->file, substr($application['monitoring_plans'][$i]->dir, 8) . '/' . $application['monitoring_plans'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
           </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['monitoring_plans'])){
                for ($i = 0; $i <= count($amendment['monitoring_plans'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['monitoring_plans'][$i]->file, substr($amendment['monitoring_plans'][$i]->dir, 8) . '/' . $amendment['monitoring_plans'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_pi_declaration) ? $checked : $nChecked; ?> Signed Declaration by sponsor and national PI to comply with GCP  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>
              </label>
              <br>
               <?php
               if (!empty($application['pi_declarations'])) {
                    for ($i = 0; $i <= count($application['pi_declarations'])-1; $i++) { 
                      echo $this->Html->link($application['pi_declarations'][$i]->file, substr($application['pi_declarations'][$i]->dir, 8) . '/' . $application['pi_declarations'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
           </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['pi_declarations'])){
                for ($i = 0; $i <= count($amendment['pi_declarations'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['pi_declarations'][$i]->file, substr($amendment['pi_declarations'][$i]->dir, 8) . '/' . $amendment['pi_declarations'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_study_sponsorship) ? $checked : $nChecked; ?> Signed financial declaration by sponsor and national PI for study sponsorship  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>
              </label>
              <br>
               <?php
               if (!empty($application['study_sponsorships'])) {
                    for ($i = 0; $i <= count($application['study_sponsorships'])-1; $i++) { 
                      echo $this->Html->link($application['study_sponsorships'][$i]->file, substr($application['study_sponsorships'][$i]->dir, 8) . '/' . $application['study_sponsorships'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
           </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['study_sponsorships'])){
                for ($i = 0; $i <= count($amendment['study_sponsorships'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['study_sponsorships'][$i]->file, substr($amendment['study_sponsorships'][$i]->dir, 8) . '/' . $amendment['study_sponsorships'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_pharmacy_plan) ? $checked : $nChecked; ?> Pharmacy plan for local trial site  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>
              </label>
              <br>
               <?php
               if (!empty($application['pharmacy_plans'])) {
                    for ($i = 0; $i <= count($application['pharmacy_plans'])-1; $i++) { 
                      echo $this->Html->link($application['pharmacy_plans'][$i]->file, substr($application['pharmacy_plans'][$i]->dir, 8) . '/' . $application['pharmacy_plans'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
           </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['pharmacy_plans'])){
                for ($i = 0; $i <= count($amendment['pharmacy_plans'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['pharmacy_plans'][$i]->file, substr($amendment['pharmacy_plans'][$i]->dir, 8) . '/' . $amendment['pharmacy_plans'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_pharmacy_license) ? $checked : $nChecked; ?> MCAZ Pharmacy license (where applicable)  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>
              </label>
              <br>
               <?php
               if (!empty($application['pharmacy_licenses'])) {
                    for ($i = 0; $i <= count($application['pharmacy_licenses'])-1; $i++) { 
                      echo $this->Html->link($application['pharmacy_licenses'][$i]->file, substr($application['pharmacy_licenses'][$i]->dir, 8) . '/' . $application['pharmacy_licenses'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
           </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['pharmacy_licenses'])){
                for ($i = 0; $i <= count($amendment['pharmacy_licenses'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['pharmacy_licenses'][$i]->file, substr($amendment['pharmacy_licenses'][$i]->dir, 8) . '/' . $amendment['pharmacy_licenses'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_study_medicines) ? $checked : $nChecked; ?> Details of study medicines and concomitant medicines
              </label>
              <br>
               <?php
               if (!empty($application['study_medicines'])) {
                    for ($i = 0; $i <= count($application['study_medicines'])-1; $i++) { 
                      echo $this->Html->link($application['study_medicines'][$i]->file, substr($application['study_medicines'][$i]->dir, 8) . '/' . $application['study_medicines'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
           </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['study_medicines'])){
                for ($i = 0; $i <= count($amendment['study_medicines'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['study_medicines'][$i]->file, substr($amendment['study_medicines'][$i]->dir, 8) . '/' . $amendment['study_medicines'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_insurance_certificate) ? $checked : $nChecked; ?> Proof of participants' insurance certificate
              </label>
              <br>
               <?php
               if (!empty($application['insurance_certificates'])) {
                    for ($i = 0; $i <= count($application['insurance_certificates'])-1; $i++) { 
                      echo $this->Html->link($application['insurance_certificates'][$i]->file, substr($application['insurance_certificates'][$i]->dir, 8) . '/' . $application['insurance_certificates'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
           </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['insurance_certificates'])){
                for ($i = 0; $i <= count($amendment['insurance_certificates'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['insurance_certificates'][$i]->file, substr($amendment['insurance_certificates'][$i]->dir, 8) . '/' . $amendment['insurance_certificates'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_generic_insurance) ? $checked : $nChecked; ?> Letter endorsing generic insurance certificate
              </label>
              <br>
               <?php
               if (!empty($application['generic_insurances'])) {
                    for ($i = 0; $i <= count($application['generic_insurances'])-1; $i++) { 
                      echo $this->Html->link($application['generic_insurances'][$i]->file, substr($application['generic_insurances'][$i]->dir, 8) . '/' . $application['generic_insurances'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
           </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['generic_insurances'])){
                for ($i = 0; $i <= count($amendment['generic_insurances'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['generic_insurances'][$i]->file, substr($amendment['generic_insurances'][$i]->dir, 8) . '/' . $amendment['generic_insurances'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_ethics_approval) ? $checked : $nChecked; ?> Ethics approval, in country of origin and local MRCZ approval
              </label>
              <br>
               <?php
               if (!empty($application['ethics_approvals'])) {
                    for ($i = 0; $i <= count($application['ethics_approvals'])-1; $i++) { 
                      echo $this->Html->link($application['ethics_approvals'][$i]->file, substr($application['ethics_approvals'][$i]->dir, 8) . '/' . $application['ethics_approvals'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
           </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['ethics_approvals'])){
                for ($i = 0; $i <= count($amendment['ethics_approvals'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['ethics_approvals'][$i]->file, substr($amendment['ethics_approvals'][$i]->dir, 8) . '/' . $amendment['ethics_approvals'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_ethics_letter) ? $checked : $nChecked; ?> Copy of letter applying for ethics committee approval
              </label>
              <br>
               <?php
               if (!empty($application['ethics_letters'])) {
                    for ($i = 0; $i <= count($application['ethics_letters'])-1; $i++) { 
                      echo $this->Html->link($application['ethics_letters'][$i]->file, substr($application['ethics_letters'][$i]->dir, 8) . '/' . $application['ethics_letters'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
           </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['ethics_letters'])){
                for ($i = 0; $i <= count($amendment['ethics_letters'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['ethics_letters'][$i]->file, substr($amendment['ethics_letters'][$i]->dir, 8) . '/' . $amendment['ethics_letters'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_country_approvals) ? $checked : $nChecked; ?> Proof of approval of study by the National Regulatory Authority in country of origin
              </label>
              <br>
               <?php
               if (!empty($application['country_approvals'])) {
                    for ($i = 0; $i <= count($application['country_approvals'])-1; $i++) { 
                      echo $this->Html->link($application['country_approvals'][$i]->file, substr($application['country_approvals'][$i]->dir, 8) . '/' . $application['country_approvals'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
           </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['country_approvals'])){
                for ($i = 0; $i <= count($amendment['country_approvals'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['country_approvals'][$i]->file, substr($amendment['country_approvals'][$i]->dir, 8) . '/' . $amendment['country_approvals'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_advertisments) ? $checked : $nChecked; ?> Copy/ies of recruitment advertisement(s)
              </label>
              <br>
               <?php
               if (!empty($application['advertisments'])) {
                    for ($i = 0; $i <= count($application['advertisments'])-1; $i++) { 
                      echo $this->Html->link($application['advertisments'][$i]->file, substr($application['advertisments'][$i]->dir, 8) . '/' . $application['advertisments'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
           </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['advertisments'])){
                for ($i = 0; $i <= count($amendment['advertisments'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['advertisments'][$i]->file, substr($amendment['advertisments'][$i]->dir, 8) . '/' . $amendment['advertisments'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_safety_monitoring) ? $checked : $nChecked; ?> Proof of Provision of Data Safety Monitoring Board (DSMB/DMC) Committee
              </label>
              <br>
               <?php
               if (!empty($application['safety_monitors'])) {
                    for ($i = 0; $i <= count($application['safety_monitors'])-1; $i++) { 
                      echo $this->Html->link($application['safety_monitors'][$i]->file, substr($application['safety_monitors'][$i]->dir, 8) . '/' . $application['safety_monitors'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
           </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['safety_monitors'])){
                for ($i = 0; $i <= count($amendment['safety_monitors'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['safety_monitors'][$i]->file, substr($amendment['safety_monitors'][$i]->dir, 8) . '/' . $amendment['safety_monitors'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_biological_products) ? $checked : $nChecked; ?> Proof of application to the local Bio Safety Board for biological products e.g. vaccines
              </label>
              <br>
               <?php
               if (!empty($application['biological_products'])) {
                    for ($i = 0; $i <= count($application['biological_products'])-1; $i++) { 
                      echo $this->Html->link($application['biological_products'][$i]->file, substr($application['biological_products'][$i]->dir, 8) . '/' . $application['biological_products'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
           </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['biological_products'])){
                for ($i = 0; $i <= count($amendment['biological_products'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['biological_products'][$i]->file, substr($amendment['biological_products'][$i]->dir, 8) . '/' . $amendment['biological_products'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_dossier) ? $checked : $nChecked; ?> Pharmaceutical dossier for a new investigational drug (NID) product including stability data 
generated from 3 batches to support the shelf life claim and storage conditions. 
(N.B) If study products are generic products not yet registered and specifically 
manufactured as \'trial batches\' for the study then a pharmaceutical dossier is also required.
              </label>
              <br>
               <?php
               if (!empty($application['dossiers'])) {
                    for ($i = 0; $i <= count($application['dossiers'])-1; $i++) { 
                      echo $this->Html->link($application['dossiers'][$i]->file, substr($application['dossiers'][$i]->dir, 8) . '/' . $application['dossiers'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
           </tr>
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['dossiers'])){
                for ($i = 0; $i <= count($amendment['dossiers'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['dossiers'][$i]->file, substr($amendment['dossiers'][$i]->dir, 8) . '/' . $amendment['dossiers'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
        </table>

            <?= $this->fetch('application_checklist') ?>
      </div>

      <div id="tabs-13">
        <table class="table table-condensed vertical-table">
          <tr>
            <td>
              <h5>MC10 Form</h5>
              <p>Download MC10 Form using link below. Sign and upload the file.</p>
              <p class="checkbox"> <b>Upload complete MC10 form:</b></p>
              <?php
               if (!empty($application['mc10_forms'])) {
                    for ($i = 0; $i <= count($application['mc10_forms'])-1; $i++) { 
                      echo $this->Html->link($application['mc10_forms'][$i]->file, substr($application['mc10_forms'][$i]->dir, 8) . '/' . $application['mc10_forms'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
            </td>
          </tr> 
          <?php
            foreach($application['amendments'] as $key => $amendment) {
              if($amendment['submitted'] == 2 && !empty($amendment['mc10_forms'])){
                for ($i = 0; $i <= count($amendment['mc10_forms'])-1; $i++) { ?>                
            <tr class="amender">
              <th><?php echo $key+1; ?> </th>
              <td><?= $this->Html->link($amendment['mc10_forms'][$i]->file, substr($amendment['mc10_forms'][$i]->dir, 8) . '/' . $amendment['mc10_forms'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;" ?></td>
            </tr>
           <?php     
                } } }
            ?>
        </table>

            <?= $this->fetch('application_mc10') ?>
      </div>

      <div id="tabs-14">
        <table class="table table-condensed vertical-table">
          <tr>
            <td colspan="4">
              <h4>Kindly upload all the scanned receipts for the required fees: </h4>
            </td>
          </tr>
        </table>

        <table class="table table-bordered table-condensed">
          <thead>
            <tr>
              <th> # </th>
              <th> RECEIPT </th>
              <th> DESCRIPTION OF CONTENTS</th>
              <th>  </th>
            </tr>
          </thead>
          <tbody>                  
          <?php 
          //Dynamic fields
          if (!empty($application['receipts'])) {
            for ($i = 0; $i <= count($application['receipts'])-1; $i++) { 
          ?>

            <tr>
              <td><?= $i+1; ?></td>
              <td><p class="text-info text-left"><?php
                       echo $this->Html->link($application['receipts'][$i]->file, substr($application['receipts'][$i]->dir, 8) . '/' . $application['receipts'][$i]->file, ['fullBase' => true]);
                  ?></p>
              </td>
              <td>
                  <?php
                      echo $application->receipts[$i]['description'];
                  ?>
              </td>                    
              <td>

              </td>
            </tr>
            <?php } } ; ?>

          </tbody>
        </table>



        <?php
          foreach($application['amendments'] as $key => $amendment) {
            if($amendment['submitted'] == 2 && !empty($amendment['receipts'])) {
        ?>
        <table class="table table-bordered table-condensed">
          <thead>
            <tr class="amender">
              <th colspan="4"><?php echo $key+1; ?></th>
            </tr>
            <tr>
              <th> # </th>
              <th> RECEIPT </th>
              <th> DESCRIPTION OF CONTENTS</th>
              <th>  </th>
            </tr>
          </thead>
          <tbody>                  
          <?php 
          //Dynamic fields

          for ($i = 0; $i <= count($amendment['receipts'])-1; $i++) {
            if (!empty($amendment['receipts'])) {
              for ($i = 0; $i <= count($amendment['receipts'])-1; $i++) { 
          ?>

            <tr>
              <td><?= $i+1; ?></td>
              <td><p class="text-info text-left"><?php
                       echo $this->Html->link($amendment['receipts'][$i]->file, substr($amendment['receipts'][$i]->dir, 8) . '/' . $amendment['receipts'][$i]->file, ['fullBase' => true]);
                  ?></p>
              </td>
              <td>
                  <?php
                      echo $amendment->receipts[$i]['description'];
                  ?>
              </td>                    
              <td>

              </td>
            </tr>
            <?php } } } ; ?>
          </tbody>
        </table>        
          <?php } } ?>

            <?= $this->fetch('application_receipts') ?>
      </div>


    </div>
    <?php echo $this->fetch('endjs') ?>
  </div>
</div>
 
<?= $this->fetch('submit_buttons') ?>
