<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?= $this->Html->script('highcharts/highcharts', ['block' => true]); ?>
<?= $this->Html->script('highcharts/modules/exporting', ['block' => true]); ?>
<?= $this->Html->script('reports/protocols_per_year', ['block' => true]); ?>

<div class="row">
<h3 class="page-header text-center"><img alt="" src="/img/report.ico" style="width: 35px;">&nbsp; Protocols per year</h3>
    <div class="col-xs-12 col-sm-12">
      <div id="protocols-year"></div>
    </div>
</div>
