<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdrLabTest $adrLabTest
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $adrLabTest->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $adrLabTest->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Adr Lab Tests'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Adrs'), ['controller' => 'Adrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adr'), ['controller' => 'Adrs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adrLabTests form large-9 medium-8 columns content">
    <?= $this->Form->create($adrLabTest) ?>
    <fieldset>
        <legend><?= __('Edit Adr Lab Test') ?></legend>
        <?php
            echo $this->Form->control('adr_id', ['options' => $adrs, 'empty' => true]);
            echo $this->Form->control('lab_test');
            echo $this->Form->control('abnormal_result');
            echo $this->Form->control('site_normal_range');
            echo $this->Form->control('collection_date', ['empty' => true]);
            echo $this->Form->control('lab_value');
            echo $this->Form->control('lab_value_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
