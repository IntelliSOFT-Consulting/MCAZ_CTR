<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Statistical $statistical
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Statistical'), ['action' => 'edit', $statistical->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Statistical'), ['action' => 'delete', $statistical->id], ['confirm' => __('Are you sure you want to delete # {0}?', $statistical->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Statisticals'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Statistical'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="statisticals view large-9 medium-8 columns content">
    <h3><?= h($statistical->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= $statistical->has('application') ? $this->Html->link($statistical->application->id, ['controller' => 'Applications', 'action' => 'view', $statistical->application->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $statistical->has('user') ? $this->Html->link($statistical->user->name, ['controller' => 'Users', 'action' => 'view', $statistical->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Design Type') ?></th>
            <td><?= h($statistical->design_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Randomized') ?></th>
            <td><?= h($statistical->randomized) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Blinding') ?></th>
            <td><?= h($statistical->blinding) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Design Acceptable') ?></th>
            <td><?= h($statistical->design_acceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sample Acceptable') ?></th>
            <td><?= h($statistical->sample_acceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Power Acceptable') ?></th>
            <td><?= h($statistical->power_acceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Analysis Objective') ?></th>
            <td><?= h($statistical->analysis_objective) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Methods Appropriate') ?></th>
            <td><?= h($statistical->methods_appropriate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Considerations') ?></th>
            <td><?= h($statistical->considerations) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Multiplicity') ?></th>
            <td><?= h($statistical->multiplicity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Analyses Acceptable') ?></th>
            <td><?= h($statistical->analyses_acceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Interim Safety') ?></th>
            <td><?= h($statistical->interim_safety) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Interim Planning') ?></th>
            <td><?= h($statistical->interim_planning) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Statistical Acceptable') ?></th>
            <td><?= h($statistical->statistical_acceptable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Information Needed') ?></th>
            <td><?= h($statistical->information_needed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($statistical->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Chosen') ?></th>
            <td><?= $this->Number->format($statistical->chosen) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($statistical->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($statistical->deleted) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Design Description') ?></h4>
        <?= $this->Text->autoParagraph(h($statistical->design_description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Design Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($statistical->design_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Rand Description') ?></h4>
        <?= $this->Text->autoParagraph(h($statistical->rand_description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Rand Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($statistical->rand_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Sample Description') ?></h4>
        <?= $this->Text->autoParagraph(h($statistical->sample_description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Sample Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($statistical->sample_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Analysis Description') ?></h4>
        <?= $this->Text->autoParagraph(h($statistical->analysis_description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Analysis Objective Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($statistical->analysis_objective_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Methods Appropriate Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($statistical->methods_appropriate_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Considerations Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($statistical->considerations_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Multiplicity Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($statistical->multiplicity_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Analysis Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($statistical->analysis_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Interim Description') ?></h4>
        <?= $this->Text->autoParagraph(h($statistical->interim_description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Interim Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($statistical->interim_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Overall Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($statistical->overall_comment)); ?>
    </div>
    <div class="row">
        <h4><?= __('Additional') ?></h4>
        <?= $this->Text->autoParagraph(h($statistical->additional)); ?>
    </div>
</div>
