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
                <table class="table table-striped table-bordered">
                    <thead>
                        <th>Protocol No</th>
                        <th>Approval Time</th>
                        <th>MCAZ Time</th>
                        <th>Applicant Time</th>
                        <th>Stage Time</th>
                        <th>Mean Time</th>
                        <th>Median Time</th>
                    </thead>
                    <tbody>
                        <?php foreach ($applications as $application): ?>
                        <tr>
                            <td><?php echo (($application->submitted == 2) ? $application->protocol_no : $application->created);?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <?php 
                                    $prev_date = null;
                                    foreach ($application->application_stages as $application_stage) {
                                        $curr_date = (($application_stage->alt_date)) ?? $application_stage->stage_date;
                                        echo '<b>'.$application_stage->stage->name.'</b> : ';
                                        echo (!empty($prev_date)) ? $curr_date->diffInDays($prev_date) : 0;
                                        echo ' Days <br>';
                                        $prev_date = $curr_date;
                                    }
                                ?>
                            </td>
                            <td></td>
                            <td></td>

                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>


        </div>


    </div>
    <?php echo $this->fetch('endjs') ?>
</div>
</div>

<?= $this->fetch('submit_buttons') ?>