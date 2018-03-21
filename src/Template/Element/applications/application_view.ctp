<?php
  $checked = '<i class="fa fa-check-square-o" aria-hidden="true"></i>';
  $nChecked = '<i class="fa fa-square-o" aria-hidden="true"></i>';
  $numb = 1;
?>

<div class="row">
  <div class="<?= ($this->request->session()->read('Auth.User.group_id')==4) ? 'col-xs-10' : 'col-xs-12' ?>">
       <?php
           echo $this->fetch('form-actions');
       ?>
      <div id="tabs">
      <?php 
          echo $this->fetch('tabs');
      ?>
      <div id="tabs-1">
          <table class="table table-condensed vertical-table">
            <tr><th><label>PUBLIC TITLE/ACRONYM</label></th><td><p><?= $application->public_title ?></p></td></tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['public_title'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->public_title ?></td>
               </tr>
             <?php   } } ?>
            <tr><th><label>Scientific Title</label></th><td><?= $application->scientific_title ?></td></tr>
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
              <td><?= $application->public_contact_name ?></td>
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
              <td><?= $application->public_contact_designation ?></td>
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
              <td><?= $application->public_contact_email ?></td>
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
              <td><?= $application->public_contact_phone ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['public_contact_phone'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->public ?></td>
               </tr>
             <?php   } } ?>
            <tr>
              <th>
                <label>Postal Address<i class="sterix fa fa-asterisk" aria-hidden="true"></i></label>
              </th>
              <td><?= $application->public_contact_postal ?></td>
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
              <td><?= $application->public_contact_affiliation ?></td>
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
              <td><?= $application->scientific_contact_name ?></td>
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
              <td><?= $application->scientific_contact_designation ?></td>
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
              <td><?= $application->scientific_contact_email ?></td>
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
              <td><?= $application->scientific_contact_phone ?></td>
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
              <td><?= $application->scientific_contact_postal ?></td>
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
              <td><?= $application->scientific_contact_affiliation ?></td>
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
              <td colspan="2">
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
            
          </table>

          <table class="table table-condensed vertical-table"> 
            <tr>
              <th><label>Source of Funds</label></th>
              <td><?= $application->money_source ?></td>
            </tr>
            <?php
              foreach($application['amendments'] as $key => $amendment) {
                if($amendment['submitted'] == 2 && !empty($amendment['money_source'])){      ?>
               <tr class="amender">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->money_source ?></td>
               </tr>
             <?php   } } ?>
           </table>

           <table class="table table-condensed vertical-table">             
            <tr>
              <th><label>Health Condition(s) or Problem(s) Studied <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></th>
              <td><?= $application->disease_condition ?></td>
            </tr>
          </table>

          <table class="table table-condensed vertical-table">  
            <tr>
              <th><label>Medicine Name  <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></th>
              <td><?= $application->drug_name ?></td>
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
              <td><?= $application->quantity_excemption ?></td>
            </tr>
              <?php
                foreach($application['amendments'] as $key => $amendment) {
                  if($amendment['submitted'] == 2 && !empty($amendment['quantity_excemption'])){      ?>
                 <tr class="amender">
                    <th><?php echo $key+1; ?></th>
                    <td><?= $amendment->quantity_excemption ?></td>
                 </tr>
               <?php   } } ?>
             </table>


        <table class="table table-condensed vertical-table">  
             <tr>
               <td colspan="2"><label>7.0 PRINCIPAL INCLUSION CRITERIA <i class="sterix fa fa-asterisk" aria-hidden="true"></i></label></td>
             </tr>
             <tr>
               <td colspan="2">
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
               <td colspan="2">
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
               <td colspan="2">
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

        <table  class="table table-bordered table-condensed">
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
        </table>
         <table class="table table-condensed vertical-table">
          <tr>
            <th><label>Time period for the trial <i class="sterix fa fa-asterisk" aria-hidden="true"></i> </label></th>
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
           </table>
      </div>

    </div>
    <?php echo $this->fetch('endjs') ?>
  </div>

    <?= $this->fetch('submit_buttons') ?>

</div>
 