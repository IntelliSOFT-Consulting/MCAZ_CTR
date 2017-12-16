
<?php echo $this->fetch('amendment-lead'); ?>
  <hr style="margin:5px;">

<div class="row-fluid">
     <?php
        $ichecked = "&#x2611;";
        $nchecked = "&#x2610;";
        echo $this->fetch('form-header');
    ?>

    <!-- Hole:  Form actions -->
      <?php
           echo $this->fetch('form-actions');
       ?>
      <div id="tabs">

        <?php echo $this->fetch('tabs'); ?>

        <div id="tabs-1">
          <hr class="my-view"  style="clear: left;">
          <table class="table table-condensed">
            <thead>
            <tr><th class="table-label required"><h5 style="text-align: center;">Study Title: <span class="sterix">*</span></h5></th></tr>
            </thead>
            <tbody>
            <tr><td><?php echo $application['Application']['study_title'] ?></td> </tr>
            <?php
              foreach($application['Amendment'] as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['study_title'])){      ?>
               <tr class="table-viewlabel"><td class="table-viewlabel"><?php echo $key+1; ?></td></tr>
               <tr class="table-viewlabel"><td class="table-noline"> <?php echo $amendment['study_title'];  ?></td></tr>
             <?php   } } ?>
             <?php echo $this->fetch('study_title'); ?>
            </tbody>
          </table>
          <table class="table  table-condensed">
            <tbody>
             <tr>
              <td class="table-label required"><p>Short Title: <span class="sterix">*</span></p></td>
              <td>
              <?php 
                if(!empty($application['Application']['short_title'])) { 
                     echo $application['Application']['short_title'];
                } else { ?>                  
                    <input name="data[Application][short_title]" class="input-xxlarge" placeholder=" " maxlength="255" 
                          id="ApplicationShortTitle" type="text">
                    <button name="submitStudyTitle" class="btn btn-info" id="ApplicationViewSaveShortTitle" type="button">
                      <i class="icon-save"></i> Save
                    </button>          
               <?php }  ?>
              </td>
             </tr>
            </tbody>
          </table>
          <hr class="my-view">

          <table class="table table-condensed">
            <thead>
            <tr><th class="table-label required"><h5 style="text-align: center;">Abstract of the study: <span class="sterix">*</span></h5></th></tr>
            </thead>
            <tbody>
            <tr><td><?php echo $application['Application']['abstract_of_study'] ?></td> </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1  && !empty($amendment['abstract_of_study'])){      ?>
               <tr class="table-viewlabel"><td class="table-viewlabel"><?php echo $key+1; ?></td></tr>
               <tr class="table-viewlabel table-in"><td class="table-noline"><?php  echo $amendment['abstract_of_study'];  ?> </td> </tr>
             <?php   } } ?>
              <?php echo $this->fetch('abstract_of_study'); ?>
            </tbody>
          </table>

          <table class="table  table-condensed">
            <tbody>
             <tr>
              <td class="table-label required"><p>Version No: <span class="sterix">*</span></p></td>
              <td><?php echo $application['Application']['version_no']?></td>
             </tr>
             <?php
              foreach($application['Amendment'] as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['version_no'])){      ?>
                  <tr class="table-viewlabel"> <td class="table-viewlabel"><?php echo $key+1; ?></td>
                  <td class=" table-noline"><?php  echo $amendment['version_no'];  ?></td> </tr>
             <?php   } } ?>
              <?php echo $this->fetch('version_no'); ?>
             <tr>
              <td class="table-label required"><p>Date of Protocol <span class="sterix">*</span></p></td>
              <td><?php echo $application['Application']['date_of_protocol'] ?></td>
             </tr>
             <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['date_of_protocol'])){      ?>
                  <tr class="table-viewlabel">
                    <td class="table-viewlabel"><?php echo $key+1; ?></td>
                    <td class=" table-noline"><?php  echo $amendment['date_of_protocol'];  ?></td>
                  </tr>
             <?php   } } ?>
              <?php echo $this->fetch('date_of_protocol'); ?>
            <tr>
              <td class="table-label required"><p>Study Drug <span class="sterix">*</span></p></td>
              <td><?php echo $application['Application']['study_drug'] ?></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['study_drug'])){      ?>
                  <tr class="table-viewlabel">
                    <td class="table-viewlabel"><?php echo $key+1; ?></td>
                    <td class=" table-noline"><?php  echo $amendment['study_drug'];  ?></td>
                 </tr>
             <?php   } } ?>
              <?php echo $this->fetch('study_drug'); ?>

            <tr>
              <td class="table-label required"><p>Disease condition being investigated <span class="sterix">*</span></p></td>
              <td><?php echo $application['Application']['disease_condition'] ?></td>
            </tr>
            <?php
              foreach($application['Amendment'] as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['disease_condition'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['disease_condition'];  ?></td>
                   </tr>
             <?php   } } ?>
              <?php echo $this->fetch('disease_condition'); ?>
<!--               </tbody>
          </table>

         <table>
          <tbody> -->
              <?php /*?><?php */?>
            <tr>
              <td class="table-label required"><p>Product Type <span class="sterix">*</span></p></td>
              <td>
                <p class="control-nolabel"><?php echo ($application['Application']['product_type_biologicals']   ? $ichecked : $nchecked ); ?> Biologicals
                </p>

                <p class="control-nolabel">
                <?php echo ($application['Application']['product_type_proteins']   ? $ichecked : $nchecked ); ?> Proteins
                <?php echo ($application['Application']['product_type_immunologicals']   ? $ichecked : $nchecked ); ?> Immunologicals
                <?php echo ($application['Application']['product_type_vaccines']   ? $ichecked : $nchecked ); ?> Vaccines
                <?php echo ($application['Application']['product_type_hormones']   ? $ichecked : $nchecked ); ?> Hormones
                <?php echo ($application['Application']['product_type_toxoid']   ? $ichecked : $nchecked ); ?> Toxoid
                </p>
              </td>
            </tr>
            <tr>
              <td class=" table-noline"></td>
              <td class=" table-noline">
                <p class="control-nolabel"><?php echo ($application['Application']['product_type_chemical']   ? $ichecked : $nchecked ); ?> Chemical</p>
                <p><?php echo $application['Application']['product_type_chemical_name'];?></p>
              </td>
            </tr>
            <tr>
              <td class=" table-noline"></td>
              <td class=" table-noline">
                <p class="control-nolabel"><?php echo ($application['Application']['product_type_medical_device']   ? $ichecked : $nchecked ); ?> Medical Device</p>
                <p><?php echo $application['Application']['product_type_medical_device_name'];?></p>
              </td>
            </tr>
            <?php
              foreach($application['Amendment'] as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['product_type'])){      ?>
                <tr class="table-viewlabel">
                  <td class="table-viewlabel"><?php echo $key+1; ?> </td>
                  <td class=" table-noline"><?php echo $amendment['product_type']; ?> </td>
                </tr>
             <?php   } } ?>
              <?php echo $this->fetch('product_type'); ?>
