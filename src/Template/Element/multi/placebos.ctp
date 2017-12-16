<?php
    $this->Html->script('multi/placebos', ['block' => true]);
?>
<hr>
<h5>6.0 Information On Intervention(s) (<small>if relevant; repeat as necessary -
<button type="button" class="btn-mini" id="addplacebos" title="add placebo">Add</button></small>) </h5>
<?php
    echo $this->Form->input('placebo_present', array(
        'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No']
    ));
?>
<div class="ctr-groups">
    <div id="placebo_primary_contact">
    <?php
        echo $this->Form->input('placebos.0.id', ['templates' => 'table_form']);
        echo $this->Form->input('placebos.0.pharmaceutical_form', array(
            'label' => 'Pharmaceutical form',
        ));
        echo $this->Form->input('placebos.0.route_of_administration', array(
            'label' => 'Route of administration',
        ));
        echo $this->Form->input('placebos.0.composition', array(
            'label' =>  'Composition, apart from active substance(s)',
        ));
        echo $this->Form->input('placebos.0.identical_indp', array(
            'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
            'label' => 'Is it otherwise identical to the INDP?'
        ));
        echo $this->Form->input('placebos.0.major_ingredients', array(
            'label' => 'If not, specify major ingredients',
        ));
        echo $this->Html->tag('hr', '', array('id' => 'placebosHr0'));
    ?>
    </div>
    <div id="placebo_infos">
    <?php
        if (!empty($this->request->data['placebos'])) {
            for ($i = 1; $i <= count($this->request->data['placebos']) - 1; $i++) {
            ?>
            <div class="placebo-group">
            <?php
                echo $this->Form->input('placebos.'.$i.'.id', ['templates' => 'table_form']);
                
                echo $this->Form->input('placebos.'.$i.'.pharmaceutical_form', array(
                    'label' =>'Pharmaceutical form',
                ));
                echo $this->Form->input('placebos.'.$i.'.route_of_administration', array(
                    'label' => 'Route of administration',
                ));
                echo $this->Form->input('placebos.'.$i.'.composition', array(
                    'label' => 'Composition, apart from active substance(s)',
                ));
                echo $this->Form->input('placebos.'.$i.'.identical_indp', array(
                    'type' => 'radio',  'templates' => 'radio_form', 'options' => ['Yes' => 'Yes', 'No' => 'No'],
                    'label' => 'Is it otherwise identical to the INDP?'
                ));
                echo $this->Form->input('placebos.'.$i.'.major_ingredients', array(
                    'label' => 'If not, specify major ingredients',
                ));
                echo $this->Html->tag('div', '<button id="placebosButton'.$i.'" class="btn btn-mini btn-danger removeplacebos" type="button">Remove placebos</button>', array(
                            'class' => 'controls', 'escape' => false));
                echo $this->Html->tag('hr', '', array('id' => 'placebosHr'.$i.''));
            ?>
            </div>
            <?php
            }
        }
    ?>
    </div>
</div>
