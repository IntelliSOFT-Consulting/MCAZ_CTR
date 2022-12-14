<?php
$numb = 1;

use Cake\Utility\Hash;



if (!in_array($prefix, ['director_general', 'admin']) and count(array_filter(Hash::extract($application->evaluations, '{n}.chosen'), 'is_numeric')) < 1) {
    echo $this->Form->create($application, ['type' => 'file', 'url' => ['action' => 'add-clinical-review']]); ?>
    <div class="row">
        <div class="col-xs-12">
            <?php
            echo $this->Form->control('application_pr_id', ['type' => 'hidden', 'value' => $application->id, 'escape' => false, 'templates' => 'table_form']);
            echo $this->Form->control('clinical_pr_id', ['type' => 'hidden', 'value' => (!empty($application->clinicals[$ekey]['id']) ? $application->clinicals[$ekey]['id'] : 100), 'escape' => false, 'templates' => 'table_form']);
            if ($this->request->query('cnl_id')) {
                echo $this->Form->control('clinicals.' . $ekey . '.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
                echo $this->Form->control('clinicals.' . $ekey . '.clinical_id', ['type' => 'hidden', 'value' => $clinical_id, 'templates' => 'table_form']);
                echo $this->Form->control('clinicals.' . $ekey . '.evaluation_type', [
                    'type' => 'hidden',
                    'value' => ($clinical_id) ? 'Revision' : 'Initial',
                    'templates' => 'table_form'
                ]);
            } elseif ($this->request->query('cp_fn_cnl')) {
                echo $this->Form->control('clinicals.' . $ekey . '.submitted', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form', 'value' => 2]);
                echo $this->Form->control('clinicals.' . $ekey . '.clinical_id', ['type' => 'hidden', 'value' => $clinical_id, 'templates' => 'table_form']);
                echo $this->Form->control('clinicals.' . $ekey . '.evaluation_type', [
                    'type' => 'hidden',
                    'value' => ($clinical_id) ? 'Revision' : 'Initial',
                    'templates' => 'table_form'
                ]);
            } else {
                echo $this->Form->control('clinicals.' . $ekey . '.clinical_id', ['type' => 'hidden', 'value' => $clinical_id, 'templates' => 'table_form']);
                echo $this->Form->control('clinicals.' . $ekey . '.evaluation_type', [
                    'type' => 'hidden',
                    'value' => ($clinical_id) ? 'Revision' : 'Initial',
                    'templates' => 'table_form'
                ]);
            }
            echo $this->Form->control('clinicals.' . $ekey . '.user_id', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.id'), 'templates' => 'table_form']);

            ?>

            <table class="table table-bordered table-condensed">
                <thead>
                    <tr class="active">
                        <th></th>
                        <th>1.1 Background information<br>1.1.1 Trial category <br>1.1.1.1 For low-intervention
                            clinical trials1 only</th>
                        <th width="22.5%"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>If the trial is low interventional, describe briefly the justification
                                        provided by
                                        the sponsor:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.sponsor_justification', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Is the justification for a low-intervention clinical trial as provided by the
                            sponsor is acceptable:</td>
                        <td>
                            <?= $this->Form->control('clinicals.' . $ekey . '.low_intervention', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.sponsor_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Is the investigational medical products used in the study, excluding
                            placebos, are not authorised</td>
                        <td>
                            <?= $this->Form->control('clinicals.' . $ekey . '.products_authorised', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Is the investigational medical products are not used in accordance with
                            the terms of the marketing authorisation and the use of the
                            investigational medical products is not evidence-based</td>
                        <td>
                            <?= $this->Form->control('clinicals.' . $ekey . '.evidence_based', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The additional diagnostic or monitoring procedures pose more than
                            minimal additional risk or burden to the safety of the
                            participants compared to normal clinical practice</td>
                        <td>
                            <?= $this->Form->control('clinicals.' . $ekey . '.poses_risk', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Additional Comments</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.posed_risks_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Phase of the trial: (if in disagreement with the study phase proposed):</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.trial_phase', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.therapeutic_condition', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.action_mechanism', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.development_status', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                            <?= $this->Form->control('clinicals.' . $ekey . '.rationale_acceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Clinical trial Rationale Comments:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.assessor_discussion', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                            <?= $this->Form->control('clinicals.' . $ekey . '.objective_acceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The primary endpoint(s) are acceptable</td>
                        <td>
                            <?= $this->Form->control('clinicals.' . $ekey . '.endpoint_acceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Primary O/E Comments:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.objective_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                            <?= $this->Form->control('clinicals.' . $ekey . '.secondary_objective_acceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The secondary endpoint(s) are acceptable</td>
                        <td>
                            <?= $this->Form->control('clinicals.' . $ekey . '.secondary_endpoint_acceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Secondary O/E Comments:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.secondary_objective_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.study_health_participants', ['type' => 'checkbox', 'label' => 'Healthy volunteers', 'templates' => 'checkbox_form_ev']);
                                    echo $this->Form->control('clinicals.' . $ekey . '.study_participants', ['type' => 'checkbox', 'label' => 'Participants', 'templates' => 'checkbox_form_ev']);
                                    ?>
                                </div>
                                <div class="col-xs-4">
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.study_adults', ['type' => 'checkbox', 'label' => 'Adults', 'templates' => 'checkbox_form_ev']);
                                    echo $this->Form->control('clinicals.' . $ekey . '.study_adolescent', ['type' => 'checkbox', 'label' => 'Children/adolescents', 'templates' => 'checkbox_form_ev']);

                                    echo $this->Form->control('clinicals.' . $ekey . '.study_elderly', ['type' => 'checkbox', 'label' => 'Elderly ≥65 years', 'templates' => 'checkbox_form_ev']);
                                    ?>
                                </div>
                                <div class="col-xs-4">
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.study_male', ['type' => 'checkbox', 'label' => 'Male', 'templates' => 'checkbox_form_ev']);
                                    echo $this->Form->control('clinicals.' . $ekey . '.study_female', ['type' => 'checkbox', 'label' => 'Female', 'templates' => 'checkbox_form_ev']);

                                    ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <!-- add margins to the div to 10% on each side -->


                                <div class="col-md-4" style="margin-left: 1%">
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.adolescents_age_group', [
                                        'label' =>  'Age group if children/ adolescents proposed: ',
                                        'type' => 'text', 'templates' => 'view_form_text'
                                        // add style margin-left: 10px; and margin-right: 10px;


                                    ]);
                                    ?>
                                </div>
                                <div class="col-xs-4" style="margin-left: 1%;">
                                    <?php

                                    echo $this->Form->control('clinicals.' . $ekey . '.potential_contraception', [
                                        'label' =>  'Women of childbearing potential on contraception, provide numbers: ',
                                        'type' => 'number', 'templates' => 'view_form_text'
                                    ]);
                                    ?>
                                </div>
                                <div class="col-xs-4" style="margin-left: 1%;">
                                    <?php


                                    echo $this->Form->control('clinicals.' . $ekey . '.potential_none_contraception', [
                                        'label' =>  'Women of childbearing potential not on contraception, provide numbers: ',
                                        'type' => 'number', 'templates' => 'view_form_text'
                                    ]);
                                    ?>
                                </div>
                            </div>
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Study Population Comments:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.study_population_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                            <?= $this->Form->control('clinicals.' . $ekey . '.inclusion_acceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Inclusion criteria Comments:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.inclusion_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                            <?= $this->Form->control('clinicals.' . $ekey . '.exclusion_acceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Exclusion criteria Comments:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.exclusion_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                            <?= $this->Form->control('clinicals.' . $ekey . '.vulnerable_population', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The inclusion of the vulnerable population is justifiable
                            and the benefit/risk profile is acceptable:</td>
                        <td>
                            <?= $this->Form->control('clinicals.' . $ekey . '.justifiable_population', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>For emergency clinical trials only: Does the trial
                            provide clinically relevant direct benefit to the participants?:</td>
                        <td>
                            <?= $this->Form->control('clinicals.' . $ekey . '.clinical_benefit', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Vulnerable populations Comments:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.vulnerable_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                            <?= $this->Form->control('clinicals.' . $ekey . '.proposed_study_acceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Study Plan Comments:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.study_plan_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                            <?= $this->Form->control('clinicals.' . $ekey . '.imp_acceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'Other' => 'Other']
                            ]); ?> </td>
                        <td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>

                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> If other, please provide comment:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.imp_other', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.imp_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                            <?= $this->Form->control('clinicals.' . $ekey . '.comparator_usage', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                        <td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Brief information on the comparator:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.comparator_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.comparator_smpc', ['type' => 'checkbox', 'label' => 'The SmPC', 'templates' => 'checkbox_form_ev']);
                                    echo $this->Form->control('clinicals.' . $ekey . '.comparator_international', ['type' => 'checkbox', 'label' => 'International or national guidelines', 'templates' => 'checkbox_form_ev']);

                                    echo $this->Form->control('clinicals.' . $ekey . '.comparator_publications', ['type' => 'checkbox', 'label' => 'Scientific publications', 'templates' => 'checkbox_form_ev']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> The use of the comparator is justified and is acceptable: </td>
                        <td>
                            <?= $this->Form->control('clinicals.' . $ekey . '.comparator_acceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                        <td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comparator Comments:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.comparator_workspace_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                            <?= $this->Form->control('clinicals.' . $ekey . '.placebo_usage', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                        <td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Is the use of a placebo controlled design sufficiently justified: </td>
                        <td>
                            <?= $this->Form->control('clinicals.' . $ekey . '.placebo_justified', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                        <td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Placebo Comments:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.placebo_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                            <?= $this->Form->control('clinicals.' . $ekey . '.auxiliary_usage', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                        <td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Is the use of auxiliary medical products in the trial is justified and acceptable: </td>
                        <td>
                            <?= $this->Form->control('clinicals.' . $ekey . '.auxiliary_justified', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                        <td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Auxiliary Comments:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.auxiliary_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                        <td> Does the trial includes the investigation of a medical device(s) that is considered acceptable?
                        </td>
                        <td>
                            <?= $this->Form->control('clinicals.' . $ekey . '.medical_device_justified', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Medical Device Usage Comments:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.medical_device_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.associated_risks_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                            <?= $this->Form->control('clinicals.' . $ekey . 'emergency_procedure_justified', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> In the case where a particular laboratory finding or a specific adverse reaction might reveal
                            the treatment allocation, are there additional measures in place to protect the blinding?
                        </td>
                        <td>
                            <?= $this->Form->control('clinicals.' . $ekey . 'additional_measures', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Additional Comments:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.unbinding_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                            <?= $this->Form->control('clinicals.' . $ekey . 'teratogenicity_risk', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Demonstrated/suspected' => 'Demonstrated/suspected', 'Possible' => 'Possible', 'Possible' => 'Unlikely']
                            ]); ?> </td>


                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Are contraceptive measures adequately defined and acceptable?
                        </td>
                        <td>
                            <?= $this->Form->control('clinicals.' . $ekey . 'contraceptive_acceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>

                    </tr>
                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> If No - tick appropriate box below and provide comment </strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <?php
                            echo $this->Form->control('clinicals.' . $ekey . '.proposal_insufficient', ['type' => 'checkbox', 'label' => 'Method of contraception proposed for WOCBP in the study is insufficient or an effective method
                         is listed as a highly effective method (e.g. double barrier)', 'templates' => 'checkbox_form_ev']);
                            ?>
                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.proposal_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <?php
                            echo $this->Form->control('clinicals.' . $ekey . '.male_participants', ['type' => 'checkbox', 'label' => 'Contraception for male participants is required but is not included or is insufficient in the protocol', 'templates' => 'checkbox_form_ev']);
                            ?>
                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.male_participants_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <?php
                            echo $this->Form->control('clinicals.' . $ekey . '.contraception_treatment', ['type' => 'checkbox', 'label' => 'Contraception after the end of treatment is not included in the protocol or the duration of this contraception is insufficient', 'templates' => 'checkbox_form_ev']);
                            ?>
                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.contraception_treatment_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <?php
                            echo $this->Form->control('clinicals.' . $ekey . '.pregnancy_interval', ['type' => 'checkbox', 'label' => 'Pregnancy testing at screening is not included or there is an inappropriate interval from time of pregnancy test to start of treatment', 'templates' => 'checkbox_form_ev']);
                            ?>
                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.pregnancy_interval_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <?php
                            echo $this->Form->control('clinicals.' . $ekey . '.pregnancy_test', ['type' => 'checkbox', 'label' => 'Insufficient frequency of pregnancy tests during the study (as per CTFG guidelines)', 'templates' => 'checkbox_form_ev']);
                            ?>
                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.pregnancy_test_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <?php
                            echo $this->Form->control('clinicals.' . $ekey . '.postmenopausal', ['type' => 'checkbox', 'label' => 'Definition of WOCBP or postmenopausal woman is not included in the study protocol or is inadequate', 'templates' => 'checkbox_form_ev']);
                            ?>
                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.postmenopausal_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <?php
                            echo $this->Form->control('clinicals.' . $ekey . '.other_issue', ['type' => 'checkbox', 'label' => 'Other Issue', 'templates' => 'checkbox_form_ev']);
                            ?>
                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.other_issue_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
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
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.general_contraception_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                        <td> Does the protocol includes discontinuation criteria for participants from treatment or from the
                            trial, and procedures to collect data those who withdraw
                        </td>
                        <td>
                            <?= $this->Form->control('clinicals.' . $ekey . 'discontinuation_criteria', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Are these criteria and procedures are considered acceptable
                        </td>
                        <td>
                            <?= $this->Form->control('clinicals.' . $ekey . 'criteria_acceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Are the Clinical trial termination criteria included in the protocol and are acceptable?
                        </td>
                        <td>
                            <?= $this->Form->control('clinicals.' . $ekey . 'termination_criteria_acceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> General Comments:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.discontinuation_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                            <?= $this->Form->control('clinicals.' . $ekey . 'permitted_concomitant', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Is a description of prohibited medications included in the study protocol and is acceptable
                        </td>
                        <td>
                            <?= $this->Form->control('clinicals.' . $ekey . 'prohibited_concomitant', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>

                    </tr>


                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> General Comments:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.concomitant_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                        <td><strong> Study procedures, visits and monitoring of participants, and follow up</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Are the study procedures, study visits, monitoring of participants, risk minimization measures
                            and follow up adequately described and acceptable?
                        </td>
                        <td>
                            <?= $this->Form->control('clinicals.' . $ekey . 'procedures_adequate', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>

                    </tr>
                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> If No - tick the appropriate box and comment</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <?php
                            echo $this->Form->control('clinicals.' . $ekey . '.insufficient_frequency', ['type' => 'checkbox', 'label' => 'Is the frequency of the study visits/monitoring insufficient?', 'templates' => 'checkbox_form_ev']);
                            ?>
                        </td>
                        <td colspan="2">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.frequency_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <?php
                            echo $this->Form->control('clinicals.' . $ekey . '.relevant_targets', ['type' => 'checkbox', 'label' => 'Are the relevant targets not monitored?', 'templates' => 'checkbox_form_ev']);
                            ?>
                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.relevant_targets_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <?php
                            echo $this->Form->control('clinicals.' . $ekey . '.minimization_measures', ['type' => 'checkbox', 'label' => 'Are the proposed risk minimization measures and risk management guidelines (including monitoring, treatment modifications in case of toxicities) not acceptable?', 'templates' => 'checkbox_form_ev']);
                            ?>
                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.minimization_measures_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <?php
                            echo $this->Form->control('clinicals.' . $ekey . '.risk_unacceptable', ['type' => 'checkbox', 'label' => 'Are Risks associated with the study procedures including diagnostic procedures unacceptable?', 'templates' => 'checkbox_form_ev']);
                            ?>
                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.risk_unacceptable_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <?php
                            echo $this->Form->control('clinicals.' . $ekey . '.insufficient_followup', ['type' => 'checkbox', 'label' => 'Is the follow-up period after the treatment is completed or after adverse reactions insufficient', 'templates' => 'checkbox_form_ev']);
                            ?>
                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.insufficient_followup_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <?php
                            echo $this->Form->control('clinicals.' . $ekey . '.other_safety', ['type' => 'checkbox', 'label' => 'Other Issues', 'templates' => 'checkbox_form_ev']);
                            ?>
                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.other_safety_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
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
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.general_safety_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                            <?= $this->Form->control('clinicals.' . $ekey . 'rsi_included', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['SmPC' => 'SmPC', 'IB' => 'IB']
                            ]); ?> </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The document proposed as the RSI (SmPC or IB) is acceptable
                        </td>
                        <td>
                            <?= $this->Form->control('clinicals.' . $ekey . 'acceptable_document', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The format of the RSI is acceptable (where IB is used)
                        </td>
                        <td>
                            <?= $this->Form->control('clinicals.' . $ekey . 'acceptable_format', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The list of the proposed ARs declared as “expected” is acceptable (where IB is used)
                        </td>
                        <td>
                            <?= $this->Form->control('clinicals.' . $ekey . 'expected_acceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> General Comments:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.general_irs_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                            <?= $this->Form->control('clinicals.' . $ekey . 'dsmc_committee', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> In cases where the trial has a DSMC, are the arrangements considered acceptable?
                        </td>
                        <td>
                            <?= $this->Form->control('clinicals.' . $ekey . 'arrangements_acceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> General Comments:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.dsmc_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                            <?= $this->Form->control('clinicals.' . $ekey . 'trial_definition_acceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> General Comments:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.trial_definition_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                            <?= $this->Form->control('clinicals.' . $ekey . 'collection_unacceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> General Comments:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.collection_unacceptable_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                            <?php
                            echo $this->Form->control('clinicals.' . $ekey . '.data_policies_acceptable', ['type' => 'checkbox', 'label' => 'The data protection policies as described in the protocol are not acceptable.', 'templates' => 'checkbox_form_ev']);
                            ?>
                        </td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.data_policies_acceptable_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <?php
                            echo $this->Form->control('clinicals.' . $ekey . '.unauthorised_unacceptable', ['type' => 'checkbox', 'label' => 'Organisational and technical arrangements to avoid unauthorised access, disclosure, dissemination, alteration or loss of information and personal data processed are insufficiently described or are unacceptable.', 'templates' => 'checkbox_form_ev']);
                            ?>
                        </td>

                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.unauthorised_unacceptable_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <?php
                            echo $this->Form->control('clinicals.' . $ekey . '.measures_unacceptable', ['type' => 'checkbox', 'label' => 'Measures to ensure confidentiality of records and personal data of participants are insufficiently described or are unacceptable.', 'templates' => 'checkbox_form_ev']);
                            ?>
                        </td>

                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.measures_unacceptable_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <?php
                            echo $this->Form->control('clinicals.' . $ekey . '.breach_unacceptable', ['type' => 'checkbox', 'label' => 'Measures that will be implemented in case of data security breach are insufficiently described or are unacceptable.', 'templates' => 'checkbox_form_ev']);
                            ?>
                        </td>

                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.breach_unacceptable_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <?php
                            echo $this->Form->control('clinicals.' . $ekey . '.other_protection', ['type' => 'checkbox', 'label' => 'Other Data protection issues.', 'templates' => 'checkbox_form_ev']);
                            ?>
                        </td>

                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.other_protection_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
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
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.data_protection_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                            <?php
                            echo $this->Form->control('clinicals.' . $ekey . '.recruitment_unacceptable', ['type' => 'checkbox', 'label' => 'Recruitment and informed consent procedure as described in the study protocol are not acceptable and/or not in compliance with ethical requirements on the protection of participants in clinical trials and informed consent.', 'templates' => 'checkbox_form_ev']);
                            ?>
                        </td>

                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.recruitment_unacceptable_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
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
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.recruitment_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td colspan="3">
                            <strong> Benefit/risk assessment</strong>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>The protocol contains an acceptable evaluation of the anticipated benefits and risks of
                            participating in the trial.
                        </td>
                        <td>
                            <?= $this->Form->control('clinicals.' . $ekey . 'risk_evaluation_unacceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>

                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Are the measures proposed to address the known and potential risks of participating in the trial
                            and to protect participants acceptable?
                        </td>
                        <td>
                            <?= $this->Form->control('clinicals.' . $ekey . 'participants_protection_acceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>

                    </tr>

                    <tr class="active">
                        <td> <?php $numb = 1; ?></td>
                        <td><strong> If No - tick the appropriate box below and provide a comment</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <?php
                            echo $this->Form->control('clinicals.' . $ekey . '.condition_unmonitored', ['type' => 'checkbox', 'label' => '
                            Based on medical and ethical principles the anticipated benefits to the participants or to public health do not justify the foreseeable risks and inconveniences, or compliance with this condition is not constantly monitored', 'templates' => 'checkbox_form_ev']);
                            ?>
                        </td>

                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.condition_unmonitored_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <?php
                            echo $this->Form->control('clinicals.' . $ekey . '.unsafeguarded_rights', ['type' => 'checkbox', 'label' => '
                            Rights of the participants to physical and mental integrity, and privacy are insufficiently safeguarded in the study', 'templates' => 'checkbox_form_ev']);
                            ?>
                        </td>

                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.unsafeguarded_rights_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <?php
                            echo $this->Form->control('clinicals.' . $ekey . '.unmonitored_threshold', ['type' => 'checkbox', 'label' => '
                            The clinical trial has not been designed to involve as little pain, discomfort, fear and any other foreseeable risk as possible, or both the risk threshold and the degree of distress are not defined in the protocol or are not monitored', 'templates' => 'checkbox_form_ev']);
                            ?>
                        </td>

                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.unmonitored_threshold_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
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
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.risk_assessment_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
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
                            <?php
                            echo $this->Form->control('clinicals.' . $ekey . '.application_acceptable', ['type' => 'checkbox', 'label' => '
                            The clinical aspects of the application are acceptable', 'templates' => 'checkbox_form_ev']);
                            ?>
                        </td>

                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.application_acceptable_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <?php
                            echo $this->Form->control('clinicals.' . $ekey . '.supplementary_required', ['type' => 'checkbox', 'label' => '
                            Supplementary information needs to be provided (refer to the list of requests for additional information)', 'templates' => 'checkbox_form_ev']);
                            ?>
                        </td>

                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Comment:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.supplementary_required_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                                    ?>
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
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.overal_assessment_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> REQUESTS FOR ADDITIONAL INFORMATION:</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.additional', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>File Attachment</label>
                                    <?php
                                    echo $this->Form->control('clinicals.' . $ekey . '.file', ['type' => 'file', 'label' => false, 'escape' => false, 'templates' => 'table_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <?php if ($prefix == 'evaluator' || $prefix == 'manager') { ?>
                <button type="submit" class="btn btn-info active" id="ev-save-changes" name="ev_save" value="1"><i class="fa fa-save" aria-hidden="true"></i> Save Changes</button>
            <?php } ?>
            <button type="submit" class="btn btn-primary active" id="ev-submit" name="ev_save" value="2"><i class="fa fa-save" aria-hidden="true"></i> Submit</button>
            <?php
            echo $this->Html->link('<i class="fa fa-remove" aria-hidden="true"></i> Reset', [], ['escape' => false, 'class' => 'btn btn-default']);
            ?>
        </div>
    </div>
<?php
    echo $this->Form->end();
}
?>