<?php
    $this->Html->script('multi/committees', ['block' => true]);
?>

<label>10.2.3 Name and contact details of Ethics committee(s) <small>where necessary, Click button to add more -
<button type="button" class="btn btn-primary btn-xs" id="addCommitteeDetail" title="add ponsor">Add Committee</button></small></label><br>
<div class="ctr-groups">
    <div id="committee_primary_contact">
    <?php
        echo $this->Form->control('committees.0.id', ['templates' => 'table_form']);
        echo $this->Form->control('committees.0.name', array(
            'label' => 'Ethics Committee Name <span class="sterix">*</span>', 'escape' => false
        ));
        echo $this->Form->control('committees.0.address', array(
            'label' => 'Postal Address <span class="sterix">*</span>', 'escape' => false
        ));
        echo $this->Form->control('committees.0.telephone_number', array(
            'label' => 'Telephone Number <span class="sterix">*</span>', 'escape' => false
        ));
        echo $this->Form->control('committees.0.email_address', array(
            'type' => 'email',
            'label' => 'Email Address <span class="sterix">*</span>', 'escape' => false
        ));
        echo $this->Html->tag('hr', '', array('id' => 'committeesHr0'));
    ?>
    </div>
    <div id="committee_details">
    <?php
        if (!empty($application['committees'])) {
            for ($i = 1; $i <= count($application['committees'])-1; $i++) {
            ?>
            <div class="committee-group">
            <?php
                echo $this->Form->control('committees.'.$i.'.id', ['templates' => 'table_form']);
                echo '<p  class="topper" id="committeesDetailLabel'.$i.'">'.($i+1).' additional committees</p>';
                echo '<span class="badge badge-info">'.($i+1).'</span>';
                echo $this->Form->control('committees.'.$i.'.name', array(
                    'label' =>  'Ethics Committee Name <span class="sterix">*</span>', 'escape' => false
                ));
                echo $this->Form->control('committees.'.$i.'.address', array(
                    'label' =>  'Postal Address <span class="sterix">*</span>', 'escape' => false
                ));
                echo $this->Form->control('committees.'.$i.'.telephone_number', array(
                    'label' =>  'Telephone Number <span class="sterix">*</span>', 'escape' => false
                ));
                echo $this->Form->control('committees.'.$i.'.email_address', array(
                    'type' => 'email',
                    'label' =>  'Email Address <span class="sterix">*</span>', 'escape' => false
                ));
                echo $this->Html->tag('div', '<button id="CommitteeDetail'.$i.'" class="btn btn-mini btn-danger removeCommitteeDetail" type="button">Remove Detail</button>', array(
                            'class' => 'controls', 'escape' => false));
                echo $this->Html->tag('hr', '', array('id' => 'committeesHr'.$i));
            ?>
            </div>
            <?php
            }
        }
    ?>
    </div>
</div>

