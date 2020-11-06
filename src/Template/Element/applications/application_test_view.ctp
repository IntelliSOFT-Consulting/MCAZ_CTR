<?php
  $this->assign('MyApplications', 'active');
  $checked = '<i class="fa fa-check-square-o" aria-hidden="true"></i>';
  $nChecked = '<i class="fa fa-square-o" aria-hidden="true"></i>';
  $numb = 1;
?>

<span id="amendment_cnt" style="display: none;"> <?php
  if(isset($amendment)) {
    preg_match_all('!\d+!', $amendment->protocol_no, $matches);
    echo $matches[0][2];
  }
  
  //count($application['amendments'])
 ?></span>

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
               <tr class="amender amender<?= $key+1 ?>">
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
               <tr class="amender amender<?= $key+1 ?>">
                  <th><?php echo $key+1; ?></th>
                  <td><?= $amendment->scientific_title ?></td>
               </tr>
             <?php   } } ?>
            
          </table>

          
      </div>

      


    </div>
  </div>
</div>
 
