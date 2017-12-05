<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SadrFollowup $sadrFollowup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sadr Followups'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Counties'), ['controller' => 'Counties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New County'), ['controller' => 'Counties', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sadrs'), ['controller' => 'Sadrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr'), ['controller' => 'Sadrs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Designations'), ['controller' => 'Designations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Designation'), ['controller' => 'Designations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Feedbacks'), ['controller' => 'Feedbacks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Feedback'), ['controller' => 'Feedbacks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sadr List Of Drugs'), ['controller' => 'SadrListOfDrugs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr List Of Drug'), ['controller' => 'SadrListOfDrugs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sadrFollowups form large-9 medium-8 columns content">
    <?= $this->Form->create($sadrFollowup) ?>
    <fieldset>
        <legend><?= __('Add Sadr Followup') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('county_id', ['options' => $counties, 'empty' => true]);
            echo $this->Form->control('sadr_id', ['options' => $sadrs, 'empty' => true]);
            echo $this->Form->control('designation_id', ['options' => $designations, 'empty' => true]);
            echo $this->Form->control('description_of_reaction');
            echo $this->Form->control('outcome');
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
