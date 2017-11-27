<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Route $route
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Route'), ['action' => 'edit', $route->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Route'), ['action' => 'delete', $route->id], ['confirm' => __('Are you sure you want to delete # {0}?', $route->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Routes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Route'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sadr List Of Drugs'), ['controller' => 'SadrListOfDrugs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sadr List Of Drug'), ['controller' => 'SadrListOfDrugs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="routes view large-9 medium-8 columns content">
    <h3><?= h($route->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= h($route->value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($route->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Icsr Code') ?></th>
            <td><?= h($route->icsr_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($route->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($route->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($route->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sadr List Of Drugs') ?></h4>
        <?php if (!empty($route->sadr_list_of_drugs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sadr Id') ?></th>
                <th scope="col"><?= __('Sadr Followup Id') ?></th>
                <th scope="col"><?= __('Dose Id') ?></th>
                <th scope="col"><?= __('Route Id') ?></th>
                <th scope="col"><?= __('Frequency Id') ?></th>
                <th scope="col"><?= __('Drug Name') ?></th>
                <th scope="col"><?= __('Brand Name') ?></th>
                <th scope="col"><?= __('Dose') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('Stop Date') ?></th>
                <th scope="col"><?= __('Indication') ?></th>
                <th scope="col"><?= __('Suspected Drug') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($route->sadr_list_of_drugs as $sadrListOfDrugs): ?>
            <tr>
                <td><?= h($sadrListOfDrugs->id) ?></td>
                <td><?= h($sadrListOfDrugs->sadr_id) ?></td>
                <td><?= h($sadrListOfDrugs->sadr_followup_id) ?></td>
                <td><?= h($sadrListOfDrugs->dose_id) ?></td>
                <td><?= h($sadrListOfDrugs->route_id) ?></td>
                <td><?= h($sadrListOfDrugs->frequency_id) ?></td>
                <td><?= h($sadrListOfDrugs->drug_name) ?></td>
                <td><?= h($sadrListOfDrugs->brand_name) ?></td>
                <td><?= h($sadrListOfDrugs->dose) ?></td>
                <td><?= h($sadrListOfDrugs->start_date) ?></td>
                <td><?= h($sadrListOfDrugs->stop_date) ?></td>
                <td><?= h($sadrListOfDrugs->indication) ?></td>
                <td><?= h($sadrListOfDrugs->suspected_drug) ?></td>
                <td><?= h($sadrListOfDrugs->created) ?></td>
                <td><?= h($sadrListOfDrugs->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SadrListOfDrugs', 'action' => 'view', $sadrListOfDrugs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SadrListOfDrugs', 'action' => 'edit', $sadrListOfDrugs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SadrListOfDrugs', 'action' => 'delete', $sadrListOfDrugs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sadrListOfDrugs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