<!--               </tbody>
          </table>

         <table>
          <tbody> -->
            <tr>
              <td class="table-label"><p>Date(s) ECCT approval of previous protocol(s)</p></td>
              <td><?php
                foreach($application['PreviousDate'] as $date) {
                  echo "<p>". $date['date_of_previous_protocol']."</p>";
                }
               ?></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['previous_dates'])){      ?>
                  <tr class="table-viewlabel">
                    <td class="table-viewlabel"><?php echo $key+1; ?></td>
                    <td class=" table-noline"><?php echo $amendment['previous_dates'] ; ?></td>
                  </tr>
             <?php   } } ?>
            <?php echo $this->fetch('previous_dates'); ?>

            <tr>
              <td class="table-label required">
                <p>Approval Date of Protocol <span class="sterix">*</span></p>
              </td>
              <td>
                <p class="xeditable" id="data[Application][approval_date]" data-type="date"
                      data-pk="<?php echo $application['Application']['id'];?>"
                      data-original-title="Update approval date">
                  <?php echo $application['Application']['approval_date'];?></p>
              </td>
            </tr>

            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['approval_date'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['approval_date'];  ?></td>
                   </tr>
             <?php   } } ?>
              <?php echo $this->fetch('approval_date'); ?>
            </tbody>
          </table>
        </div>

        <div id="tabs-2">
            <h5>2.0 CO-ORDINATING INVESTIGATOR (<em>for multicentre trials in Kenya</em>) </h5>
          <table class="table  table-condensed">
            <tbody>
            <tr>
              <td class="table-label required"><p>Given name <span class="sterix">*</span></p></td>
              <td><?php echo $application['Application']['investigator1_given_name']?></td>
            </tr>
            <tr>
              <td class="table-label"><p>Middle name, if applicable</p></td>
              <td><?php echo $application['Application']['investigator1_middle_name'] ?></td>
            </tr>
            <tr>
              <td class="table-label required"><p>Family name <span class="sterix">*</span></p></td>
              <td><?php echo $application['Application']['investigator1_family_name'] ?></td>
            </tr>
            <tr>
              <td class="table-label required"><p>Qualification<span class="sterix">*</span></p></td>
              <td><?php echo $application['Application']['investigator1_qualification'] ?></td>
            </tr>
            <tr>
              <td class="table-label required"> <p>Professional address <span class="sterix">*</span></p> </td>
              <td>
                <p><?php echo $application['Application']['investigator1_professional_address'];?></p>
              </td>
            </tr>
            <tr>
              <td class="table-label required"> <p>Telephone number          <span class="sterix">*</span></p> </td>
              <td>
                <p class="xeditable iseditable" id="data[Application][investigator1_telephone]"  data-type="text"
                      data-pk="<?php echo $application['Application']['id'];?>"
                      data-original-title="Update telephone no"><?php echo $application['Application']['investigator1_telephone'];?></p>
              </td>
            </tr>
            <tr>
              <td class="table-label required"> <p>Email address <span class="sterix">*</span></p> </td>
              <td>
                <p class="xeditable iseditable" id="data[Application][investigator1_email]"  data-type="text"
                      data-pk="<?php echo $application['Application']['id'];?>"
                      data-original-title="Update email address"><?php echo $application['Application']['investigator1_email'];?></p>
              </td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['coordinating_investigators'])){      ?>
                  <tr class="table-viewlabel">
                    <td class="table-viewlabel"><?php echo $key+1; ?></td>
                    <td class=" table-noline"><?php echo $amendment['coordinating_investigators'] ; ?></td>
                  </tr>
             <?php   } } ?>
            <?php echo $this->fetch('coordinating_investigators'); ?>
            </tbody>
          </table>
           <h5>2.1 PRINCIPAL INVESTIGATOR (<small>for multicentre trial</small>) </h5>
          <?php foreach ($application['InvestigatorContact'] as $key => $investigatorContact) { ?>
          <span class="badge badge-info"><?php echo $key+1;?></span>
          <table class="table  table-condensed">
            <tbody>
            <tr>
              <td class="table-label required"><p>Given name <span class="sterix">*</span></p></td>
              <td><?php echo $investigatorContact['given_name']?></td>
            </tr>
            <tr>
              <td class="table-label"><p>Middle name, if applicable</p></td>
              <td><?php echo $investigatorContact['middle_name'] ?></td>
            </tr>
            <tr>
              <td class="table-label required"><p>Family name <span class="sterix">*</span></p></td>
              <td><?php echo $investigatorContact['family_name'] ?></td>
            </tr>
            <tr>
              <td class="table-label required"><p>Qualification<span class="sterix">*</span></p></td>
              <td><?php echo $investigatorContact['qualification'] ?></td>
            </tr>
            <tr>
              <td class="table-label required"> <p>Professional address <span class="sterix">*</span></p> </td>
              <td>
                <p><?php echo $investigatorContact['professional_address'];?></p>
              </td>
            </tr>
            <tr>
              <td class="table-label required"> <p>Telephone number <span class="sterix">*</span></p> </td>
              <td>
                <p class="xeditable iseditable" id="data[InvestigatorContact][<?php echo $key;?>][telephone]"  data-type="text"
                      data-pk="<?php echo $investigatorContact['id'];?>"
                      data-original-title="Update telephone number"><?php echo $investigatorContact['telephone'];?></p>
              </td>
            </tr>
            <tr>
              <td class="table-label required"> <p>Email address <span class="sterix">*</span></p> </td>
              <td>
                <p class="xeditable iseditable" id="data[InvestigatorContact][<?php echo $key;?>][email]"  data-type="text"
                      data-pk="<?php echo $investigatorContact['id'];?>"
                      data-original-title="Update email"><?php echo $investigatorContact['email'];?></p>
              </td>
            </tr>
            </tbody>
          </table>
          <hr>
          <?php } ?>
          <table class="table  table-condensed">
            <tbody>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['principal_investigators'])){      ?>
                  <tr class="table-viewlabel">
                    <td class="table-label table-viewlabel"><?php echo $key+1; ?></td>
                    <td class="table-noline"><?php echo $amendment['principal_investigators'] ; ?></td>
                  </tr>
             <?php   } } ?>
            <?php echo $this->fetch('principal_investigators'); ?>
            </tbody>
          </table>
        </div>

        <div id="tabs-3" >
           <h5>3.0 SPONSOR DETAILS </h5>
          <?php foreach ($application['Sponsor'] as $key => $sponsor) { ?>
          <span class="badge badge-info"><?php echo $key+1;?></span>
          <table class="table  table-condensed">
            <tbody>
            <tr>
              <td class="table-label required"><p>Sponsor <span class="sterix">*</span></p></td>
              <td><?php echo $sponsor['sponsor']?></td>
            </tr>
            <tr>
              <td class="table-label"><p>Contact Person </p></td>
              <td><?php echo $sponsor['contact_person'] ?></td>
            </tr>
            <tr>
              <td class="table-label required"><p>Address <span class="sterix">*</span></p></td>
              <td><?php echo $sponsor['address'] ?></td>
            </tr>
            <tr>
              <td class="table-label required"><p>Telephone Number <span class="sterix">*</span></p></td>
              <td><?php echo $sponsor['telephone_number'] ?></td>
            </tr>
            <tr>
              <td class="table-label"><p>Fax Number</p></td>
              <td><?php echo $sponsor['fax_number'] ?></td>
            </tr>

            <tr>
              <td class="table-label required"><p>Mobile phone number<span class="sterix">*</span></p></td>
              <td><?php echo $sponsor['cell_number'] ?></td>
            </tr>

            <tr>
              <td class="table-label required"><p>Email Address<span class="sterix">*</span></p></td>
              <td><?php echo $sponsor['email_address'] ?></td>
            </tr>
            </tbody>
          </table>
          <hr>
          <?php } ?>
          <table class="table  table-condensed">
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['sponsor_details'])){      ?>
                  <tr class="table-viewlabel">
                    <td class="table-label table-viewlabel"><?php echo $key+1; ?></td>
                    <td class=" table-noline"><?php echo $amendment['sponsor_details'] ; ?></td>
                  </tr>
             <?php   } } ?>
            <?php echo $this->fetch('sponsor_details'); ?>
          </table>
        </div>
        <div id="tabs-4">
          <h5>4.0 PARTICIPANTS (SUBJECTS)</h5>
          <table class="table  table-condensed">
            <tbody>
            <tr>
              <td class="table-label required"><p>Expected Number of participants in Kenya <span class="sterix">*</span></p></td>
              <td><?php echo $application['Application']['number_participants']?></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['number_participants'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['number_participants'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('number_participants'); ?>
            <tr>
              <td class="table-label"><p>Total enrolment in each Kenyan site: (if competitive enrolment, state minimum and maximum number per site.) </p></td>
              <td><?php echo $application['Application']['total_enrolment_per_site'] ?></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['total_enrolment_per_site'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['total_enrolment_per_site'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('total_enrolment_per_site'); ?>
            <tr>
              <td class="table-label required"><p>Total participants worldwide <span class="sterix">*</span></p></td>
              <td><?php echo $application['Application']['total_participants_worldwide'] ?></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['total_participants_worldwide'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['total_participants_worldwide'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('total_participants_worldwide'); ?>
            </tbody>
          </table>
          <hr>
          <h5>4.1 AGE SPAN</h5>
          <table class="table  table-condensed">
            <tbody>
            <tr>
              <td class="table-label required"><p>Less than 18 years?  <span class="sterix">*</span></p></td>
              <td><?php echo $application['Application']['population_less_than_18_years']?></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['population_less_than_18_years'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['population_less_than_18_years'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('population_less_than_18_years'); ?>
            </tbody>
          </table>
          <div class="ctr-groups">
            <p class="topper"><em class="text-success">If Yes, Specify</em></p>
            <table class="table  table-condensed">
              <tbody>
              <tr>
                <td class="table-label required"><p>In Utero <span class="sterix">*</span></p></td>
                <td><?php echo $application['Application']['population_utero']?></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['population_utero'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['population_utero'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('population_utero'); ?>
              <tr>
                <td class="table-label required"><p>Preterm Newborn Infants (up to gestational age &lt; 37 weeks) <span class="sterix">*</span></p></td>
                <td><?php echo $application['Application']['population_preterm_newborn']?></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['population_preterm_newborn'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['population_preterm_newborn'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('population_preterm_newborn'); ?>
              <tr>
                <td class="table-label required"><p>Newborn (0-28 days) <span class="sterix">*</span></p></td>
                <td><?php echo $application['Application']['population_newborn']?></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['population_newborn'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['population_newborn'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('population_newborn'); ?>
              <tr>
                <td class="table-label required"><p>Infant and toddler (29 days - 23 months) <span class="sterix">*</span></p></td>
                <td><?php echo $application['Application']['population_infant_and_toddler']?></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['population_infant_and_toddler'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['population_infant_and_toddler'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('population_infant_and_toddler'); ?>
              <tr>
                <td class="table-label required"><p>Children (2-12 years) <span class="sterix">*</span></p></td>
                <td><?php echo $application['Application']['population_children']?></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['population_children'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['population_children'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('population_children'); ?>
              <tr>
                <td class="table-label required"><p>Adolescent (13-17 years) <span class="sterix">*</span></p></td>
                <td><?php echo $application['Application']['population_adolescent']?></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['population_adolescent'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['population_adolescent'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('population_adolescent'); ?>
              </tbody>
            </table>
          </div>

          <table class="table  table-condensed">
            <tbody>
            <tr>
              <td class="table-label required"><p>18 Years and over <span class="sterix">*</span></p></td>
              <td><?php echo $application['Application']['population_above_18']?></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['population_above_18'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['population_above_18'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('population_above_18'); ?>
            </tbody>
          </table>
          <div class="ctr-groups">
            <p class="topper"><em class="text-success">If Yes, Specify</em></p>
            <table class="table  table-condensed">
              <tbody>
              <tr>
                <td class="table-label required"><p>Adult (18-65 years) <span class="sterix">*</span></p></td>
                <td><?php echo $application['Application']['population_adult']?></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['population_adult'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['population_adult'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('population_adult'); ?>
              <tr>
                <td class="table-label required"><p>Elderly (&gt; 65 years) <span class="sterix">*</span></p></td>
                <td><?php echo $application['Application']['population_elderly']?></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['population_elderly'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['population_elderly'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('population_elderly'); ?>
              </tbody>
            </table>
          </div>
          <hr>
          <h5>4.2 GROUP OF TRIAL SUBJECTS</h5>
          <hr>
            <table class="table  table-condensed">
              <tbody>
              <tr>
                <td class="table-label required"><p>Healthy volunteers <span class="sterix">*</span></p></td>
                <td><?php echo $application['Application']['subjects_healthy']?></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['subjects_healthy'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['subjects_healthy'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('subjects_healthy'); ?>
              <tr>
                <td class="table-label required"><p>Specific vulnerable populations <span class="sterix">*</span></p></td>
                <td><?php echo $application['Application']['subjects_vulnerable_populations']?></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['subjects_vulnerable_populations'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['subjects_vulnerable_populations'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('subjects_vulnerable_populations'); ?>
              </tbody>
            </table>
          <div class="ctr-groups">
            <p class="topper"><em class="text-success">Specific vulnerable populations</em></p>
            <table class="table  table-condensed">
              <tbody>
              <tr>
                <td class="table-label required"><p>Patients <span class="sterix">*</span></p></td>
                <td><?php echo $application['Application']['subjects_patients']?></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['subjects_patients'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['subjects_patients'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('subjects_patients'); ?>
              <tr>
                <td class="table-label required"><p>Women of child bearing potential <span class="sterix">*</span></p></td>
                <td><?php echo $application['Application']['subjects_women_child_bearing']?></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['subjects_women_child_bearing'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['subjects_women_child_bearing'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('subjects_women_child_bearing'); ?>
              <tr>
                <td class="table-label required"><p>Women of child bearing potential using contraception <span class="sterix">*</span></p></td>
                <td><?php echo $application['Application']['subjects_women_using_contraception']?></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['subjects_women_using_contraception'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['subjects_women_using_contraception'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('subjects_women_using_contraception'); ?>
              <tr>
                <td class="table-label required"><p>Pregnant women <span class="sterix">*</span></p></td>
                <td><?php echo $application['Application']['subjects_pregnant_women']?></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['subjects_pregnant_women'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['subjects_pregnant_women'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('subjects_pregnant_women'); ?>
              <tr>
                <td class="table-label required"><p>Nursing Women <span class="sterix">*</span></p></td>
                <td><?php echo $application['Application']['subjects_nursing_women']?></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['subjects_nursing_women'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['subjects_nursing_women'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('subjects_nursing_women'); ?>
              <tr>
                <td class="table-label required"><p>Emergency situation <span class="sterix">*</span></p></td>
                <td><?php echo $application['Application']['subjects_emergency_situation']?></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['subjects_emergency_situation'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['subjects_emergency_situation'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('subjects_emergency_situation'); ?>
              <tr>
                <td class="table-label required"><p>Subjects incapable of giving consent personally <span class="sterix">*</span></p></td>
                <td><?php echo $application['Application']['subjects_incapable_consent']?></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['subjects_incapable_consent'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['subjects_incapable_consent'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('subjects_incapable_consent'); ?>
              <tr>
                <td class="table-label required"><p>If yes, specify <span class="sterix">*</span></p></td>
                <td><?php echo $application['Application']['subjects_specify']?></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['subjects_specify'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['subjects_specify'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('subjects_specify'); ?>
              <tr>
                <td class="table-label required"><p>Others <span class="sterix">*</span></p></td>
                <td><?php echo $application['Application']['subjects_others']?></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['subjects_others'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['subjects_others'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('subjects_others'); ?>
              <tr>
                <td class="table-label required"><p>If yes, specify</p></td>
                <td><?php echo $application['Application']['subjects_others_specify']?></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['subjects_others_specify'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['subjects_others_specify'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('subjects_others_specify'); ?>
              </tbody>
            </table>
          </div>
          <hr>
          <h5>4.3 GENDER</h5>
            <table class="table  table-condensed">
              <tbody>
              <tr>
                <td class="table-label"><p></p></td>
                <td><p><?php echo ($application['Application']['gender_female']   ? $ichecked : $nchecked ); ?> Female</p></td>
              </tr>
              <tr>
                <td class="table-label table-noline"><p></p></td>
                <td class="table-noline"><p><?php echo ($application['Application']['gender_male']   ? $ichecked : $nchecked ); ?> Male</p></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['gender'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['gender'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('gender'); ?>
              </tbody>
            </table>
        </div>
        <div id="tabs-5">
          <h5>TICK AND PROVIDE NECESSARY DETAILS AS APPROPRIATE</h5>
          <hr>
          <h5>5.0 Number of Sites</h5>
          <table class="table  table-condensed">
            <tbody>
            <tr>
              <td class="table-label"><p>Single site in Kenya  <span class="sterix">*</span></p></td>
              <td><p><?php echo $application['Application']['single_site_member_state'] ; ?> </p></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['single_site_member_state'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['single_site_member_state'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('single_site_member_state'); ?>
            <tr>
              <td class="table-label"><p>If yes, name of site</p></td>
              <td><p><?php echo $application['Application']['location_of_area'] ; ?> </p></td>
            </tr>
            <tr>
              <td class="table-label"><p>Physical address</p></td>
              <td><p class="xeditable iseditable" id="data[Application][single_site_physical_address]"  data-type="text"
                data-pk="<?php echo $application['Application']['id'];?>"
              data-original-title="Update physical address"><?php echo $application['Application']['single_site_physical_address'] ; ?> </p></td>
            </tr>
            <tr>
              <td class="table-label"><p>Contact person</p></td>
              <td><p class="xeditable iseditable" id="data[Application][single_site_contact_person]"  data-type="text"
                data-pk="<?php echo $application['Application']['id'];?>"
              data-original-title="Update contact person"><?php echo $application['Application']['single_site_contact_person'] ; ?> </p></td>
            </tr>
            <tr>
              <td class="table-label"><p>Telephone</p></td>
              <td><p class="xeditable iseditable" id="data[Application][single_site_telephone]"  data-type="text"
                data-pk="<?php echo $application['Application']['id'];?>"
              data-original-title="Update telephone"><?php echo $application['Application']['single_site_telephone'] ; ?> </p></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['location_of_area'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['location_of_area'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('location_of_area'); ?>
            </tbody>
          </table>
          <div class="ctr-groups">
             <table class="table  table-condensed">
              <tbody>
            <tr>
              <td class="table-label"><p>Multiple sites in Kenya <span class="sterix">*</span></p></td>
              <td><p><?php echo $application['Application']['multiple_sites_member_state'] ; ?> </p></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['multiple_sites_member_state'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['multiple_sites_member_state'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('multiple_sites_member_state'); ?>
            <tr>
              <td class="table-label"><p>Number of sites anticipated in Kenya</p></td>
              <td><p><?php echo $application['Application']['number_of_sites'] ; ?> </p></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['number_of_sites'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['number_of_sites'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('number_of_sites'); ?>
                </tbody>
             </table>
               <hr>
            <h5 class="controls">Details of Site(s) </h5>
            <?php  foreach ($application['SiteDetail'] as $key => $siteDetail) { ?>
            <span class="badge badge-info"><?php  echo $key+1;?></span>
            <table class="table  table-condensed">
              <tbody>
              <tr>
                <td class="table-label required"><p>Name of Site </p></td>
                <td><?php echo $siteDetail['site_name']?></td>
              </tr>
              <tr>
                <td class="table-label required"><p>Physical address </p></td>
                <td><p  class="xeditable iseditable" id="data[SiteDetail][<?php echo $key;?>][physical_address]"  data-type="text"
                      data-pk="<?php echo $siteDetail['id'];?>"
                      data-original-title="Update Physical address"><?php echo $siteDetail['physical_address'] ?></p></td>
              </tr>
              <tr>
                <td class="table-label required"><p>Contact details <small style="font-weight:normal;"><em>(tel.no, p.o box..) </em></small></p></td>
                <td><?php echo $siteDetail['contact_details'] ?></td>
              </tr>
              <tr>
                <td class="table-label required"><p>Contact person</p></td>
                <td><?php echo $siteDetail['contact_person'] ?></td>
              </tr>
              <tr>
                <td class="table-label required"><p>County</p></td>
                <td><?php if($siteDetail['county_id']) echo $counties[$siteDetail['county_id']]; ?></td>
              </tr>
              </tbody>
            </table>
            <hr>
            <?php } ?>
           <table class="table  table-condensed">
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['details_of_sites'])){      ?>
                  <tr class="table-viewlabel">
                    <td class="table-label table-viewlabel"><?php echo $key+1; ?></td>
                    <td class=" table-noline"><?php echo $amendment['details_of_sites'] ; ?></td>
                  </tr>
             <?php   } } ?>
            <?php echo $this->fetch('details_of_sites'); ?>
          </table>
          </div>
          <table class="table  table-condensed">
              <tbody>
            <tr>
              <td class="table-label"><p>Multiple Countries <span class="sterix">*</span></p></td>
              <td><p><?php echo $application['Application']['multiple_countries'] ; ?> </p></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['multiple_countries'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['multiple_countries'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('multiple_countries'); ?>
            <tr>
              <td class="table-label"><p>Number of states anticipated in the trial</p></td>
              <td><p><?php echo $application['Application']['multiple_member_states'] ; ?> </p></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['multiple_member_states'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['multiple_member_states'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('multiple_member_states'); ?>
            <tr>
              <td class="table-label"><p>If yes above, list the countries</p></td>
              <td><p><?php echo $application['Application']['multi_country_list'] ; ?> </p></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['multi_country_list'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['multi_country_list'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('multi_country_list'); ?>
            <tr>
              <td class="table-label"><p>Does this trial have a data monitoring committee?  <span class="sterix">*</span> </p></td>
              <td><p><?php echo $application['Application']['data_monitoring_committee'] ; ?> </p></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['data_monitoring_committee'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['data_monitoring_committee'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('data_monitoring_committee'); ?>
                </tbody>
           </table>
                            <hr>
                            <h5>5.1</h5>
          <table class="table  table-condensed">
            <tbody>
            <tr>
              <td class="table-label"><p>Capacity of Site(s) <span class="sterix">*</span></p></td>
              <td><p><?php echo $application['Application']['staff_numbers'] ; ?> </p></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['staff_numbers'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['staff_numbers'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('staff_numbers'); ?>
                </tbody>
           </table>
        </div>
        <div id="tabs-6">
          <hr>
          <h5>6.0 INFORMATION ON PLACEBO </h5>
          <table class="table  table-condensed">
            <tbody>
            <tr>
              <td class="table-label required"><p>Is there a placebo?  <span class="sterix">*</span></p></td>
              <td><p><?php echo $application['Application']['placebo_present'] ; ?> </p></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['placebo_present'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['placebo_present'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('placebo_present'); ?>
            </tbody>
          </table>
          <div class="ctr-groups">
            <?php foreach ($application['Placebo'] as $key => $placebo) { ?>
            <span class="badge badge-info"><?php echo $key+1;?></span>
            <table class="table  table-condensed">
              <tbody>
              <tr>
                <td class="table-label required"><p>Pharmaceutical form </p></td>
                <td><?php echo $placebo['pharmaceutical_form']?></td>
              </tr>
              <tr>
                <td class="table-label"><p>Route of administration </p></td>
                <td><?php echo $placebo['route_of_administration'] ?></td>
              </tr>
              <tr>
                <td class="table-label required"><p>Composition, apart from active substance(s) </p></td>
                <td><?php echo $placebo['composition'] ?></td>
              </tr>
              <tr>
                <td class="table-label required"><p>Is it otherwise identical to the INDP?</p></td>
                <td><?php echo $placebo['identical_indp'] ?></td>
              </tr>
              <tr>
                <td class="table-label required"><p>If not, specify major ingredients</p></td>
                <td><?php echo $placebo['major_ingredients']; ?></td>
              </tr>
              </tbody>
            </table>
            <hr>
            <?php } ?>
           <table class="table  table-condensed">
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['placebos'])){      ?>
                  <tr class="table-viewlabel">
                    <td class="table-label table-viewlabel"><?php echo $key+1; ?></td>
                    <td class=" table-noline"><?php echo $amendment['placebos'] ; ?></td>
                  </tr>
             <?php   } } ?>
            <?php echo $this->fetch('placebos'); ?>
          </table>
          </div>
        </div>
        <div id="tabs-7">
          <table class="table  table-condensed">
              <tbody>
            <tr>
              <td class="table-label"><h5>7.0 PRINCIPAL INCLUSION CRITERIA <span class="sterix">*</span></h5></td>
              <td><p><?php echo $application['Application']['principal_inclusion_criteria'] ; ?> </p></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['principal_inclusion_criteria'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['principal_inclusion_criteria'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('principal_inclusion_criteria'); ?>
            <tr>
              <td class="table-label"><h5>7.1 PRINCIPAL EXCLUSION CRITERIA <span class="sterix">*</span></h5></td>
              <td><p><?php echo $application['Application']['principal_exclusion_criteria'] ; ?> </p></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['principal_exclusion_criteria'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['principal_exclusion_criteria'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('principal_exclusion_criteria'); ?>
            <tr>
              <td class="table-label"><h5>7.2 PRIMARY END POINTS <span class="sterix">*</span></h5></td>
              <td><p><?php echo $application['Application']['primary_end_points'] ; ?> </p></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['primary_end_points'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['primary_end_points'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('primary_end_points'); ?>
                </tbody>
           </table>
        </div>
        <div id="tabs-8">
          <hr>
          <h5>8.0 SCOPE OF THE TRIAL -  <span class="sterix">*</span> <small>Tick all boxes where applicable</small></h5>
          <table class="table  table-condensed">
            <tbody>
            <tr>
              <td><p class="control-nolabel"><?php echo ($application['Application']['scope_diagnosis']   ? $ichecked : $nchecked ); ?> Diagnosis</p></td>
              <td><p class="control-nolabel"><?php echo ($application['Application']['scope_prophylaxis']   ? $ichecked : $nchecked ); ?> Prophylaxis</p></td>
            </tr>
            <tr>
              <td class="table-noline"><p class="control-nolabel"><?php echo ($application['Application']['scope_therapy']   ? $ichecked : $nchecked ); ?> Therapy</p></td>
              <td class="table-noline"><p class="control-nolabel"><?php echo ($application['Application']['scope_safety']   ? $ichecked : $nchecked ); ?> Safety </p></td>
            </tr>
            <tr>
              <td class="table-noline"><p class="control-nolabel"><?php echo ($application['Application']['scope_efficacy']   ? $ichecked : $nchecked ); ?> Efficacy </p></td>
              <td class="table-noline"><p class="control-nolabel"><?php echo ($application['Application']['scope_pharmacokinetic']   ? $ichecked : $nchecked ); ?> Pharmacokinetic</p></td>
            </tr>
            <tr>
              <td class="table-noline"><p class="control-nolabel"><?php echo ($application['Application']['scope_pharmacodynamic']   ? $ichecked : $nchecked ); ?> Pharmacodynamic</p></td>
              <td class="table-noline"><p class="control-nolabel"><?php echo ($application['Application']['scope_bioequivalence']   ? $ichecked : $nchecked ); ?> Bioequivalence</p></td>
            </tr>
            <tr>
              <td class="table-noline"><p class="control-nolabel"><?php echo ($application['Application']['scope_dose_response']   ? $ichecked : $nchecked ); ?> Dose Response </p></td>
              <td class="table-noline"><p class="control-nolabel"><?php echo ($application['Application']['scope_pharmacogenetic']   ? $ichecked : $nchecked ); ?> Pharmacogenetic</p></td>
            </tr>
            <tr>
              <td class="table-noline"><p class="control-nolabel"><?php echo ($application['Application']['scope_pharmacogenomic']   ? $ichecked : $nchecked ); ?> Pharmacogenomic</p></td>
              <td class="table-noline"><p class="control-nolabel"><?php echo ($application['Application']['scope_pharmacoecomomic']   ? $ichecked : $nchecked ); ?> Pharmacoecomomic</p></td>
            </tr>
            <tr>
              <td class="table-noline"><p class="control-nolabel"><?php echo ($application['Application']['scope_others']   ? $ichecked : $nchecked ); ?> Others</p></td>
              <td class="table-noline"><p><?php echo $application['Application']['scope_others_specify']   ?> </p></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1  && !empty($amendment['scopes'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['scopes'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('scopes'); ?>
            </tbody>
          </table>
          <hr>
          <h5>8.1 TRIAL TYPE AND PHASE  <span class="sterix">*</span></h5>
          <table class="table  table-condensed">
            <tbody>
            <tr>
              <td colspan="2"><p class="control-nolabel"><?php echo ($application['Application']['trial_human_pharmacology']   ? $ichecked : $nchecked ); ?> Human pharmacology  (Phase I) </p>
              <p >Is it:</td>
            </tr>
            <tr>
              <td class="table-noline" colspan="2"><p class="control-nolabel"><?php echo ($application['Application']['trial_administration_humans']   ? $ichecked : $nchecked ); ?> First administration to humans</p></td>
            </tr>
            <tr>
              <td class="table-noline" colspan="2"><p class="control-nolabel"><?php echo ($application['Application']['trial_bioequivalence_study']   ? $ichecked : $nchecked ); ?> Bioequivalence study  </p></td>
            </tr>
            <tr>
              <td class="table-noline" colspan="2"><p class="control-nolabel"><?php echo ($application['Application']['trial_other']   ? $ichecked : $nchecked ); ?> Other</p>
                <p><?php echo $application['Application']['trial_other_specify'] ; ?> </p></td>
            </tr>
            <tr>
              <td class="table-noline" colspan="2"><p class="control-nolabel"><?php echo ($application['Application']['trial_therapeutic_exploratory']   ? $ichecked : $nchecked ); ?> Therapeutic exploratory  (Phase II)  </p></td>
            </tr>
            <tr>
              <td class="table-noline" colspan="2"><p class="control-nolabel"><?php echo ($application['Application']['trial_therapeutic_confirmatory']   ? $ichecked : $nchecked ); ?> Therapeutic confirmatory (Phase III) </p></td>
            </tr>
            <tr>
              <td class="table-noline" colspan="2"><p class="control-nolabel"><?php echo ($application['Application']['trial_therapeutic_use']   ? $ichecked : $nchecked ); ?> Therapeutic use (Phase IV) </p></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['types_and_phases'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class="table-noline"><?php echo $amendment['types_and_phases']; ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('types_and_phases'); ?>
            </tbody>
          </table>
        </div>
        <div id="tabs-9">
          <h5>9.0 DESIGN OF THE TRIAL</h5>
          <hr>
          <table class="table  table-condensed">
            <tbody>
            <tr>
              <td class="table-label"><p>Controlled <span class="sterix">*</span></p></td>
              <td><p><?php echo $application['Application']['design_controlled'] ; ?> </p></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['design_controlled'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['design_controlled'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('design_controlled'); ?>
            </tbody>
          </table>
          <div class="ctr-groups">
            <p class="topper"><em class="text-success">If Yes, Specify</em></p>

            <table class="table  table-condensed">
              <tbody>
              <tr>
                <td class="table-label"><p>Randomised <span class="sterix">*</span></p></td>
                <td><p><?php echo $application['Application']['design_controlled_randomised'] ; ?> </p></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['design_controlled_randomised'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['design_controlled_randomised'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('design_controlled_randomised'); ?>
              <tr>
                <td class="table-label"><p>Open <span class="sterix">*</span></p></td>
                <td><p><?php echo $application['Application']['design_controlled_open'] ; ?> </p></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['design_controlled_open'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['design_controlled_open'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('design_controlled_open'); ?>
              <tr>
                <td class="table-label"><p>Single Blind  <span class="sterix">*</span></p></td>
                <td><p><?php echo $application['Application']['design_controlled_single_blind'] ; ?> </p></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['design_controlled_single_blind'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['design_controlled_single_blind'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('design_controlled_single_blind'); ?>
              <tr>
                <td class="table-label"><p>Double Blind <span class="sterix">*</span></p></td>
                <td><p><?php echo $application['Application']['design_controlled_double_blind'] ; ?> </p></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['design_controlled_double_blind'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['design_controlled_double_blind'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('design_controlled_double_blind'); ?>
              <tr>
                <td class="table-label"><p>Parallel group <span class="sterix">*</span></p></td>
                <td><p><?php echo $application['Application']['design_controlled_parallel_group'] ; ?> </p></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['design_controlled_parallel_group'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['design_controlled_parallel_group'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('design_controlled_parallel_group'); ?>
              <tr>
                <td class="table-label"><p>Cross over <span class="sterix">*</span></p></td>
                <td><p><?php echo $application['Application']['design_controlled_cross_over'] ; ?> </p></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['design_controlled_cross_over'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['design_controlled_cross_over'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('design_controlled_cross_over'); ?>
              <tr>
                <td class="table-label"><p>Other <span class="sterix">*</span></p></td>
                <td><p><?php echo $application['Application']['design_controlled_other'] ; ?> </p></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['design_controlled_other'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['design_controlled_other'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('design_controlled_other'); ?>
              <tr>
                <td class="table-label"><p>If yes to other, specify </p></td>
                <td><p><?php echo $application['Application']['design_controlled_specify'] ; ?> </p></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['design_controlled_specify'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['design_controlled_specify'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('design_controlled_specify'); ?>
              <tr>
                <td class="table-label"><p>If controlled, specify the comparator</p></td>
                <td><p><?php echo $application['Application']['design_controlled_comparator'] ; ?> </p></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['design_controlled_comparator'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['design_controlled_comparator'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('design_controlled_comparator'); ?>
              <tr>
                <td class="table-label"><p>Other medicinal product(s) </p></td>
                <td><p><?php echo $application['Application']['design_controlled_other_medicinal'] ; ?> </p></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['design_controlled_other_medicinal'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['design_controlled_other_medicinal'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('design_controlled_other_medicinal'); ?>
              <tr>
                <td class="table-label"><p>Placebo</p></td>
                <td><p><?php echo $application['Application']['design_controlled_placebo'] ; ?> </p></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['design_controlled_placebo'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['design_controlled_placebo'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('design_controlled_placebo'); ?>
              <tr>
                <td class="table-label"><p>Other</p></td>
                <td><p><?php echo $application['Application']['design_controlled_medicinal_other'] ; ?> </p></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['design_controlled_medicinal_other'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['design_controlled_medicinal_other'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('design_controlled_medicinal_other'); ?>
              <tr>
                <td class="table-label"><p>If yes to other, specify</p></td>
                <td><p><?php echo $application['Application']['design_controlled_medicinal_specify'] ; ?> </p></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['design_controlled_medicinal_specify'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['design_controlled_medicinal_specify'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('design_controlled_medicinal_specify'); ?>
              </tbody>
            </table>
          </div>
        </div>
        <div id="tabs-10">
          <h5>10.0 ORGANISATIONS TO WHOM THE SPONSOR HAS TRANSFERRED TRIAL RELATED DUTIES AND FUNCTIONS </h5>
          <div class="ctr-groups">
            <p class="control-nolabel required">Has the sponsor transferred any major or all the sponsor&rsquo;s trial related duties and functions to another organisation or third party?</p>
            <p><?php echo $application['Application']['organisations_transferred_']; ?></p>

            <?php foreach ($application['Organization'] as $key => $organization) { ?>
            <span class="badge badge-info"><?php echo $key+1;?></span>
            <table class="table  table-condensed">
              <tbody>
              <tr>
                <td class="table-label required"><p>Organization <span class="sterix">*</span></p></td>
                <td><?php echo $organization['organization']?></td>
              </tr>
              <tr>
                <td class="table-label table-noline"><p>Name of contact person <span class="sterix">*</span></p></td>
                <td class="table-noline"><?php echo $organization['contact_person'] ?></td>
              </tr>
              <tr>
                <td class="table-label required table-noline"><p>Address <span class="sterix">*</span></p></td>
                <td class="table-noline"><?php echo $organization['address'] ?></td>
              </tr>
              <tr>
                <td class="table-label required table-noline"><p>Telephone Number <span class="sterix">*</span></p></td>
                <td class="table-noline"><?php echo $organization['telephone_number'] ?></td>
              </tr>
              <tr>
                <td class="table-label required table-noline"><p>All tasks of the sponsor <span class="sterix">*</span></p></td>
                <td class="table-noline"><?php echo $organization['all_tasks']; ?></td>
              </tr>
              <tr>
                <td class="table-label required table-noline"><p>Monitoring  <span class="sterix">*</span></p></td>
                <td class="table-noline"><?php echo $organization['monitoring']; ?></td>
              </tr>
              <tr>
                <td class="table-label required table-noline"><p>Regulatory (e.g. preparation of applications to CA and ethics committee) <span class="sterix">*</span></p></td>
                <td class="table-noline"><?php echo $organization['regulatory']; ?></td>
              </tr>
              <tr>
                <td class="table-label required table-noline"><p>Investigator Recruitment <span class="sterix">*</span></p></td>
                <td class="table-noline"><?php echo $organization['investigator_recruitment']; ?></td>
              </tr>
              <tr>
                <td class="table-label required table-noline"><p>IVRS &mdash; treatment randomisation <span class="sterix">*</span></p></td>
                <td class="table-noline"><?php echo $organization['ivrs_treatment_randomisation']; ?></td>
              </tr>
              <tr>
                <td class="table-label required table-noline"><p>Data management <span class="sterix">*</span></p></td>
                <td class="table-noline"><?php echo $organization['data_management']; ?></td>
              </tr>
              <tr>
                <td class="table-label required table-noline"><p>E-data capture  <span class="sterix">*</span></p></td>
                <td class="table-noline"><?php echo $organization['e_data_capture']; ?></td>
              </tr>
              <tr>
                <td class="table-label required table-noline"><p>SUSAR reporting <span class="sterix">*</span></p></td>
                <td class="table-noline"><?php echo $organization['susar_reporting']; ?></td>
              </tr>
              <tr>
                <td class="table-label required table-noline"><p>Quality assurance auditing <span class="sterix">*</span></p></td>
                <td class="table-noline"><?php echo $organization['quality_assurance_auditing']; ?></td>
              </tr>
              <tr>
                <td class="table-label required table-noline"><p>Statistical analysis <span class="sterix">*</span></p></td>
                <td class="table-noline"><?php echo $organization['statistical_analysis']; ?></td>
              </tr>
              <tr>
                <td class="table-label required table-noline"><p>Medical Writing <span class="sterix">*</span></p></td>
                <td class="table-noline"><?php echo $organization['medical_writing']; ?></td>
              </tr>
              <tr>
                <td class="table-label required table-noline"><p>Other duties subcontracted <span class="sterix">*</span></p></td>
                <td class="table-noline"><?php echo $organization['other_duties']; ?></td>
              </tr>
              <tr>
                <td class="table-label required table-noline"><p>If yes to other, please specify</p></td>
                <td class="table-noline"><?php echo $organization['other_duties_specify']; ?></td>
              </tr>
              </tbody>
            </table>
            <hr>
             <?php } ?>
           <table class="table  table-condensed">
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['organizations'])){      ?>
                  <tr class="table-viewlabel">
                    <td class="table-label table-viewlabel"><?php echo $key+1; ?></td>
                    <td class=" table-noline"><?php echo $amendment['organizations'] ; ?></td>
                  </tr>
             <?php   } } ?>
            <?php echo $this->fetch('organizations'); ?>
          </table>
          </div>
        </div>
        <div id="tabs-11">
          <h5>11.0 OTHER DETAILS</h5>
          <hr>
          <table class="table table-condensed">
            <thead>
            <tr class="control-nolabel"><th colspan="2"><h5> 11.1 If the trial is to be conducted in Kenya and not in the host country of the applicant / sponsor, provide an explanation <span class="sterix">*</span></h5></th></tr>
            </thead>
            <tbody>
            <tr><td colspan="2"><?php echo $application['Application']['other_details_explanation'] ?></td> </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['other_details_explanation'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['other_details_explanation'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('other_details_explanation'); ?>
            </tbody>
          </table>
          <table class="table table-condensed">
            <thead>
            <tr class="control-nolabel"><th colspan="2"><h5> 11.2 Estimated duration of trial <span class="sterix">*</span></h5></th></tr>
            </thead>
            <tbody>
            <tr><td colspan="2"><?php echo $application['Application']['estimated_duration'] ?></td>  </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['estimated_duration'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['estimated_duration'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('estimated_duration'); ?>
            </tbody>
          </table>
          <table class="table table-condensed">
            <thead>
            <tr class="control-nolabel"><th colspan="2"><h5> 11.3 Name other Regulatory Authorities to  which applications to do this trial have been submitted, but approval has not yet been granted. Include date(s) of application: <span class="sterix">*</span></h5></th></tr>
            </thead>
            <tbody>
            <tr><td colspan="2"><?php echo $application['Application']['other_details_regulatory_notapproved'] ?></td>  </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['other_details_regulatory_notapproved'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['other_details_regulatory_notapproved'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('other_details_regulatory_notapproved'); ?>
            </tbody>
          </table>
          <table class="table table-condensed">
            <thead>
            <tr class="control-nolabel"><th colspan="2"><h5> 11.4 Name other Regulatory Authorities which have approved this trial, date(s) of approval and number of sites per country.  <span class="sterix">*</span></h5></th></tr>
            </thead>
            <tbody>
            <tr><td colspan="2"><?php echo $application['Application']['other_details_regulatory_approved'] ?></td> </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['other_details_regulatory_approved'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['other_details_regulatory_approved'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('other_details_regulatory_approved'); ?>
            </tbody>
          </table>
          <table class="table table-condensed">
            <thead>
            <tr class="control-nolabel"><th colspan="2"><h5> 11.5 if applicable, name other Regulatory  Authorities or Ethics Committees which have rejected this trial and give reasons for rejection:<span class="sterix">*</span></h5></th></tr>
            </thead>
            <tbody>
            <tr><td colspan="2"><?php echo $application['Application']['other_details_regulatory_rejected'] ?></td> </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['other_details_regulatory_rejected'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['other_details_regulatory_rejected'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('other_details_regulatory_rejected'); ?>
            </tbody>
          </table>
          <table class="table table-condensed">
            <thead>
            <tr class="control-nolabel"><th colspan="2"><h5> 11.6 If applicable, details of and reasons for this trial having been halted at any stage by other Regulatory Authorities: <span class="sterix">*</span></h5></th></tr>
            </thead>
            <tbody>
            <tr><td colspan="2"><?php echo $application['Application']['other_details_regulatory_halted'] ?></td> </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['other_details_regulatory_halted'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['other_details_regulatory_halted'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('other_details_regulatory_halted'); ?>
            </tbody>
          </table>
        </div>

        <div id="tabs-12">
          <h5>CHECKLIST <span class="sterix">*</span></h5>
          <table class="table  table-condensed">
            <tbody>
            <tr>
              <td style="width:5%;"><p  class="control-checklabel">1. </p></td>
              <td><p class="control-nolabel required"><?php echo ($application['Application']['applicant_covering_letter']   ? $ichecked : $nchecked ); ?> Cover Letter <span class="sterix">*</span></p>
                <?php
                  if (!empty($application['CoverLetter'])) {
                    foreach ($application['CoverLetter'] as $key => $value) {
                      echo '<p>';
                       echo $this->Html->link(__($value['basename']),
                         array('controller' => 'attachments',  'action' => 'download', $value['id'],
                           'full_base' => true),
                         array('class' => 'btn btn-info'));
                       echo '</p>';
                      }
                    }
                ?>
                </td>
            </tr>
            <?php
            /*/ pr($application['Amendment']);
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['CoverLetter'][0]['basename'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('other_details_regulatory_halted'); */ ?>
            <tr>
              <td><p  class="control-checklabel">2. </p></td>
              <td><p class="control-nolabel required">
                        <?php echo ($application['Application']['applicant_protocol']   ? $ichecked : $nchecked ); ?> Protocol
                        <span class="sterix">*</span></p>
                <?php
                  if (!empty($application['Protocol'])) {
                    foreach ($application['Protocol'] as $key => $value) {
                      echo '<p>';
                       echo $this->Html->link(__($value['basename']),
                         array('controller' => 'attachments',  'action' => 'download', $value['id'],
                           'full_base' => true),
                         array('class' => 'btn btn-info'));
                       echo '</p>';
                      }
                    }
                ?>
                </td>
            </tr>
            <tr>
              <td><p  class="control-checklabel">3. </p></td>
              <td><p class="control-nolabel required"><?php echo ($application['Application']['applicant_patient_information']   ? $ichecked : $nchecked ); ?> Patient Information leaflet and Informed consent form <span class="sterix">*</span></p>
                <?php
                  if (!empty($application['PatientLeaflet'])) {
                    foreach ($application['PatientLeaflet'] as $key => $value) {
                      echo '<p>';
                       echo $this->Html->link(__($value['basename']),
                         array('controller' => 'attachments',  'action' => 'download', $value['id'],
                           'full_base' => true),
                         array('class' => 'btn btn-info'));
                       echo '</p>';
                      }
                    }
                ?>
                </td>
            </tr>
            <tr>
              <td><p  class="control-checklabel">4. </p></td>
              <td><p class="control-nolabel required"> <?php echo ($application['Application']['applicant_investigators_brochure']   ? $ichecked : $nchecked ); ?> Investigators Brochure/Package inserts or Investigational Medicinal Product Dossier (IMPD) <span class="sterix">*</span></p>
                <?php
                  if (!empty($application['Brochure'])) {
                    foreach ($application['Brochure'] as $key => $value) {
                      echo '<p>';
                       echo $this->Html->link(__($value['basename']),
                         array('controller' => 'attachments',  'action' => 'download', $value['id'],
                           'full_base' => true),
                         array('class' => 'btn btn-info'));
                       echo '</p>';
                      }
                    }
                ?>
                </td>
            </tr>
            <tr>
              <td><p  class="control-checklabel">5. </p></td>
              <td><p class="control-nolabel required"><?php echo ($application['Application']['applicant_gmp_certificate']   ? $ichecked : $nchecked ); ?> GMP certificate of the investigational product <span class="sterix">*</span></p>
                <?php
                  if (!empty($application['GmpCertificate'])) {
                    foreach ($application['GmpCertificate'] as $key => $value) {
                      echo '<p>';
                       echo $this->Html->link(__($value['basename']),
                         array('controller' => 'attachments',  'action' => 'download', $value['id'],
                           'full_base' => true),
                         array('class' => 'btn btn-info'));
                       echo '</p>';
                      }
                    }
                ?>
                </td>
            </tr>
            <tr>
              <td><p  class="control-checklabel">6. </p></td>
              <td><p class="control-nolabel required"><?php echo ($application['Application']['applicant_investigators_cv']   ? $ichecked : $nchecked ); ?> Signed investigator(s) CV(s) <span class="sterix">*</span></p>
                <?php
                  if (!empty($application['Cv'])) {
                    foreach ($application['Cv'] as $key => $value) {
                      echo '<p>';
                       echo $this->Html->link(__($value['basename']),
                         array('controller' => 'attachments',  'action' => 'download', $value['id'],
                           'full_base' => true),
                         array('class' => 'btn btn-info'));
                       echo '</p>';
                      }
                    }
                ?>
                </td>
            </tr>
            <tr>
              <td><p  class="control-checklabel">7. </p></td>
              <td><p class="control-nolabel required"><?php echo ($application['Application']['applicant_financial_declaration']   ? $ichecked : $nchecked ); ?> Financial declaration by Sponsor and/or PI <span class="sterix">*</span></p>
                <?php
                  if (!empty($application['Finance'])) {
                    foreach ($application['Finance'] as $key => $value) {
                      echo '<p>';
                       echo $this->Html->link(__($value['basename']),
                         array('controller' => 'attachments',  'action' => 'download', $value['id'],
                           'full_base' => true),
                         array('class' => 'btn btn-info'));
                       echo '</p>';
                      }
                    }
                ?>
                </td>
            </tr>
            <tr>
              <td><p  class="control-checklabel">8. </p></td>
              <td><p class="control-nolabel required"><?php echo ($application['Application']['applicant_signed_declaration']   ? $ichecked : $nchecked ); ?> Signed Declaration by Sponsor or Principal investigator.  <span class="sterix">*</span></p>
                <?php
                  if (!empty($application['Declaration'])) {
                    foreach ($application['Declaration'] as $key => $value) {
                      echo '<p>';
                       echo $this->Html->link(__($value['basename']),
                         array('controller' => 'attachments',  'action' => 'download', $value['id'],
                           'full_base' => true),
                         array('class' => 'btn btn-info'));
                       echo '</p>';
                      }
                    }
                ?>
                </td>
            </tr>
            <tr>
              <td><p  class="control-checklabel">9. </p></td>
              <td><p class="control-nolabel required"><?php echo ($application['Application']['applicant_indemnity_cover']   ? $ichecked : $nchecked ); ?> Indemnity cover and Insurance Certificate for the participants <span class="sterix">*</span></p>
                <?php
                  if (!empty($application['IndemnityCover'])) {
                    foreach ($application['IndemnityCover'] as $key => $value) {
                      echo '<p>';
                       echo $this->Html->link(__($value['basename']),
                         array('controller' => 'attachments',  'action' => 'download', $value['id'],
                           'full_base' => true),
                         array('class' => 'btn btn-info'));
                       echo '</p>';
                      }
                    }
                ?>
                </td>
            </tr>
            <tr>
              <td><p  class="control-checklabel">10. </p></td>
              <td><p class="control-nolabel required"><?php echo ($application['Application']['applicant_opinion_letter']   ? $ichecked : $nchecked ); ?> Copy of favourable opinion letter from the local Institutional Review Board (IRB)
                    and Ethics committee. <span class="sterix">*</span></p>
                <?php
                  if (!empty($application['OpinionLetter'])) {
                    foreach ($application['OpinionLetter'] as $key => $value) {
                      echo '<p>';
                       echo $this->Html->link(__($value['basename']),
                         array('controller' => 'attachments',  'action' => 'download', $value['id'],
                           'full_base' => true),
                         array('class' => 'btn btn-info'));
                       echo '</p>';
                      }
                    }
                ?>
                </td>
            </tr>
            <tr>
              <td><p  class="control-checklabel">11. </p></td>
              <td><p class="control-nolabel"><?php echo ($application['Application']['applicant_approval_letter']   ? $ichecked : $nchecked ); ?> Copy of approval letter(s) from collaborating institutions or other regulatory authorities, if applicable</p>
                <?php
                  if (!empty($application['ApprovalLetter'])) {
                    foreach ($application['ApprovalLetter'] as $key => $value) {
                      echo '<p>';
                       echo $this->Html->link(__($value['basename']),
                         array('controller' => 'attachments',  'action' => 'download', $value['id'],
                           'full_base' => true),
                         array('class' => 'btn btn-info'));
                       echo '</p>';
                      }
                    }
                ?>
                </td>
            </tr>
            <tr>
              <td><p  class="control-checklabel">12. </p></td>
              <td><p class="control-nolabel required"><?php echo ($application['Application']['applicant_statement']   ? $ichecked : $nchecked ); ?> A signed statement by the applicant indicating that all information contained in, or
                    referenced by, the application is complete and accurate and is not false or misleading. <span class="sterix">*</span></p>
                <?php
                  if (!empty($application['Statement'])) {
                    foreach ($application['Statement'] as $key => $value) {
                      echo '<p>';
                       echo $this->Html->link(__($value['basename']),
                         array('controller' => 'attachments',  'action' => 'download', $value['id'],
                           'full_base' => true),
                         array('class' => 'btn btn-info'));
                       echo '</p>';
                      }
                    }
                ?>
                </td>
            </tr>
            <tr>
              <td><p  class="control-checklabel">13. </p></td>
              <td><p class="control-nolabel"><?php echo ($application['Application']['applicant_participating_countries']   ? $ichecked : $nchecked ); ?> Where the trial is part of an international study, sufficient information regarding the other participating countries and the scope of the study in these countries.</p>
                <?php
                  if (!empty($application['ParticipatingStudy'])) {
                    foreach ($application['ParticipatingStudy'] as $key => $value) {
                      echo '<p>';
                       echo $this->Html->link(__($value['basename']),
                         array('controller' => 'attachments',  'action' => 'download', $value['id'],
                           'full_base' => true),
                         array('class' => 'btn btn-info'));
                       echo '</p>';
                      }
                    }
                ?>
                </td>
            </tr>
            <tr>
              <td><p  class="control-checklabel">14. </p></td>
              <td><p class="control-nolabel"><?php echo ($application['Application']['applicant_addendum']   ? $ichecked : $nchecked ); ?> For multicentre/multi-site studies, an addendum for each of the sites should be provided upon initial application.</p>
                <?php
                  if (!empty($application['Addendum'])) {
                    foreach ($application['Addendum'] as $key => $value) {
                      echo '<p>';
                       echo $this->Html->link(__($value['basename']),
                         array('controller' => 'attachments',  'action' => 'download', $value['id'],
                           'full_base' => true),
                         array('class' => 'btn btn-info'));
                       echo '</p>';
                      }
                    }
                ?>
                </td>
            </tr>
            <tr>
              <td><p  class="control-checklabel">15. </p></td>
              <td><p class="control-nolabel required"><?php echo ($application['Application']['applicant_fees']   ? $ichecked : $nchecked ); ?> Fees - <small>A receipt to the sum of US$ 1000.00 (or equivalent in Kenya Shillings) per
              proposal towards payment of application fees (paid at the PPB&rsquo;s accounts office). </small> <span class="sterix">*</span></p>
                <?php
                  if (!empty($application['Fee'])) {
                    foreach ($application['Fee'] as $key => $value) {
                      echo '<p>';
                       echo $this->Html->link(__($value['basename']),
                         array('controller' => 'attachments',  'action' => 'download', $value['id'],
                           'full_base' => true),
                         array('class' => 'btn btn-info'));
                       echo '</p>';
                      }
                    }
                ?>
                </td>
            </tr>
            </tbody>
          </table>
        </div>
        <div id="tabs-13">
          <h5>DECLARATION BY APPLICANT</h5>
          <hr>
          <p>We, the undersigned have submitted all requested and required documentation, and have disclosed all
            information which may influence the approval of this application. </p>

          <p>We, the undersigned, agree to ensure that if the above-said clinical trial is approved, it will be conducted
            according to the submitted protocol and Kenyan legal, ethical and regulatory requirements. </p>

          <table class="table  table-condensed">
            <tbody>
            <tr>
              <td class="table-label required"><p>Applicant (local contact) <span class="sterix">*</span></p></td>
              <td><p><?php echo $application['Application']['declaration_applicant'] ; ?> </p></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['declaration_applicant'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['declaration_applicant'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('declaration_applicant'); ?>
            <tr>
              <td class="table-label required table-noline"><p> </p></td>
              <td class="table-noline"><p><?php echo $application['Application']['declaration_date1'] ; ?> </p></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['declaration_date1'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['declaration_date1'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('declaration_date1'); ?>
            <tr>
              <td class="table-label required"><p>National Principal Investigator / National Co-ordinator / Other (state designation) </p></td>
              <td><p><?php echo $application['Application']['declaration_principal_investigator'] ; ?> </p></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['declaration_principal_investigator'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['declaration_principal_investigator'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('declaration_principal_investigator'); ?>
            <tr>
              <td class="table-label required table-noline"><p></p></td>
              <td class="table-noline"><p><?php echo $application['Application']['declaration_date2'] ; ?> </p></td>
            </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['declaration_date2'])){      ?>
                  <tr class="table-viewlabel">
                      <td class="table-viewlabel"><?php echo $key+1; ?></td>
                      <td class=" table-noline"><?php  echo $amendment['declaration_date2'];  ?></td>
                   </tr>
             <?php   } } ?>
             <?php echo $this->fetch('declaration_date2'); ?>
            </tbody>
          </table>
        </div>
        <div id="tabs-14">
            <?php
              echo $this->element('multi/amendment_attachments'); ?>
            <div style="background-color: #F9F9F9;">
            <table class="table  table-condensed">
              <tbody>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['Attachment'])){      ?>
                  <tr class="table-viewlabel">
                    <td class="table-viewlabel"><?php echo $key+1; ?></td>
                    <td class=" table-noline">

                      <?php if(!empty($amendment['Attachment'])) { ?>
                      <table class="table table-bordered  table-condensed table-striped">
                         <thead>
                           <tr id="attachmentsTableHeader">
                           <th>#</th>
                           <th>File</th>
                           <th>Text Description</th>
                            <th>  </th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            // pr($application['Attachment']);
                            for ($i = 0; $i <= count($amendment['Attachment'])-1; $i++) {
                          ?>
                            <tr>
                            <td><?php echo $i+1; ?></td>
                            <td><?php
                              echo $this->Html->link(__($amendment['Attachment'][$i]['basename']),
                                array('controller' => 'attachments',  'action' => 'download',
                                  $amendment['Attachment'][$i]['id'], 'full_base' => true), array('class' => 'btn btn-info'));
                              ?>
                              <small class="muted">- Uploaded on <?php echo $amendment['Attachment'][$i]['created'];?></small>
                            </td>
                            <td>
                              <?php
                                echo $amendment['Attachment'][$i]['description'];
                              ?>
                            </td>
                            <td>

                            </td>
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                        <?php } ?>

                    </td>
                  </tr>
              <?php   } } ?>
            </tbody>
            </table>
            </div>

           <table class="table  table-condensed">
            <thead>
            <tr><th class="table-label required" colspan="2"><h5>Any other comment(s)</h5></th></tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="2"><?php echo $application['Application']['notification'] ?></td>
              </tr>
            <?php
              foreach($application['Amendment']  as $key => $amendment) {
                if($amendment['submitted'] == 1 && !empty($amendment['notification'])){      ?>
                  <tr class="table-viewlabel">
                    <td class="table-label table-viewlabel"><?php echo $key+1; ?></td>
                    <td class=" table-noline"><?php echo $amendment['notification'] ; ?></td>
                  </tr>
             <?php   } } ?>
            <?php echo $this->fetch('notification'); ?>
          </tbody>
          </table>

        </div>
        <div id="tabs-15">              
          <?php echo $this->element('multi/approval'); ?>
        </div>
        <?php  if ($this->fetch('is-applicant') == 'true') { ?>
          <?php  if ($application['Application']['approved']) { ?>
            <div id="tabs-16">
              <?php echo $this->element('multi/final'); ?>
            </div>
          <?php } ?>
        <?php } else { ?>
          <div id="tabs-16">
              <?php echo $this->element('multi/final'); ?>
            </div>
        <?php } ?>

      </div>
      <?php echo $this->Form->end(); ?>

  <?php echo $this->fetch('view-rightbar'); ?>
</div>

<?php  echo $this->fetch('endjs');  ?>
