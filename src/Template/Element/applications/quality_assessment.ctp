<?php

use Cake\Utility\Hash;

$code = mt_rand(10000000, 99999999);
$numb = 1;

if (!in_array($prefix, ['director_general', 'admin']) and count(array_filter(Hash::extract($application->evaluations, '{n}.chosen'), 'is_numeric')) < 1) {
    echo $this->Form->create($application, ['type' => 'file', 'url' => ['action' => 'add-quality-review']]); ?>
<div class="row">
    <div class="col-xs-12">
        <?php
            echo $this->Form->control('application_pr_id', ['type' => 'hidden', 'value' => $application->id, 'escape' => false, 'templates' => 'table_form']);
            echo $this->Form->control('quality_assessments.' . $ekey . '.user_id', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.id'), 'templates' => 'table_form']);
            echo $this->Form->control('quality_assessments.' . $ekey . '.submitted', ['type' => 'hidden', 'value' => 'created', 'templates' => 'table_form']);

            ?>

        <table class="table table-bordered table-condensed">
            <thead>
                <tr class="active">
                    <th></th>
                    <th>Introduction </th>
                    <th width="35%"></th>
                </tr>

            </thead>
            <tbody>

                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Workspace:</label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.quality_workspace', ['label' => false, 'class' => 'ckeditor', 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th>GMP compliance </th>
                    <th width="35%"></th>
                </tr>
                <tr class="active">
                    <th></th>
                    <th>Assessment of the IMPD (PR1, PR2 etc, replicate section 2.3 as required) </th>
                    <th width="35%"></th>
                </tr>


                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td>
                        <div class="row">
                            <div class="col-xs-3">
                                <label> IMP</label>
                            </div>
                            <div class="col-xs-9">
                                (check off all that apply)
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.gmp_smpc', ['type' => 'checkbox', 'label' => 'Registered, non-modified product only SmPC has been provided, IMPD', 'templates' => 'checkbox_form_ev']);
                                    ?>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.gmp_included', ['type' => 'checkbox', 'label' => 'Assessment of the IMPD is included in section 2.3', 'templates' => 'checkbox_form_ev']);
                                    ?>


                            </div>
                        </div>
                    </td>
                    <td> </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th>S Drug substance</th>
                    <th width="35%"></th>
                </tr>


                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td>
                        <div class="row">
                            <div class="col-xs-3">
                                <label>The drug substance:</label>
                            </div>
                            <div class="col-xs-9">
                                Has a monograph in
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.drug_eur', ['type' => 'checkbox', 'label' => 'Ph. Eur.', 'templates' => 'checkbox_form_ev']);
                                    ?>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.drug_usp', ['type' => 'checkbox', 'label' => 'USP/JP', 'templates' => 'checkbox_form_ev']);
                                    ?>


                            </div>
                        </div>
                    </td>
                    <td> <?php
                                echo $this->Form->control('quality_assessments.' . $ekey . '.drug_none', ['type' => 'checkbox', 'label' => 'No', 'templates' => 'checkbox_form_ev']);
                                ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td>Does the active substance belong to an authorised drug product in the EU/USA/Japan?</td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.drug_authorised', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>None of the above (full S Section is needed):</label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.drug_ssection', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th>GMP General information </th>
                    <th width="35%"></th>
                </tr>
                <tr class="active">
                    <th></th>
                    <th>Nomenclature</th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Workspace</label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.nomen_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.noment_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th>Structure </th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td>Does the submitted documentation cover this subsection adequately?</td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.str_subsection', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Workspace:</label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.str_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.str_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th>General properties </th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td>Does the submitted material cover this subsection adequately?</td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.gen_prop_adequately', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Workspace:</label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.gen_prop_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.gen_prop_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th>Manufacture </th>
                    <th width="35%"></th>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th>Manufacturer(s) </th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td>Are the production sites clearly identified?</td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.manu_identified', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Officer’s Comments</label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.gen_manu_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th>Description of the manufacturing process and process controls</th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td>Substance: Are the manufacturing processes and their controls adequately described?</td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.process_described', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Workspace</label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.process_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.workspace_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th>Control of materials</th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td>Is the control of materials adequately described?</td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.control_described', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Workspace</label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.control_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.control_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th>Control of critical steps and intermediates</th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td>Is the control of critical steps and intermediates adequately described?</td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.control_steps_described', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Officer’s Comments</label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.control_steps_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Process validation and/or evaluation </th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> Is the process validation adequately described? </td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.validation_described', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Officer’s Comments</label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.validation_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>


                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Manufacturing process development </th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> Is the manufacturing process development adequately described? </td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.manufacturing_described', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label> Workspace </label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.manufacturing_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.manufacturing_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Characterisation </th>
                    <th width="35%"></th>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Elucidation of the structure and other characteristics </th>
                    <th width="35%"></th>
                </tr>

                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> Is the drug substance sufficiently characterised? </td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.substance_described', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label> Workspace </label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.substance_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.substance_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Impurities </th>
                    <th width="35%"></th>
                </tr>

                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> Are impurities sufficiently characterised? </td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.impurities_characterised', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label> Workspace </label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.impurities_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.impurities_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Control of the drug substance </th>
                    <th width="35%"></th>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Specification(s) </th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> Satisfactory specifications for the drug substance, including appropriate limits, are proposed:
                    </td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.specifications_appropriate', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label> Workspace </label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.specifications_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.specifications_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Analytical procedures </th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> Are the analytical methods adequately described? </td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.analytical_described', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Officer’s Comments</label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.analytical_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Validation of analytical procedures </th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> <b>Phase I trials</b> The suitability of the methods is commensurate with the stage of
                        development. The acceptance limits and parameters to validate the analytical methods are
                        presented: </td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.acceptance_presented', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> <b>For phase II/III trials</b> The suitability of methods is commensurate with the stage of
                        development and clearly explained. A summary of the validation results is provided: </td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.suitability_explained', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Officer’s Comments</label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.validation_procedures_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Batch analyses </th>
                    <th width="35%"></th>
                </tr>

                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> Data for representative batch analyses are provided for all the relevant manufacturing process,
                        and for each drug substance manufacturer: </td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.batch_provided', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label> Workspace </label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.batch_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.batch_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>


                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Justification of the specification (s) </th>
                    <th width="35%"></th>
                </tr>

                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> The justification for the specifications is acceptable</td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.justification_acceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label> Workspace </label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.justification_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.justification_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Reference standards or materials </th>
                    <th width="35%"></th>
                </tr>

                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> A suitable reference standard is adequately described: </td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.reference_described', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                </tr>

                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Officer’s Comments</label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.reference_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Container closure system </th>
                    <th width="35%"></th>
                </tr>

                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> The container closure system for the drug substance is properly characterised and suitable:
                    </td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.container_suitable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                </tr>

                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Officer’s Comments</label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.container_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Stability </th>
                    <th width="35%"></th>
                </tr>

                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> The stability for the drug substance is satisfactory and properly described for all the
                        relevant manufacturing processes:
                    </td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.stability_satisfactory', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                </tr>

                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label> Workspace: </label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.stability_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Drug product (repeat this section for additional IMPs) </th>
                    <th width="35%"></th>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Description and composition of the investigational medical product </th>
                    <th width="35%"></th>
                </tr>


                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> The description and composition are adequate: </td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.medical_product', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                </tr>

                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label> Workspace: </label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.medical_product_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                <label> Officer’s Comments: </label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.medical_product_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> A Appendices</th>
                    <th width="35%"></th>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Facilities and equipment</th>
                    <th width="35%"></th>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Adventitious agents' safety evaluation </th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> The data provided on the safety of adventitious agents are adequate </td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.agents_adequate', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label> Workspace </label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.agents_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                <label> Officer’s Comments: </label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.agents_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Novel excipients </th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> The information on novel excipients is in line with the respective clinical phase </td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.novel_excipients', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label> Workspace </label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.novel_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                <label> Officer’s Comments </label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.novel_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Solvents for reconstitution/dilution </th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> Information on solvents provided: </td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.solvents_info', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label> Workspace </label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.solvents_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                <label> Officer’s Comments </label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.solvents_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Placebo</th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> The information provided on the placebo is acceptable:</td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.placebo', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label> Workspace </label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.placebo_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                <label> Officer’s Comments </label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.placebo_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Auxiliary medical products</th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> The quality data provided for non-authorised auxiliary medical products are acceptable</td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.auxiliary', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label> Workspace </label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.auxiliary_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                <label> Officer’s Comments </label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.auxiliary_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Labelling</th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> Is the proposed labelling in line with national requirements?</td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.labelling', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                </tr>

                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label> Officer’s Comments </label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.labelling_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Blinding</th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label> Workspace </label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.blinding_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                <label> Officer’s Comments </label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.blinding_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Assessor’s overall conclusions on the quality part</th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> The quality data are acceptable:</td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.acceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> Supplementary information has to be provided</td>
                    <td>
                        <?= $this->Form->control('quality_assessments.' . $ekey . '.supplementary_need', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label> Overall comment/ conclusion on the quality assessment: </label>
                                <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.overall_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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