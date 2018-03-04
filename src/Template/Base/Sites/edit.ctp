<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.3.2/tinymce.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.3.2/jquery.tinymce.min.js"></script>
<?php    
    // $this->Html->script('ckeditor_2/ckeditor', ['block' => true]);
    $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.3.2/tinymce.min.js', ['block' => true]);
    $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.3.2/jquery.tinymce.min.js', ['block' => true]);
    $this->Html->script('jquery.grideditor.min', ['block' => true]);
    $this->Html->css('grideditor', ['block' => true]);
    $this->Html->css('grideditor-font-awesome', ['block' => true]);
?>


<h2 class="page-header text-center">Edit <ins><mark><?= h($site->description) ?></mark></ins> page</h2>


<div class="row">
    <?= $this->Form->create($site) ?>
    <fieldset>
        <legend><?= __('Edit Site') ?></legend>
        <?php
            //echo $this->Form->control('description');
            echo $this->Form->control('content', ['label' => false]);
        ?>
        <!-- <textarea class="form-control" rows="2" name="content" maxlength="100000" id="content">
            
        </textarea> -->
    </fieldset>
    <div id="myGrid">
        <?php //echo $site->content ?>    
    </div>
    <div class="row">
      <div class="form-group"> 
        <div class="col-xs-12"> 
          <p class="text-center">
            <button type="submit" class="btn btn-success btn-lg active text-center" id="registerUser" onclick="return confirm('Save changes?');"><i class="fa fa-save" aria-hidden="true"></i> Save </button>
          </p>
        </div> 
      </div>
    </div>
    <?= $this->Form->end() ?>

</div>

<script type="text/javascript">
    $(function() {
        // Initialize grid editor
        $('#myGrid').gridEditor({
            new_row_layouts: [[12], [6, 6], [4, 4, 4], [9, 3], [3, 9]],
            content_types: ['tinymce'],
            source_textarea: '#content',
            tinymce: {
                config: { 
                      paste_data_images: true,
                      paste_as_text: true
                 }
            }              
        });
        
        $("form").submit(function(){
            var $input = $(this).find("#content");
            $input.val($('#myGrid').gridEditor('getHtml'));
        });
    });
</script>