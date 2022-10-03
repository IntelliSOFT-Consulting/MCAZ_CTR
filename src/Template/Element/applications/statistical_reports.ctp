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
        foreach ($statisticals as $statistical) { ?>

        <div class="thumbnail amend-form">
            <a class="btn btn-primary" role="button" data-toggle="collapse"
                href="#<?= $statistical->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>" aria-expanded="false"
                aria-controls="<?= $statistical->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>">
                Assessed on: <?= $statistical['created'] ?> by <?= $statistical->user->name ?>
            </a>
            <?php
                if ($this->request->params['_ext'] != 'pdf') echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'review', '_ext' => 'pdf', $statistical->id], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
            
                ?>
        </div>
        <div class="<?= ($this->request->params['_ext'] != 'pdf') ? 'collapse' : ''; ?>"
            id="<?= $statistical->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>">

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
                        <th width="35%"></th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Controlled/non controlled?</td>
                        <td> <?= $statistical->design_type ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Randomized?</td>
                        <td> <?= $statistical->randomized ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Blinding (masking)?</td>
                        <td><?= $statistical->blinding ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Brief description of the study plan and design:</label>
                                    <br>
                                    <?= $statistical->design_description ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Is the proposed study design acceptable?</td>
                        <td> <?= $statistical->design_acceptable ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <br>
                                    <?= $statistical->design_comment ?>

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
                                    <br>
                                    <?= $statistical->rand_description ?>

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
                                    <br>
                                    <?= $statistical->rand_comment ?>

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
                        <td> <?= $statistical->sample_acceptable ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Are the trial power and level of significance acceptable?</td>
                        <td> <?= $statistical->power_acceptable ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Brief description of the sample size, trial power, and level of
                                        significance:</label>
                                    <br>
                                    <?= $statistical->sample_description ?>

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
                                    <br>
                                    <?= $statistical->sample_comment ?>

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
                                    <br>
                                    <?= $statistical->analysis_description ?>

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
                                    <?= $statistical->analysis_objective ?>

                                </div>
                            </div>
                        </td>
                        <td>
                            <?= $statistical->analysis_objective_comments ?>

                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    Are the methods appropriate?
                                </div>

                                <div class="col-xs-4">
                                    <?= $statistical->methods_appropriate ?>

                                </div>
                            </div>
                        </td>
                        <td> <?= $statistical->methods_appropriate_comments ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    Are the considerations regarding missing values, unused, and spurious data
                                    acceptable?
                                </div>

                                <div class="col-xs-4">
                                    <?= $statistical->considerations ?>

                                </div>
                            </div>
                        </td>
                        <td> <?= $statistical->considerations_comments ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    Are the considerations regarding multiplicity acceptable?
                                </div>

                                <div class="col-xs-4">
                                    <?= $statistical->multiplicity ?>

                                </div>
                            </div>
                        </td>
                        <td> <?= $statistical->multiplicity_comments ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td>Are the planned analyses appropriate?</td>
                        <td> <?= $statistical->analyses_acceptable ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Comments</label>
                                    <br>
                                    <?= $statistical->analysis_comment ?>

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
                        <td> <?= $statistical->interim_safety ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Is there an interim analysis planned for this trial?</td>
                        <td> <?= $statistical->interim_planning ?>
                        </td>
                    </tr>


                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Brief description of the interim analysis(es) (if applicable):</label>
                                    <br>
                                    <?= $statistical->interim_description ?>

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
                                    <br>
                                    <?= $statistical->interim_comment ?>

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
                        <td> <?= $statistical->statistical_acceptable ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Supplementary information needs to be provided (refer to the list of requests for
                            additional
                            information)</td>
                        <td> <?= $statistical->information_needed ?>
                        </td>
                    </tr>


                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label>Officer’s Overall Comments</label>
                                    <br>
                                    <?= $statistical->overall_comment ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>

            </table>

            <?php
                if ($this->request->params['_ext'] != 'pdf') {
                    if ($prefix == 'manager' or $statistical->user_id == $this->request->session()->read('Auth.User.id')) {
                        echo    $this->Form->postLink(
                            '<span class="fa fa-trash" aria-hidden="true"></span> Delete',
                            ['action' => 'remove-statistical-assessment', $statistical->id],
                            [
                                'confirm' => 'Are you sure you want to delete this statistical assessment for ' . $application->protocol_no . '?', 'escape' => false,
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