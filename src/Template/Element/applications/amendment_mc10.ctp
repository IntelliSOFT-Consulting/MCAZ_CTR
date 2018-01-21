
          <h5>MC10 Form</h5>
          <p>Download MC10 Form using link below. Sign and upload the file.</p>


              <div id="mc10_forms" class="checkcontrols" title="mc10_forms">              
                <?php

                echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download MC10', ['action' => 'mc10', '_ext' => 'pdf', $amendment->id, 'prefix' => false], ['escape' => false, 'class' => 'btn btn-success']);

                echo '<p class="checkbox"> <b>Upload complete MC10 form:</b> '.$add_fileinput.'</p>';
                  // echo $add_fileinput;
                    if (!empty($amendment['mc10_forms'])) {
                      for ($i = 0; $i <= count($amendment['mc10_forms'])-1; $i++) { ?>
                      <div style="margin-top: 5px; margin-bottom: 5px;">
                      <?php
                        echo $this->Html->link($amendment['mc10_forms'][$i]->file, substr($amendment['mc10_forms'][$i]->dir, 8) . '/' . $amendment['mc10_forms'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
                        echo '&nbsp;<button value="'.$amendment['mc10_forms'][$i]->id.'" type="button" class="btn btn-xs btn-danger delete_file_input">
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
            /*if (!empty($amendment['mc10_forms'][0]->file)) {
                echo "<p> <b>Registration Certificate:</b> ".$this->Html->link($amendment['mc10_forms'][0]->file, substr($amendment['mc10_forms'][0]->dir, 8) . '/' . $amendment['mc10_forms'][0]->file, ['fullBase' => true])."</p>";
            } else {
                echo $this->Form->control('mc10_forms.0.id', ['type' => 'hidden', 'templates' => 'table_form']);
                echo $this->Form->control('mc10_forms.0.file', ['type' => 'file','label' => 'Attach MC10 Form']);
            }*/
          ?>
