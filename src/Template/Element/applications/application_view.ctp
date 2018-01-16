<?php
  $checked = '<i class="fa fa-check-square-o" aria-hidden="true"></i>';
  $nChecked = '<i class="fa fa-square-o" aria-hidden="true"></i>';
  $numb = 1;
?>

<div class="row">
  <div class="col-xs-12">
      <div id="tabs">
      <?php 
          echo $this->fetch('tabs');
      ?>
      <div id="tabs-1">
          <table class="table table-condensed vertical-table">
            <tr><th><label>Public Title</label></th><td><p><?= $application->public_title ?></p></td></tr>
            <tr><th><label>Scientific Title</label></th><td><?= $application->scientific_title ?></td></tr>
            <tr><td colspan="2"> <label>Contact for Public Queries</label> </td></tr>
            <tr>
              <th>
                <label>Email <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td><?= $application->public_contact_email ?></td>
            </tr>
            <tr>
              <th>
                <label>Phone number <i class="sterix fa fa-asterisk aria-hidden="true"></i></label>
              </th>
              <td><?= $application->public_contact_phone ?></td>
            </tr>
            <tr>
              <th>
                <label>Postal Address<i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td><?= $application->public_contact_postal ?></td>
            </tr>
            <tr>
              <th>
                <label>Affiliation</label>
              </th>
              <td><?= $application->public_contact_affiliation ?></td>
            </tr>
            <tr><td colspan="2"> <label>Contact for Scientific Queries</label> </td></tr>
            <tr>
              <th>
                <label>Email <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td><?= $application->scientific_contact_email ?></td>
            </tr>
            <tr>
              <th>
                <label>Phone number <i class="sterix fa fa-asterisk aria-hidden="true"></i></label>
              </th>
              <td><?= $application->scientific_contact_phone ?></td>
            </tr>
            <tr>
              <th>
                <label>Postal Address<i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td><?= $application->scientific_contact_postal ?></td>
            </tr>
            <tr>
              <th>
                <label>Affiliation</label>
              </th>
              <td><?= $application->scientific_contact_affiliation ?></td>
            </tr>
            <tr>
              <td colspan="2"><label>Countries of Recruitment <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></td>
            </tr>
            <tr>              
              <td colspan="2">
                <?= $application->countries_recruitment ?>
              </td>
            </tr>
            <tr>
              <td colspan="2"><label>Purpose and Reason for Trial <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></td>
            </tr>
            <tr>              
              <td colspan="2">
                <?= $application->abstract_of_study ?>
              </td>
            </tr>
            <tr>
              <th>
                <label>Trial Indentifying Number</label>
              </th>
              <td><?= $application->version_no ?></td>
            </tr>
            <tr>
              <th>
                <label>Date Of Protocol</label>
              </th>
              <td><?= $application->date_of_protocol ?></td>
            </tr>
            <tr>
              <th>
                <label>Study Product <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td><?= $application->study_drug ?></td>
            </tr>
            <tr>
              <th>           </th>
              <td><label><?= ($application->product_type_chemical) ? $checked : $nChecked; ?> Chemical</label></td>
            </tr>
            <tr>
              <th>           </th>
              <td><?= $application->product_type_chemical_name ?></td>
            </tr>
            <tr>
              <th>           </th>
              <td><label><?= ($application->product_type_medical_device) ? $checked : $nChecked; ?> Medical Device</label></td>
            </tr>
            <tr>
              <th>           </th>
              <td><?= $application->product_type_medical_device_name ?></td>
            </tr>
            <tr>
              <th>
                <label>Approval date(s) of previous protocol(s)</label>
              </th>
              <td><?= $application->previous_dates[0]['date_of_previous_protocol'] ?></td>
            </tr>
            <tr>
              <th>
                <label>Approval Date of Protocol <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td><?= $application->approval_date ?></td>
            </tr>
            <tr>
              <th>
                <label>Protocol Version No.</label>
              </th>
              <td><?= $application->protocol_version ?></td>
            </tr>
          </table>
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
          <table class="table table-condensed vertical-table">
            <tr><td colspan="2"> <label>Business</label> </td></tr>
            <tr>
              <th>
                <label>Name of Company <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td><?= $application->business_name ?></td>
            </tr>
            <tr>
              <th>
                <label>Registered Office <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td><?= $application->business_office ?></td>
            </tr>
            <tr>
              <th>
                <label>Physical address <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td><?= $application->business_physical_address ?></td>
            </tr>
            <tr>
              <th>
                <label>Telephone number <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td><?= $application->business_telephone ?></td>
            </tr>
            <tr>
              <th>
                <label>Position of applicant <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td><?= $application->business_position ?></td>
            </tr>
          </table>
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
              <td><?= $application->money_source ?></td>
            </tr>
            <tr>
              <td colspan="2">
              <br/>
              <h5>3.1 Primary Sponsor Details</h5>
              </td>
            </tr>
            <tr>
              <th><label>sponsors <span class="sterix">*</span></label></th>
              <td><?= $application->sponsor_name ?></td>
            </tr>
            <tr>
              <th><label>Contact Person</label></th>
              <td><?= $application->sponsor_contact_person ?></td>
            </tr>
            <tr>
              <th><label>Address <span class="sterix">*</span></label></th>
              <td><?= $application->sponsor_address ?></td>
            </tr>
            <tr>
              <th><label>Telephone Number <span class="sterix">*</span></label></th>
              <td><?= $application->sponsor_telephone_number ?></td>
            </tr>
            <tr>
              <th><label>Fax Number</label></th>
              <td><?= $application->sponsor_fax_number ?></td>
            </tr>
            <tr>
              <th><label>Mobile phone number <span class="sterix">*</span></label></th>
              <td><?= $application->sponsor_cell_number ?></td>
            </tr>
            <tr>
              <th><label>Email Address <span class="sterix">*</span></label></th>
              <td><?= $application->sponsor_email_address ?></td>
            </tr>


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
              <th><label>sponsors <span class="sterix">*</span></label></th>
              <td><?= $application->sponsors[$i]['sponsor'] ?></td>
            </tr>
            <tr>
              <th><label>Contact Person</label></th>
              <td><?= $application->sponsors[$i]['contact_person'] ?></td>
            </tr>
            <tr>
              <th><label>Address <span class="sterix">*</span></label></th>
              <td><?= $application->sponsors[$i]['address'] ?></td>
            </tr>
            <tr>
              <th><label>Telephone Number <span class="sterix">*</span></label></th>
              <td><?= $application->sponsors[$i]['telephone_number'] ?></td>
            </tr>
            <tr>
              <th><label>Fax Number</label></th>
              <td><?= $application->sponsors[$i]['fax_number'] ?></td>
            </tr>
            <tr>
              <th><label>Mobile phone number <span class="sterix">*</span></label></th>
              <td><?= $application->sponsors[$i]['cell_number'] ?></td>
            </tr>
            <tr>
              <th><label>Email Address <span class="sterix">*</span></label></th>
              <td><?= $application->sponsors[$i]['email_address'] ?></td>
            </tr>
            <tr><td colspan="2"></td></tr>
            <?php 
              }
            }
           ?>
          </table>
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
          <tr>
            <th><label>Expected Number of participants in Zimbabwe <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></th>
            <td><?= $application->number_participants ?></td>
          </tr>
          <tr>
            <th><label>Total enrolment in each site: (if competitive enrolment, state minimum and maximum number per site.)  <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></th>
            <td><?= $application->total_enrolment_per_site ?></td>
          </tr>
          <tr>
            <th><label>Total participants worldwide  <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></th>
            <td><?= $application->total_participants_worldwide ?></td>
          </tr>
          <tr>
              <td colspan="2"><label>Justification <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></td>
          </tr>
          <tr>              
            <td colspan="2">
              <?= $application->participants_justification ?>
            </td>
          </tr>
          <tr>
              <td colspan="2"><h5>4.1 AGE SPAN</h5></td>
          </tr>
          <tr>
            <th><label>Less than 18 years?</label></th>
            <td><?= $application->population_less_than_18_years ?></td>
          </tr>
          <tr>
              <td colspan="2"><p class="topper"><em class="text-success">If Yes, Specify</em></p></td>
          </tr>
          <tr>
            <th><label>In Utero</label></th>
            <td><?= $application->population_utero ?></td>
          </tr>
          <tr>
            <th><label>Preterm Newborn Infants (up to gestational age < 37 weeks?</label></th>
            <td><?= $application->population_preterm_newborn ?></td>
          </tr>
          <tr>
            <th><label>Newborn (0-28 days)</label></th>
            <td><?= $application->population_newborn ?></td>
          </tr>
          <tr>
            <th><label>Infant and toddler (29 days - 23 months)</label></th>
            <td><?= $application->population_infant_and_toddler ?></td>
          </tr>
          <tr>
            <th><label>Children (2-12 years)</label></th>
            <td><?= $application->population_children ?></td>
          </tr>
          <tr>
            <th><label>Adolescent (13-17 years)</label></th>
            <td><?= $application->population_adolescent ?></td>
          </tr>
          <tr>
            <th><label>18 Years and over</label></th>
            <td><?= $application->population_above_18 ?></td>
          </tr>
          <tr>
            <th><label>Adult (18-65 years)</label></th>
            <td><?= $application->population_adult ?></td>
          </tr>
          <tr>
            <th><label>Elderly (> 65 years)</label></th>
            <td><?= $application->population_elderly ?></td>
          </tr>
          <tr>
              <td colspan="2"><h5>4.2 GROUP OF TRIAL SUBJECTS</h5></td>
          </tr>
          <tr>
            <th><label>Healty volunteers</label></th>
            <td><?= $application->subjects_healthy ?></td>
          </tr>
          <tr>
            <th><label>Specific vulnerable populations</label></th>
            <td><?= $application->subjects_vulnerable_populations ?></td>
          </tr>
          <tr><td colspan="2">
            <p class="topper"><em class="text-success">Specific vulnerable populations</em></p>
             </td>
          </tr>
          <tr>
            <th><label>Patients</label></th>
            <td><?= $application->subjects_patients ?></td>
          </tr>
          <tr>
            <th><label>Women of child bearing potential</label></th>
            <td><?= $application->subjects_women_child_bearing ?></td>
          </tr>
          <tr>
            <th><label>Women of child bearing potential using contraception</label></th>
            <td><?= $application->subjects_women_using_contraception ?></td>
          </tr>
          <tr>
            <th><label>Pregnant women</label></th>
            <td><?= $application->subjects_pregnant_women ?></td>
          </tr>
          <tr>
            <th><label>Nursing Women</label></th>
            <td><?= $application->subjects_nursing_women ?></td>
          </tr>
          <tr>
            <th><label>Emergency situation</label></th>
            <td><?= $application->subjects_emergency_situation ?></td>
          </tr>
          <tr>
            <th><label>Subjects incapable of giving consent personally?</label></th>
            <td><?= $application->subjects_incapable_consent ?></td>
          </tr>
          <tr>
            <th><label>If yes, specify</label></th>
            <td><?= $application->subjects_specify ?></td>
          </tr>
          <tr>
            <th><label>Others?</label></th>
            <td><?= $application->subjects_others ?></td>
          </tr>
          <tr>
            <th><label>If yes, specify</label></th>
            <td><?= $application->subjects_others_specify ?></td>
          </tr>
          <tr>
              <td colspan="2"><h5>4.3 GENDER <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5></td>
          </tr>
          <tr>
            <th>           </th>
            <td><label><?= ($application->gender_female) ? $checked : $nChecked; ?> Female</label></td>
          </tr>
          <tr>
            <th>           </th>
            <td><label><?= ($application->gender_male) ? $checked : $nChecked; ?> Male</label></td>
          </tr>
        </table>
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
          <tr>
            <th><label><b>If yes</b>, name of site</label></th>
            <td><?= $application->location_of_area ?></td>
          </tr>
          <tr>
            <th><label>Physical address</label></th>
            <td><?= $application->single_site_physical_address ?></td>
          </tr>
          <tr>
            <th><label>Contact person</label></th>
            <td><?= $application->single_site_contact_person ?></td>
          </tr>
          <tr>
            <th><label>Telephone</label></th>
            <td><?= $application->single_site_telephone ?></td>
          </tr> 
          <tr>
            <th><label>Multiple sites in Zimbabwe</label></th>
            <td><?= $application->multiple_sites_member_state ?></td>
          </tr> 
          <tr>
            <th><label>Number of sites anticipated in Zimbabwe</label></th>
            <td><?= $application->number_of_sites ?></td>
          </tr> 
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
          <tr>
            <th><label>Physical address</label></th>
            <td><?= $application->single_site_physical_address ?></td>
          </tr> 
          <tr>
            <th><label>Contact details</label></th>
            <td><?= $application->single_site_contact_details ?></td>
          </tr>
          <tr>
            <th><label>Contact person</label></th>
            <td><?= $application->single_site_contact_person ?></td>
          </tr> 
          <tr>
            <th><label>Province</label></th>
            <td><?= $provinces->toArray()[$application->single_site_province_id] ?></td>
          </tr> 
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
              <td><?= $provinces->toArray()[$application->site_details[$i]['province_id']]  ?></td>
            </tr>
            <tr><td colspan="2"></td></tr>
            <?php 
              }
            }
           ?>

            <tr>
              <th><label>Multiple Countries</label></th>
              <td><?= $application->multiple_countries ?></td>
            </tr> 
            <tr>
              <th><label>Number of states anticipated in the trial</label></th>
              <td><?= $application->multiple_member_states ?></td>
            </tr> 
            <tr>
              <th><label>If yes above, list the countries</label></th>
              <td><?= $application->multi_country_list ?></td>
            </tr> 
        </table>
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
            <td><?= $application->drug_name ?></td>
          </tr>
          <tr>
            <th><label>Quantity of medicine required  <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></th>
            <td><?= $application->quantity_excemption ?></td>
          </tr>
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

           <tr>
             <td colspan="2"><label>State the chemical composition, graphic and empirical formulae, animal pharmacology, toxicity and teratology as well as any clinical or field trials in humans or animals or any other relevant information or supply reports if available <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></td>
           </tr>
           <tr>
             <td colspan="2">
               <?= $application['drug_details'] ?>
             </td>
           </tr>
            <tr>
              <th><label>Adverse/ possible reactions to the medicine</label></th>
              <td><?= $application->medicine_reaction ?></td>
            </tr> 
            <tr>
              <th><label>Therapeutic effects of medicine</label></th>
              <td><?= $application->medicine_therapeutic_effects ?></td>
            </tr> 
            <tr>
              <th><label>a)Has the medicine been registered in the country?</label></th>
              <td><?= $application->medicine_registered ?></td>
            </tr> 
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
           <tr>
             <td colspan="2"><label>State details/reason</label></td>
           </tr>
           <tr>
             <td colspan="2">
               <?= $application->medicine_registered_details ?>
             </td>
           </tr>
            <tr>
              <th><label>b)Have clinical trials been conducted in the country of origin?</label></th>
              <td><?= $application->trials_origin_country ?></td>
            </tr>
           <tr>
             <td colspan="2"><label>State details/reason</label></td>
           </tr>
           <tr>
             <td colspan="2">
               <?= $application->trial_origin_details ?>
             </td>
           </tr>
            <tr>
              <th><label>c)Has application for registration been made in any other country?</label></th>
              <td><?= $application->application_other_country ?></td>
            </tr>
           <tr>
             <td colspan="2"><label>If Yes,State details/reason including the date on which the application was lodged</label></td>
           </tr>
           <tr>
             <td colspan="2">
               <?= $application->application_other_country_details ?>
             </td>
           </tr>
            <tr>
              <th><label>d)Has the medicine registered in any other country?</label></th>
              <td><?= $application->registered_other_country ?></td>
            </tr>
           <tr>
             <td colspan="2"><label>If Yes, State details/reason</label></td>
           </tr>
           <tr>
             <td colspan="2">
               <?= $application->registered_other_country_details ?>
             </td>
           </tr>
            <tr>
              <th><label>e) Has the registration of the medicine been rejected/deferred /cancelled in any country?</label></th>
              <td><?= $application->rejected_other_country ?></td>
            </tr>
           <tr>
             <td colspan="2"><label>If Yes,State details/reason</label></td>
           </tr>
           <tr>
             <td colspan="2">
               <?= $application->rejected_other_country_details ?>
             </td>
           </tr>
           <tr>
             <td colspan="2"><label>Administration route, dosage, dosage interval and period for the medicine being tested and the medicine being used as a control</label></td>
           </tr>
           <tr>
             <td colspan="2">
               <?= $application->administration_route ?>
             </td>
           </tr>
            <tr>
              <th><label>f) What is the status of medicine in Zimbabwe?</label></th>
              <td><?= $application->status_medicine ?></td>
            </tr>
           <tr>
             <td colspan="2"><label>State Antidote</label></td>
           </tr>
           <tr>
             <td colspan="2">
               <?= $application->state_antidote ?>
             </td>
           </tr>
           <tr>
             <td colspan="2"><label>State the quantity of the medicine for which exemption is required if the medicine is not registered</label></td>
           </tr>
           <tr>
             <td colspan="2">
               <?= $application->exemption_required ?>
             </td>
           </tr>
           <tr>
             <td colspan="2"><label>6.3</label></td>
           </tr>
            <tr>
              <th><label>Will medicine be given concomitantly?</label></th>
              <td><?= $application->given_concomitantly ?></td>
            </tr>
            <tr>
              <th><label>State whether the person already on another medicine will be given the experimential medicine at the same time or will be taken off the medicine</label></th>
              <td><?= $application->concurrent_medicine ?></td>
            </tr>
           <tr>
             <td colspan="2"><label>State measures to be implemented to ensure the safe handling of medicines and promote and control compliances with the prescribed instructions<i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></td>
           </tr>
           <tr>
             <td colspan="2">
               <?= $application->safety ?>
             </td>
           </tr>
        </table>
      </div>

      <div id="tabs-7">
        <table class="table table-condensed vertical-table">  
           <tr>
             <td colspan="2"><label>7.0 PRINCIPAL INCLUSION CRITERIA <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></td>
           </tr>
           <tr>
             <td colspan="2">
               <?= $application->principal_inclusion_criteria ?>
             </td>
           </tr>
           <tr>
             <td colspan="2"><label>7.1 PRINCIPAL EXCLUSION CRITERIA <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></td>
           </tr>
           <tr>
             <td colspan="2">
               <?= $application->principal_exclusion_criteria ?>
             </td>
           </tr>
           <tr>
             <td colspan="2"><label>7.2 PRIMARY END POINTS <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></td>
           </tr>
           <tr>
             <td colspan="2">
               <?= $application->primary_end_points ?>
             </td>
           </tr>
        </table>
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
            <td><?= $application->disease_condition ?></td>
          </tr>
          <tr>
            <td><label><?= ($application->scope_diagnosis) ? $checked : $nChecked; ?> Diagnosis</label></td>
            <td><label><?= ($application->scope_bioequivalence) ? $checked : $nChecked; ?> Bioequivalence</label></td>
          </tr>
          <tr>
            <td><label><?= ($application->scope_prophylaxis) ? $checked : $nChecked; ?> Prophylaxis</label></td>
            <td><label><?= ($application->scope_dose_response) ? $checked : $nChecked; ?> Dose Response</label></td>
          </tr>
          <tr>
            <td><label><?= ($application->scope_therapy) ? $checked : $nChecked; ?> Therapy</label></td>
            <td><label><?= ($application->scope_pharmacogenetic) ? $checked : $nChecked; ?> Pharmacogenetic</label></td>
          </tr>
          <tr>
            <td><label><?= ($application->scope_safety) ? $checked : $nChecked; ?> Safety</label></td>
            <td><label><?= ($application->scope_pharmacogenomic) ? $checked : $nChecked; ?> Pharmacogenomic</label></td>
          </tr>
          <tr>
            <td><label><?= ($application->scope_efficacy) ? $checked : $nChecked; ?> Efficacy</label></td>
            <td><label><?= ($application->scope_pharmacoecomomic) ? $checked : $nChecked; ?> Pharmacoecomomic</label></td>
          </tr>

          <tr>
            <td><label><?= ($application->scope_pharmacokinetic) ? $checked : $nChecked; ?> Parmacokinetic</label></td>
            <td> </td>
          </tr>
          <tr>
            <td><label><?= ($application->scope_pharmacodynamic) ? $checked : $nChecked; ?> Pharmacodynamic</label></td>
            <td> </td>
          </tr>
          <tr>
            <td><label><?= ($application->scope_others) ? $checked : $nChecked; ?> Others</label></td>
            <td> </td>
          </tr>
            <tr>
              <th><label>If others, specify</label></th>
              <td><?= $application->scope_others_specify ?></td>
            </tr>
            <tr>
              <td colspan="2">
                <h5>8.1 TRIAL TYPE AND PHASE  <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5>
              </td>
            </tr>            
            <tr>
              <td><label><?= ($application->trial_human_pharmacology) ? $checked : $nChecked; ?> Human pharmacology (Phase I)</label></td>
              <td> </td>
            </tr>
            <tr>
              <td colspan="2"><h6>Is it:</h6></td>
            </tr>
            <tr>
              <td colspan="2"><label><?= ($application->trial_administration_humans) ? $checked : $nChecked; ?> First administration to humans</label></td>
            </tr>
            <tr>
              <td colspan="2"><label><?= ($application->trial_bioequivalence_study) ? $checked : $nChecked; ?> Bioequivalence study</label></td>
            </tr>
            <tr>
              <td colspan="2"><label><?= ($application->trial_other) ? $checked : $nChecked; ?> Other</label></td>
            </tr>
            <tr>
              <td colspan="2"><label><?= ($application->trial_other_specify) ? $checked : $nChecked; ?> If other, please specify</label></td>
            </tr>
            <tr>
              <td colspan="2"><label><?= ($application->trial_therapeutic_exploratory) ? $checked : $nChecked; ?> Therapeutic exploratory (Phase II)</label></td>
            </tr>
            <tr>
              <td colspan="2"><label><?= ($application->trial_therapeutic_confirmatory) ? $checked : $nChecked; ?> Therapeutic confirmatory (Phase III)</label></td>
            </tr>
            <tr>
              <td colspan="2"><label><?= ($application->trial_therapeutic_use) ? $checked : $nChecked; ?> Therapeutic use (Phase IV)</label></td>
            </tr>
        </table>
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
          <tr>
              <td colspan="2"><p class="topper"><em class="text-success">If controlled</em></p></td>
          </tr>
          <tr>
            <th><label>Randomised</label></th>
            <td><?= $application->design_controlled_randomised ?></td>
          </tr>
          <tr>
            <th><label>Single Blind</label></th>
            <td><?= $application->design_controlled_single_blind ?></td>
          </tr>
          <tr>
            <th><label>Double Blind</label></th>
            <td><?= $application->design_controlled_double_blind ?></td>
          </tr>
          <tr>
            <th><label>Parallel group</label></th>
            <td><?= $application->design_controlled_parallel_group ?></td>
          </tr>
          <tr>
            <th><label>Cross over</label></th>
            <td><?= $application->design_controlled_cross_over ?></td>
          </tr>
          <tr>
            <th><label>Other</label></th>
            <td><?= $application->design_controlled_other ?></td>
          </tr>
          <tr>
            <th><label>If yes to other, specify</label></th>
            <td><?= $application->design_controlled_specify ?></td>
          </tr>
          <tr>
            <th><label>If controlled, specify the comparator</label></th>
            <td><?= $application->design_controlled_comparator ?></td>
          </tr>
          <tr>
            <th><label>Other medicinal product(s)</label></th>
            <td><?= $application->design_controlled_other_medicinal ?></td>
          </tr>
          <tr>
            <th><label>Placebo</label></th>
            <td><?= $application->design_controlled_placebo ?></td>
          </tr>
          <tr>
            <th><label>Other</label></th>
            <td><?= $application->design_controlled_medicinal_other ?></td>
          </tr>
          <tr>
            <th><label>If yes to other, specify</label></th>
            <td><?= $application->design_controlled_medicinal_specify ?></td>
          </tr>
          <tr>
            <th><label>Other</label></th>
            <td><?= $application->design_controlled_other ?></td>
          </tr>
        </table>
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
          <tr>
            <td colspan="2"><label>Company who will insure the participants in the proposed trial</label></td>
          </tr> 
          <tr>
            <th><label>Company Name</label></th>
            <td><?= $application->insurance_company ?></td>
          </tr>
          <tr>
            <th><label>Company Address</label></th>
            <td><?= $application->insurance_address ?></td>
          </tr>
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
          <tr>
            <th><label>State the amount of insurance in respect of each participant</label></th>
            <td><?= $application->insurance_amount ?></td>
          </tr>
          <tr>
            <td colspan="2">Other</td>
          </tr>
          <tr>
            <th><label>If no insurance company, provide details</label></th>
            <td><?= $application->other_insurance ?></td>
          </tr>
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
          <tr>
            <th><label>10.2.2 Date of Approval</label></th>
            <td><?= $application->date_of_approval_ethics ?></td>
          </tr>
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

        </table>
      </div>


      <div id="tabs-11">
        <table class="table table-condensed vertical-table">
          <tr>
            <td colspan="2">
              <h5>10.0 ORGANISATIONS TO WHOM THE SPONSOR HAS TRANSFERRED TRIAL RELATED DUTIES AND FUNCTIONS (<small>repeat as needed for multiple organisations
                    - </small>) </h5>
            </td>
          </tr>
          <tr>
            <th><label>Has the sponsor transferred any major or all the sponsor&rsquo;s trial related duties and functions to another organisation or third party? <span class="sterix">*</span></label></th>
            <td><?= $application->organisations_transferred_ ?></td>
          </tr>
          <tr>
            <td colspan="2"><small><em>Repeat as necessary for multiple organizations</em></small></td>
          </tr>
          
          <?php
            if (!empty($application['organizations'])) {
             for ($i = 0; $i <= count($application['organizations'])-1; $i++) {
            ?>
            <tr>
              <th><label> Organization </label></th>
              <td><?= $application->organizations[$i]['organization'] ?></td>
            </tr>
            <tr>
              <th><label> Name of contact person </label></th>
              <td><?= $application->organizations[$i]['contact_person'] ?></td>
            </tr>
            <tr>
              <th><label> Address </label></th>
              <td><?= $application->organizations[$i]['address'] ?></td>
            </tr>
            <tr>
              <th><label> Telephone Number </label></th>
              <td><?= $application->organizations[$i]['telephone_number'] ?></td>
            </tr>
            <tr>
              <th><label> All tasks of the sponsor </label></th>
              <td><?= $application->organizations[$i]['all_tasks'] ?></td>
            </tr>
            <tr>
              <th><label> Monitoring </label></th>
              <td><?= $application->organizations[$i]['monitoring'] ?></td>
            </tr>
            <tr>
              <th><label> Regulatory (e.g. preparation of applications to CA and ethics committee) </label></th>
              <td><?= $application->organizations[$i]['regulatory'] ?></td>
            </tr>
            <tr>
              <th><label> Investigator Recruitment </label></th>
              <td><?= $application->organizations[$i]['investigator_recruitment'] ?></td>
            </tr>
            <tr>
              <th><label> IVRS &mdash; treatment randomisation </label></th>
              <td><?= $application->organizations[$i]['ivrs_treatment_randomisation'] ?></td>
            </tr>
            <tr>
              <th><label> Data management </label></th>
              <td><?= $application->organizations[$i]['data_management'] ?></td>
            </tr>
            <tr>
              <th><label> E-data capture </label></th>
              <td><?= $application->organizations[$i]['e_data_capture'] ?></td>
            </tr>
            <tr>
              <th><label> Quality assurance auditing </label></th>
              <td><?= $application->organizations[$i]['quality_assurance_auditing'] ?></td>
            </tr>
            <tr>
              <th><label> Statistical analysis </label></th>
              <td><?= $application->organizations[$i]['statistical_analysis'] ?></td>
            </tr>
            <tr>
              <th><label> Medical Writing </label></th>
              <td><?= $application->organizations[$i]['medical_writing'] ?></td>
            </tr>
            <tr>
              <th><label> Other duties subcontracted </label></th>
              <td><?= $application->organizations[$i]['other_duties'] ?></td>
            </tr>
            <tr>
              <th><label> If yes to other, please specify </label></th>
              <td><?= $application->organizations[$i]['other_duties_specify'] ?></td>
            </tr>
            <tr><td colspan="2"></td></tr>
            <?php 
              }
            }
           ?>

        </table>
      </div>

      <div id="tabs-12">
        <table class="table table-condensed vertical-table">
          <tr>
            <td colspan="2">
              <h5>12.0 OTHER DETAILS</h5>
            </td>
          </tr>
          <tr>
            <th><label>12.1 State the time period for the trial <i class="sterix fa fa-asterisk" aria-hidden="true"></i> </label></th>
            <td><?= $application->estimated_duration ?></td>
          </tr>
          <tr>
            <td colspan="2"><h5> 12.2 If the trial is to be conducted in Zimbabwe and not in the host country of the applicant / sponsor, provide an explanation <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5></td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->other_details_explanation ?></td>
          </tr>
          <tr>
            <td colspan="2"> <h5> 12.3 Name other Regulatory Authorities to
                which applications to do this trial have been submitted, but approval has not yet been granted. Include date(s)
                of application: <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->other_details_regulatory_notapproved ?></td>
          </tr>
          <tr>
            <td colspan="2"> <h5> 12.4 Name other Regulatory Authorities
                which have approved this trial, date(s) of approval and number of sites per country. <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->other_details_regulatory_approved ?></td>
          </tr>
          <tr>
            <td colspan="2"> <h5> 12.5 if applicable, name other Regulatory Authorities or Ethics Committees which have rejected this trial and give reasons for rejection:</h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->other_details_regulatory_rejected ?></td>
          </tr>
          <tr>
            <td colspan="2"> <h5> 12.6 If applicable, details of and reasons for this trial having been halted at any stage by other Regulatory Authorities:</h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->other_details_regulatory_halted ?></td>
          </tr>
          <tr>
            <td colspan="2"> <h5> 12.7 Recording of effects, give a description of the methods of recordings and times of recordings</h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->recording_effects ?></td>
          </tr>
          <tr>
            <td colspan="2"> <h5> 12.8 State the Clinical and laboratory tests, pharmacokinetic analysis etc that are to be carried out</h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->tests_done ?></td>
          </tr>
          <tr>
            <td colspan="2"> <h5> 12.9 State the method of recording adverse reactions and provisions for dealing with the same and other complications <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->recording_method ?></td>
          </tr>
          <tr>
            <td colspan="2"> <h5> 12.10 State the procedure for keeping participants lists and participant records for each participant taking part in the trial.
