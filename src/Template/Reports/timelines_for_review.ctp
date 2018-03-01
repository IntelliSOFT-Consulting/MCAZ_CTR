<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?= $this->Html->script('highcharts/highcharts', ['block' => true]); ?>
<?= $this->Html->script('highcharts/highcharts-more', ['block' => true]); ?>
<?= $this->Html->script('highcharts/modules/exporting', ['block' => true]); ?>
<?= $this->Html->script('reports/timelines_for_review', ['block' => true]); ?>

<div class="row">
<h3 class="page-header text-center"><img alt="" src="/img/report.ico" style="width: 35px;">&nbsp; Timelines for Review</h3>
    <div class="col-xs-12 col-sm-12">
      <div id="timelines-review"></div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12">
      <div id="timelines-for-review"></div>
    </div>
</div>
