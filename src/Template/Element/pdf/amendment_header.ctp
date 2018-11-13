<?php
  use Cake\Utility\Hash;
  if($prefix === 'manager') {
    $this->Html->css('bootstrap-editable', ['block' => true]);
    $this->Html->css('bootstrap/common_header', ['block' => true]);
    $this->Html->script('bootstrap/bootstrap-editable', ['block' => true]);
    // $this->Html->script('bootstrap/amendment_header', ['block' => true]);
    //--wysiwyg editor    
    $this->Html->css('bootstrap/bootstrap-wysihtml5', ['block' => true]);
    $this->Html->script('bootstrap/wysihtml5-0.3.0', ['block' => true]);
    $this->Html->script('bootstrap/bootstrap-wysihtml5', ['block' => true]);
    $this->Html->script('bootstrap/wysihtml5', ['block' => true]);
  }
?>

  <div class="row">
    <div class="col-xs-12">
      
        <table class="table table-bordered table-striped table-condensed evaluation-table">
          <tbody>
            <tr>
              <th>Clinical Trial Ref No</th>
              <td><?= $application->protocol_no ?></td>
            </tr>
            <tr>
              <th>Date Amendment received</th>
              <td><?= $application->date_submitted ?></td>
            </tr>
            <tr>
              <th>Principal investigator</th>
              <td><?= $application->investigator_contacts[0]['given_name'] ?></td>
            </tr>
            <tr>
              <th>Current approved protocol Version</th>
              <td><?= $application->protocol_version ?></td>
            </tr>
            <tr>
              <th>Previous amendment to date</th>
              <td>
                <?php
                    if (count($application->amendments) > 1) {
                      echo $application->amendments[count($application->amendments)-1]['date_submitted'];
                   } 
                ?>
               </td>
            </tr>
            <tr>
              <th>Title of clinical trial</th>
              <td>Public Title/Acronym: <?= $application->public_title ?><br>
                  Scientific Title: <?= $application->scientific_title ?></td>
            </tr>
          </tbody>
        </table>
    </div>
  </div>
