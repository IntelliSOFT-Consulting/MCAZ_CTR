<?php
  use Cake\Utility\Hash;
?>

<div class="row">
    <div class="col-xs-12">

        <table class="table table-bordered table-striped table-condensed evaluation-table">
          <tbody>
            <tr>
              <th>Title of Study:</th>
              <td><?= $application->scientific_title ?></td>
            </tr>
            <tr>
              <th>Study Ref:</th>
              <td><?= $application->protocol_no ?></td>
            </tr>
            <tr>
              <th>Study Site(s):</th>
              <td><?php
                echo $application->location_of_area.', '.$application->single_site_name.', ';
                ?></td>
            </tr>
            <tr>
              <th>Population:</th>
              <td><?= $application->participants_description ?></td>
            </tr>
            <tr>
              <th>Study Objectives:</th>
              <td><?= $application->abstract_of_study ?></td>
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