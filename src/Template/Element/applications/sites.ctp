<div>
  <table class="table table-condensed vertical-table">  
    <tr>
      <td colspan="2">
        <h4 class="text-center text-warning">ACTIVATE/CLOSE SITES</h4>
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
    <?php if($application->single_site_member_state == 'Yes') { ?>
      <tr>
        <th></th>
        <td><button class="btn btn-primary btn-xs">Close</button></td>
      </tr>
    <?php } ?>
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
        <h5 class="controls">Details of Site(s) </h5>
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
      <tr>
        <th></th>
        <td><button class="btn btn-primary btn-xs">Close</button></td>
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

</div>