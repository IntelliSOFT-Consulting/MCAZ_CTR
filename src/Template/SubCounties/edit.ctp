<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SubCounty $subCounty
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $subCounty->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $subCounty->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sub Counties'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Counties'), ['controller' => 'Counties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New County'), ['controller' => 'Counties', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pqmps'), ['controller' => 'Pqmps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pqmp'), ['controller' => 'Pqmps', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sadrs'), ['controller' => 'Sadrs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sadr'), ['controller' => 'Sadrs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subCounties form large-9 medium-8 columns content">
    <?= $this->Form->create($subCounty) ?>
    <fieldset>
        <legend><?= __('Edit Sub County') ?></legend>
        <?php
            echo $this->Form->control('county_id', ['options' => $counties, 'empty' => true]);
            echo $this->Form->control('sub_county_name');
            echo $this->Form->control('county_name');
            echo $this->Form->control('Province');
            echo $this->Form->control('Pop_2009');
            echo $this->Form->control('RegVoters');
            echo $this->Form->control('AreaSqKms');
            echo $this->Form->control('CAWards');
            echo $this->Form->control('MainEthnicGroup');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
