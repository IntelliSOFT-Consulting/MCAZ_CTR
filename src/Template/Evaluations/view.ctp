<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Evaluation $evaluation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Evaluation'), ['action' => 'edit', $evaluation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Evaluation'), ['action' => 'delete', $evaluation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evaluation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Evaluations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evaluation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="evaluations view large-9 medium-8 columns content">
    <h3><?= h($evaluation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $evaluation->has('user') ? $this->Html->link($evaluation->user->name, ['controller' => 'Users', 'action' => 'view', $evaluation->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= $evaluation->has('application') ? $this->Html->link($evaluation->application->id, ['controller' => 'Applications', 'action' => 'view', $evaluation->application->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vulnerable Population') ?></th>
            <td><?= h($evaluation->vulnerable_population) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Justification Adequate') ?></th>
            <td><?= h($evaluation->justification_adequate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adequate Provisions') ?></th>
            <td><?= h($evaluation->adequate_provisions) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rationale Stated') ?></th>
            <td><?= h($evaluation->rationale_stated) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hypothesis Explained') ?></th>
            <td><?= h($evaluation->hypothesis_explained) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Design Sound') ?></th>
            <td><?= h($evaluation->design_sound) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criteria Complete') ?></th>
            <td><?= h($evaluation->criteria_complete) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subject Allocation') ?></th>
            <td><?= h($evaluation->subject_allocation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Procedures Appropriate') ?></th>
            <td><?= h($evaluation->procedures_appropriate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Drugs Described') ?></th>
            <td><?= h($evaluation->drugs_described) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Appropriate Criteria') ?></th>
            <td><?= h($evaluation->appropriate_criteria) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clinical Procedures') ?></th>
            <td><?= h($evaluation->clinical_procedures) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Laboratory Tests') ?></th>
            <td><?= h($evaluation->laboratory_tests) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Statistical Basis') ?></th>
            <td><?= h($evaluation->statistical_basis) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Information Sheet') ?></th>
            <td><?= h($evaluation->information_sheet) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Proposed Study') ?></th>
            <td><?= h($evaluation->proposed_study) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Explain Study') ?></th>
            <td><?= h($evaluation->explain_study) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Research Duration') ?></th>
            <td><?= h($evaluation->research_duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Full Description') ?></th>
            <td><?= h($evaluation->full_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nature Discomfort') ?></th>
            <td><?= h($evaluation->nature_discomfort) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Possible Benefits') ?></th>
            <td><?= h($evaluation->possible_benefits) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Outline Procedure') ?></th>
            <td><?= h($evaluation->outline_procedure) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Conveyed Persons') ?></th>
            <td><?= h($evaluation->conveyed_persons) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Participation Voluntary') ?></th>
            <td><?= h($evaluation->participation_voluntary) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Compensation Provided') ?></th>
            <td><?= h($evaluation->compensation_provided) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alternatives Participation') ?></th>
            <td><?= h($evaluation->alternatives_participation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Research') ?></th>
            <td><?= h($evaluation->contact_research) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subjects Illiterate') ?></th>
            <td><?= h($evaluation->subjects_illiterate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Conclude Statement') ?></th>
            <td><?= h($evaluation->conclude_statement) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cost Participants') ?></th>
            <td><?= h($evaluation->cost_participants) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Incapable Consent') ?></th>
            <td><?= h($evaluation->incapable_consent) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Research Outcome') ?></th>
            <td><?= h($evaluation->research_outcome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Recruitment Material') ?></th>
            <td><?= h($evaluation->recruitment_material) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Material Claims') ?></th>
            <td><?= h($evaluation->material_claims) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Promises Inappropriate') ?></th>
            <td><?= h($evaluation->promises_inappropriate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Study Questionnaires') ?></th>
            <td><?= h($evaluation->study_questionnaires) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attached Proposal') ?></th>
            <td><?= h($evaluation->attached_proposal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lay Language') ?></th>
            <td><?= h($evaluation->lay_language) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Relevant Answer') ?></th>
            <td><?= h($evaluation->relevant_answer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Worded Sensitively') ?></th>
            <td><?= h($evaluation->worded_sensitively) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Consent Information') ?></th>
            <td><?= h($evaluation->consent_information) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Embarrassing Questions') ?></th>
            <td><?= h($evaluation->embarrassing_questions) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Consent Participant') ?></th>
            <td><?= h($evaluation->consent_participant) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Describe Confidentiality') ?></th>
            <td><?= h($evaluation->describe_confidentiality) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Interview Focus') ?></th>
            <td><?= h($evaluation->interview_focus) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tapes Stored') ?></th>
            <td><?= h($evaluation->tapes_stored) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('There Placebo') ?></th>
            <td><?= h($evaluation->there_placebo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('New Drug') ?></th>
            <td><?= h($evaluation->new_drug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('New Medicine') ?></th>
            <td><?= h($evaluation->new_medicine) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Certificate Submitted') ?></th>
            <td><?= h($evaluation->certificate_submitted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Medicines Registered') ?></th>
            <td><?= h($evaluation->medicines_registered) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adr Attached') ?></th>
            <td><?= h($evaluation->adr_attached) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dsmb Established') ?></th>
            <td><?= h($evaluation->dsmb_established) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Names Dsmb') ?></th>
            <td><?= h($evaluation->names_dsmb) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Biological Materials') ?></th>
            <td><?= h($evaluation->biological_materials) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Consent Volume') ?></th>
            <td><?= h($evaluation->consent_volume) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Consent Procedure') ?></th>
            <td><?= h($evaluation->consent_procedure) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Consent Describe') ?></th>
            <td><?= h($evaluation->consent_describe) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Consent Provision') ?></th>
            <td><?= h($evaluation->consent_provision) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Consent Specimens') ?></th>
            <td><?= h($evaluation->consent_specimens) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Proposal Specimens') ?></th>
            <td><?= h($evaluation->proposal_specimens) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Insurance Cover') ?></th>
            <td><?= h($evaluation->insurance_cover) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sponsor Sign') ?></th>
            <td><?= h($evaluation->sponsor_sign) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sign Gcp') ?></th>
            <td><?= h($evaluation->sign_gcp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Run Study') ?></th>
            <td><?= h($evaluation->run_study) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cvs Submitted') ?></th>
            <td><?= h($evaluation->cvs_submitted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ethics Letter') ?></th>
            <td><?= h($evaluation->ethics_letter) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($evaluation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($evaluation->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($evaluation->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($evaluation->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Vulnerable Population Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($evaluation->vulnerable_population_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Scientific Issues Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($evaluation->scientific_issues_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Informed Consent Text') ?></h4>
        <?= $this->Text->autoParagraph(h($evaluation->informed_consent_text)); ?>
    </div>
    <div class="row">
        <h4><?= __('Other Materials Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($evaluation->other_materials_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Clinical Trials Text') ?></h4>
        <?= $this->Text->autoParagraph(h($evaluation->clinical_trials_text)); ?>
    </div>
    <div class="row">
        <h4><?= __('Biological Materials Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($evaluation->biological_materials_comments)); ?>
    </div>
    <div class="row">
        <h4><?= __('Recommendations') ?></h4>
        <?= $this->Text->autoParagraph(h($evaluation->recommendations)); ?>
    </div>
</div>
