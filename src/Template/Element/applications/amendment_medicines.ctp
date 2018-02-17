<?php
    $this->Html->script('multi/medicines', ['block' => true]);
?>
<div class="ctr-groups">
    <h5 class="controls"><b>Other Medicines (</b><small>Repeat as necessary
        <button title="add medicine" id="addMedicineDetail" class="btn btn-primary btn-xs multiple_medicines_member_state_f" type="button">Add Medicine</button></small><b>)</b></h5>
    <hr>
    <div id="medicine_primary_detail">

    </div>
    <div id="medicines">
    <?php
        if (!empty($amendment['medicines'])) {
            for ($i = 0; $i <= count($amendment['medicines'])-1; $i++) {
            ?>
            <div class="medicine-group">
            <?php
                echo $this->Html->tag('p', ($i+1).' additional medicines', array('class' => 'topper'));
                echo $this->Form->input('medicines.'.$i.'.id', ['templates' => 'table_form']);
                echo $this->Form->input('medicines.'.$i.'.medicine_name', array(
                    'label' => 'Medicine Name  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
                    'escape' => false
                ));
                echo $this->Form->input('medicines.'.$i.'.quantity_required', array(
                    'label' =>  'Quantity of medicine required  <i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
                    'escape' => false
                ));
                echo $this->Html->tag('div', '<button id="medicinesButton'.$i.'" class="btn btn-xs btn-danger removemedicines" type="button"><i class="fa fa-trash-o"></i> Remove Medicine</button>', array(
                            'class' => 'controls', 'escape' => false));
                echo $this->Html->tag('hr', '', array('id' => 'medicinesHr'.$i));
            ?>
            </div>
            <?php
            }
        }
    ?>
    </div>
</div>
