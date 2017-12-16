<?php
      $this->Html->script('bootstrap-editable', array('inline' => false));
      $this->Html->css('bootstrap-editable', null, array('inline' => false));
    ?>
  <form class="form-horizontal" style="margin: 0px">
      <table class="table table-condensed table-intable" style="margin: 0px">
        <tbody>
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
                    $assoc = array();
                    foreach ($trial_statuses as $i => $value) {
                            $assoc[] = array('value' => $i, 'text' => $value);
                    }
                    // print_r(json_encode($assoc));
                    if(!empty($application['Application']['trial_status_id'])) {
                  ?>
                  <p class="<?php if($application["Application"]["submitted"] == 1) echo "xeditable tiptip";?> " data-type="select" data-name="data[Application][trial_status_id]"
                          data-url="/applicant/applications/view/<?php echo $application["Application"]["id"];?>"
                          data-pk="<?php echo $application['Application']['id'];?>"
                          data-original-title="Update trial status">                                          
                    <?php  echo $trial_statuses[$application['Application']['trial_status_id']]; ?>
                  </p>
                  <?php
                    }
                    else { 
                  ?>                      
                      <p class="<?php if($application["Application"]["submitted"] == 1) echo "xeditable tiptip";?>" data-type="select" data-name="data[Application][trial_status_id]"
                          data-url="/applicant/applications/view/<?php echo $application["Application"]["id"];?>"
                          data-pk="<?php echo $application['Application']['id'];?>"
                          data-original-title="Update trial status">
                      <em>&laquo;(click to set!)&raquo;</em>
                    </p>
                  <?php
                    }
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
        </tbody>
      </table>
 </form>

<script text="type/javascript">
$.fn.editable.defaults.mode = 'popup';
$(function() {
  //$('#data\\[Application\\]\\[approval_date\\] ,  #data\\[Application\\]\\[date_submitted\\]').editable({
  $('.xeditable').editable({
      //url: '/admin/applications/view/<?php echo $application["Application"]["id"];?>',
      ajaxOptions: {
           dataType: 'json' //assuming json response
      },
      value: <?php if(isset($application['Application']['trial_status_id'])) echo $application['Application']['trial_status_id'] ;
                   else echo 0; ?>,
      source: <?php echo json_encode($assoc);?>,
      params: function(params) {
        var data = {};
        data['_method'] = 'POST';
        data['data[Application][id]'] = params.pk;
        data[params.name] = params.value;
        return data;
      }
      // ,
      // success: function(response, newValue) {
      //   //console.log(response);
      //   //if(response.status == 'error') return response.msg; //msg will be shown in editable form
      //   return response.message;
      // }
    });

});
</script>