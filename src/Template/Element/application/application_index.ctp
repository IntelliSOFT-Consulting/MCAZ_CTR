<div class="row-fluid">
  <div class="span12">

    <?php echo $this->fetch('header'); ?>
    <?php
          $thp = $tte = $ttc = $ttu =  '';
          if (isset($this->request->params['named']['trial_human_pharmacology'])) {
            if($this->request->params['named']['trial_human_pharmacology'] == '1') {
                  $thp = 'active';
            }
          } elseif (isset($this->request->params['named']['trial_therapeutic_exploratory'])) {
            if($this->request->params['named']['trial_therapeutic_exploratory'] == '1') {
                  $tte = 'active';
            }
          } elseif (isset($this->request->params['named']['trial_therapeutic_confirmatory'])) {
            if($this->request->params['named']['trial_therapeutic_confirmatory'] == '1') {
                  $ttc = 'active';
            }
          } elseif (isset($this->request->params['named']['trial_therapeutic_use'])) {
            if($this->request->params['named']['trial_therapeutic_use'] == '1') {
                  $ttu = 'active';
            }
          }
    ?>
    <div class="row-fluid">
        <div class="span2">
          <div class="well" style="width:165px; padding:8px;">
            <ul class="nav nav-list">
              <li class="nav-header"> Filter Results By </li>
              <li class="divider"></li>
              <?php echo $this->fetch('admin-sidebar'); ?>
              <li class="nav-header"><small><i class="icon-glass"></i> Trial Phase</small></li>
              <li class="<?php echo $thp; ?>">
                <?php
                  echo $this->Html->link('<i class="icon-hand-right"></i>Phase I -  <br> <small class="muted">Human pharmacology</small>',
                            array('action' => 'index', 'trial_human_pharmacology'=>'1'), array('escape' => false));
                ?>
              </li>
              <li class="<?php echo $tte; ?>">
                <?php
                  echo $this->Html->link('<i class="icon-hand-right"></i>Phase II -  <small class="muted">Therapeutic exploratory</small>',
                            array('action' => 'index', 'trial_therapeutic_exploratory'=>'1'), array('escape' => false));
                ?>
              </li>
              <li class="<?php echo $ttc; ?>">
                <?php
                  echo $this->Html->link('<i class="icon-hand-right"></i>Phase III - <small class="muted">Therapeutic confirmatory</small> ',
                            array('action' => 'index', 'trial_therapeutic_confirmatory'=>'1'), array('escape' => false));
                ?>
              </li>
              <li class="<?php echo $ttu; ?>">
                <?php
                  echo $this->Html->link('<i class="icon-hand-right"></i>Phase IV - <small class="muted">Therapeutic use</small>',
                            array('action' => 'index', 'trial_therapeutic_use'=>'1'), array('escape' => false));
                ?>
              </li>
              <?php echo $this->fetch('sidebar'); ?>
              <li class="divider"></li>
            </ul>
          </div>
        </div>

        <div class="span10">
      <?php
        echo $this->Form->create('Application', array(
          'url' => array_merge(array('action' => 'index'), $this->params['pass']),
          'class' => 'ctr-groups', 'style'=>array('padding:9px;', 'background-color: #F5F5F5'),
        ));
      ?>
      <div class="row-fluid">
        <div class="span12">
          <table class="table table-condensed table-bordered" style="margin-bottom: 2px;">
            <thead>
            <tr>
              <th style="width: 15%;">
              <?php
                if($thp) echo $this->Form->input('Application.trial_human_pharmacology', array('type' => 'hidden', 'value' => 1));
                if($tte) echo $this->Form->input('Application.trial_therapeutic_exploratory', array('type' => 'hidden', 'value' => 1));
                if($ttc) echo $this->Form->input('Application.trial_therapeutic_confirmatory', array('type' => 'hidden', 'value' => 1));
                if($ttu) echo $this->Form->input('Application.trial_therapeutic_use', array('type' => 'hidden', 'value' => 1));

                echo $this->fetch('persistent-search');

                echo $this->Form->input('protocol_no',
                    array('div' => false, 'class' => 'span12 unauthorized_index', 'label' => array('class' => 'required', 'text' => 'Protocol No.')));
              ?>
              </th>
              <th>
              <?php
                echo $this->Form->input('filter', array('div' => false, 'class' => 'span12 unauthorized_index',
                  'label' => array('class' => 'required', 'text' => 'Study Title'),
                  'type' => 'text',
                  ));
              ?>
              </th>
              <th>
              <?php
                echo $this->Form->input('investigator', array('div' => false, 'class' => 'span12 unauthorized_index',
                  'label' => array('class' => 'required', 'text' => 'Principal Investigator(s)'),
                  'type' => 'text',
                  ));
              ?>
              </th>
              <th>
              <?php
                echo $this->Form->input('sites', array('div' => false, 'class' => 'span12 unauthorized_index',
                  'label' => array('class' => 'required', 'text' => 'Name of Site / County'),
                  'type' => 'text',
                  ));
              ?>
              </th>
              <th>
                <?php
                  echo $this->Form->input('pages', array(
                    'type' => 'select', 'div' => false, 'class' => 'span12', 'selected' => $this->request->params['paging']['Application']['limit'],
                    'empty' => true,
                    'options' => $page_options,
                    'label' => array('class' => 'required', 'text' => 'Pages'),
                  ));
                ?>
              </th>
              <th rowspan="2" style="width: 14%;">
                <?php
                  echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array(
                      'class' => 'btn btn-inverse', 'div' => 'control-group', 'div' => false,
                      'style' => array('margin-bottom: 5px')
                  ));

                  echo $this->Html->link('<i class="icon-remove"></i> Clear', array('action' => 'index'), array('class' => 'btn', 'escape' => false));
                ?>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr id="searchmore" style="display: none;">
              <td colspan="2">
              <?php
                echo $this->Form->input('start_date',
                  array('div' => false, 'type' => 'text', 'class' => 'input-small unauthorized_index', 'after' => '-to-',
                      'label' => array('class' => 'required', 'text' => 'Application Create Dates'), 'placeHolder' => 'Start Date'));
                echo $this->Form->input('end_date',
                  array('div' => false, 'type' => 'text', 'class' => 'input-small unauthorized_index',
                       'after' => '<a style="font-weight:normal" onclick="$(\'.unauthorized_index\').val(\'\');" >
                            <em class="accordion-toggle">clear!</em></a>',
                      'label' => false, 'placeHolder' => 'End Date'));
              ?>
              </td>
              <td>
                <?php
                  //pr($this->request->params); //REMEMBER to limit this for administrators and managers only
                  if($this->fetch('is-admin') == 'true' || $this->fetch('is-manager') == 'true') {
                      echo $this->Form->input('users', array(
                        'type' => 'select', 'div' => false, 'class' => 'span12',
                        'empty' => true,
                        'options' => $users,
                        'label' => array('class' => 'required', 'text' => 'Reviewers'),
                      ));
                  }
                ?>
              </td>
              <td colspan="3">
                <!-- Remaining space for detailed search-->
              </td>
            </tr>
          </tbody>
         </table>
         <a href="#"  id='moresearch' class="muted"><small><i class="icon-caret-right"></i> Extended search...</small></a>
      </div>
      </div>
        <p>
          <?php
            echo $this->Paginator->counter(array(
            'format' => __('Page <span class="badge">{:page}</span> of <span class="badge">{:pages}</span>,
                    showing <span class="badge">{:current}</span> Applications out of
                    <span class="badge badge-inverse">{:count}</span> total, starting on record <span class="badge">{:start}</span>,
                    ending on <span class="badge">{:end}</span>')
            ));
          ?>
          </p>
    <?php echo $this->Form->end(); ?>
          <div class="pagination">
            <ul>
            <?php
              echo $this->Paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), null, array('class' => 'disabled', 'tag' => 'li', 'escape' => false));
              echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active'));
              echo $this->Paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), null, array('class' => 'disabled', 'tag' => 'li', 'escape' => false ));
            ?>
            </ul>
          </div>

      <div class="row-fluid">
        <?php
        // pr($applications);
          if(count($applications) >  0) { ?>
            <table  class="table  table-bordered table-striped">
            <thead>
              <tr>
                <th style="width:3%">#</th>
                <th style="width: 13%"><?php echo $this->Paginator->sort('protocol_no'); ?></th>
                <th style="width: 26%;"><?php echo $this->Paginator->sort('study_title'); ?></th>
                <th style="width: 26%;">Investigator(s) &amp; Site(s)</th>
                <th style="width: 27%">Application Status </th>
                <th style="width: 5%;"><i class="icon-link"></i></th>
              </tr>
            </thead>
            <tbody>
            <?php
            $counder = ($this->request->paging['Application']['page'] - 1) * $this->request->paging['Application']['limit'];
            foreach ($applications as $application):
            ?>
              <tr class="<?php if ($this->fetch('color-codes') == 'true') {
                  if($application['Application']['deactivated']) echo 'text-warning';
                  if($application['Application']['approved'] == 1) echo 'text-error';
                  if($application['Application']['approved'] == 2) echo 'text-success';
                } ?>">
                <td><p class="tablenums"><?php $counder++; echo $counder;?>.</p></td>
                <td>
                  <?php
                        if($application['Application']['submitted']) echo $this->Html->link($application['Application']['protocol_no'],
                                         array('action' => 'view', $application['Application']['id']), array('escape'=>false));
                        else echo $this->Html->link($application['Application']['protocol_no'],
                                         array('action' => 'edit', $application['Application']['id']), array('escape'=>false));
                  ?>
                  &nbsp;</td>
                <td class="morecontent"> 
                  <b><?php   echo $application["Application"]["short_title"]; ?> </b> </br>&nbsp; 
                  <?php   echo strip_tags(str_replace("\\n", "&nbsp;", $application["Application"]["study_title"])); ?> &nbsp; 
                </td>
                <td class="morecontent">
                  <small><strong style="text-decoration:underline;">Principal Investigator(s)</strong></small><br>
                  <?php
                        $cound = 1;
                        foreach ($application['InvestigatorContact'] as $investigator) {
                          echo $cound.'. '.$investigator['given_name'].' '.$investigator['middle_name'].' '.$investigator['family_name'];
                          echo "<br>";
                          $cound++;
                        }
                  ?>
                  <small><strong style="text-decoration:underline;">Site(s) in Kenya</strong></small><br>
                 <?php
                        $cound = 1;
                        if(!empty($application['Application']['location_of_area'])) echo $application['Application']['location_of_area']."<br>";
                        else foreach ($application['SiteDetail'] as $site) {
                          echo $cound.'. '.$site['site_name'];
                          if(!empty($site['County'])) echo ' <small class="muted">('.$site['County']['county_name'].' county)</small>';
                          echo "<br>";
                          $cound++;
                        }?> &nbsp; </td>
                <td>
                  <?php //echo $this->fetch('attributes'); ?>
                  <?php echo $this->element($this->fetch('attributes'), array('application' => $application)); ?>
                  <?php  // echo $this->element('application/attributes/applicant_attributes', array('application' => $application)); ?>
                </td>

                <td>
                  <?php
                        if ($this->fetch('is-applicant') == 'true') {
                          if($application['Application']['submitted']) echo $this->Html->link('<span class="label label-info"> View </span>',
                                           array('action' => 'view', $application['Application']['id']), array('escape'=>false));
                          else echo $this->Html->link('<span class="label label-success"> Edit </span>',
                                           array('action' => 'edit', $application['Application']['id']), array('escape'=>false));
                        } else {
                           if(!$application['Application']['deleted'])  echo $this->Html->link('<span class="label label-info"> View </span>',
                                           array('action' => 'view', $application['Application']['id']), array('escape'=>false));
                        }
                       if ($this->fetch('quick-pdf') == 'true') echo $this->Html->link('<i class="icon-download-alt"></i> PDF Download',
                          array('action' => 'view', 'ext' => 'pdf', $application['Application']['id']),
                          array('escape'=>false, 'class' => 'btn btn-block',  'style'=>'padding:7px; margin-top: 10px;'));
                        echo "<br><br>";

                       if ($this->fetch('is-admin') == 'true') {
                          if ($application['Application']['deleted']) {
                              echo $this->Html->link('<span class="label label-inverse"> Undelete </span>',
                                  array('action' => 'delete', $application['Application']['id'], 0, 'admin' => true),   array('escape'=>false));
                          } elseif (!$application['Application']['deleted']) {
                              echo $this->Html->link('<span class="label label-important"> Delete </span>',
                                  array('action' => 'delete', $application['Application']['id'], 'admin' => true),   array('escape'=>false));
                          }
                          echo "<br><br>";
                          if($application['Application']['submitted']) {
                             echo $this->Form->postLink(__('<span class="label label-warning">Unsubmit</span>'), array('action' => 'unsubmit',
                              $application['Application']['id']), array('escape' => false), __('Are you sure you want to Unsubmit Application No. %s? The user will be able to edit it!', $application['Application']['id']));
                          }
                      }
                  ?>
                </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
            </table>
        <?php } else { ?>
          <p>There were no reports that met your search criteria.</p>
        <?php } ?>
      </div> <!-- /row-fluid -->
        </div>
      </div>

  </div>
