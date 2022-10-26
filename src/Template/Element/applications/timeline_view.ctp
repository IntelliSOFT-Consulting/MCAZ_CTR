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

                        <!-- Start -->
                        <?php 
                                    $prev_date = null;
                                    $total_days = 0;
                                    //array of stage name and days
                                    $stage_days_array = array();
                                    $mcaz_time = 0;
                                    $applicant_time = 0;
                                    //array of days only
                                    $days_array = array();
                                    foreach ($application->application_stages as $application_stage) {
                                        $curr_date = (($application_stage->alt_date)) ?? $application_stage->stage_date;
                                        $stage_name ='<b>'.$application_stage->stage->name.'</b> : <br>'; 
                                      
                                        if(!empty($curr_date) && !empty($prev_date)) {
                                            //get the days between the two dates
                                            $date1 = new DateTime($prev_date);
                                            $date2 = new DateTime($curr_date);
                                            $count = $date1->diff($date2)->days;
                                            //get the day name 
                                            $name = $date1->format('l');
                                            //get the date in the format of 2017-01-01
                                            $prev_date = $date1->format('Y-m-d');
                                            $curr_date = $date2->format('Y-m-d');
                                            //get the number of days between the two dates
                                            $count = $date1->diff($date2)->days;
                                            //loop through the dates and get the number of days
                                            $dates = array();
                                            $dates[] = $prev_date;

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
                                            $dates[] = $curr_date;
                                            //remove duplicates from the array and make it unique
                                            $dates = array_unique($dates);

                                            //for each date in the array, echo the date and the day name
                                            
                                            //count the number of days in the array
                                            $days = count($dates);
                                            //if days==1 then return 0
                                            if($days == 1) {
                                                $days=0;
                                            }
                                           $stage_days=  $days.' Days<br>';
                                            $total_days += $days;
                                            $days_array[] = $days;
                                        }else{
                                           $stage_days=  '0 Days<br>';
                                            $total_days += 0;
                                        }  

                                        //applicant time = days under correspondence stage
                                        if($application_stage->stage->name == 'ApplicantResponse') {
                                            $applicant_time += $days;
                                        }

                                        $mcaz_time= $total_days - $applicant_time;

                                        //add the stage name and days to the array
                                        $stage_days_array[] = $stage_name.$stage_days;
                                        $prev_date = $curr_date;
                                    } 
                                ?>

                        <!-- End -->
                            <td><?php echo (($application->submitted == 2) ? $application->protocol_no : $application->created);?></td>
                            <td><?php echo $total_days .' Days';?></td>
                            <td><?php echo $mcaz_time .' Days'; ?></td>
                            <td><?php echo $applicant_time .' Days';?></td>
                            <td><?php

                                foreach ($stage_days_array as $stage_days) {
                                    echo $stage_days;
                                }
                            
                            ?></td>
                            <td>
                            <?php
                            //divide the total days by the number of stages
                            $days_per_stage = $total_days/count($application->application_stages);
                            //limit the number of decimal places to 2
                            $days_per_stage = number_format($days_per_stage, 2);
                            echo $days_per_stage.' Days'; 
                            ?>
                            </td>
                            <td>

                            <?php

                            
                            //order days_array in ascending order
                            sort($days_array);
                                                  
                            //split the array into two halves
                            $half = count($days_array) / 2;
                            //if the array has an odd number of elements, then get the middle element
                            if(count($days_array) % 2) {
                                $median = $days_array[$half];
                            } else {
                                //if the array has an even number of elements, then get the average of the two middle elements
                                $median = ($days_array[$half-1] + $days_array[$half]) / 2;
                            }
                            echo $median.' Days'; 
                            ?>
                            </td>

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