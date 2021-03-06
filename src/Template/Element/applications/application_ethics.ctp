<?php 
            echo '<label>10.1 Ethical Considerations</label>';
            echo $this->Form->control('ethic_considerations', array(
              'label' => 'State any ethical or moral considerations relating to the trial giving details <i class="sterix fa fa-asterisk" aria-hidden="true"></i>', 
              'escape' => false, 
              'templates' => 'textarea_form'));

            echo '<label> Company who will insure the participants in the proposed trial</label>';
            echo $this->Form->control('insurance_company', array(
              'label' => 'Company Name', 
              'escape' => false));
            echo $this->Form->control('insurance_address', array(
              'label' => 'Company Address', 
              'escape' => false));
            // echo '<label>(Allow attachment for a letter from the insurance company indicating company\'s consent to the proposed insurance and a copy of the proposed insurance policy)</label>';
            
            /*if (!empty($application['policies'][0]->file)) {
                echo "<p> <b>Insurance Letter:</b> ".$this->Html->link($application['policies'][0]->file, substr($application['policies'][0]->dir, 8) . '/' . $application['policies'][0]->file, ['fullBase' => true, 'class' => 'btn btn-info'])."</p>";
                echo "<p> <b>Insurance Policy:</b> ".$this->Html->link($application['policies'][0]->file, substr($application['policies'][0]->dir, 8) . '/' . $application['policies'][1]->file, ['fullBase' => true, 'class' => 'btn btn-info'])."</p>";
            } else {
                echo $this->Form->control('policies.0.id', ['type' => 'hidden', 'templates' => 'table_form']);
                echo $this->Form->control('policies.0.file', ['type' => 'file','label' => 'Insurance Letter']);
                echo $this->Form->control('policies.1.id', ['type' => 'hidden', 'templates' => 'table_form']);
                echo $this->Form->control('policies.1.file', ['type' => 'file','label' => 'Insurance Policy']);
            }*/
            ?>
              <div id="policies" class="checkcontrols" title="policies">              
                <?php
                echo '<label>(Allow attachment for a letter from the insurance company indicating company\'s consent to the proposed insurance and a copy of the proposed insurance policy) '.$add_fileinput.'</label>';
                  // echo $add_fileinput;
                    if (!empty($application['policies'])) {
                      for ($i = 0; $i <= count($application['policies'])-1; $i++) { ?>
                      <div style="margin-top: 5px; margin-bottom: 5px;">
                      <?php
                        echo $this->Html->link($application['policies'][$i]->file, substr($application['policies'][$i]->dir, 8) . '/' . $application['policies'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
                        echo '&nbsp;<button value="'.$application['policies'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_input">
                          &nbsp;<i class="fa fa-trash"></i>&nbsp;</button>';
                      ?>
                    </div>
                    <?php
                      }
                    } 
                ?>
              </div>
              <hr>
            <?php
            echo $this->Form->control('insurance_amount', array(
              'label' => 'State the amount of insurance in respect of each participant', 
              'escape' => false));

            echo "<h5>Other</h5>";
            echo $this->Form->control('other_insurance', array(
              'label' => 'If no insurance company, provide details',
              'escape' => false
            ));
            ?>
            <div id="details" class="checkcontrols" title="details"  style="padding-left: 20%;">              
                <?php
                echo '<label class="control-label">File Attachments? '.$add_fileinput.'</label>';
                  // echo $add_fileinput;
                    if (!empty($application['details'])) {
                      for ($i = 0; $i <= count($application['details'])-1; $i++) { ?>
                      <div style="margin-top: 5px; margin-bottom: 5px;">
                      <?php
                        echo $this->Html->link($application['details'][$i]->file, substr($application['details'][$i]->dir, 8) . '/' . $application['details'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
                        echo '&nbsp;<button value="'.$application['details'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_input">
                          &nbsp;<i class="fa fa-trash"></i>&nbsp;</button>';
                      ?>
                    </div>
                    <?php
                      }
                    } 
                ?>
              </div>
              <hr>

            <?php
            echo '<label>10.2 Ethical Reviews</label>
            <br/>The Ethics review process of the trial record in the primary register database comprises of:<br>';
            echo '<label>10.2.1 Status</label>';
            echo $this->Form->control('ethical_review_status', array(
              'label' =>  '',
              'escape' => false,
              'type' => 'radio',  
              'templates' => 'radio_form', 'options' => ['Approved' => 'Approved', 'Not Approved' => 'Not Approved', 'Pending' => 'Pending']
            ));


            /*if (!empty($application['proofs'][0]->file)) {
                echo "<p> <b>If approved, proof of approval / if pending, proof of submission:</b> ".$this->Html->link($application['proofs'][0]->file, substr($application['proofs'][0]->dir, 8) . '/' . $application['proofs'][0]->file, ['fullBase' => true, 'class' => 'btn btn-info'])."</p>";
            } else {
                echo $this->Form->control('proofs.0.id', ['type' => 'hidden', 'templates' => 'table_form']);
                echo $this->Form->control('proofs.0.file', ['type' => 'file','label' => 'If approved, proof of approval / if pending, proof of submission:']);
            }*/
            ?>
              <div id="proofs" class="checkcontrols" title="proofs">              
                <?php
                echo '<p> <b>If approved, proof of approval / if pending, proof of submission:</b> '.$add_fileinput.'</p>';
                  // echo $add_fileinput;
                    if (!empty($application['proofs'])) {
                      for ($i = 0; $i <= count($application['proofs'])-1; $i++) { ?>
                      <div style="margin-top: 5px; margin-bottom: 5px;">
                      <?php
                        echo $this->Html->link($application['proofs'][$i]->file, substr($application['proofs'][$i]->dir, 8) . '/' . $application['proofs'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
                        echo '&nbsp;<button value="'.$application['proofs'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_input">
                          &nbsp;<i class="fa fa-trash"></i>&nbsp;</button>';
                      ?>
                    </div>
                    <?php
                      }
                    } 
                ?>
              </div>
              <hr>
            <?php

            echo '<label>10.2.2 Date of Approval</label>';
            echo $this->Form->control('date_of_approval_ethics', [
              'label' => '',
              'type' => 'text', 
              'class' => 'datepickers', 'templates' => [
              'input' => '<div class="col-sm-6"><input type="{{type}}" name="{{name}}" {{attrs}} /></div>',]]);

            // echo '<label>10.2.3 Name and contact details of Ethics committee(s)</label><br/>';
            // echo $this->Form->control('ethics_contact_name', array(
            //   'label' => 'Ethics Committee(s) Name ',
            //   'escape' => false
            // ));
            // echo $this->Form->control('ethics_contact_email', array(
            //   'label' => 'Email<i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
            //   'escape' => false
            // )); 
            // echo $this->Form->control('ethics_contact_phone', array(
            //   'label' => 'Phone number <i class="sterix fa fa-asterisk aria-hidden="true"></i>',
            //   'escape' => false
            // )); 
            // echo $this->Form->control('ethics_contact_postal', array(
            //   'label' => 'Postal Address<i class="sterix fa fa-asterisk" aria-hidden="true"></i>',
            //   'escape' => false
            // ));
            echo $this->element('multi/committees'); 
          ?>