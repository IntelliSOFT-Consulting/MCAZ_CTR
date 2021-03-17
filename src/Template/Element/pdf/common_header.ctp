<?php
  use Cake\Utility\Hash;
  if($prefix === 'manager' || $prefix === 'evaluator') {
    $this->Html->css('bootstrap-editable', ['block' => true]);
    $this->Html->css('bootstrap/common_header', ['block' => true]);
    $this->Html->script('bootstrap/bootstrap-editable', ['block' => true]);
    $this->Html->script('bootstrap/common_header', ['block' => true]);
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
              <th>Title of Study:</th>
              <td>Public Title/Acronym: <?= $application->public_title ?><br>
                  Scientific Title: <?= $application->scientific_title ?></td>
            </tr>
            <tr>
              <th>Study Ref:</th>
              <td><?= $application->protocol_no ?></td>
            </tr>
            <tr>
              <th>Study Design:</th>
              <td id="study-design" 
                  data-type="wysihtml5" data-pk="<?= $application->id ?>" 
                  data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'commonHeader',  'prefix' => 'manager', $application->id, '_ext' => 'json']); ?>" 
                  data-name="evaluation_header[study_design]"
                  data-title="Update study design">
                  <p>
                  <?php echo (empty($application->evaluation_header->study_design)) ? $application->design_controlled : $application->evaluation_header->study_design ?></p>                    
              </td>
            </tr>
            <tr>
              <th>Study Site(s):</th>
              <td><?php
                echo $application->location_of_area.', '.$application->single_site_name.', '.implode(', ', Hash::extract($application['site_details'], '{n}.site_name'))."<br>";
                echo implode(";<br> ", Hash::format($application['amendments'], ['{n}.location_of_area', '{n}.created'], '<small class="muted">%2$s</small>: %1$s <br>'));
                echo implode(";<br> ", Hash::format($application['amendments'], ['{n}.single_site_name', '{n}.created'], '<small class="muted">%2$s</small>: %1$s <br>'));
                echo implode(";<br> ", Hash::format($application['amendments'], ['{n}.site_details.{n}.site_name', '{n}.created'], '<small class="muted">%2$s</small>: %1$s <br>'));
                ?></td>
            </tr>
            <tr>
              <th>Population:</th>
              <td id="population" 
                  data-type="wysihtml5" data-pk="<?= $application->id ?>" 
                  data-url="<?= $this->Url->build(['controller' => 'Applications', 'action' => 'commonHeader',  'prefix' => 'manager', $application->id, '_ext' => 'json']); ?>" 
                  data-name="evaluation_header[population]"
                  data-title="Update population">
                  <p><?php 
                        $value = (empty($application->evaluation_header->population)) ? $application->participants_description : $application->evaluation_header->population;
                        echo preg_replace('/(<[^>]*) style=("[^"]+"|\'[^\']+\')([^>]*>)/i', '$1$3', $value);
                      ?> </p>                 
              </td>
            </tr>
            <tr>
              <th>Study Objectives:</th>
              <td><?= preg_replace('/(<[^>]*) style=("[^"]+"|\'[^\']+\')([^>]*>)/i', '$1$3', $application->abstract_of_study) ?></td>
            </tr>
            <tr>
              <th>Applicant:</th>
              <td><?= implode(', ', Hash::extract($application['investigator_contacts'], '{n}.given_name')) ?></td>
            </tr>
            <tr>
              <th>Sponsor:</th>
              <td><?= $application->sponsor_name.', '.implode(', ', Hash::extract($application['sponsors'], '{n}.sponsor')) ?></td>
            </tr>
          </tbody>
        </table>
    </div>
  </div>
