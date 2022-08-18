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
        foreach ($quality as $qua) {
        ?>


        <div class="thumbnail amend-form">
            <a class="btn btn-primary" role="button" data-toggle="collapse"
                href="#<?= $qua->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>" aria-expanded="false"
                aria-controls="<?= $qua->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>">
                Assessed on: <?= $qua['created'] ?> by <?= $qua->user->name ?>
            </a>
            <?php
                if ($this->request->params['_ext'] != 'pdf') echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'review', '_ext' => 'pdf', $qua->id], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
                ?>
        </div>
        <div class="<?= ($this->request->params['_ext'] != 'pdf') ? 'collapse' : ''; ?>"
            id="<?= $qua->created->i18nFormat('dd-MM-yyyy_HH_mm_ss') ?>">

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
                                    <?= $qua->quality_workspace ?>
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
                                    <div class="entry">
                                        <span class="editer">

                                            <?= ($qua->gmp_smpc) ? $checked : $nChecked; ?>
                                            Registered, non-modified product only SmPC has been provided, IMPD <br>
                                        </span>

                                    </div>
                                    <div class="entry">
                                        <span class="editer">

                                            <?= ($qua->gmp_included) ? $checked : $nChecked; ?>
                                            Assessment of the IMPD is included in section 2.3 <br>
                                        </span>

                                    </div>




                                </div>
                            </div>
                        </td>
                        <td> </td>
                    </tr>

                    <tr class="active">
                        <th> <?php $numb = 1; ?></th>
                        <th> Labelling </th>
                        <th width="35%"></th>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Is the proposed labelling in line with national requirements? </td>
                        <td>
                            <?= $qua->labelling ?>
                        </td>
                    </tr>

                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Officer’s Comments </label>
                                    <br>
                                    <?= $qua->labelling_comments ?>

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

                                    <?= $qua->blinding_workspace ?>


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

                                    <?= $qua->blinding_comments ?>

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
                        <td> <?= $qua->acceptable ?>

                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td> Supplementary information has to be provided </td>
                        <td> <?= $qua->supplementary_need ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $numb++ ?>.</td>
                        <td colspan="3">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label> Overall comment/ conclusion on the quality assessment: </label>
                                    <br>
                                    <?= $qua->overall_comments ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>

            </table>

            <?php
                if ($this->request->params['_ext'] != 'pdf') {
                    if ($prefix == 'manager' or $qua->user_id == $this->request->session()->read('Auth.User.id')) {
                        echo    $this->Form->postLink(
                            '<span class="fa fa-trash" aria-hidden="true"></span> Delete',
                            ['action' => 'remove-quality-assessment', $qua->id],
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