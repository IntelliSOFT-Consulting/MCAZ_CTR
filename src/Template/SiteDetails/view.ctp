<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SiteDetail $siteDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Site Detail'), ['action' => 'edit', $siteDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Site Detail'), ['action' => 'delete', $siteDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $siteDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Site Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Site Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="siteDetails view large-9 medium-8 columns content">
    <h3><?= h($siteDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= $siteDetail->has('application') ? $this->Html->link($siteDetail->application->id, ['controller' => 'Applications', 'action' => 'view', $siteDetail->application->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Site Name') ?></th>
            <td><?= h($siteDetail->site_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Physical Address') ?></th>
            <td><?= h($siteDetail->physical_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Details') ?></th>
            <td><?= h($siteDetail->contact_details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Person') ?></th>
            <td><?= h($siteDetail->contact_person) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Site Capacity') ?></th>
            <td><?= h($siteDetail->site_capacity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Misc') ?></th>
            <td><?= h($siteDetail->misc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($siteDetail->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('County Id') ?></th>
            <td><?= $this->Number->format($siteDetail->county_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($siteDetail->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($siteDetail->modified) ?></td>
        </tr>
    </table>
</div>
