<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr $sadr
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sadr->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sadr->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sadrs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Counties'), ['controller' => 'Counties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New County'), ['controller' => 'Counties', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sub Counties'), ['controller' => 'SubCounties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sub County'), ['controller' => 'SubCounties', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Designations'), ['controller' => 'Designations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Designation'), ['controller' => 'Designations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Feedbacks'), ['controller' => 'Feedbacks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Feedback'), ['controller' => 'Feedbacks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sadr Followups'), ['controller' => 'SadrFollowups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr Followup'), ['controller' => 'SadrFollowups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sadr List Of Drugs'), ['controller' => 'SadrListOfDrugs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr List Of Drug'), ['controller' => 'SadrListOfDrugs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sadrs form large-9 medium-8 columns content">
    <?= $this->Form->create($sadr) ?>
    <fieldset>
        <legend><?= __('Edit Sadr') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('county_id', ['options' => $counties, 'empty' => true]);
            echo $this->Form->control('sub_county_id', ['options' => $subCounties, 'empty' => true]);
            echo $this->Form->control('designation_id', ['options' => $designations, 'empty' => true]);
            echo $this->Form->control('vigiflow_id');
            echo $this->Form->control('report_title');
            echo $this->Form->control('report_type');
            echo $this->Form->control('name_of_institution');
            echo $this->Form->control('institution_code');
            echo $this->Form->control('address');
            echo $this->Form->control('contact');
            echo $this->Form->control('patient_name');
            echo $this->Form->control('ip_no');
            echo $this->Form->control('date_of_birth');
            echo $this->Form->control('age_group');
            echo $this->Form->control('patient_address');
            echo $this->Form->control('ward');
            echo $this->Form->control('gender');
            echo $this->Form->control('known_allergy');
            echo $this->Form->control('known_allergy_specify');
            echo $this->Form->control('pregnant');
            echo $this->Form->control('pregnancy_status');
            echo $this->Form->control('weight');
            echo $this->Form->control('height');
            echo $this->Form->control('diagnosis');
            echo $this->Form->control('date_of_onset_of_reaction');
            echo $this->Form->control('description_of_reaction');
            echo $this->Form->control('severity');
            echo $this->Form->control('action_taken');
            echo $this->Form->control('outcome');
            echo $this->Form->control('causality');
            echo $this->Form->control('any_other_comment');
            echo $this->Form->control('reporter_name');
            echo $this->Form->control('reporter_email');
            echo $this->Form->control('reporter_phone');
            echo $this->Form->control('submitted');
            echo $this->Form->control('emails');
            echo $this->Form->control('active');
            echo $this->Form->control('device');
            echo $this->Form->control('notified');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
