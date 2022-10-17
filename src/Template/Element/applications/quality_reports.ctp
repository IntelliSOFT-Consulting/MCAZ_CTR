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
        foreach ($quality as $quadata) {
        ?>


            <div class="thumbnail amend-form">
                <a class="btn btn-primary" role="button" data-toggle="collapse" href="#<?= $quadata->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>" aria-expanded="false" aria-controls="<?= $quadata->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>">
                    Assessed on: <?= $quadata['created'] ?> by <?= $quadata->user->name ?>
                </a>
                <?php
                if ($this->request->params['_ext'] != 'pdf') echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'quality-review', '_ext' => 'pdf', $quadata->id], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);

                echo '&nbsp;'; //print_r(Hash::extract($evaluations, '{n}.chosen'));
                if (
                    $this->request->params['_ext'] != 'pdf' and ($quadata->user_id != $this->request->session()->read('Auth.User.id'))
                    and $this->request->session()->read('Auth.User.group_id') == 2 //available to managers only
                    //and count(array_filter(Hash::extract($evaluations, '{n}.chosen'), 'is_numeric' )) < 1
                    and is_null($quadata->chosen)
                ) {
                    echo $this->Form->postLink(
                        '<span class="label label-success active">Approve the Review?</span>',
                        ['action' => 'attachQualitySignature', $quadata->id, 'prefix' => $prefix],
                        ['escape' => false, 'confirm' => 'Are you sure you want to attach your signature to Review?', 'class' => 'label-link']
                    );
                }
                if (
                    $this->request->params['_ext'] != 'pdf' and !empty($quadata->chosen)
                    and in_array($quadata->chosen, Hash::extract($quality, '{n}.chosen'))
                ) {
                    echo '&nbsp;<span class="label label-success">Approved</span>';
                }
                ?>
            </div>
            <div class="<?= ($this->request->params['_ext'] != 'pdf') ? 'collapse' : ''; ?>" id="<?= $quadata->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>">

                <table class="table table-bordered table-condensed">
                    <thead>
                        <tr class="active">
                            <th></th>
                            <th>Quality Assessment </th>
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
                                        <br>
                                        <?= $quadata->quality_workspace ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="active">
                            <th> <?php $numb = 1; ?></th>
                            <th>GMP compliance </th>
                            <th width="35%"></th>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="3">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <!-- check if there are compliance -->
                                        <?php if (count($quadata->compliance) > 0) { ?>
                                            <table class="table table-bordered table-condensed">
                                                <thead>
                                                    <tr class="active">
                                                        <th>#</th>
                                                        <th> Name and address of site(can be cut and pasted from the IMPD) </th>
                                                        <th> Function (include reference to PRx, PLx etc as relevant) </th>
                                                        <th> Valid license </th>
                                                        <th> Comment </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $numb = 1;
                                                    foreach ($quadata->compliance as $comp) {
                                                    ?>
                                                        <tr>
                                                            <td><?= $numb++ ?>.</td>
                                                            <td><?= $comp->site_name ?></td>
                                                            <td><?= $comp->site_function ?></td>
                                                            <td>
                                                                <div class="entry">
                                                                    <span class="editer">

                                                                        <?= ($comp->valid_license) ? $checked : $nChecked; ?>Yes<br>
                                                                    </span>

                                                                </div>
                                                            </td>
                                                            <td><?= $comp->comment ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        <?php } ?>

                                    </div>
                                </div>
                            </td>
                        </tr>
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
                                        <div class="entry">
                                            <span class="editer">

                                                <?= ($quadata->gmp_smpc) ? $checked : $nChecked; ?>
                                                Registered, non-modified product only SmPC has been provided, IMPD <br>
                                            </span>

                                        </div>
                                        <div class="entry">
                                            <span class="editer">

                                                <?= ($quadata->gmp_included) ? $checked : $nChecked; ?>
                                                Assessment of the IMPD is included in section 2.3 <br>
                                            </span>

                                        </div>




                                    </div>
                                </div>
                            </td>
                            <td> </td>
                        </tr>

                        <!-- foreach sdrugs in quality_assessments loop thought them all -->
                        <?php
                        $sdrugs = $quadata->sdrugs;
                        foreach ($sdrugs as $sdrug) {
                        ?>
                            <tr class="active">
                                <th> <?php $numb = 1; ?></th>
                                <th>S Drug substance </th>
                                <th width="35%"></th>
                            </tr>
                            <tr>
                                <td><?= $numb++ ?>.</td>
                                <td>
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <p> Has a monograph in</p>
                                        </div>
                                        <div class="col-xs-9">
                                            <div class="entry">
                                                <span class="editer">

                                                    <?= ($sdrug->mono_ph) ? $checked : $nChecked; ?>
                                                    Ph. Eur.<br>
                                                </span>

                                            </div>
                                            <div class="entry">
                                                <span class="editer">

                                                    <?= ($sdrug->mono_japan) ? $checked : $nChecked; ?>
                                                    USP/JP<br>
                                                </span>

                                            </div>
                                            <div class="entry">
                                                <span class="editer">

                                                    <?= ($sdrug->mono_other) ? $checked : $nChecked; ?>
                                                    Other<br>
                                                </span>

                                            </div>

                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="entry">
                                        <span class="editer">

                                            <?= ($sdrug->mono_no) ? $checked : $nChecked; ?>
                                            No<br>
                                        </span>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $numb++ ?>.</td>
                                <td>Does the active substance belong to an authorised drug product in the EU/USA/Japan?</td>
                                <td><?= $sdrug->drug_authorised ?></td>
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
                                            <?= $sdrug->nomen_workspace ?>
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
                                            <?= $sdrug->noment_comment ?>

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
                                <td> <?= $sdrug->str_subsection ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $numb++ ?>.</td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Workspace:</label>
                                            <?= $sdrug->str_workspace ?>

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
                                            <?= $sdrug->str_comment ?>

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
                                <td> <?= $sdrug->gen_prop_adequately ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $numb++ ?>.</td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Workspace:</label>
                                            <?= $sdrug->gen_prop_workspace ?>

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

                                            <?= $sdrug->gen_prop_comment ?>

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
                                    <?= $sdrug->manu_identified ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $numb++ ?>.</td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Officer’s Comments</label>
                                            <?= $sdrug->gen_manu_comment ?>

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
                                <td> <?= $sdrug->process_described ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $numb++ ?>.</td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Workspace</label>
                                            <?= $sdrug->process_workspace ?>

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
                                            <?= $sdrug->workspace_comment ?>

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
                                <td> <?= $sdrug->control_described ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $numb++ ?>.</td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Workspace</label>
                                            <?= $sdrug->control_workspace ?>

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
                                            <?= $sdrug->control_comment ?>

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
                                <td> <?= $sdrug->control_steps_described ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $numb++ ?>.</td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Officer’s Comments</label>
                                            <?= $sdrug->control_steps_comments ?>

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
                                <td> <?= $sdrug->validation_described ?>

                                </td>
                            </tr>
                            <tr>
                                <td><?= $numb++ ?>.</td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Officer’s Comments</label>
                                            <?= $sdrug->validation_comments ?>

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
                                <td> <?= $sdrug->manufacturing_described ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $numb++ ?>.</td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label> Workspace </label>
                                            <?= $sdrug->manufacturing_workspace ?>

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
                                            <?= $sdrug->manufacturing_comments ?>

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
                                <td> <?= $sdrug->substance_described ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $numb++ ?>.</td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label> Workspace </label>
                                            <?= $sdrug->substance_workspace ?>

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
                                            <?= $sdrug->substance_comments ?>

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
                                <td> <?= $sdrug->impurities_characterised ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $numb++ ?>.</td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label> Workspace </label>
                                            <?= $sdrug->impurities_workspace ?>

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
                                            <?= $sdrug->impurities_comments ?>

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
                                <td> <?= $sdrug->specifications_appropriate ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $numb++ ?>.</td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label> Workspace </label>
                                            <?= $sdrug->specifications_workspace ?>

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
                                            <?= $sdrug->specifications_comments ?>

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
                                <td> <?= $sdrug->analytical_described ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $numb++ ?>.</td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Officer’s Comments</label>
                                            <?= $sdrug->analytical_comments ?>

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
                                    <?= $sdrug->acceptance_presented ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $numb++ ?>.</td>
                                <td> <b>For phase II/III trials</b> The suitability of methods is commensurate with the stage of
                                    development and clearly explained. A summary of the validation results is provided: </td>
                                <td> <?= $sdrug->suitability_explained ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $numb++ ?>.</td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Officer’s Comments</label>
                                            <?= $sdrug->validation_procedures_comments ?>

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
                                <td> <?= $sdrug->batch_provided ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $numb++ ?>.</td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label> Workspace </label>
                                            <?= $sdrug->batch_workspace ?>

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
                                            <?= $sdrug->batch_comments ?>

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
                                <td> <?= $sdrug->justification_acceptable ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $numb++ ?>.</td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label> Workspace </label>
                                            <?= $sdrug->justification_workspace ?>

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
                                            <?= $sdrug->justification_comments ?>

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
                                <td> <?= $sdrug->reference_described ?>
                                </td>
                            </tr>

                            <tr>
                                <td><?= $numb++ ?>.</td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Officer’s Comments</label>
                                            <?= $sdrug->reference_comments ?>

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
                                <td> <?= $sdrug->container_suitable ?>
                                </td>
                            </tr>

                            <tr>
                                <td><?= $numb++ ?>.</td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Officer’s Comments</label>
                                            <?= $sdrug->container_comments ?>

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
                                <td> <?= $sdrug->stability_satisfactory ?>
                                </td>
                            </tr>

                            <tr>
                                <td><?= $numb++ ?>.</td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label> Workspace: </label>
                                            <?= $sdrug->stability_workspace ?>

                                        </div>
                                    </div>
                                </td>
                            </tr>

                        <?php } ?>


                        <!-- End of S-Drug -->

                        <!-- Start of P-Drug -->
                        <?php
                        $pdrugs = $quadata->pdrugs;
                        foreach ($pdrugs as $pdrug) {
                        ?>
                            <tr class="active">
                                <th> <?php $numb = 1; ?></th>
                                <th>P Drug substance </th>
                                <th width="35%"></th>
                            </tr>
                            <tr>
                                <td><?= $numb++ ?>.</td>
                                <td>P.1 Description and composition of the investigational medical product: </td>
                                <td> <?= $pdrug->substance_described ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>The description and composition are adequate:</td>
                                <td><?= $pdrug->composition ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Workspace</label>
                                            <?= $pdrug->composition_workspace ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Officer’s Comments</label>
                                            <?= $pdrug->composition_comments ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th>P.2 Pharmaceutical development </th>
                                <th width="35%"></th>
                            </tr>
                            <tr>
                                <td></td>
                                <td>The pharmaceutical development is adequately described:</td>
                                <td>
                                    <?= $pdrug->pharma_adequate ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Comments</label>
                                            <?= $pdrug->pharma_comments ?>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th>P.3 Manufacture </th>
                                <th width="35%"></th>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th>P.3.1 Manufacturer(s) </th>
                                <th width="35%"></th>
                            </tr>
                            <tr>
                                <td></td>
                                <td>The manufacturing sites are clearly identified:</td>
                                <td>
                                    <?= $pdrug->manu_identified ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Workspace</label>
                                            <?= $pdrug->manu_workspace ?>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Officer’s Comments</label>
                                            <?= $pdrug->manu_comments ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <th> </th>
                                <th>P.3.2 Batch formula</th>
                                <th width="35%"></th>
                            </tr>
                            <tr>
                                <td></td>
                                <td>The batch formula is appropriately described:</td>
                                <td>
                                    <?= $pdrug->batch_described ?> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Workspace</label>
                                            <?= $pdrug->batch_described_workspace ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Officer’s Comments</label>
                                            <?= $pdrug->batch_described_comments ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th>P.3.3 Description of the manufacturing process and process controls</th>
                                <th width="35%"></th>
                            </tr>
                            <tr>
                                <td></td>
                                <td>The manufacturing process and process control are adequately described:?</td>
                                <td>
                                    <?= $pdrug->control_described ?> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Workspace</label>
                                            <?= $pdrug->control_workspace ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Officer’s Comments</label>
                                            <?= $pdrug->control_comments ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th>P.3.4 Controls of critical steps and intermediates</th>
                                <th width="35%"></th>
                            </tr>
                            <tr>
                                <td></td>
                                <td>The controls of critical steps and intermediates are adequately described:</td>
                                <td>
                                    <?= $pdrug->control_steps_described ?> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Officer’s Comments</label>
                                            <?= $pdrug->control_steps_comments ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th>P.3.5 Process validation and/or evaluation</th>
                                <th width="35%"></th>
                            </tr>
                            <tr>
                                <td></td>
                                <td>The validation processes are adequately described: </td>
                                <td>
                                    <?= $pdrug->validation_described ?> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Workspace:</label>
                                            <?= $pdrug->validation_workspace ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Officer’s Comments</label>
                                            <?= $pdrug->validation_comments ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th> P.4 Control of excipients </th>
                                <th width="35%"></th>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th> P.4.1 Specifications </th>
                                <th width="35%"></th>
                            </tr>
                            <tr>
                                <td></td>
                                <td> For excipients not described in current pharmacopoeias. The specifications and acceptance criteria provided are appropriate: </td>
                                <td>
                                    <?= $pdrug->specification_criteria ?> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Officer’s Comments</label>
                                            <?= $pdrug->specifications_comments ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th> P.4.2 Analytical procedures </th>
                                <th width="35%"></th>
                            </tr>
                            <tr>
                                <td></td>
                                <td> The analytical procedures are adequately described: </td>
                                <td>
                                    <?= $pdrug->analytical_described ?> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Officer’s Comments</label>
                                            <?= $pdrug->analytical_comments ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th> P.4.3 Validation of the analytical procedures </th>
                                <th width="35%"></th>
                            </tr>
                            <tr>
                                <td></td>
                                <td> The analytical procedures are adequately validated:</td>
                                <td>
                                    <?= $pdrug->procedures_validated ?> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Officer’s Comments</label>
                                            <?= $pdrug->procedures_comments ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th> P.4.4 Justification of the specifications</th>
                                <th width="35%"></th>
                            </tr>
                            <tr>
                                <td></td>
                                <td> The justification provided for the specifications of excipients and their limits is satisfactory: </td>
                                <td>
                                    <?= $pdrug->justification_satisfactory ?> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Workspace</label>
                                            <?= $pdrug->justification_workspace ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Officer’s Comments</label>
                                            <?= $pdrug->justification_satis_comments ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th> P.4.5 Excipients of animal or human origin </th>
                                <th width="35%"></th>
                            </tr>
                            <tr>
                                <td></td>
                                <td> The IMP contains excipients of animal origin: </td>
                                <td>
                                    <?= $pdrug->animal_origin ?> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td> Safety information on transmissible spongiform encephalopathies (TSE) is provided and deemed satisfactory: </td>
                                <td>
                                    <?= $pdrug->tse_satisfactory ?> </td>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Officer’s Comments</label>
                                            <?= $pdrug->tse_comments ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th> P.4.6 Novel excipients </th>
                                <th width="35%"></th>
                            </tr>
                            <tr>
                                <td></td>
                                <td> Excipients are appropriately controlled: </td>
                                <td>
                                    <?= $pdrug->excipients_controlled ?> </td>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label> Workspace </label>
                                            <?= $pdrug->excipients_workspace ?>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Officer’s Comments</label>
                                            <?= $pdrug->excipients_comments ?>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th> P.5 Control of the drug product </th>
                                <th width="35%"></th>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th> P.5.1 Specifications </th>
                                <th width="35%"></th>
                            </tr>
                            <tr>
                                <td></td>
                                <td> Satisfactory specifications for the drug product, including appropriate limits, are proposed:</td>
                                <td>
                                    <?= $pdrug->appropriate_limits ?> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label> Workspace </label>
                                            <?= $pdrug->appropriate_control_workspace ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Officer’s Comments</label>
                                            <?= $pdrug->appropriate_control_comments ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th> P.5.2 Analytical procedures </th>
                                <th width="35%"></th>
                            </tr>
                            <tr>
                                <td></td>
                                <td> Are the analytical methods adequately described?: </td>
                                <td>
                                    <?= $pdrug->analytical_methods ?> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Officer’s Comments</label>
                                            <?= $pdrug->analytical_methods_comments ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th> P.5.3 Validation of analytical procedures </th>
                                <th width="35%"></th>
                            </tr>
                            <tr>
                                <td></td>
                                <td> <b>Phase I trials</b>. The suitability of the methods is commensurate with the stage of development. The acceptance limits and parameters to validate the analytical methods are presented: </td>
                                <td>
                                    <?= $pdrug->validation_procedure ?> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td> <b>For phase II/III trials</b>. The suitability of methods is commensurate with the stage of development and clearly explained. A summary of the validation results is provided: </td>
                                <td>
                                    <?= $pdrug->validation_results ?> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Officer’s Comments</label>
                                            <?= $pdrug->validation_second_comments ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th> P.5.4 Batch analyses </th>
                                <th width="35%"></th>
                            </tr>
                            <tr>
                                <td></td>
                                <td> Data for representative batch analyses are provided for all the relevant manufacturing process, and for each drug product manufacturer:</td>
                                <td>
                                    <?= $pdrug->batch_analyses ?> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Officer’s Comments</label>
                                            <?= $pdrug->batch_comments ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th> P.5.5 Characterisation of impurities </th>
                                <th width="35%"></th>
                            </tr>
                            <tr>
                                <td></td>
                                <td> The information provided for impurities is acceptable:</td>
                                <td>
                                    <?= $pdrug->impurities_acceptable ?> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label> Workspace: </label>
                                            <?= $pdrug->impurities_workspace ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label> Comments: </label>
                                            <?= $pdrug->impurities_comments ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th> P.5.6 Justification of specification(s) </th>
                                <th width="35%"></th>
                            </tr>
                            <tr>
                                <td></td>
                                <td> The justification for the drug product specifications and limits is acceptable</td>
                                <td>
                                    <?= $pdrug->product_specifications ?> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label> Comments: </label>
                                            <?= $pdrug->justification_specs_comments ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label> Comments: </label>
                                            <?= $pdrug->justification_comments ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th> P.6 Reference standards or materials </th>
                                <th width="35%"></th>
                            </tr>
                            <tr>
                                <td></td>
                                <td> The justification for the drug product specifications and limits is acceptable</td>
                                <td>
                                    <?= $pdrug->reference_standards ?> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label> Comments: </label>
                                            <?= $pdrug->reference_standards_comments ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th> P.7 Container closure system </th>
                                <th width="35%"></th>
                            </tr>
                            <tr>
                                <td></td>
                                <td> The container closure system for the drug product is properly characterised and suitable:</td>
                                <td>
                                    <?= $pdrug->closure_system ?> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label> Comments: </label>
                                            <?= $pdrug->closure_system_comments ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th> P.8 Stability </th>
                                <th width="35%"></th>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th> P.8.1 Stability summary and conclusions </th>
                                <th width="35%"></th>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th> P.8.2 Post-approval stability protocol and stability commitment </th>
                                <th width="35%"></th>
                            </tr>
                            <tr class="active">
                                <th></th>
                                <th> P.8.3 Stability data </th>
                                <th width="35%"></th>
                            </tr>
                            <tr>
                                <td></td>
                                <td> The drug product has undergone appropriate stability tests:</td>
                                <td>
                                    <?= $pdrug->stability_tests ?> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label> Workspace: </label>
                                            <?= $pdrug->stability_tests_workspace ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <?php if (!empty($pdrug->storage_conditions)) : ?>
                                <tr class="active">
                                    <td></td>
                                    <td colspan="3">List of proposed shelf-life/retest period and storage conditions of the drug substance. </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="3">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h5><small> Summary of stability studies provided in support of the proposed shelf-life. State number of months for which data is available.:</small></h5>
                                            </div>
                                        </div>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="3">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="border">
                                                    <!-- check if pdrugs['storage_conditions'] is not empty -->

                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th> Batch details<br> (e.g. batch number) </th>
                                                                <th> Manufacturing <br>process </th>
                                                                <th> -70ºC</th>
                                                                <th> -20ºC </th>
                                                                <th> 5ºC </th>
                                                                <th> 25ºC/<br>60% RH</th>
                                                                <th> 30ºC/<br>65% RH</th>
                                                                <th> 40ºC/<br>75% RH </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $i = 1;
                                                            foreach ($pdrug->storage_conditions as $storage_condition) :
                                                                $i++;

                                                            ?>
                                                                <tr>
                                                                    <td><?= $i; ?></td>
                                                                    <td>
                                                                        <?= $storage_condition->batch_details ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= $storage_condition->manu_process ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= $storage_condition->neg_seventy ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= $storage_condition->neg_twenty ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= $storage_condition->pos_five ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= $storage_condition->pos_twenty_five ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= $storage_condition->pos_thirty ?>
                                                                    </td>
                                                                    <td>
                                                                        <?= $storage_condition->pos_forty ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <tr class="active">
                                <th></th>
                                <th> Comment whether trends or out of specifications results were observed. </th>
                                <th width="35%"></th>
                            </tr>
                            <tr>
                                <td></td>
                                <td> The extension of shelf-life will be made without substantial amendment:</td>
                                <td>
                                    <?= $pdrug->substantial_amendment ?> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td> If yes, extension to be made in accordance with a registered protocol:</td>
                                <td>
                                    <?= $pdrug->registered_protocol ?> </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label> Comments: </label>
                                            <?= $pdrug->pdrug_comments ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>

                        <tr class="active">
                            <th> 1.7 <?php $numb = 1; ?></th>
                            <th> Labelling </th>
                            <th width="35%"></th>
                        </tr>
                        <tr>
                            <td><?= $numb++ ?>.</td>
                            <td> Is the proposed labelling in line with national requirements? </td>
                            <td>
                                <?= $quadata->labelling ?>
                            </td>
                        </tr>

                        <tr>
                            <td><?= $numb++ ?>.</td>
                            <td colspan="3">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label> Officer’s Comments </label>
                                        <br>
                                        <?= $quadata->labelling_comments ?>

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
                                        <br>

                                        <?= $quadata->blinding_workspace ?>


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
                                        <br>

                                        <?= $quadata->blinding_comments ?>

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
                            <td> <?= $quadata->acceptable ?>

                            </td>
                        </tr>
                        <tr>
                            <td><?= $numb++ ?>.</td>
                            <td> Supplementary information has to be provided </td>
                            <td> <?= $quadata->supplementary_need ?>
                            </td>
                        </tr>
                        <tr>
                            <td><?= $numb++ ?>.</td>
                            <td colspan="3">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label> Overall comment/ conclusion on the quality assessment: </label>
                                        <br>
                                        <?= $quadata->overall_comments ?>

                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><?= $numb++ ?>.</td>
                            <td colspan="3">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label> REQUESTS FOR ADDITIONAL INFORMATION ON QUALITY </label>
                                        <br>
                                        <?= $quadata->additional ?>

                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h4 class="text-center"> Signature(s)</h4>
                                    </div>
                                    <div class="col-xs-12">
                                        <h4 class="text-center">
                                            <?php
                                            echo ($quadata->user->dir) ? "<span>" . $quadata->user->name . ": </span><img src='" . $this->Url->build(substr($quadata->user->dir, 8) . '/' . $quadata->user->file, true) . "' style='width: 30%;' alt=''>" : '';
                                            ?></h4>
                                        <?= ($quadata->chosen) ? $this->cell('Signature', [$quadata->chosen]) : ''; ?>
                                    </div>
                                </div>
                                <br>
                            </td>
                        </tr>

                    </tbody>

                </table>

                <?php
                if ($this->request->params['_ext'] != 'pdf') {
                    if ($prefix == 'manager' or $quadata->user_id == $this->request->session()->read('Auth.User.id')) {
                        echo    $this->Form->postLink(
                            '<span class="fa fa-trash" aria-hidden="true"></span> Delete',
                            ['action' => 'remove-quality-assessment', $quadata->id],
                            [
                                'confirm' => 'Are you sure you want to delete this quality assessment for ' . $application->protocol_no . '?', 'escape' => false,
                                'class' => 'btn btn-warning btn-xs active'
                            ]
                        );
                    }
                }
                ?>
            </div>
        <?php }
        ?>

    </div>
</div>