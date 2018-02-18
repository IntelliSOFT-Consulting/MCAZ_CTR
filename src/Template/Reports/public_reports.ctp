
<?= $this->Html->script('highcharts/highcharts', ['block' => true]); ?>
<?= $this->Html->script('highcharts/modules/exporting', ['block' => true]); ?>
<?= $this->Html->script('reports/protocols_per_year', ['block' => true]); ?>
<?= $this->Html->script('reports/protocols_per_month', ['block' => true]); ?>
<?= $this->Html->script('reports/research_area', ['block' => true]); ?>
<?= $this->Html->script('reports/protocols_per_phase', ['block' => true]); ?>

<h1 class="page-header text-center"><img alt="" src="/img/report.ico" style="width: 37px;">&nbsp; Reports</h1>

<div class="row">
    <div class="col-xs-6 col-sm-6">
      <div id="protocols-year"></div>
    </div>    
    <div class="col-xs-6 col-sm-6">
      <div id="protocols-month"></div>
    </div>    
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12">
      <div id="research-area"></div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12">
      <div id="protocols-phase"></div>
    </div>
</div>
