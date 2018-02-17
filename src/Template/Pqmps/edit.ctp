<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pqmp $pqmp
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pqmp->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pqmp->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pqmps'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Counties'), ['controller' => 'Counties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New County'), ['controller' => 'Counties', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sub Counties'), ['controller' => 'SubCounties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sub County'), ['controller' => 'SubCounties', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Designations'), ['controller' => 'Designations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Designation'), ['controller' => 'Designations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Feedbacks'), ['controller' => 'Feedbacks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Feedback'), ['controller' => 'Feedbacks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pqmps form large-9 medium-8 columns content">
    <?= $this->Form->create($pqmp) ?>
    <fieldset>
        <legend><?= __('Edit Pqmp') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('county_id', ['options' => $counties, 'empty' => true]);
            echo $this->Form->control('sub_county_id', ['options' => $subCounties, 'empty' => true]);
            echo $this->Form->control('country_id', ['options' => $countries, 'empty' => true]);
            echo $this->Form->control('designation_id', ['options' => $designations, 'empty' => true]);
            echo $this->Form->control('facility_name');
            echo $this->Form->control('facility_code');
            echo $this->Form->control('facility_address');
            echo $this->Form->control('facility_phone');
            echo $this->Form->control('brand_name');
            echo $this->Form->control('generic_name');
            echo $this->Form->control('batch_number');
            echo $this->Form->control('manufacture_date');
            echo $this->Form->control('expiry_date', ['empty' => true]);
            echo $this->Form->control('receipt_date', ['empty' => true]);
            echo $this->Form->control('name_of_manufacturer');
            echo $this->Form->control('country_of_origin');
            echo $this->Form->control('supplier_name');
            echo $this->Form->control('supplier_address');
            echo $this->Form->control('product_formulation');
            echo $this->Form->control('product_formulation_specify');
            echo $this->Form->control('colour_change');
            echo $this->Form->control('separating');
            echo $this->Form->control('powdering');
            echo $this->Form->control('caking');
            echo $this->Form->control('moulding');
            echo $this->Form->control('odour_change');
            echo $this->Form->control('mislabeling');
            echo $this->Form->control('incomplete_pack');
            echo $this->Form->control('complaint_other');
            echo $this->Form->control('complaint_other_specify');
            echo $this->Form->control('complaint_description');
            echo $this->Form->control('require_refrigeration');
            echo $this->Form->control('product_at_facility');
            echo $this->Form->control('returned_by_client');
            echo $this->Form->control('stored_to_recommendations');
            echo $this->Form->control('other_details');
            echo $this->Form->control('comments');
            echo $this->Form->control('reporter_name');
            echo $this->Form->control('reporter_email');
            echo $this->Form->control('contact_number');
            echo $this->Form->control('emails');
            echo $this->Form->control('submitted');
            echo $this->Form->control('active');
            echo $this->Form->control('device');
            echo $this->Form->control('notified');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
