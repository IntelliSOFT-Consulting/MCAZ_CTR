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
                            <td>
                                <!-- get the first stage of the application -->
                                <?php

                                // get the count of the stages
                                $stageCount = count($application->application_stages);
                                $stageCount = $stageCount - 1;
                                // get the first stage
                                $end_date = null;
                                if($stageCount > 0) {
                                    $stage = $application->application_stages[$stageCount];
                                    $end_date = $stage->stage_date;
                                } else {
                                    $end_date = null;
                                }
                                $start_stage_date = $application->application_stages[0]->stage_date;

                                if(!empty($end_date) && !empty($start_stage_date)) {
                                    //display all the dates falling in the range
                                    $date1 = new DateTime($start_stage_date);
                                    $date2 = new DateTime($end_date);

                                    // get all the dates in between in an array
                                    $dates = array();
                                    //get day name 
                                    $name = $start_stage_date->format('l');
                                    //get the date in the format of 2017-01-01
                                    $start_stage_date = $start_stage_date->format('Y-m-d');
                                    $dates[] = $start_stage_date;
                                    //get the number of days between the two dates
                                    $count = $date1->diff($date2)->days;
                                    
                                    if($count > 0) { 
                                        for($i=1; $i<$count; $i++) {
                                            $date1->modify('+1 day');
                                            $name = $date1->format('l');
                                            //add a flag to the date to indicate if it is a weekend
                                            if($name == 'Saturday' || $name == 'Sunday') {
                                                $dates[] = $date1->format('Y-m-d').' Weekend';
                                            } else {
                                                $dates[] = $date1->format('Y-m-d');
                                            } 
                                            //remove the weekends from the array
                                            $dates = array_filter($dates, function($value) {
                                                return strpos($value, 'Weekend') === false;
                                            });

                                        }
                                    } 
                                
                                    // get the day name of the last date
                                    $name = $end_date->format('l');
                                    $end_date = $end_date->format('Y-m-d');
                                    $dates[] = $end_date;
                                    //remove duplicates from the array and make it unique
                                    $dates = array_unique($dates);
                                    //count the number of days in the array
                                    $days = count($dates);
                                    //if days==1 then return 0
                                    if($days == 1) {
                                        $days=0;
                                    } 

                                    echo $days.' days';

                                } else {
                                    echo 'N/A';
                                }

                                ?>
                            </td>
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