(Attachment or records for identification of persons) <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->record_keeping ?></td>
          </tr>
          <tr>
            <td colspan="2"> <h5><b> 12.11 State where will trial code will be kept and how it can it be broken in case of an emergency <i class="sterix fa fa-asterisk" aria-hidden="true"></i></b></h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->trial_storage ?></td>
          </tr>
          <tr>
            <td colspan="2"> <h5> 12.12 State measures to be implemented to ensure the safe handling of medicines and promote and control compliances with prescribed instructions <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->measures_compliance ?></td>
          </tr>
          <tr>
            <td colspan="2"> <h5> 12.13 Evaluation of results, state the description of methodology (eg statistical methods) <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->evalution_of_results ?></td>
          </tr>
          <tr>
            <td colspan="2"> <h5> 12.14 State how the persons or owners of animals are to be informed about the trial <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->inform_persons ?></td>
          </tr>
          <tr>
            <td colspan="2"> <h5> 12.15  State how the staff involved are to be informed about the way the trial is to be conducted and about the procedures for medicine usage and administration and what to do in an emergency <i class="sterix fa fa-asterisk" aria-hidden="true"></i></h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->inform_staff ?></td>
          </tr>
          <tr>
            <td colspan="2"> <h5> Particulars of the animals that will take part in the clinical Trial <small>Kind and breed of animal
