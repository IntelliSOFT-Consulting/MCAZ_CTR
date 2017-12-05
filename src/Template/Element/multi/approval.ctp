<div class="row-fluid">
   <div class="span12">
      <?php
      if ($this->fetch('is-applicant') == 'true') {
        echo $this->Form->input('trial_status_id', array(
          'options'=>$trial_statuses, 'empty' => true, 'selected' => $application['Application']['trial_status_id'],
          'label' => array('class' => 'control-label required', 'text' => 'Current status of the trial <span class="sterix">*</span>'),
        ));
      } else {
        echo '<p class="lead"><strong>Current status of the trial</strong>: '.$trial_statuses[$application['Application']['trial_status_id']].'</p>';
      }
      ?>
      </div>
  </div>
  
<div class="row-fluid">
  <div class="span12">

    <h4>14. Request for continued approval </h4>
    <hr>
    <?php
        // pr($application['AnnualApproval']);
function recursive_array_search($needle,$haystack) {
    foreach($haystack as $key=>$value) {
        $current_key=$key;
        if($needle===$value OR (is_array($value) && recursive_array_search($needle,$value) !== false)) {
            return $current_key;
        }
    }
    return false;
}

        $formdata = array(
            array('description' => 'Cover letter requesting for the annual renewal'),
            array('description' => 'Continue approval letter for the Ethical Review Committee (ERC) on record'),
            array('description' => 'Progress report'),
            array('description' => 'Latest Data and Safety Monitoring Board\'s (DSMB) report'),
            array('description' => 'SAE cumulative log'),
            array('description' => 'Updated Information Brochure and/or Package insert'),
          );
         $default = array('id' => '', 'model' => '', 'file' => '', 'foreign_key' => '', 'dirname' => '', 'basename' => '',
             'checksum' => '', 'alternative' => '', 'group' => '', 'description' => '', 'year' => '', 'created' => '', 'modified' => '', 'path' => '');
      $sortedYears = array();
      foreach ($application['AnnualApproval'] as $key => $value) {
           $sortedYears[$value['year']][$key] = $value;
      }

      // search for the current year in sorted years here. If not present, insert with empty array wich will be dully set below
      if (!isset($sortedYears[date('Y')]))  $sortedYears[date('Y')] = array();
      // $sortedYears[2012] = array($default);

      foreach ($sortedYears as $key => $item) {
          foreach ($formdata as $omega) {
            $whatIndex = recursive_array_search($omega['description'], $item);
             if ($whatIndex == '' && $whatIndex !== 0 && $whatIndex !== '0') {
                 $sortedYears[$key][] = array_merge($default, $omega);
             }
          }
      }
    ?>

    <?php
        foreach($sortedYears as $year => $items) {
    ?>
    <h4 class="text-success"><i class="icon-pushpin"></i> <?php echo $year;?>:</h4>
    <table id="buildapprovalsform"  class="table table-bordered  table-condensed table-striped">
      <thead>
        <tr id="approvalsTableHeader">
        <th>#</th>
        <th style="width: 9%;"><?php echo $year;?>  </th>
        <th style="width: 45%;">Description</th>
        <th>File <span class="sterix">*</span><small class="muted"> - (kindly upload all files)</small></th>
        <th style="width: 8%"> </th>
        </tr>
      </thead>
      <tbody>
        <?php
            $count = 0;
            foreach ($items as $key => $item) {
              $count++;
        ?>
        <tr>
        <td><?php echo $count; ?></td>
        <td>
          <?php
            echo $this->Form->input('AnnualApproval.'.$key.'.id', array('type'=>'hidden'));
            echo $this->Form->input('AnnualApproval.'.$key.'.model', array('type'=>'hidden', 'value'=>'Application'));
            echo $this->Form->input('AnnualApproval.'.$key.'.group', array('type'=>'hidden', 'value'=>'annual_approval'));
            echo $this->Form->input('AnnualApproval.'.$key.'.filesize', array('type' => 'hidden'));
            echo $this->Form->input('AnnualApproval.'.$key.'.basename', array('type' => 'hidden'));
            echo $this->Form->input('AnnualApproval.'.$key.'.checksum', array('type' => 'hidden'));

            echo $this->Form->input('AnnualApproval.'.$key.'.year', array(
              'type' => 'text' , 'label' => false, 'between' => false, 'after' => false, 'div' => false, 'value' => $year,
              'readonly' => 'readonly', 'class' => 'span11'));
          ?>

        </td>
        <td>
          <?php
          echo $this->Form->input('AnnualApproval.'.$key.'.description', array('type' => 'hidden', 'value' => $item['description']));
              // echo $this->Form->input('AnnualApproval.'.$key.'.description', array(
              //   'type' => 'hidden', 'value' => $value['description'], 'readonly' => 'readonly',
              //   'label' => false, 'between' => false, 'rows' => '1', 'after' => false, 'class' => 'span12',));
              echo '<p>'.$item['description'].'</p>';
          ?>
        </td>
        <td>
          <div style="margin-bottom: 5px;">
          <?php
            // echo $this->Form->input('AnnualApproval.'.$key.'.id');

              if($item['id']) {
                  echo $this->Html->link(__($item['basename']),
                    array('controller' => 'attachments', 'action' => 'download', $item['id'], 'full_base' => true),
                    array('class' => 'btn btn-info')
                  );
                  echo ' - <small class="muted">'.$item['modified'].'</small>';

                  if ($this->fetch('is-applicant') == 'true') echo '<button id="AnnualApproval'.$item['id'].'" type="button" style="margin-left:10px;"
                            class="btn btn-mini btn-danger delete_file_link">&nbsp;<i class="icon-trash"></i>&nbsp;</button>';
              } else {
                 if ($this->fetch('is-applicant') == 'true')  echo $this->Form->input('AnnualApproval.'.$key.'.file', array(
                    'label' => false, 'between' => false, 'after' => false, 'div' => false, 'class' => 'span12 input-file',
                    'error' => array('escape' => false, 'attributes' => array( 'class' => 'help-block')),
                    'type' => 'file',
                  ));
              }

          ?>
          </div>
          <div class="progress progress-striped active" style="display: none; width: 85%;">
            <div class="bar" style="width: 0%;"></div>
          </div>
        </td>
        <td>
            <!-- <a href="#" data-original-title="Add a file" class="btn tiptip add-approval"><i class="icon-plus"></i> Add</a> -->
            <?php
             if ($this->fetch('is-applicant') == 'true') {
                echo $this->Form->button('<i class="icon-plus"></i> Add', array(
                    'name' => 'addApproval',
                    'type' => 'button',
                    'class' => 'btn add-approval tiptip',
                    'data-original-title' => "Add a file",
                    'div' => false,
                  ));
              }
            ?>
        </td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
    <?php
          }
      ?>

    <?php
      if ($this->fetch('is-applicant') == 'true') {
    ?>
    <h3>Past years</h3>
    <hr>
    <h5><i class="icon-file"></i> Change the year if need be and upload all the files: </h5>
    <table id="pastyears"  class="table table-bordered  table-condensed table-striped">
      <thead>
        <tr id="approvalsTableHeader">
        <th>#</th>
        <th style="width: 10%;">    <?php
              end($sortedYears);
              $date = key($sortedYears) - 1;
            echo $this->Form->input('Fake.year', array(
              'type' => 'text' , 'label' => false, 'between' => false, 'after' => false, 'div' => false, 'value' => $date, 'readonly' => 'readonly',
              'data-original-title' => "Click here to change years",
              'class' => 'span12 kayear tiptip'));
          ?>  </th>
        <th style="width: 45%;">Description</th>
        <th>File <span class="sterix">*</span></th>
        <th style="width: 8%"> </th>
        </tr>
      </thead>
      <tbody>
        <?php
            foreach ($formdata as $key => $value) {
        ?>
        <tr>
        <td><?php echo $key+1; ?></td>
        <td>
          <?php
            echo $this->Form->input('AnnualApproval.'.$key.'.model', array('type'=>'hidden', 'value'=>'Application'));
            echo $this->Form->input('AnnualApproval.'.$key.'.group', array('type'=>'hidden', 'value'=>'annual_approval'));
            echo $this->Form->input('AnnualApproval.'.$key.'.filesize', array('type' => 'hidden'));
            echo $this->Form->input('AnnualApproval.'.$key.'.basename', array('type' => 'hidden'));
            echo $this->Form->input('AnnualApproval.'.$key.'.checksum', array('type' => 'hidden'));

            echo $this->Form->input('AnnualApproval.'.$key.'.year', array(
              'type' => 'text' , 'label' => false, 'between' => false, 'after' => false, 'div' => false,
              'readonly' => 'readonly', 'class' => 'span11 approvalyear'));
          ?>

        </td>
        <td>
          <?php
              echo $this->Form->input('AnnualApproval.'.$key.'.description', array('type' => 'hidden', 'value' => $value['description']));
              echo '<p>'.$value['description'].'</p>';
          ?>
        </td>
        <td><?php
            // echo $this->Form->input('AnnualApproval.'.$key.'.id');
            echo $this->Form->input('AnnualApproval.'.$key.'.file', array(
              'label' => false, 'between' => false, 'after' => false, 'div' => false, 'class' => 'span12 input-file',
              'error' => array('escape' => false, 'attributes' => array( 'class' => 'help-block')),
              'type' => 'file',
            ));
          ?>
        </td>
        <td>
            <?php
              echo $this->Form->button('<i class="icon-plus"></i> Add', array(
                  'name' => 'addApproval',
                  'type' => 'button',
                  'class' => 'btn add-approval tiptip',
                  'data-original-title' => "Add a file",
                  'div' => false,
                ));
            ?>
        </td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
    <?php } ?>
  </div><!--/span-->
</div><!--/row-->
