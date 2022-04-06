<?php

use Cake\Utility\Hash;

$numb = 1;
$checked = '<i class="fa fa-check-square-o" aria-hidden="true"></i>';
$nChecked = '<i class="fa fa-square-o" aria-hidden="true"></i>';

if ($prefix === 'manager') {
    $this->Html->css('bootstrap-editable', ['block' => true]);
    $this->Html->css('bootstrap/common_header', ['block' => true]);
    $this->Html->script('bootstrap/bootstrap-editable', ['block' => true]);
    $this->Html->script('bootstrap/evaluation_report', ['block' => true]);
    //--wysiwyg editor    
    $this->Html->css('bootstrap/bootstrap-wysihtml5', ['block' => true]);
    $this->Html->script('bootstrap/wysihtml5-0.3.0', ['block' => true]);
    $this->Html->script('bootstrap/bootstrap-wysihtml5', ['block' => true]);
    $this->Html->script('bootstrap/wysihtml5', ['block' => true]);
}

?>
<div class="row">
    <div class="col-xs-12">
        <?php
        foreach ($clinicals as $clinical) { ?>

        <div class="thumbnail amend-form">
            <a class="btn btn-primary" role="button" data-toggle="collapse"
                href="#<?= $clinical->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>" aria-expanded="false"
                aria-controls="<?= $clinical->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>">
                Assessed on: <?= $clinical['created'] ?>
            </a>
        </div>
        <div class="<?= ($this->request->params['_ext'] != 'pdf') ? 'collapse' : ''; ?>"
            id="<?= $clinical->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>">
            <table class="table table-bordered table-condensed">
                <tbody>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>If the trial is low interventional, describe briefly the justification
                                        provided by
                                        the sponsor:</label><br>
                                    <?= $clinical->sponsor_justification ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Is the justification for a low-intervention clinical trial as provided by the
                            sponsor is acceptable:</td>
                        <td>

                            <?= $clinical->low_intervention ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label><br>

                                    <?= $clinical->sponsor_comment ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Is the investigational medical products used in the study, excluding
                            placebos, are not authorised</td>
                        <td>

                            <?= $clinical->products_authorised ?>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Is the investigational medical products are not used in accordance with
                            the terms of the marketing authorisation and the use of the
                            investigational medical products is not evidence-based</td>
                        <td>

                            <?= $clinical->evidence_based ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The additional diagnostic or monitoring procedures pose more than
                            minimal additional risk or burden to the safety of the
                            participants compared to normal clinical practice</td>
                        <td>

                            <?= $clinical->poses_risk ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Additional Comments</label>
                                    <br>

                                    <?= $clinical->posed_risks_comment ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Phase of the trial: (if in disagreement with the study phase
                                        proposed):</label><br>


                                    <?= $clinical->trial_phase ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Therapeutic condition: (Brief description of the disease):</label>
                                    <br>

                                    <?= $clinical->therapeutic_condition ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Mechanism of action, drug class:</label>
                                    <br>

                                    <?= $clinical->action_mechanism ?>

                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Status of development: </strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Assessor’s discussion on the clinical development::</label>
                                    <br>

                                    <?= $clinical->development_status ?>

                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong>Proposed clinical trial </strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Is the rationale for the trial provided by the sponsor
                            acceptable?</td>
                        <td>

                            <?= $clinical->rationale_acceptable ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Clinical trial Rationale Comments:</label><br>
                                    <?= $clinical->assessor_discussion ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Primary objective(s) and endpoint(s) </strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The primary objective(s) are clearly defined and
                            measurable and are acceptable</td>
                        <td>
                            <?= $clinical->objective_acceptable ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The primary endpoint(s) are acceptable</td>
                        <td>

                            <?= $clinical->endpoint_acceptable ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Primary O/E Comments:</label>
                                    <br>

                                    <?= $clinical->objective_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Secondary objective(s) and endpoint(s) </strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The secondary objective(s) are clearly defined and
                            measurable and are acceptable</td>
                        <td>

                            <?= $clinical->secondary_objective_acceptable ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The secondary endpoint(s) are acceptable</td>
                        <td>

                            <?= $clinical->secondary_endpoint_acceptable ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Secondary O/E Comments:</label>
                                    <br>

                                    <?= $clinical->secondary_objective_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Study population as per the study protocol </strong></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="2">
                            <div class="row">
                                <div class="col-xs-4">

                                    <div class="entry">
                                        <span class="editer">
                                            <?= ($clinical->study_health_participants) ? $checked : $nChecked; ?>
                                            Healthy volunteers <br>
                                        </span>

                                    </div>
                                    <div class="entry">
                                        <span class="editer">
                                            <?= ($clinical->study_participants) ? $checked : $nChecked; ?>
                                            Participants <br>
                                        </span>
                                    </div>

                                </div>
                                <div class="col-xs-4">

                                    <div class="entry">
                                        <span class="editer">
                                            <?= ($clinical->study_adults) ? $checked : $nChecked; ?>
                                            Adults <br>
                                        </span>
                                    </div>
                                    <div class="entry">
                                        <span class="editer">
                                            <?= ($clinical->study_adolescent) ? $checked : $nChecked; ?>
                                            Children/adolescents <br>
                                        </span>
                                    </div>
                                    <label> Age group if children/adolescents proposed:</label>
                                    <br>
                                    <?= $clinical->adolescents_age_group ?>

                                    <div class="entry">
                                        <span class="editer">
                                            <?= ($clinical->study_elderly) ? $checked : $nChecked; ?>
                                            Elderly ≥65 years <br>
                                        </span>
                                    </div>


                                </div>
                                <div class="col-xs-4">
                                    <div class="entry">
                                        <span class="editer">
                                            <?= ($clinical->study_male) ? $checked : $nChecked; ?>
                                            Male <br>
                                        </span>
                                    </div>
                                    <div class="entry">
                                        <span class="editer">
                                            <?= ($clinical->study_female) ? $checked : $nChecked; ?>
                                            Female <br>
                                        </span>
                                    </div>
                                    <label> Women of childbearing potential on contraception, provide numbers:</label>
                                    <br>
                                    <?= $clinical->potential_contraception ?>

                                    <label>Women of childbearing potential not on contraception, provide
                                        numbers:</label>
                                    <br>
                                    <?= $clinical->potential_none_contraception ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Study Population Comments:</label> <br>
                                    <?= $clinical->study_population_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Inclusion criteria </strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The inclusion criteria are rationally defined,
                            representative of the target population and are
                            acceptable</td>
                        <td>
                            <?= $clinical->inclusion_acceptable ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Inclusion criteria Comments:</label>
                                    <br>

                                    <?= $clinical->inclusion_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Exclusion criteria </strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The exclusion criteria are rationally defined and in
                            accordance with IMP/comparator’s safety profile:</td>
                        <td>

                            <?= $clinical->exclusion_acceptable ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Exclusion criteria Comments:</label>
                                    <br>

                                    <?= $clinical->exclusion_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong>Vulnerable populations and clinical trials in emergency situations </strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Vulnerable populations are included in the study:</td>
                        <td>

                            <?= $clinical->vulnerable_population ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The inclusion of the vulnerable population is justifiable
                            and the benefit/risk profile is acceptable:</td>
                        <td>

                            <?= $clinical->justifiable_population ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>For emergency clinical trials only: Does the trial
                            provide clinically relevant direct benefit to the participants?:</td>
                        <td>

                            <?= $clinical->clinical_benefit ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Vulnerable populations Comments:</label>
                                    <br>

                                    <?= $clinical->vulnerable_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Study plan and design </strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Is the proposed study plan and design acceptable?</td>
                        <td>

                            <?= $clinical->proposed_study_acceptable ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Study Plan Comments:</label>
                                    <br>

                                    <?= $clinical->study_plan_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Study treatment </strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Is the justification for the dose(s)/dose steps, dose rationale, route of
                            administration, schedule, treatment duration, and dose modifications of the
                            IMP acceptable? </td>
                        <td>

                            <?= $clinical->imp_acceptable ?>
                        </td>
                        <td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>

                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> If other, please provide comment:</label>
                                    <br>

                                    <?= $clinical->imp_other ?>

                                </div>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Study Plan Comments:</label>
                                    <br>

                                    <?= $clinical->imp_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Comparator IMP(s)/placebo/Auxiliary medical product(s) </strong></td>
                        <td></td>
                    </tr>
                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Comparator IMP(s) </strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> The study protocol proposes the use of a comparator IMP </td>
                        <td>

                            <?= $clinical->comparator_usage ?>
                        </td>
                        <td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Brief information on the comparator:</label>
                                    <br>

                                    <?= $clinical->comparator_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="2">
                            <div class="row">
                                <div class="col-xs-4">
                                    <label> The comparator is a standard therapy as per;</label>


                                    <?= ($clinical->comparator_smpc) ? $checked : $nChecked; ?>
                                    The SmPC

                                    <?= ($clinical->comparator_international) ? $checked : $nChecked; ?>
                                    International or national guidelines

                                    <?= ($clinical->comparator_publications) ? $checked : $nChecked; ?>
                                    Scientific publications

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> The use of the comparator is justified and is acceptable: </td>
                        <td>

                            <?= $clinical->comparacomparator_acceptabletor_comments ?>
                        </td>
                        <td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comparator Comments:</label>
                                    <br>

                                    <?= $clinical->comparator_workspace_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Placebo </strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Does the study protocol proposes the use of a Placebo </td>
                        <td>

                            <?= $clinical->placebo_usage ?>
                        </td>
                        <td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Is the use of a placebo controlled design sufficiently justified: </td>
                        <td>

                            <?= $clinical->placebo_justified ?>
                        </td>
                        <td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Placebo Comments:</label>
                                    <br>

                                    <?= $clinical->placebo_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Auxiliary medical product(s) </strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Does the study protocol proposes the use of an auxiliary medical product(s)</td>
                        <td>

                            <?= $clinical->auxiliary_usage ?>
                        </td>
                        <td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Is the use of auxiliary medical products in the trial is justified and acceptable: </td>
                        <td>

                            <?= $clinical->auxiliary_justified ?>
                        </td>
                        <td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Auxiliary Comments:</label>
                                    <br>

                                    <?= $clinical->auxiliary_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Additional considerations for trials using a medical device </strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Does the trial includes the investigation of a medical device(s) that is considered
                            acceptable?
                        </td>
                        <td>

                            <?= $clinical->medical_device_justified ?>
                        </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Medical Device Usage Comments:</label>
                                    <br>

                                    <?= $clinical->medical_device_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Safety: List of important safety risks associated with trial treatments
                                        (IMP/comparator/auxiliary medical products/medical devices):</label>
                                    <br>

                                    <?= $clinical->associated_risks_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Blinding and unblinding-clinical aspects (where applicable) </strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Does the procedure for emergency unbinding is described in the protocol and is acceptable?
                        </td>
                        <td>

                            <?= $clinical->emergency_procedure_justified ?>
                        </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> In the case where a particular laboratory finding or a specific adverse reaction might
                            reveal
                            the treatment allocation, are there additional measures in place to protect the blinding?
                        </td>
                        <td>

                            <?= $clinical->additional_measures ?>
                        </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Additional Comments:</label>
                                    <br>

                                    <?= $clinical->unbinding_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Contraception measures </strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Based on non-clinical and clinical data, the risk of teratogenicity/fetotoxicity in early
                            pregnancy is:
                        </td>
                        <td>

                            <?= $clinical->teratogenicity_risk ?>
                        </td>


                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Are contraceptive measures adequately defined and acceptable?
                        </td>
                        <td>

                            <?= $clinical->contraceptive_acceptable ?>
                        </td>

                    </tr>
                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> If No - tick appropriate box below and provide comment </strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($clinical->proposal_insufficient) ? $checked : $nChecked; ?>
                                    Method of contraception proposed for WOCBP in the study is insufficient or an
                                    effective method
                                    is listed as a highly effective method (e.g. double barrier)<br>
                                </span>

                            </div>

                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <br>

                                    <?= $clinical->proposal_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($clinical->male_participants) ? $checked : $nChecked; ?>
                                    Contraception for male participants is required but is not included or is
                                    insufficient in the protocol<br>
                                </span>

                            </div>

                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <br>

                                    <?= $clinical->male_participants_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($clinical->contraception_treatment) ? $checked : $nChecked; ?>Contraception
                                    after the end of treatment is not included in the protocol or the duration of this
                                    contraception is insufficient<br>
                                </span>

                            </div>

                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <br>

                                    <?= $clinical->contraception_treatment_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($clinical->pregnancy_interval) ? $checked : $nChecked; ?>Pregnancy testing at
                                    screening is not included or there is an inappropriate interval from time of
                                    pregnancy test to start of treatment<br>
                                </span>

                            </div>

                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <br>

                                    <?= $clinical->pregnancy_interval_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($clinical->pregnancy_test) ? $checked : $nChecked; ?>Insufficient frequency of
                                    pregnancy tests during the study (as per CTFG guidelines)<br>
                                </span>

                            </div>

                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <br>

                                    <?= $clinical->pregnancy_test_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($clinical->postmenopausal) ? $checked : $nChecked; ?>Definition of WOCBP or
                                    postmenopausal woman is not included in the study protocol or is inadequate<br>
                                </span>

                            </div>

                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <br>

                                    <?= $clinical->postmenopausal_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($clinical->other_issue) ? $checked : $nChecked; ?>Other Issue<br>
                                </span>

                            </div>

                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label> <br>

                                    <?= $clinical->other_issue_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> General Comments:</label>
                                    <br>
                                    <?= $clinical->general_contraception_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Discontinuation criteria for participants and stopping criteria </strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Does the protocol includes discontinuation criteria for participants from treatment or from
                            the
                            trial, and procedures to collect data those who withdraw
                        </td>
                        <td>

                            <?= $clinical->discontinuation_criteria ?>
                        </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Are these criteria and procedures are considered acceptable
                        </td>
                        <td>

                            <?= $clinical->criteria_acceptable ?>
                        </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Are the Clinical trial termination criteria included in the protocol and are acceptable?
                        </td>
                        <td>

                            <?= $clinical->termination_criteria_acceptable ?>
                        </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> General Comments:</label>
                                    <br>

                                    <?= $clinical->discontinuation_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Other concomitant therapy</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Is a description of permitted medications included in the study protocol and is acceptable
                        </td>
                        <td>

                            <?= $clinical->permitted_concomitant ?>
                        </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Is a description of prohibited medications included in the study protocol and is acceptable
                        </td>
                        <td>

                            <?= $clinical->prohibited_concomitant ?>
                        </td>

                    </tr>


                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> General Comments:</label>
                                    <br>

                                    <?= $clinical->concomitant_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Safety and Monitoring</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td><strong> Study procedures, visits and monitoring of participants, and follow up</strong>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Are the study procedures, study visits, monitoring of participants, risk minimization
                            measures
                            and follow up adequately described and acceptable?
                        </td>
                        <td>

                            <?= $clinical->procedures_adequate ?>
                        </td>

                    </tr>
                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> If No - tick the appropriate box and comment</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($clinical->insufficient_frequency) ? $checked : $nChecked; ?>Is the frequency
                                    of the study visits/monitoring insufficient?<br>
                                </span>

                            </div>

                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <br>

                                    <?= $clinical->frequency_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($clinical->relevant_targets) ? $checked : $nChecked; ?>Are the relevant targets
                                    not monitored?<br>
                                </span>

                            </div>

                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>

                                    <br>

                                    <?= $clinical->relevant_targets_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($clinical->minimization_measures) ? $checked : $nChecked; ?>Are the proposed
                                    risk minimization measures and risk management guidelines (including monitoring,
                                    treatment modifications in case of toxicities) not acceptable?<br>
                                </span>

                            </div>

                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>

                                    <br>

                                    <?= $clinical->relevant_targeminimization_measures_commentsts_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($clinical->risk_unacceptable) ? $checked : $nChecked; ?>Are Risks associated
                                    with the study procedures including diagnostic procedures unacceptable?<br>
                                </span>

                            </div>

                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <br>

                                    <?= $clinical->risk_unacceptable_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($clinical->insufficient_followup) ? $checked : $nChecked; ?>Is the follow-up
                                    period after the treatment is completed or after adverse reactions insufficient<br>
                                </span>

                            </div>
                            <?php
                                echo $this->Form->control('clinicals.' . $ekey . '.', ['type' => 'checkbox', 'label' => '', 'templates' => 'checkbox_form_ev']);
                                ?>
                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <br>

                                    <?= $clinical->insufficient_followup_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($clinical->other_safety) ? $checked : $nChecked; ?>Other Issues<br>
                                </span>
                            </div>

                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <br>

                                    <?= $clinical->other_safety_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> General Comments:</label>
                                    <br>

                                    <?= $clinical->general_safety_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Reference Safety Information</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Reference Safety Information (RSI) is included in the SmPC or IB
                        </td>
                        <td>

                            <?= $clinical->rsi_included ?>
                        </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The document proposed as the RSI (SmPC or IB) is acceptable
                        </td>
                        <td>

                            <?= $clinical->acceptable_document ?>
                        </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The format of the RSI is acceptable (where IB is used)
                        </td>
                        <td>

                            <?= $clinical->acceptable_format ?>
                        </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The list of the proposed ARs declared as “expected” is acceptable (where IB is used)
                        </td>
                        <td>

                            <?= $clinical->expected_acceptable ?>
                        </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> General Comments:</label>
                                    <br>

                                    <?= $clinical->general_irs_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Data Safety Monitoring Committee (if applicable)</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The trial has a data safety monitoring committee
                        </td>
                        <td>

                            <?= $clinical->dsmc_committee ?>
                        </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> In cases where the trial has a DSMC, are the arrangements considered acceptable?
                        </td>
                        <td>

                            <?= $clinical->arrangements_acceptable ?>
                        </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> General Comments:</label>
                                    <br>

                                    <?= $clinical->dsmc_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Definition of the end of the trial</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> A definition of the end of trial is provided and acceptable?
                        </td>
                        <td>

                            <?= $clinical->trial_definition_acceptable ?>
                        </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> General Comments:</label>
                                    <br>

                                    <?= $clinical->trial_definition_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Biological samples used in the study (if applicable)</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Are the Procedures for the collection, storage and future use of biological samples not
                            described adequately or not acceptable?.
                        </td>
                        <td>

                            <?= $clinical->collection_unacceptable ?>
                        </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> General Comments:</label>
                                    <br>
                                    <?= $clinical->collection_unacceptable_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Data protection</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($clinical->data_policies_acceptable) ? $checked : $nChecked; ?>The data
                                    protection policies as described in the protocol are not acceptable.<br>
                                </span>
                            </div>

                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <br>
                                    <?= $clinical->data_policies_acceptable_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($clinical->unauthorised_unacceptable) ? $checked : $nChecked; ?>Organisational
                                    and technical arrangements to avoid unauthorised access, disclosure, dissemination,
                                    alteration or loss of information and personal data processed are insufficiently
                                    described or are unacceptable.<br>
                                </span>
                            </div>

                        </td>

                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <br>
                                    <?= $clinical->unauthorised_unacceptable_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($clinical->measures_unacceptable) ? $checked : $nChecked; ?>Measures to ensure
                                    confidentiality of records and personal data of participants are insufficiently
                                    described or are unacceptable.<br>
                                </span>
                            </div>

                        </td>

                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <br>
                                    <?= $clinical->measures_unacceptable_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($clinical->breach_unacceptable) ? $checked : $nChecked; ?>Measures that will be
                                    implemented in case of data security breach are insufficiently described or are
                                    unacceptable.<br>
                                </span>
                            </div>

                        </td>

                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <br>
                                    <?= $clinical->breach_unacceptable_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($clinical->other_protection) ? $checked : $nChecked; ?>Other Data protection
                                    issues.<br>
                                </span>
                            </div>

                        </td>

                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <br>
                                    <?= $clinical->other_protection_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> General Comments:</label>
                                    <br>
                                    <?= $clinical->data_protection_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Recruitment and informed consent procedures</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($clinical->recruitment_unacceptable) ? $checked : $nChecked; ?>Recruitment and
                                    informed consent procedure as described in the study protocol are not acceptable
                                    and/or not in compliance with ethical requirements on the protection of participants
                                    in clinical trials and informed consent<br>
                                </span>
                            </div>

                        </td>

                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <br>
                                    <?= $clinical->recruitment_unacceptable_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> General Comments:</label>
                                    <br>
                                    <?= $clinical->recruitment_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Benefit/risk assessment</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The protocol contains an acceptable evaluation of the anticipated benefits and risks of
                            participating in the trial.
                        </td>
                        <td><?= $clinical->risk_evaluation_unacceptable ?></td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Are the measures proposed to address the known and potential risks of participating in the
                            trial
                            and to protect participants acceptable?
                        </td>
                        <td><?= $clinical->participants_protection_acceptable ?></td>


                    </tr>

                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> If No - tick the appropriate box below and provide a comment</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($clinical->condition_unmonitored) ? $checked : $nChecked; ?>Based on medical
                                    and ethical principles the anticipated benefits to the participants or to public
                                    health do not justify the foreseeable risks and inconveniences, or compliance with
                                    this condition is not constantly monitoredt<br>
                                </span>
                            </div>

                        </td>

                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <br>
                                    <?= $clinical->condition_unmonitored_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($clinical->unsafeguarded_rights) ? $checked : $nChecked; ?> Rights of the
                                    participants to physical and mental integrity, and privacy are insufficiently
                                    safeguarded in the study<br>
                                </span>
                            </div>

                        </td>

                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <br>
                                    <?= $clinical->unsafeguarded_rights_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($clinical->unmonitored_threshold) ? $checked : $nChecked; ?> The clinical trial
                                    has not been designed to involve as little pain, discomfort, fear and any other
                                    foreseeable risk as possible, or both the risk threshold and the degree of distress
                                    are not defined in the protocol or are not monitored<br>
                                </span>
                            </div>

                        </td>

                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <br>
                                    <?= $clinical->unmonitored_threshold_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> General Comments:</label>
                                    <br>
                                    <?= $clinical->risk_assessment_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> Assessor’s overall conclusions on the clinical part</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($clinical->application_acceptable) ? $checked : $nChecked; ?> The clinical
                                    aspects of the application are acceptable<br>
                                </span>
                            </div>

                        </td>

                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <br>
                                    <?= $clinical->application_acceptable_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="entry">
                                <span class="editer">
                                    <?= ($clinical->supplementary_required) ? $checked : $nChecked; ?> Supplementary
                                    information needs to be provided (refer to the list of requests for additional
                                    information)<br>
                                </span>
                            </div>

                        </td>

                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <br>
                                    <?= $clinical->supplementary_required_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Overall comment/ conclusion on the clinical assessment:</label>
                                    <br>
                                    <?= $clinical->overal_assessment_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
            <?php
                if ($this->request->params['_ext'] != 'pdf') {
                    if ($prefix == 'manager' or $clinical->user_id == $this->request->session()->read('Auth.User.id')) {
                        echo    $this->Form->postLink(
                            '<span class="fa fa-trash" aria-hidden="true"></span> Delete',
                            ['action' => 'remove-clinical-assessment', $clinical->id],
                            [
                                'confirm' => 'Are you sure you want to delete this clinical assessment for ' . $application->protocol_no . '?', 'escape' => false,
                                'class' => 'btn btn-warning btn-xs active'
                            ]
                        );
                    }
                }
                ?>
        </div>
        <?php } ?>

    </div>
</div>