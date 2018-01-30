<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Evaluation $evaluation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Evaluations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="evaluations form large-9 medium-8 columns content">
    <?= $this->Form->create($evaluation) ?>
    <fieldset>
        <legend><?= __('Add Evaluation') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('application_id', ['options' => $applications, 'empty' => true]);
            echo $this->Form->control('vulnerable_population');
            echo $this->Form->control('justification_adequate');
            echo $this->Form->control('adequate_provisions');
            echo $this->Form->control('vulnerable_population_comments');
            echo $this->Form->control('rationale_stated');
            echo $this->Form->control('hypothesis_explained');
            echo $this->Form->control('design_sound');
            echo $this->Form->control('criteria_complete');
            echo $this->Form->control('subject_allocation');
            echo $this->Form->control('procedures_appropriate');
            echo $this->Form->control('drugs_described');
            echo $this->Form->control('appropriate_criteria');
            echo $this->Form->control('clinical_procedures');
            echo $this->Form->control('laboratory_tests');
            echo $this->Form->control('statistical_basis');
            echo $this->Form->control('scientific_issues_comments');
            echo $this->Form->control('information_sheet');
            echo $this->Form->control('proposed_study');
            echo $this->Form->control('explain_study');
            echo $this->Form->control('research_duration');
            echo $this->Form->control('full_description');
            echo $this->Form->control('nature_discomfort');
            echo $this->Form->control('possible_benefits');
            echo $this->Form->control('outline_procedure');
            echo $this->Form->control('conveyed_persons');
            echo $this->Form->control('participation_voluntary');
            echo $this->Form->control('compensation_provided');
            echo $this->Form->control('alternatives_participation');
            echo $this->Form->control('contact_research');
            echo $this->Form->control('subjects_illiterate');
            echo $this->Form->control('conclude_statement');
            echo $this->Form->control('cost_participants');
            echo $this->Form->control('incapable_consent');
            echo $this->Form->control('research_outcome');
            echo $this->Form->control('informed_consent_text');
            echo $this->Form->control('recruitment_material');
            echo $this->Form->control('material_claims');
            echo $this->Form->control('promises_inappropriate');
            echo $this->Form->control('study_questionnaires');
            echo $this->Form->control('attached_proposal');
            echo $this->Form->control('lay_language');
            echo $this->Form->control('relevant_answer');
            echo $this->Form->control('worded_sensitively');
            echo $this->Form->control('consent_information');
            echo $this->Form->control('embarrassing_questions');
            echo $this->Form->control('consent_participant');
            echo $this->Form->control('describe_confidentiality');
            echo $this->Form->control('interview_focus');
            echo $this->Form->control('tapes_stored');
            echo $this->Form->control('other_materials_comments');
            echo $this->Form->control('there_placebo');
            echo $this->Form->control('new_drug');
            echo $this->Form->control('new_medicine');
            echo $this->Form->control('certificate_submitted');
            echo $this->Form->control('medicines_registered');
            echo $this->Form->control('adr_attached');
            echo $this->Form->control('dsmb_established');
            echo $this->Form->control('names_dsmb');
            echo $this->Form->control('clinical_trials_text');
            echo $this->Form->control('biological_materials');
            echo $this->Form->control('consent_volume');
            echo $this->Form->control('consent_procedure');
            echo $this->Form->control('consent_describe');
            echo $this->Form->control('consent_provision');
            echo $this->Form->control('consent_specimens');
            echo $this->Form->control('proposal_specimens');
            echo $this->Form->control('insurance_cover');
            echo $this->Form->control('sponsor_sign');
            echo $this->Form->control('sign_gcp');
            echo $this->Form->control('run_study');
            echo $this->Form->control('cvs_submitted');
            echo $this->Form->control('ethics_letter');
            echo $this->Form->control('biological_materials_comments');
            echo $this->Form->control('recommendations');
            echo $this->Form->control('deleted', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
