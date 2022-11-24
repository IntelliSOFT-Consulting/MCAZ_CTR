<?php

use Cake\Utility\Hash;

$code = mt_rand(10000000, 99999999);
$numb = 1;

if (!in_array($prefix, ['director_general', 'admin']) and count(array_filter(Hash::extract($application->quality_assessments, '{n}.chosen'), 'is_numeric')) < 1) {
    echo $this->Form->create($application, ['type' => 'file', 'url' => ['action' => 'add-quality-review']]); ?>
    <div class="row">
        <div class="col-xs-12">
            <?php
            echo $this->Form->control('application_pr_id', ['type' => 'hidden', 'value' => $application->id, 'escape' => false, 'templates' => 'table_form']);
            echo $this->Form->control('quality_assessments.' . $ekey . '.user_id', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.id'), 'templates' => 'table_form']);

            //   Copy Edit
            echo $this->Form->control('quality_assessment_pr_id', ['type' => 'hidden', 'value' => (!empty($application->quality_assessments[$ekey]['id']) ? $application->quality_assessments[$ekey]['id'] : 100), 'escape' => false, 'templates' => 'table_form']);
            if ($this->request->query('qu_id')) {
                echo $this->Form->control('quality_assessments.' . $ekey . '.id', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form']);
                echo $this->Form->control('quality_assessments.' . $ekey . '.evaluation_type', [
                    'type' => 'hidden',
                    'value' => ($quality_assessment_id) ? 'Revision' : 'Initial',
                    'templates' => 'table_form'
                ]);
                echo $this->Form->control('quality_assessments.' . $ekey . '.quality_assessment_id', ['type' => 'hidden', 'value' => $quality_assessment_id, 'templates' => 'table_form']);
            } elseif ($this->request->query('qu_fn_cnl')) {
                echo $this->Form->control('quality_assessments.' . $ekey . '.submitted', ['type' => 'hidden', 'escape' => false, 'templates' => 'table_form', 'value' => 2]);
                echo $this->Form->control('quality_assessments.' . $ekey . '.evaluation_type', [
                    'type' => 'hidden',
                    'value' => ($quality_assessment_id) ? 'Revision' : 'Initial',
                    'templates' => 'table_form'
                ]);
                echo $this->Form->control('quality_assessments.' . $ekey . '.quality_assessment_id', ['type' => 'hidden', 'value' => $quality_assessment_id, 'templates' => 'table_form']);
            } else {
                echo $this->Form->control('quality_assessments.' . $ekey . '.quality_assessment_id', ['type' => 'hidden', 'value' => $quality_assessment_id, 'templates' => 'table_form']);
                echo $this->Form->control('quality_assessments.' . $ekey . '.evaluation_type', [
                    'type' => 'hidden',
                    'value' => ($quality_assessment_id) ? 'Revision' : 'Initial',
                    'templates' => 'table_form'
                ]);
            }

            // End of Copy Edit
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

                </tbody>
            </table>
            <?php
            echo $this->element('multi/gmp_compliance');
            echo $this->element('multi/sdrugs_assessments');
            echo $this->element('multi/pdrugs_assessments');


            ?>
            <!-- Final Section -->
            <table class="table table-bordered table-condensed">

                <tbody>
                    <tr class="active">
                        <th> <?php $numb = 1; ?></th>
                        <th>3.3 A Appendices</th>
                        <th width="35%"></th>
                    </tr>
                    <tr>
                        <th> <?php $numb = 1; ?></th>
                        <th>A.1 Facilities and equipment<small>Not applicable</small></th>
                        <th width="35%"></th>
                    </tr>
                    <tr class="active">
                        <th> <?php $numb = 1; ?></th>
                        <th>A.2 Adventitious agents' safety evaluation</th>
                        <th width="35%"></th>
                    </tr>
                    <tr>
                        <td></td>
                        <td> The data provided on the safety of adventitious agents are adequate</td>
                        <td>
                            <?= $this->Form->control('quality_assessments.' . $ekey . '.adventitious_agents', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Workspace </label>
                                    <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.adventitious_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Officer’s Comments </label>
                                    <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.adventitious_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">
                        <th> <?php $numb = 1; ?></th>
                        <th>A.3 Novel excipients</th>
                        <th width="35%"></th>
                    </tr>
                    <tr>
                        <td></td>
                        <td> The information on novel excipients is in line with the respective clinical phase</td>
                        <td>
                            <?= $this->Form->control('quality_assessments.' . $ekey . '.novel_excipients', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Workspace </label>
                                    <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.novel_excipients_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Officer’s Comments </label>
                                    <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.novel_excipients_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="active">
                        <th> <?php $numb = 1; ?></th>
                        <th>A.4 Solvents for reconstitution/dilution</th>
                        <th width="35%"></th>
                    </tr>
                    <tr>
                        <td></td>
                        <td> Information on solvents provided:</td>
                        <td>
                            <?= $this->Form->control('quality_assessments.' . $ekey . '.reconstitution', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Workspace </label>
                                    <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.reconstitution_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Officer’s Comments </label>
                                    <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.reconstitution_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- End -->
                    <tr class="active">
                        <th> <?php $numb = 1; ?></th>
                        <th>1.6 Auxiliary medical products– replicate the individual sections of the assessment form, 3.S and 3.P as required</th>
                        <th width="35%"></th>
                    </tr>
                    <tr>
                        <td></td>
                        <td> The quality data provided for non-authorised auxiliary medical products are acceptable</td>
                        <td>
                            <?= $this->Form->control('quality_assessments.' . $ekey . '.quality_data', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td></td>
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
                        <td></td>
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
                        <th>1.7 Labelling</th>
                        <th width="35%"></th>
                    </tr>
                    <tr>
                        <td></td>
                        <td> Is the proposed labelling in line with national requirements?</td>
                        <td>
                            <?= $this->Form->control('quality_assessments.' . $ekey . '.labelling', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                            ]); ?> </td>
                    </tr>

                    <tr>
                        <td></td>
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
                        <th>1.8 Blinding</th>
                        <th width="35%"></th>
                    </tr>
                    <tr>
                        <td></td>
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
                        <td></td>
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
                        <th>1.9 Assessor’s overall conclusions on the quality part</th>
                        <th width="35%"></th>
                    </tr>
                    <tr>
                        <td></td>
                        <td> The quality data are acceptable:</td>
                        <td>
                            <?= $this->Form->control('quality_assessments.' . $ekey . '.acceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td> Supplementary information has to be provided</td>
                        <td>
                            <?= $this->Form->control('quality_assessments.' . $ekey . '.supplementary_need', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                    </tr>
                    <tr>
                        <td></td>
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
                    <tr class="active">
                        <th> <?php $numb = 1; ?></th>
                        <th>1.9.1 REQUESTS FOR ADDITIONAL INFORMATION ON QUALITY</th>
                        <th width="35%"></th>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label></label>
                                    <?php
                                    echo $this->Form->control('quality_assessments.' . $ekey . '.additional', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- End of Final Section -->
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
    <hr style="margin:5px;">
<?php
    echo $this->Form->end();
}
?>