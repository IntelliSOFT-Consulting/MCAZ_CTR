<?php
$this->Html->script('multi/sdrugs', ['block' => true]);
$numb = 1;
?>


<div class="ctr-groups">

    <div id="investigator_primary_contact">
        <div style="margin-left: 0px;">

            <table class="table table-bordered table-condensed">

                <tr class="active">
                    <th></th>
                    <th>Assessment of the IMPD </th>
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

                                echo $this->Form->control('quality_assessments.' . $ekey . '.gmp_included', ['type' => 'checkbox', 'label' => 'Assessment of the IMPD is included in section 2.3', 'templates' => 'checkbox_form_ev']);
                                ?>


                            </div>
                        </div>
                    </td>
                    <td> </td>
                </tr>
                </tbody>
            </table>
            <h5 class="active">S Drug substance Section (<small>where necessary, Click button to add more -
                    <button type="button" class="btn btn-xs btn-primary" id="addPIContact">Add PR</button></small>) </h5>
            <div id="investigator_contacts" style="margin-left: 20px;">
            

            </div>
            <!--  -->
        </div>
    </div>
    <div id="investigator_contacts">
        <?php
        if (!empty($application['quality_assessments'][$ekey]['sdrugs'])) {
            for ($i = 1; $i <= count($application['investigator_contacts']) - 1; $i++) {
                if ($i == 1) echo "<h5 style='margin-left: 30px;'><b></b></h5>";
        ?>
                <div class="contact-group">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr class="active">
                                <th> <?php $numb = 1; ?></th>
                                <th>The drug substance: </th>
                                <th width="35%"></th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $numb++ ?>.</td>
                                <td>
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <p> Has a monograph in</p>
                                        </div>
                                        <div class="col-xs-9">

                                            <?php
                                            echo $this->Form->control('sdrugs.' . $i . '.mono_ph', ['type' => 'checkbox', 'label' => 'Ph. Eur.', 'templates' => 'checkbox_form_ev']);

                                            echo $this->Form->control('sdrugs.' . $i . '.mono_japan', ['type' => 'checkbox', 'label' => 'USP/JP', 'templates' => 'checkbox_form_ev']);

                                            echo $this->Form->control('sdrugs.' . $i . '.mono_other', ['type' => 'checkbox', 'label' => 'Other', 'templates' => 'checkbox_form_ev']);
                                            ?>


                                        </div>
                                    </div>
                                </td>
                                <td> <?php
                                        echo $this->Form->control('sdrugs.' . $i . '.mono_no', ['type' => 'checkbox', 'label' => 'No', 'templates' => 'checkbox_form_ev']);
                                        ?> </td>
                            </tr>
                            <tr>
                                <td><?= $numb++ ?>.</td>
                                <td>Does the active substance belong to an authorised drug product in the EU/USA/Japan?</td>
                                <td>
                                    <?= $this->Form->control('sdrugs.' . $i . '.drug_authorised', [
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
                                            echo $this->Form->control('sdrugs.' . $i . '.nomen_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                            echo $this->Form->control('sdrugs.' . $i . '.noment_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    <?= $this->Form->control('sdrugs.' . $i . '.str_subsection', [
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
                                            echo $this->Form->control('sdrugs.' . $i . '.str_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                            echo $this->Form->control('sdrugs.' . $i . '.str_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    <?= $this->Form->control('sdrugs.' . $i . '.gen_prop_adequately', [
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
                                            echo $this->Form->control('sdrugs.' . $i . '.gen_prop_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                            echo $this->Form->control('sdrugs.' . $i . '.gen_prop_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    <?= $this->Form->control('sdrugs.' . $i . '.manu_identified', [
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
                                            echo $this->Form->control('sdrugs.' . $i . '.gen_manu_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    <?= $this->Form->control('sdrugs.' . $i . '.process_described', [
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
                                            echo $this->Form->control('sdrugs.' . $i . '.process_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                            echo $this->Form->control('sdrugs.' . $i . '.workspace_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    <?= $this->Form->control('sdrugs.' . $i . '.control_described', [
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
                                            echo $this->Form->control('sdrugs.' . $i . '.control_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                            echo $this->Form->control('sdrugs.' . $i . '.control_comment', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    <?= $this->Form->control('sdrugs.' . $i . '.control_steps_described', [
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
                                            echo $this->Form->control('sdrugs.' . $i . '.control_steps_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    <?= $this->Form->control('sdrugs.' . $i . '.validation_described', [
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
                                            echo $this->Form->control('sdrugs.' . $i . '.validation_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    <?= $this->Form->control('sdrugs.' . $i . '.manufacturing_described', [
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
                                            echo $this->Form->control('sdrugs.' . $i . '.manufacturing_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                            echo $this->Form->control('sdrugs.' . $i . '.manufacturing_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    <?= $this->Form->control('sdrugs.' . $i . '.substance_described', [
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
                                            echo $this->Form->control('sdrugs.' . $i . '.substance_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                            echo $this->Form->control('sdrugs.' . $i . '.substance_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    <?= $this->Form->control('sdrugs.' . $i . '.impurities_characterised', [
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
                                            echo $this->Form->control('sdrugs.' . $i . '.impurities_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                            echo $this->Form->control('sdrugs.' . $i . '.impurities_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    <?= $this->Form->control('sdrugs.' . $i . '.specifications_appropriate', [
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
                                            echo $this->Form->control('sdrugs.' . $i . '.specifications_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                            echo $this->Form->control('sdrugs.' . $i . '.specifications_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    <?= $this->Form->control('sdrugs.' . $i . '.analytical_described', [
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
                                            echo $this->Form->control('sdrugs.' . $i . '.analytical_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    <?= $this->Form->control('sdrugs.' . $i . '.acceptance_presented', [
                                        'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                        'options' => ['Yes' => 'Yes', 'No' => 'No', 'NA' => 'NA']
                                    ]); ?> </td>
                            </tr>
                            <tr>
                                <td><?= $numb++ ?>.</td>
                                <td> <b>For phase II/III trials</b> The suitability of methods is commensurate with the stage of
                                    development and clearly explained. A summary of the validation results is provided: </td>
                                <td>
                                    <?= $this->Form->control('sdrugs.' . $i . '.suitability_explained', [
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
                                            echo $this->Form->control('sdrugs.' . $i . '.validation_procedures_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    <?= $this->Form->control('sdrugs.' . $i . '.batch_provided', [
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
                                            echo $this->Form->control('sdrugs.' . $i . '.batch_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                            echo $this->Form->control('sdrugs.' . $i . '.batch_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    <?= $this->Form->control('sdrugs.' . $i . '.justification_acceptable', [
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
                                            echo $this->Form->control('sdrugs.' . $i . '.justification_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                            echo $this->Form->control('sdrugs.' . $i . '.justification_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    <?= $this->Form->control('sdrugs.' . $i . '.reference_described', [
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
                                            echo $this->Form->control('sdrugs.' . $i . '.reference_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    <?= $this->Form->control('sdrugs.' . $i . '.container_suitable', [
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
                                            echo $this->Form->control('sdrugs.' . $i . '.container_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    <?= $this->Form->control('sdrugs.' . $i . '.stability_satisfactory', [
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
                                            echo $this->Form->control('sdrugs.' . $i . '.stability_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                            ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div id="storage_conditions">
                                        <h1>Storage Conditions</h1>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php
                    echo $this->Html->tag('div', '<button id="investigator_contactsButton' . $i . '" class="btn btn-xs btn-danger removePIContact" type="button">Remove PR</button>', array(
                        'class' => 'controls', 'escape' => false
                    ));
                    echo $this->Html->tag('hr', '', array('id' => 'investigator_contactsHr' . $i));
                    echo $this->element('multi/storage_conditions');
                    ?>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>