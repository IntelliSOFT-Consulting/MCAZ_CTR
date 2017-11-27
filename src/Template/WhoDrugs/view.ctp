<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WhoDrug $whoDrug
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Who Drug'), ['action' => 'edit', $whoDrug->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Who Drug'), ['action' => 'delete', $whoDrug->id], ['confirm' => __('Are you sure you want to delete # {0}?', $whoDrug->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Who Drugs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Who Drug'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="whoDrugs view large-9 medium-8 columns content">
    <h3><?= h($whoDrug->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($whoDrug->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MedId') ?></th>
            <td><?= h($whoDrug->MedId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Drug Record Number') ?></th>
            <td><?= h($whoDrug->drug_record_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sequence No 1') ?></th>
            <td><?= h($whoDrug->sequence_no_1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sequence No 2') ?></th>
            <td><?= h($whoDrug->sequence_no_2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sequence No 3') ?></th>
            <td><?= h($whoDrug->sequence_no_3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sequence No 4') ?></th>
            <td><?= h($whoDrug->sequence_no_4) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Generic') ?></th>
            <td><?= h($whoDrug->generic) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Drug Name') ?></th>
            <td><?= h($whoDrug->drug_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name Specifier') ?></th>
            <td><?= h($whoDrug->name_specifier) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Market Authorization Number') ?></th>
            <td><?= h($whoDrug->market_authorization_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Market Authorization Date') ?></th>
            <td><?= h($whoDrug->market_authorization_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Market Authorization Withdrawal Date') ?></th>
            <td><?= h($whoDrug->market_authorization_withdrawal_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($whoDrug->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= h($whoDrug->company) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Marketing Authorization Holder') ?></th>
            <td><?= h($whoDrug->marketing_authorization_holder) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Source Code') ?></th>
            <td><?= h($whoDrug->source_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Source Country') ?></th>
            <td><?= h($whoDrug->source_country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Source Year') ?></th>
            <td><?= h($whoDrug->source_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Type') ?></th>
            <td><?= h($whoDrug->product_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Group') ?></th>
            <td><?= h($whoDrug->product_group) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create Date') ?></th>
            <td><?= h($whoDrug->create_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Changed') ?></th>
            <td><?= h($whoDrug->date_changed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($whoDrug->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($whoDrug->modified) ?></td>
        </tr>
    </table>
</div>
