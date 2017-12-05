
  <form class="form-horizontal" style="margin: 0px">
      <table class="table table-condensed table-intable" style="margin: 0px">
        <tbody>
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
              <td  style="width: 40%; padding-right: 0px;">Protocol Date</td>
              <td><?php echo $application['Application']['date_of_protocol']; ?></td>
            </tr>
        </tbody>
      </table>
 </form>