</div>
<script type="text/javascript">
$.expander.defaults.slicePoint = 220;
$(function() {
  $(".morecontent").expander();
  var adates = $('#ApplicationStartDate, #ApplicationEndDate').datepicker({
          minDate:"-100Y",
          maxDate:"-0D",
          dateFormat:'dd-mm-yy',
          format: 'dd-mm-yyyy',
          endDate: '-0d',
          showButtonPanel:true,
          changeMonth:true,
          changeYear:true,
          showAnim:'show',
          onSelect: function( selectedDate ) {
            var option = this.id == "ApplicationStartDate" ? "minDate" : "maxDate",
              instance = $( this ).data( "datepicker" ),
              date = $.datepicker.parseDate(
                instance.settings.dateFormat ||
                $.datepicker._defaults.dateFormat,
                selectedDate, instance.settings );
            adates.not( this ).datepicker( "option", option, date );
          }
        });
  // $('#searchmore').hide();
  $(document).ready(function(){
      if (window.location.href.indexOf("admin") > -1 || window.location.href.indexOf("manager") > -1) {
        $("#moresearch").trigger("click");
      }
  });

  $('#moresearch').on("click", function() {
    if($('#searchmore').is(':hidden')) {
      $('#searchmore').show();
      $(this).html('<small><i class="icon-caret-up"></i> Extended search...</small>');
    } else {
      $('#searchmore').hide();
      $(this).html('<small><i class="icon-caret-right"></i> Extended search...</small>');
    }
  });


});
</script>
