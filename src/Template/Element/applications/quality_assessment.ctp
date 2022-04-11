<?php

use Cake\Utility\Hash;

$this->Html->script('ckeditor/ckeditor', ['block' => true]);
$this->Html->script('ckeditor/config', ['block' => true]);
$this->Html->script('ckeditor/adapters/jquery', ['block' => true]);
$this->Html->script('jquery/jUpload/js/vendor/jquery.ui.widget.js', ['block' => true]);
$this->Html->script('jquery/jUpload/js/jquery.iframe-transport.js', ['block' => true]);
$this->Html->script('jquery/jUpload/js/jquery.fileupload.js', ['block' => true]);
$this->Html->script('jquery/validate/jquery.validate', ['block' => true]);
$this->Html->script('jquery/validate/validate', ['block' => true]);
$this->Html->script('application_edit', ['block' => true]);
$numb = 1;

if (!in_array($prefix, ['director_general', 'admin']) and count(array_filter(Hash::extract($application->evaluations, '{n}.chosen'), 'is_numeric')) < 1) {
    echo $this->Form->create($application, ['type' => 'file', 'url' => ['action' => 'add-quality-review']]); ?>
<div class="row">
    <div class="col-xs-12">
        <?php
            echo $this->Form->control('application_pr_id', ['type' => 'hidden', 'value' => $application->id, 'escape' => false, 'templates' => 'table_form']);
            echo $this->Form->control('qualities.' . $ekey . '.user_id', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.id'), 'templates' => 'table_form']);
            echo $this->Form->control('sdrug.' . $ekey . '.user_id', ['type' => 'hidden', 'value' => $this->request->session()->read('Auth.User.id'), 'templates' => 'table_form']);

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
                                    echo $this->Form->control('qualities.' . $ekey . '.quality_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    echo $this->Form->control('qualities.' . $ekey . '.gmp_smpc', ['type' => 'checkbox', 'label' => 'Registered, non-modified product only SmPC has been provided, IMPD', 'templates' => 'checkbox_form_ev']);
                                    ?>
                                <?php
                                    echo $this->Form->control('qualities.' . $ekey . '.gmp_included', ['type' => 'checkbox', 'label' => 'Assessment of the IMPD is included in section 2.3', 'templates' => 'checkbox_form_ev']);
                                    ?>


                            </div>
                        </div>
                    </td>
                    <td> </td>
                </tr>

                <!-- Start of S Drug -->
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
                                    echo $this->Form->control('sdrug.' . $ekey . '.drug_eur', ['type' => 'checkbox', 'label' => 'Ph. Eur.', 'templates' => 'checkbox_form_ev']);
                                    ?>
                                <?php
                                    echo $this->Form->control('sdrug.' . $ekey . '.drug_usp', ['type' => 'checkbox', 'label' => 'USP/JP', 'templates' => 'checkbox_form_ev']);
                                    ?>


                            </div>
                        </div>
                    </td>
                    <td> <?php
                                echo $this->Form->control('sdrug.' . $ekey . '.drug_none', ['type' => 'checkbox', 'label' => 'No', 'templates' => 'checkbox_form_ev']);
                                ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td>Does the active substance belong to an authorised drug product in the EU/USA/Japan?</td>
                    <td>
                        <?= $this->Form->control('sdrug.' . $ekey . '.drug_authorised', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                </tr>
                <!-- End of S Drug -->
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Labelling </th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> Is the proposed labelling in line with national requirements? </td>
                    <td>
                        <?= $this->Form->control('qualities.' . $ekey . '.labelling', [
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
                                    echo $this->Form->control('qualities.' . $ekey . '.labelling_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>


                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Blinding </th>
                    <th width="35%"></th>
                </tr>

                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td colspan="3">
                        <div class="row">
                            <div class="col-xs-12">
                                <label> Workspace </label>
                                <?php
                                    echo $this->Form->control('qualities.' . $ekey . '.blinding_workspace', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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
                                    echo $this->Form->control('qualities.' . $ekey . '.blinding_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
                                    ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="active">
                    <th> <?php $numb = 1; ?></th>
                    <th> Assessor’s overall conclusions on the quality part </th>
                    <th width="35%"></th>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> The quality data are acceptable: </td>
                    <td>
                        <?= $this->Form->control('qualities.' . $ekey . '.acceptable', [
                                'type' => 'radio', 'label' => false, 'templates' => 'radio_form_tbl',
                                'options' => ['Yes' => 'Yes', 'No' => 'No']
                            ]); ?> </td>
                </tr>
                <tr>
                    <td><?= $numb++ ?>.</td>
                    <td> Supplementary information has to be provided </td>
                    <td>
                        <?= $this->Form->control('qualities.' . $ekey . '.supplementary_need', [
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
                                    echo $this->Form->control('qualities.' . $ekey . '.overall_comments', ['label' => false, 'escape' => false, 'templates' => 'textarea_form']);
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