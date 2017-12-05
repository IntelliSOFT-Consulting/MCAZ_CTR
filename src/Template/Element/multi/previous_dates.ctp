<?php
    $this->Html->script('multi/previous_dates', ['block' => true]);
    echo $this->Form->control('previous_dates.0.id', ['templates' => 'table_form']);
    echo $this->Form->control('previous_dates.0.date_of_previous_protocol', array(
            'type' => 'text', 'class' => 'datepickers',
            'label' => 'Approval date(s) of previous protocol(s)',
            'templates' => ['input' => '<div class="col-sm-6"><input type="{{type}}" name="{{name}}" {{attrs}} /></div>',]
        ));
?>
<div id="previous_dates">
<?php
    if (!empty($application['previous_dates'])) {
        for ($i = 1; $i <= count($application['previous_dates'])-1; $i++) {
            echo $this->Form->control('previous_dates.'.$i.'.id', ['templates' => 'table_form']);
            echo $this->Form->control('previous_dates.'.$i.'.date_of_previous_protocol', ['class' => 'datepickers', 'templates' => [
              'input' => '<div class="col-sm-6"><input type="{{type}}" name="{{name}}" {{attrs}} /></div>', 'label' => false]]);
        }
    }
?>
</div>
