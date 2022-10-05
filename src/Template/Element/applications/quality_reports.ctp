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
                if ($this->request->params['_ext'] != 'pdf') echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF ', ['controller' => 'Applications', 'action' => 'review', '_ext' => 'pdf', $quadata->id], ['escape' => false, 'class' => 'btn btn-xs btn-success active topright']);
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

                        <?php } ?>

                        <!-- End of S-Drug -->
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