Age of animal if known
Names and Addresses of owners of animals</small></h5> </td>
          </tr>
          <tr>            
            <td colspan="2"><?= $application->animal_particulars ?></td>
          </tr>
        </table>
      </div>

      <div id="tabs-13">
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
          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_covering_letter) ? $checked : $nChecked; ?> Covering Letter <i class="sterix fa fa-asterisk" aria-hidden="true"></i>
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
          <tr>
            <td><label><?= $numb++ ?>.</label></td>
            <td>
              <label>
                <?= ($application->applicant_electronic_versions) ? $checked : $nChecked; ?> Electronic versions of the application form + protocol on CD or flash disk
              </label>
              <br>
               <?php
               if (!empty($application['electronic_versions'])) {
                    for ($i = 0; $i <= count($application['electronic_versions'])-1; $i++) { 
                      echo $this->Html->link($application['electronic_versions'][$i]->file, substr($application['electronic_versions'][$i]->dir, 8) . '/' . $application['electronic_versions'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info'])." &nbsp;";                    
                    }
                  } 
              ?>
             </td>
           </tr>
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
        </table>
      </div>

      <div id="tabs-14">
        <table class="table table-condensed vertical-table">
          <tr>
            <td colspan="4">
              <h4>14. Notification(s) -
              <small class="muted">(Notifications may include files (pictures, scanned documents, pdf, word documents) or generic updates</small></h4>
              <hr>
              <h5><i class="icon-file"></i> Do you have attachments that you would like to send to MCAZ? click on the button to add them:
                <br>
              </h5>
            </td>
          </tr>
        </table>

        <table class="table table-bordered table-condensed">
          <thead>
            <tr>
              <th> # </th>
              <th> File </th>
              <th> Text Description</th>
              <th>  </th>
            </tr>
          </thead>
          <tbody>                  
          <?php 
          //Dynamic fields
          if (!empty($application['attachments'])) {
            for ($i = 0; $i <= count($application['attachments'])-1; $i++) { 
          ?>

            <tr>
              <td><?= $i+1; ?></td>
              <td><p class="text-info text-left"><?php
                       echo $this->Html->link($application['attachments'][$i]->file, substr($application['attachments'][$i]->dir, 8) . '/' . $application['attachments'][$i]->file, ['fullBase' => true]);
                  ?></p>
              </td>
              <td>
                  <?php
                      echo $application->attachments[$i]['description'];
                  ?>
              </td>                    
              <td>

              </td>
            </tr>
            <?php } } ; ?>

          </tbody>
        </table>
      </div>

      <div id="tabs-15">
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
        </table>
      </div>


      <div id="tabs-16">
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
      </div>


    </div>
  </div>
</div>
 