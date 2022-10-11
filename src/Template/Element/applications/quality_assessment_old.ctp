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
                    
                </tbody>
            </table>

            <?php
                        echo $this->element('multi/gmd_compliance');
            // echo $this->element('multi/impd_assessments');

            ?> 

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
<?php
    echo $this->Form->end();
}
?>