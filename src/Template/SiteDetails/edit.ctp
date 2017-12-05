<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SiteDetail $siteDetail
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $siteDetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $siteDetail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Site Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="siteDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($siteDetail) ?>
    <fieldset>
        <legend><?= __('Edit Site Detail') ?></legend>
        <?php
            echo $this->Form->control('application_id', ['options' => $applications, 'empty' => true]);
            echo $this->Form->control('county_id');
            echo $this->Form->control('site_name');
            echo $this->Form->control('physical_address');
            echo $this->Form->control('contact_details');
            echo $this->Form->control('contact_person');
            echo $this->Form->control('site_capacity');
            echo $this->Form->control('misc');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
