<?php
      $this->Html->script('bootstrap-editable', array('inline' => false));
      $this->Html->css('bootstrap-editable', null, array('inline' => false));
    ?>
  <form class="form-horizontal" style="margin: 0px">
      <table class="table table-condensed table-intable" style="margin: 0px">
        <tbody>
            <tr>
              <td colspan="2"><strong class="<?php
              if (count($application['Review']) < 3) {
                  echo 'text-error';
              } elseif (count($application['Review']) == 3) {
                  echo 'text-success';
              } elseif (count($application['Review']) > 3) {
                  echo 'text-warning';
              }
              ?>">Assigned Reviewers: <?php echo count($application['Review']); ?></strong><br/>
              <?php
                  foreach ($application['Review'] as $akey => $avalue) {
                      echo $users[$avalue['user_id']].", ";
                  }
                ?>
              </td>
            </tr>
            <?php if($application['Application']['deactivated']) { ?>
            <tr>
              <td><strong class="text-warning">Deactivated!!</strong></td>
              <td>
                <span class="text-warning">Please contact PPB.</span></td>
            </tr>
            <?php } ?>
            <tr>
              <td><strong>Approval Status</strong></td>
              <td>
                <span>
                  <?php
                    if($application['Application']['approved'] == 2)  echo "<i class='icon-ok'></i> Approved";
                    elseif($application['Application']['approved'] == 1)  echo "<i class='icon-remove'></i> Rejected!!";
                    elseif($application['Application']['approved'] == 0)  echo "<i class='icon-time'></i> in review";
                    // else echo "<span class='text-error'><i class='icon-remove'></i></span>";
                  ?>
                </span>
              </td>
            </tr>
            <tr>
              <td><strong>Trial Status</strong></td>
              <td>
                <span>
                  <?php
                    if(!empty($application['Application']['trial_status_id'])) echo $trial_statuses[$application['Application']['trial_status_id']];
                    else echo "<em>(not set!)</em>";
                  ?>
                </span>
              </td>
            </tr>
            <tr>
              <td>Submitted to ppb</td>
              <td><span><?php
                if($application['Application']['submitted'])
                  echo "<span class='text-success'><i class='icon-ok'></i> <em>(submitted!)</em></span>";
                else echo "<span class='text-error'><i class='icon-remove'></i> <em>(not submitted!)</em></span>";
            ?></span></td>
            </tr>
            <tr>
              <td  style="width: 50%; padding-right: 0px;">Protocol Date</td>
              <td><?php echo $application['Application']['date_of_protocol']; ?></td>
            </tr>
            <tr>
              <td colspan="2">Created on &nbsp; : &nbsp; <?php echo date('d-m-Y h:i a', strtotime($application['Application']['created'])); ?></td>
            </tr>

            <?php if(!empty($application['Application']['approval_date']) && !empty($application['Application']['date_submitted'])) { ?>
            <tr>
                <td colspan="2">
                  Duration from submit to approve: <br/>
                  <p class="xeditable" data-type="date" data-name="data[Application][date_submitted]"
                      data-url="/admin/applications/view/<?php echo $application["Application"]["id"];?>"
                      data-pk="<?php echo $application['Application']['id'];?>"
                      data-original-title="Update submission date">
                  <?php echo date('d-m-Y', strtotime($application['Application']['date_submitted']));?>
                </p>
                            <small> -to- </small>
                  <p class="xeditable" data-type="date" data-name="data[Application][approval_date]"
                      data-url="/admin/applications/view/<?php echo $application["Application"]["id"];?>"
                      data-pk="<?php echo $application['Application']['id'];?>"
                      data-original-title="Update approval date">
                  <?php echo $application['Application']['approval_date'];?>
                 </p>
                 <br/>
                  <?php
                          //echo date('d-m-Y H:i', strtotime($application['Application']['date_submitted']))." &#8212; " ;
                          //echo date('d-m-Y H:i', strtotime($application['Application']['approval_date']));
                           $start_date_ = new DateTime($application['Application']['date_submitted']);
                           $end_date_ = new DateTime($application['Application']['approval_date']);
                           $dd = date_diff($end_date_, $start_date_);
                          // //pr($dd);
                          // //To get hours use $dd->h, minutes - $dd->i, seconds - $dd->s.
                           echo "Y = $dd->y, M = $dd->m, D = $dd->d: &sum; days = $dd->days";
                  ?>
                </td>
              </tr>
              <?php  } ?>

        </tbody>
      </table>
 </form>


<script text="type/javascript">
$.expander.defaults.slicePoint = 170;
$.fn.editable.defaults.mode = 'popup';
$(function() {
  //$('#data\\[Application\\]\\[approval_date\\] ,  #data\\[Application\\]\\[date_submitted\\]').editable({
  $('.xeditable').editable({
      //url: '/admin/applications/view/<?php echo $application["Application"]["id"];?>',
      ajaxOptions: {
           dataType: 'json' //assuming json response
      },
      params: function(params) {
        var data = {};
        data['_method'] = 'POST';
        data['data[Application][id]'] = params.pk;
        data[params.name] = params.value;
        return data;
      },
      format: 'dd-mm-yyyy',
      viewformat: 'dd-mm-yyyy',
      datepicker: {
             firstDay: 1
      }
    });

});
</script>
