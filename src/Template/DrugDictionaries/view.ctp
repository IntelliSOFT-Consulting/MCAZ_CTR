<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DrugDictionary $drugDictionary
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Drug Dictionary'), ['action' => 'edit', $drugDictionary->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Drug Dictionary'), ['action' => 'delete', $drugDictionary->id], ['confirm' => __('Are you sure you want to delete # {0}?', $drugDictionary->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Drug Dictionaries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Drug Dictionary'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="drugDictionaries view large-9 medium-8 columns content">
    <h3><?= h($drugDictionary->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($drugDictionary->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MedId') ?></th>
            <td><?= h($drugDictionary->MedId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Drug Record Number') ?></th>
            <td><?= h($drugDictionary->drug_record_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sequence No 1') ?></th>
            <td><?= h($drugDictionary->sequence_no_1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sequence No 2') ?></th>
            <td><?= h($drugDictionary->sequence_no_2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sequence No 3') ?></th>
            <td><?= h($drugDictionary->sequence_no_3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sequence No 4') ?></th>
            <td><?= h($drugDictionary->sequence_no_4) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Generic') ?></th>
            <td><?= h($drugDictionary->generic) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Drug Name') ?></th>
            <td><?= h($drugDictionary->drug_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name Specifier') ?></th>
            <td><?= h($drugDictionary->name_specifier) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Market Authorization Number') ?></th>
            <td><?= h($drugDictionary->market_authorization_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Market Authorization Date') ?></th>
            <td><?= h($drugDictionary->market_authorization_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Market Authorization Withdrawal Date') ?></th>
            <td><?= h($drugDictionary->market_authorization_withdrawal_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($drugDictionary->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= h($drugDictionary->company) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Marketing Authorization Holder') ?></th>
            <td><?= h($drugDictionary->marketing_authorization_holder) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Source Code') ?></th>
            <td><?= h($drugDictionary->source_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Source Country') ?></th>
            <td><?= h($drugDictionary->source_country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Source Year') ?></th>
            <td><?= h($drugDictionary->source_year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Type') ?></th>
            <td><?= h($drugDictionary->product_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Group') ?></th>
            <td><?= h($drugDictionary->product_group) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create Date') ?></th>
            <td><?= h($drugDictionary->create_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Changed') ?></th>
            <td><?= h($drugDictionary->date_changed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($drugDictionary->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($drugDictionary->modified) ?></td>
        </tr>
    </table>
</div>
