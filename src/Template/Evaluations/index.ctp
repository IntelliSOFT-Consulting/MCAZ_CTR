<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Evaluation[]|\Cake\Collection\CollectionInterface $evaluations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Evaluation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="evaluations index large-9 medium-8 columns content">
    <h3><?= __('Evaluations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('application_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vulnerable_population') ?></th>
                <th scope="col"><?= $this->Paginator->sort('justification_adequate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adequate_provisions') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rationale_stated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hypothesis_explained') ?></th>
                <th scope="col"><?= $this->Paginator->sort('design_sound') ?></th>
                <th scope="col"><?= $this->Paginator->sort('criteria_complete') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subject_allocation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('procedures_appropriate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('drugs_described') ?></th>
                <th scope="col"><?= $this->Paginator->sort('appropriate_criteria') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clinical_procedures') ?></th>
                <th scope="col"><?= $this->Paginator->sort('laboratory_tests') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statistical_basis') ?></th>
                <th scope="col"><?= $this->Paginator->sort('information_sheet') ?></th>
                <th scope="col"><?= $this->Paginator->sort('proposed_study') ?></th>
                <th scope="col"><?= $this->Paginator->sort('explain_study') ?></th>
                <th scope="col"><?= $this->Paginator->sort('research_duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('full_description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nature_discomfort') ?></th>
                <th scope="col"><?= $this->Paginator->sort('possible_benefits') ?></th>
                <th scope="col"><?= $this->Paginator->sort('outline_procedure') ?></th>
                <th scope="col"><?= $this->Paginator->sort('conveyed_persons') ?></th>
                <th scope="col"><?= $this->Paginator->sort('participation_voluntary') ?></th>
                <th scope="col"><?= $this->Paginator->sort('compensation_provided') ?></th>
                <th scope="col"><?= $this->Paginator->sort('alternatives_participation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact_research') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subjects_illiterate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('conclude_statement') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cost_participants') ?></th>
                <th scope="col"><?= $this->Paginator->sort('incapable_consent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('research_outcome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('recruitment_material') ?></th>
                <th scope="col"><?= $this->Paginator->sort('material_claims') ?></th>
                <th scope="col"><?= $this->Paginator->sort('promises_inappropriate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('study_questionnaires') ?></th>
                <th scope="col"><?= $this->Paginator->sort('attached_proposal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lay_language') ?></th>
                <th scope="col"><?= $this->Paginator->sort('relevant_answer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('worded_sensitively') ?></th>
                <th scope="col"><?= $this->Paginator->sort('consent_information') ?></th>
                <th scope="col"><?= $this->Paginator->sort('embarrassing_questions') ?></th>
                <th scope="col"><?= $this->Paginator->sort('consent_participant') ?></th>
                <th scope="col"><?= $this->Paginator->sort('describe_confidentiality') ?></th>
                <th scope="col"><?= $this->Paginator->sort('interview_focus') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tapes_stored') ?></th>
                <th scope="col"><?= $this->Paginator->sort('there_placebo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('new_drug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('new_medicine') ?></th>
                <th scope="col"><?= $this->Paginator->sort('certificate_submitted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('medicines_registered') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adr_attached') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dsmb_established') ?></th>
                <th scope="col"><?= $this->Paginator->sort('names_dsmb') ?></th>
                <th scope="col"><?= $this->Paginator->sort('biological_materials') ?></th>
                <th scope="col"><?= $this->Paginator->sort('consent_volume') ?></th>
                <th scope="col"><?= $this->Paginator->sort('consent_procedure') ?></th>
                <th scope="col"><?= $this->Paginator->sort('consent_describe') ?></th>
                <th scope="col"><?= $this->Paginator->sort('consent_provision') ?></th>
                <th scope="col"><?= $this->Paginator->sort('consent_specimens') ?></th>
                <th scope="col"><?= $this->Paginator->sort('proposal_specimens') ?></th>
                <th scope="col"><?= $this->Paginator->sort('insurance_cover') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sponsor_sign') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sign_gcp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('run_study') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cvs_submitted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ethics_letter') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($evaluations as $evaluation): ?>
            <tr>
                <td><?= $this->Number->format($evaluation->id) ?></td>
                <td><?= $evaluation->has('user') ? $this->Html->link($evaluation->user->name, ['controller' => 'Users', 'action' => 'view', $evaluation->user->id]) : '' ?></td>
                <td><?= $evaluation->has('application') ? $this->Html->link($evaluation->application->id, ['controller' => 'Applications', 'action' => 'view', $evaluation->application->id]) : '' ?></td>
                <td><?= h($evaluation->vulnerable_population) ?></td>
                <td><?= h($evaluation->justification_adequate) ?></td>
                <td><?= h($evaluation->adequate_provisions) ?></td>
                <td><?= h($evaluation->rationale_stated) ?></td>
                <td><?= h($evaluation->hypothesis_explained) ?></td>
                <td><?= h($evaluation->design_sound) ?></td>
                <td><?= h($evaluation->criteria_complete) ?></td>
                <td><?= h($evaluation->subject_allocation) ?></td>
                <td><?= h($evaluation->procedures_appropriate) ?></td>
                <td><?= h($evaluation->drugs_described) ?></td>
                <td><?= h($evaluation->appropriate_criteria) ?></td>
                <td><?= h($evaluation->clinical_procedures) ?></td>
                <td><?= h($evaluation->laboratory_tests) ?></td>
                <td><?= h($evaluation->statistical_basis) ?></td>
                <td><?= h($evaluation->information_sheet) ?></td>
                <td><?= h($evaluation->proposed_study) ?></td>
                <td><?= h($evaluation->explain_study) ?></td>
                <td><?= h($evaluation->research_duration) ?></td>
                <td><?= h($evaluation->full_description) ?></td>
                <td><?= h($evaluation->nature_discomfort) ?></td>
                <td><?= h($evaluation->possible_benefits) ?></td>
                <td><?= h($evaluation->outline_procedure) ?></td>
                <td><?= h($evaluation->conveyed_persons) ?></td>
                <td><?= h($evaluation->participation_voluntary) ?></td>
                <td><?= h($evaluation->compensation_provided) ?></td>
                <td><?= h($evaluation->alternatives_participation) ?></td>
                <td><?= h($evaluation->contact_research) ?></td>
                <td><?= h($evaluation->subjects_illiterate) ?></td>
                <td><?= h($evaluation->conclude_statement) ?></td>
                <td><?= h($evaluation->cost_participants) ?></td>
                <td><?= h($evaluation->incapable_consent) ?></td>
                <td><?= h($evaluation->research_outcome) ?></td>
                <td><?= h($evaluation->recruitment_material) ?></td>
                <td><?= h($evaluation->material_claims) ?></td>
                <td><?= h($evaluation->promises_inappropriate) ?></td>
                <td><?= h($evaluation->study_questionnaires) ?></td>
                <td><?= h($evaluation->attached_proposal) ?></td>
                <td><?= h($evaluation->lay_language) ?></td>
                <td><?= h($evaluation->relevant_answer) ?></td>
                <td><?= h($evaluation->worded_sensitively) ?></td>
                <td><?= h($evaluation->consent_information) ?></td>
                <td><?= h($evaluation->embarrassing_questions) ?></td>
                <td><?= h($evaluation->consent_participant) ?></td>
                <td><?= h($evaluation->describe_confidentiality) ?></td>
                <td><?= h($evaluation->interview_focus) ?></td>
                <td><?= h($evaluation->tapes_stored) ?></td>
                <td><?= h($evaluation->there_placebo) ?></td>
                <td><?= h($evaluation->new_drug) ?></td>
                <td><?= h($evaluation->new_medicine) ?></td>
                <td><?= h($evaluation->certificate_submitted) ?></td>
                <td><?= h($evaluation->medicines_registered) ?></td>
                <td><?= h($evaluation->adr_attached) ?></td>
                <td><?= h($evaluation->dsmb_established) ?></td>
                <td><?= h($evaluation->names_dsmb) ?></td>
                <td><?= h($evaluation->biological_materials) ?></td>
                <td><?= h($evaluation->consent_volume) ?></td>
                <td><?= h($evaluation->consent_procedure) ?></td>
                <td><?= h($evaluation->consent_describe) ?></td>
                <td><?= h($evaluation->consent_provision) ?></td>
                <td><?= h($evaluation->consent_specimens) ?></td>
                <td><?= h($evaluation->proposal_specimens) ?></td>
                <td><?= h($evaluation->insurance_cover) ?></td>
                <td><?= h($evaluation->sponsor_sign) ?></td>
                <td><?= h($evaluation->sign_gcp) ?></td>
                <td><?= h($evaluation->run_study) ?></td>
                <td><?= h($evaluation->cvs_submitted) ?></td>
                <td><?= h($evaluation->ethics_letter) ?></td>
                <td><?= h($evaluation->deleted) ?></td>
                <td><?= h($evaluation->created) ?></td>
                <td><?= h($evaluation->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $evaluation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $evaluation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $evaluation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evaluation->id)]) ?>
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
