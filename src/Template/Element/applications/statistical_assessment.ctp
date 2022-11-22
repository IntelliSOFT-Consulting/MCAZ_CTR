<?php

use Cake\Utility\Hash;

$numb = 1;

if (!in_array($prefix, ['director_general', 'admin']) and count(array_filter(Hash::extract($application->evaluations, '{n}.chosen'), 'is_numeric')) < 1) {
    echo $this->Form->create($application, ['type' => 'file', 'url' => ['action' => 'add-statistical-review']]); ?>
<div class="row">
    <div class="col-xs-12">
        <?php
            echo $this->Form->control('application_pr_id', ['type' => 'hidden', 'value' => $application->id, 'escape' => false, 'templates' => 'table_form']);
            //   Copy Edit
            echo $this->Form->control('statistical_pr_id', ['type' => 'hidden', 'value' => (!empty($application->statisticals[$ekey]['id']) ? $application->statisticals[$ekey]['id'] : 100), 'escape' => false, 'templates' => 'table_form']);
            if ($this->request->query('stat_id')) {
                echo $this->Form->control('statisticals.' . $ekey . '.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
                echo $this->Form->control('statisticals.' . $ekey . '.evaluation_type', [
                    'type' => 'hidden',
                    'value' => ($statistical_id) ? 'Revision' : 'Initial',
                    'templates' => 'table_form'
                ]); echo $this->Form->control('statisticals.' . $ekey . '.statistical_id', ['type' => 'hidden', 'value' => $statistical_id, 'templates' => 'table_form']);
            } elseif ($this->request->query('stat_fn_cnl')) {
                echo $this->Form->control('statisticals.' . $ekey . '.submitted', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form', 'value' => 2]);
                echo $this->Form->control('statisticals.' . $ekey . '.evaluation_type', [
                    'type' => 'hidden',
                    'value' => ($statistical_id) ? 'Revision' : 'Initial',
                    'templates' => 'table_form'
                ]); echo $this->Form->control('statisticals.' . $ekey . '.statistical_id', ['type' => 'hidden', 'value' => $statistical_id, 'templates' => 'table_form']);
            } else {
                echo $this->Form->control('statisticals.' . $ekey . '.statistical_id', ['type' => 'hidden', 'value' => $statistical_id, 'templates' => 'table_form']);
                echo $this->Form->control('statisticals.' . $ekey . '.evaluation_type', [
                    'type' => 'hidden',
                    'value' => ($statistical_id) ? 'Revision' : 'Initial',
                    'templates' => 'table_form'
                ]); 
            } 
         
            // End of Copy Edit
            echo $this->Form->control('statisticals.' . $ekey . '.user_id', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.id'), 'templates' => 'table_form']);

            ?>

        <table class="table table-bordered table-condensed">
            <thead>
                <tr class="active">
                    <th></th>
                    <th>Statistical/methodological assessment </th>
                    <th width="35%"></th>
                </tr>
                <tr class="active">
                    <th></th>
                    <th>Study plan and design </th>
                    <th width="55%"></th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td>Controlled/non controlled?</td>
                    <td>
                        <?= $this->Form->control('statisticals.' . $ekey . '.design_type', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Controlled' => 'Controlled', 'Non controlled' => 'Non controlled']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td>Randomized?</td>
                    <td>
                        <?= $this->Form->control('statisticals.' . $ekey . '.randomized', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td>Blinding (masking)?</td>
                    <td>
                        <?= $this->Form->control('statisticals.' . $ekey . '.blinding', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Open-label' => 'Open-label', 'Blinded evaluator' => 'Blinded evaluator', 'Single-blind' => 'Single-blind', 'Double-blind' => 'Double-blind']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Brief description of the study plan and design:</label>
                                <?php
                                    echo $this->Form->control('statisticals.' . $ekey . '.design_description', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td>Is the proposed study design acceptable?</td>
                    <td>
                        <?= $this->Form->control('statisticals.' . $ekey . '.design_acceptable', [
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
                                    echo $this->Form->control('statisticals.' . $ekey . '.design_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Randomization and blinding </th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Brief description of the randomization and blinding procedures:</label>
                                <?php
                                    echo $this->Form->control('statisticals.' . $ekey . '.rand_description', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                <label>Officer’s Comments</label>
                                <?php
                                    echo $this->Form->control('statisticals.' . $ekey . '.rand_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Sample size, trial power, and level of significance used </th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td> <?php $numb = 1; ?></td>
                    <td>Planned number of participants to be enrolled:</td>
                    <td> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td>Are the sample size calculation and justification acceptable?</td>
                    <td>
                        <?= $this->Form->control('statisticals.' . $ekey . '.sample_acceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td>Are the trial power and level of significance acceptable?</td>
                    <td>
                        <?= $this->Form->control('statisticals.' . $ekey . '.power_acceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Brief description of the sample size, trial power, and level of
                                    significance:</label>
                                <?php
                                    echo $this->Form->control('statisticals.' . $ekey . '.sample_description', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                <label>Officer’s Comments</label>
                                <?php
                                    echo $this->Form->control('statisticals.' . $ekey . '.sample_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Planned analysis </th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Brief description of the planned analyses:</label>
                                <?php
                                    echo $this->Form->control('statisticals.' . $ekey . '.analysis_description', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td>
                        <div class="row">
                            <div class="col-xs-6">
                                <p>Do the analyses reflect the study objectives?
                            </div>

                            <div class="col-xs-4">
                                <?= $this->Form->control('statisticals.' . $ekey . '.analysis_objective', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'Other' => 'Other']
                                    ]); ?>
                            </div>
                        </div>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('statisticals.' . $ekey . '.analysis_objective_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                            ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td>
                        <div class="row">
                            <div class="col-xs-6">
                                Are the methods appropriate?
                            </div>

                            <div class="col-xs-4">
                                <?= $this->Form->control('statisticals.' . $ekey . '.methods_appropriate', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'Other' => 'Other']
                                    ]); ?>
                            </div>
                        </div>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('statisticals.' . $ekey . '.methods_appropriate_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                            ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td>
                        <div class="row">
                            <div class="col-xs-6">
                                Are the considerations regarding missing values, unused, and spurious data acceptable?
                            </div>

                            <div class="col-xs-4">
                                <?= $this->Form->control('statisticals.' . $ekey . '.considerations', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'Other' => 'Other']
                                    ]); ?>
                            </div>
                        </div>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('statisticals.' . $ekey . '.considerations_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                            ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td>
                        <div class="row">
                            <div class="col-xs-6">
                                Are the considerations regarding multiplicity acceptable?
                            </div>

                            <div class="col-xs-4">
                                <?= $this->Form->control('statisticals.' . $ekey . '.multiplicity', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'Other' => 'Other']
                                    ]); ?>
                            </div>
                        </div>
                    </td>
                    <td>
                        <?php
                            echo $this->Form->control('statisticals.' . $ekey . '.multiplicity_comments', ['label' => false, 'escape' => false, 'templates' => 'view_form_text']);
                            ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td>Are the planned analyses appropriate?</td>
                    <td>
                        <?= $this->Form->control('statisticals.' . $ekey . '.analyses_acceptable', [
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
                                    echo $this->Form->control('statisticals.' . $ekey . '.analysis_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Interim analysis </th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td>Does the trial have a data safety monitoring committee?</td>
                    <td>
                        <?= $this->Form->control('statisticals.' . $ekey . '.interim_safety', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> Is there an interim analysis planned for this trial?</td>
                    <td>
                        <?= $this->Form->control('statisticals.' . $ekey . '.interim_planning', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                </tr>


                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Brief description of the interim analysis(es) (if applicable):</label>
                                <?php
                                    echo $this->Form->control('statisticals.' . $ekey . '.interim_description', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                <label>Officer’s Comments</label>
                                <?php
                                    echo $this->Form->control('statisticals.' . $ekey . '.interim_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Assessor’s overall conclusion on the statistical part </th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td>The statistical aspects of the application are acceptable</td>
                    <td>
                        <?= $this->Form->control('statisticals.' . $ekey . '.statistical_acceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> Supplementary information needs to be provided (refer to the list of requests for additional
                        information)</td>
                    <td>
                        <?= $this->Form->control('statisticals.' . $ekey . '.information_needed', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                </tr>


                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Officer’s Overall Comments</label>
                                <?php
                                    echo $this->Form->control('statisticals.' . $ekey . '.overall_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    echo $this->Form->control('statisticals.' . $ekey . '.additional', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
        <button type="submit" class="btn btn-info active" id="ev-save-changes" name="ev_save" value="1"><i
                class="fa fa-save" aria-hidden="true"></i> Save Changes</button>
        <?php } ?>
        <button type="submit" class="btn btn-primary active" id="ev-submit" name="ev_save" value="2"><i
                class="fa fa-save" aria-hidden="true"></i> Submit</button>
        <?php
            echo $this->Html->link('<i class="fa fa-remove" aria-hidden="true"></i> Reset', [], ['escape' => false, 'class' => 'btn btn-default']);
            ?>
    </div>
</div>
<?php
    echo $this->Form->end();
}
?>