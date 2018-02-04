<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?= $this->Html->script('highcharts/highcharts', ['block' => true]); ?>
<?= $this->Html->script('highcharts/modules/exporting', ['block' => true]); ?>
<?= $this->Html->script('index_report', ['block' => true]); ?>

<div class="row">
<h1 class="page-header text-center"><img alt="" src="/img/report.ico" style="width: 37px;">&nbsp; Reports</h1>
    <div class="col-xs-6 col-sm-6">
      <div id="protocols-year"></div>
    </div>

    <div class="col-xs-6 col-sm-6 placeholder">
      <div id="protocols-month"></div>
    </div>
    

</div>

