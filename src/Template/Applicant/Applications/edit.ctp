<?php echo $this->element('application/application_edit'); ?>

<?php //echo $this->Form->control('cover_letters.0.file', ['type' => 'file','label' => 'Attach report (if available)']); ?>
<?php $this->start('header'); ?>
<h4 class="text-success">
    Unsubmitted Application <small>(<?php echo $this->request->data['Application']['id'];?>)</small>
  </h4>
  <hr style="margin:5px;">
<?php $this->end(); ?>
