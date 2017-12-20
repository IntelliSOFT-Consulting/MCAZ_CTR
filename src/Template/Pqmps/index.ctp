<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pqmp[]|\Cake\Collection\CollectionInterface $pqmps
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pqmp'), ['action' => 'add']) ?></li>
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
<div class="pqmps index large-9 medium-8 columns content">
    <h3><?= __('Pqmps') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('county_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sub_county_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('designation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('facility_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('facility_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('facility_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('facility_phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('brand_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('generic_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('batch_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('manufacture_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expiry_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('receipt_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name_of_manufacturer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country_of_origin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('supplier_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('supplier_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_formulation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_formulation_specify') ?></th>
                <th scope="col"><?= $this->Paginator->sort('colour_change') ?></th>
                <th scope="col"><?= $this->Paginator->sort('separating') ?></th>
                <th scope="col"><?= $this->Paginator->sort('powdering') ?></th>
                <th scope="col"><?= $this->Paginator->sort('caking') ?></th>
                <th scope="col"><?= $this->Paginator->sort('moulding') ?></th>
                <th scope="col"><?= $this->Paginator->sort('odour_change') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mislabeling') ?></th>
                <th scope="col"><?= $this->Paginator->sort('incomplete_pack') ?></th>
                <th scope="col"><?= $this->Paginator->sort('complaint_other') ?></th>
                <th scope="col"><?= $this->Paginator->sort('require_refrigeration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_at_facility') ?></th>
                <th scope="col"><?= $this->Paginator->sort('returned_by_client') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stored_to_recommendations') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reporter_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('emails') ?></th>
                <th scope="col"><?= $this->Paginator->sort('submitted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('device') ?></th>
                <th scope="col"><?= $this->Paginator->sort('notified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pqmps as $pqmp): ?>
            <tr>
                <td><?= $this->Number->format($pqmp->id) ?></td>
                <td><?= $pqmp->has('user') ? $this->Html->link($pqmp->user->name, ['controller' => 'Users', 'action' => 'view', $pqmp->user->id]) : '' ?></td>
                <td><?= $pqmp->has('county') ? $this->Html->link($pqmp->county->id, ['controller' => 'Counties', 'action' => 'view', $pqmp->county->id]) : '' ?></td>
                <td><?= $pqmp->has('sub_county') ? $this->Html->link($pqmp->sub_county->id, ['controller' => 'SubCounties', 'action' => 'view', $pqmp->sub_county->id]) : '' ?></td>
                <td><?= $pqmp->has('country') ? $this->Html->link($pqmp->country->name, ['controller' => 'Countries', 'action' => 'view', $pqmp->country->id]) : '' ?></td>
                <td><?= $pqmp->has('designation') ? $this->Html->link($pqmp->designation->name, ['controller' => 'Designations', 'action' => 'view', $pqmp->designation->id]) : '' ?></td>
                <td><?= h($pqmp->facility_name) ?></td>
                <td><?= h($pqmp->facility_code) ?></td>
                <td><?= h($pqmp->facility_address) ?></td>
                <td><?= h($pqmp->facility_phone) ?></td>
                <td><?= h($pqmp->brand_name) ?></td>
                <td><?= h($pqmp->generic_name) ?></td>
                <td><?= h($pqmp->batch_number) ?></td>
                <td><?= h($pqmp->manufacture_date) ?></td>
                <td><?= h($pqmp->expiry_date) ?></td>
                <td><?= h($pqmp->receipt_date) ?></td>
                <td><?= h($pqmp->name_of_manufacturer) ?></td>
                <td><?= h($pqmp->country_of_origin) ?></td>
                <td><?= h($pqmp->supplier_name) ?></td>
                <td><?= h($pqmp->supplier_address) ?></td>
                <td><?= h($pqmp->product_formulation) ?></td>
                <td><?= h($pqmp->product_formulation_specify) ?></td>
                <td><?= h($pqmp->colour_change) ?></td>
                <td><?= h($pqmp->separating) ?></td>
                <td><?= h($pqmp->powdering) ?></td>
                <td><?= h($pqmp->caking) ?></td>
                <td><?= h($pqmp->moulding) ?></td>
                <td><?= h($pqmp->odour_change) ?></td>
                <td><?= h($pqmp->mislabeling) ?></td>
                <td><?= h($pqmp->incomplete_pack) ?></td>
                <td><?= h($pqmp->complaint_other) ?></td>
                <td><?= h($pqmp->require_refrigeration) ?></td>
                <td><?= h($pqmp->product_at_facility) ?></td>
                <td><?= h($pqmp->returned_by_client) ?></td>
                <td><?= h($pqmp->stored_to_recommendations) ?></td>
                <td><?= h($pqmp->reporter_name) ?></td>
                <td><?= h($pqmp->reporter_email) ?></td>
                <td><?= h($pqmp->contact_number) ?></td>
                <td><?= $this->Number->format($pqmp->emails) ?></td>
                <td><?= $this->Number->format($pqmp->submitted) ?></td>
                <td><?= h($pqmp->active) ?></td>
                <td><?= $this->Number->format($pqmp->device) ?></td>
                <td><?= $this->Number->format($pqmp->notified) ?></td>
                <td><?= h($pqmp->created) ?></td>
                <td><?= h($pqmp->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pqmp->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pqmp->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pqmp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pqmp->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
