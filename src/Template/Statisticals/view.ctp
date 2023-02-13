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
        <li><?= $this->Html->link(__('List Statisticals'), ['controller' => 'Statisticals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Statistical'), ['controller' => 'Statisticals', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Statistical Edits'), ['controller' => 'Statisticals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Statistical Edit'), ['controller' => 'Statisticals', 'action' => 'add']) ?> </li>
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
            <th scope="row"><?= __('Statistical') ?></th>
            <td><?= $statistical->has('statistical') ? $this->Html->link($statistical->statistical->id, ['controller' => 'Statisticals', 'action' => 'view', $statistical->statistical->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Evaluation Type') ?></th>
            <td><?= h($statistical->evaluation_type) ?></td>
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
            <th scope="row"><?= __('File') ?></th>
            <td><?= h($statistical->file) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dir') ?></th>
            <td><?= h($statistical->dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Size') ?></th>
            <td><?= h($statistical->size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($statistical->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($statistical->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Signature') ?></th>
            <td><?= $this->Number->format($statistical->signature) ?></td>
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
    <div class="related">
        <h4><?= __('Related Statisticals') ?></h4>
        <?php if (!empty($statistical->statistical_edits)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Application Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Statistical Id') ?></th>
                <th scope="col"><?= __('Evaluation Type') ?></th>
                <th scope="col"><?= __('Design Type') ?></th>
                <th scope="col"><?= __('Randomized') ?></th>
                <th scope="col"><?= __('Blinding') ?></th>
                <th scope="col"><?= __('Design Description') ?></th>
                <th scope="col"><?= __('Design Acceptable') ?></th>
                <th scope="col"><?= __('Design Comment') ?></th>
                <th scope="col"><?= __('Rand Description') ?></th>
                <th scope="col"><?= __('Rand Comment') ?></th>
                <th scope="col"><?= __('Sample Acceptable') ?></th>
                <th scope="col"><?= __('Power Acceptable') ?></th>
                <th scope="col"><?= __('Sample Description') ?></th>
                <th scope="col"><?= __('Sample Comment') ?></th>
                <th scope="col"><?= __('Analysis Description') ?></th>
                <th scope="col"><?= __('Analysis Objective') ?></th>
                <th scope="col"><?= __('Analysis Objective Comments') ?></th>
                <th scope="col"><?= __('Methods Appropriate') ?></th>
                <th scope="col"><?= __('Methods Appropriate Comments') ?></th>
                <th scope="col"><?= __('Considerations') ?></th>
                <th scope="col"><?= __('Considerations Comments') ?></th>
                <th scope="col"><?= __('Multiplicity') ?></th>
                <th scope="col"><?= __('Multiplicity Comments') ?></th>
                <th scope="col"><?= __('Analyses Acceptable') ?></th>
                <th scope="col"><?= __('Analysis Comment') ?></th>
                <th scope="col"><?= __('Interim Safety') ?></th>
                <th scope="col"><?= __('Interim Planning') ?></th>
                <th scope="col"><?= __('Interim Description') ?></th>
                <th scope="col"><?= __('Interim Comment') ?></th>
                <th scope="col"><?= __('Statistical Acceptable') ?></th>
                <th scope="col"><?= __('Information Needed') ?></th>
                <th scope="col"><?= __('Overall Comment') ?></th>
                <th scope="col"><?= __('File') ?></th>
                <th scope="col"><?= __('Dir') ?></th>
                <th scope="col"><?= __('Size') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Signature') ?></th>
                <th scope="col"><?= __('Chosen') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Additional') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($statistical->statistical_edits as $statisticalEdits): ?>
            <tr>
                <td><?= h($statisticalEdits->id) ?></td>
                <td><?= h($statisticalEdits->application_id) ?></td>
                <td><?= h($statisticalEdits->user_id) ?></td>
                <td><?= h($statisticalEdits->statistical_id) ?></td>
                <td><?= h($statisticalEdits->evaluation_type) ?></td>
                <td><?= h($statisticalEdits->design_type) ?></td>
                <td><?= h($statisticalEdits->randomized) ?></td>
                <td><?= h($statisticalEdits->blinding) ?></td>
                <td><?= h($statisticalEdits->design_description) ?></td>
                <td><?= h($statisticalEdits->design_acceptable) ?></td>
                <td><?= h($statisticalEdits->design_comment) ?></td>
                <td><?= h($statisticalEdits->rand_description) ?></td>
                <td><?= h($statisticalEdits->rand_comment) ?></td>
                <td><?= h($statisticalEdits->sample_acceptable) ?></td>
                <td><?= h($statisticalEdits->power_acceptable) ?></td>
                <td><?= h($statisticalEdits->sample_description) ?></td>
                <td><?= h($statisticalEdits->sample_comment) ?></td>
                <td><?= h($statisticalEdits->analysis_description) ?></td>
                <td><?= h($statisticalEdits->analysis_objective) ?></td>
                <td><?= h($statisticalEdits->analysis_objective_comments) ?></td>
                <td><?= h($statisticalEdits->methods_appropriate) ?></td>
                <td><?= h($statisticalEdits->methods_appropriate_comments) ?></td>
                <td><?= h($statisticalEdits->considerations) ?></td>
                <td><?= h($statisticalEdits->considerations_comments) ?></td>
                <td><?= h($statisticalEdits->multiplicity) ?></td>
                <td><?= h($statisticalEdits->multiplicity_comments) ?></td>
                <td><?= h($statisticalEdits->analyses_acceptable) ?></td>
                <td><?= h($statisticalEdits->analysis_comment) ?></td>
                <td><?= h($statisticalEdits->interim_safety) ?></td>
                <td><?= h($statisticalEdits->interim_planning) ?></td>
                <td><?= h($statisticalEdits->interim_description) ?></td>
                <td><?= h($statisticalEdits->interim_comment) ?></td>
                <td><?= h($statisticalEdits->statistical_acceptable) ?></td>
                <td><?= h($statisticalEdits->information_needed) ?></td>
                <td><?= h($statisticalEdits->overall_comment) ?></td>
                <td><?= h($statisticalEdits->file) ?></td>
                <td><?= h($statisticalEdits->dir) ?></td>
                <td><?= h($statisticalEdits->size) ?></td>
                <td><?= h($statisticalEdits->type) ?></td>
                <td><?= h($statisticalEdits->signature) ?></td>
                <td><?= h($statisticalEdits->chosen) ?></td>
                <td><?= h($statisticalEdits->created) ?></td>
                <td><?= h($statisticalEdits->deleted) ?></td>
                <td><?= h($statisticalEdits->additional) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Statisticals', 'action' => 'view', $statisticalEdits->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Statisticals', 'action' => 'edit', $statisticalEdits->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Statisticals', 'action' => 'delete', $statisticalEdits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $statisticalEdits->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
