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
                            <td>    <?= $sdrug->str_subsection ?> 
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
                            <td>  <?= $sdrug->gen_prop_adequately ?> 
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
                            <td>      <?= $sdrug->process_described ?>
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
                            <td>     <?= $sdrug->control_described ?>
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
                            <td>      <?= $sdrug->control_steps_described ?>
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
                            <td>  <?= $sdrug->validation_described ?>
                                        
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
                            <td>  <?= $sdrug->manufacturing_described ?>
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
                            <td>   <?= $sdrug->substance_described ?>
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
                            <td>    <?= $sdrug->impurities_characterised ?>
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
                            <td>    <?= $sdrug->specifications_appropriate ?>
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
                            <td>  <?= $sdrug->analytical_described ?>
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
                            <td>  <?= $sdrug->suitability_explained ?>
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
                            <td>   <?= $sdrug->batch_provided ?>
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
                            <td>  <?= $sdrug->reference_described ?>
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
                            <td>    <?= $sdrug->container_suitable ?>
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
                            <td>  <?= $sdrug->stability_satisfactory ?>
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