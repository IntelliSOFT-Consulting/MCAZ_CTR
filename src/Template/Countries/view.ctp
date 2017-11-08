<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Country $country
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Country'), ['action' => 'edit', $country->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Country'), ['action' => 'delete', $country->id], ['confirm' => __('Are you sure you want to delete # {0}?', $country->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Countries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Country'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pqmps'), ['controller' => 'Pqmps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pqmp'), ['controller' => 'Pqmps', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="countries view large-9 medium-8 columns content">
    <h3><?= h($country->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($country->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($country->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($country->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($country->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Name') ?></h4>
        <?= $this->Text->autoParagraph(h($country->name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Name Fr') ?></h4>
        <?= $this->Text->autoParagraph(h($country->name_fr)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pqmps') ?></h4>
        <?php if (!empty($country->pqmps)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('County Id') ?></th>
                <th scope="col"><?= __('Sub County Id') ?></th>
                <th scope="col"><?= __('Country Id') ?></th>
                <th scope="col"><?= __('Designation Id') ?></th>
                <th scope="col"><?= __('Facility Name') ?></th>
                <th scope="col"><?= __('Facility Code') ?></th>
                <th scope="col"><?= __('Facility Address') ?></th>
                <th scope="col"><?= __('Facility Phone') ?></th>
                <th scope="col"><?= __('Brand Name') ?></th>
                <th scope="col"><?= __('Generic Name') ?></th>
                <th scope="col"><?= __('Batch Number') ?></th>
                <th scope="col"><?= __('Manufacture Date') ?></th>
                <th scope="col"><?= __('Expiry Date') ?></th>
                <th scope="col"><?= __('Receipt Date') ?></th>
                <th scope="col"><?= __('Name Of Manufacturer') ?></th>
                <th scope="col"><?= __('Country Of Origin') ?></th>
                <th scope="col"><?= __('Supplier Name') ?></th>
                <th scope="col"><?= __('Supplier Address') ?></th>
                <th scope="col"><?= __('Product Formulation') ?></th>
                <th scope="col"><?= __('Product Formulation Specify') ?></th>
                <th scope="col"><?= __('Colour Change') ?></th>
                <th scope="col"><?= __('Separating') ?></th>
                <th scope="col"><?= __('Powdering') ?></th>
                <th scope="col"><?= __('Caking') ?></th>
                <th scope="col"><?= __('Moulding') ?></th>
                <th scope="col"><?= __('Odour Change') ?></th>
                <th scope="col"><?= __('Mislabeling') ?></th>
                <th scope="col"><?= __('Incomplete Pack') ?></th>
                <th scope="col"><?= __('Complaint Other') ?></th>
                <th scope="col"><?= __('Complaint Other Specify') ?></th>
                <th scope="col"><?= __('Complaint Description') ?></th>
                <th scope="col"><?= __('Require Refrigeration') ?></th>
                <th scope="col"><?= __('Product At Facility') ?></th>
                <th scope="col"><?= __('Returned By Client') ?></th>
                <th scope="col"><?= __('Stored To Recommendations') ?></th>
                <th scope="col"><?= __('Other Details') ?></th>
                <th scope="col"><?= __('Comments') ?></th>
                <th scope="col"><?= __('Reporter Name') ?></th>
                <th scope="col"><?= __('Reporter Email') ?></th>
                <th scope="col"><?= __('Contact Number') ?></th>
                <th scope="col"><?= __('Emails') ?></th>
                <th scope="col"><?= __('Submitted') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Device') ?></th>
                <th scope="col"><?= __('Notified') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($country->pqmps as $pqmps): ?>
            <tr>
                <td><?= h($pqmps->id) ?></td>
                <td><?= h($pqmps->user_id) ?></td>
                <td><?= h($pqmps->county_id) ?></td>
                <td><?= h($pqmps->sub_county_id) ?></td>
                <td><?= h($pqmps->country_id) ?></td>
                <td><?= h($pqmps->designation_id) ?></td>
                <td><?= h($pqmps->facility_name) ?></td>
                <td><?= h($pqmps->facility_code) ?></td>
                <td><?= h($pqmps->facility_address) ?></td>
                <td><?= h($pqmps->facility_phone) ?></td>
                <td><?= h($pqmps->brand_name) ?></td>
                <td><?= h($pqmps->generic_name) ?></td>
                <td><?= h($pqmps->batch_number) ?></td>
                <td><?= h($pqmps->manufacture_date) ?></td>
                <td><?= h($pqmps->expiry_date) ?></td>
                <td><?= h($pqmps->receipt_date) ?></td>
                <td><?= h($pqmps->name_of_manufacturer) ?></td>
                <td><?= h($pqmps->country_of_origin) ?></td>
                <td><?= h($pqmps->supplier_name) ?></td>
                <td><?= h($pqmps->supplier_address) ?></td>
                <td><?= h($pqmps->product_formulation) ?></td>
                <td><?= h($pqmps->product_formulation_specify) ?></td>
                <td><?= h($pqmps->colour_change) ?></td>
                <td><?= h($pqmps->separating) ?></td>
                <td><?= h($pqmps->powdering) ?></td>
                <td><?= h($pqmps->caking) ?></td>
                <td><?= h($pqmps->moulding) ?></td>
                <td><?= h($pqmps->odour_change) ?></td>
                <td><?= h($pqmps->mislabeling) ?></td>
                <td><?= h($pqmps->incomplete_pack) ?></td>
                <td><?= h($pqmps->complaint_other) ?></td>
                <td><?= h($pqmps->complaint_other_specify) ?></td>
                <td><?= h($pqmps->complaint_description) ?></td>
                <td><?= h($pqmps->require_refrigeration) ?></td>
                <td><?= h($pqmps->product_at_facility) ?></td>
                <td><?= h($pqmps->returned_by_client) ?></td>
                <td><?= h($pqmps->stored_to_recommendations) ?></td>
                <td><?= h($pqmps->other_details) ?></td>
                <td><?= h($pqmps->comments) ?></td>
                <td><?= h($pqmps->reporter_name) ?></td>
                <td><?= h($pqmps->reporter_email) ?></td>
                <td><?= h($pqmps->contact_number) ?></td>
                <td><?= h($pqmps->emails) ?></td>
                <td><?= h($pqmps->submitted) ?></td>
                <td><?= h($pqmps->active) ?></td>
                <td><?= h($pqmps->device) ?></td>
                <td><?= h($pqmps->notified) ?></td>
                <td><?= h($pqmps->created) ?></td>
                <td><?= h($pqmps->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Pqmps', 'action' => 'view', $pqmps->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pqmps', 'action' => 'edit', $pqmps->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pqmps', 'action' => 'delete', $pqmps->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pqmps->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
