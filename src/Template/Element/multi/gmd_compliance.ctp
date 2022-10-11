<?php
$this->Html->script('multi/compliance', ['block' => true]);
$numb = 1;
?>


<div class="compliance-groups">


    <div style="margin-left: 0px;">
      <table class="table table-bordered table-condensed">
        <thead>
          <tr class="active">
            <th></th>
            <th>GMP compliance </th>
            <th width="35%">(<small>where necessary, Click button to add more -
                <button type="button" class="btn btn-xs btn-primary" id="addCompliance">Add Compliance</button></small>) </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?= $numb++ ?>.</td>
            <td>
              <div class="col-xs-5">
                <?php
                echo $this->Form->control('compliance.0.site_name', ['label' => 'Name and address of site (can be cut and pasted from the IMPD)', 'escape' => false, 'templates' => [
                  'inputContainer' => '<div class="{{type}}{{required}}">{{content}}</div>',
                  'textarea' => '<textarea class="form-control" rows=3 name="{{name}}"{{attrs}}>{{value}}</textarea>'
                ]]);

                ?>
              </div>
              <div class="col-xs-1">
              </div>
              <div class="col-xs-5">
                <?php
                echo $this->Form->control('compliance.0.site_function', ['label' => 'Function (include reference to PRx,PLx etc as relevant)', 'escape' => true,]);

                ?>

              </div>
            </td>
            <td>
              <small>Confirmation of valid license (tick if
                provided or comment if unavailable/
                not required )</small>

              <div class="col-xs-3">

                <label></label>
                <?php
                echo $this->Form->control('compliance.0.valid_license', ['type' => 'checkbox', 'label' => 'Yes', 'templates' => 'checkbox_form_ev']);
                ?>
              </div>
              <div class="col-xs-9">

                <?php
                echo $this->Form->control('compliance.0.comment', ['label' => false, 'escape' => false, 'templates' => ['inputContainer' => '<div class="{{type}}{{required}}">{{content}}</div>', 'textarea' => '<textarea class="form-control" rows=3 name="{{name}}"{{attrs}}>{{value}}</textarea>']]);

                ?>
              </div>
            </td>
          </tr>
          <!--Multiples -->
          <div id="compliance_primary_contact">
          <?php echo $this->Html->tag('hr', '', array('id' => 'compliance_sectionHr')); ?>
          <div id="compliance_section">
            <?php
            if (!empty($application['quality_assessments'][$ekey]['compliance'])) {
              for ($i = 1; $i <= count($application['compliance_section']) - 1; $i++) {
                if ($i == 1) echo "<h5 style='margin-left: 30px;'><b></b></h5>";
            ?>
                <div class="compliance-group">
                  <tr>
                    <td><?= $numb++ ?>.</td>
                    <td>
                      <div class="col-xs-5">

                        <?php
                        echo $this->Form->control('compliance.' . $i . '.site_name', ['label' => false, 'escape' => false, 'templates' => [
                          'inputContainer' => '<div class="{{type}}{{required}}">{{content}}</div>',
                          'textarea' => '<textarea class="form-control" rows=3 name="{{name}}"{{attrs}}>{{value}}</textarea>'
                        ]]);

                        ?>
                      </div>
                      <div class="col-xs-1">
                      </div>
                      <div class="col-xs-5">
                        <?php
                        echo $this->Form->control('compliance.' . $i . '.site_function', ['label' => false, 'escape' => true,]);

                        ?>

                      </div>
                    </td>
                    <td>
                      <div class="col-xs-3">

                        <label></label>
                        <?php
                        echo $this->Form->control('compliance.' . $i . '.valid_license', ['type' => 'checkbox', 'label' => 'Yes', 'templates' => 'checkbox_form_ev']);
                        ?>
                      </div>
                      <div class="col-xs-9">

                        <?php
                        echo $this->Form->control('compliance.' . $i . '.comment', ['label' => false, 'escape' => false, 'templates' => ['inputContainer' => '<div class="{{type}}{{required}}">{{content}}</div>', 'textarea' => '<textarea class="form-control" rows=3 name="{{name}}"{{attrs}}>{{value}}</textarea>']]);

                        ?>
                      </div>
                    </td>
                  </tr>
                </div>
            <?php
              } //end for
            } //end if
            ?>
          </div>
          </div>
        </tbody>
      </table>
    </div>
  </div>
 