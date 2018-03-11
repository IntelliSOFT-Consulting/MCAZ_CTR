<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<div class="row">
    <div class="col-xs-12">
        <?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> Stages', ['controller' => 'Stages', 'action' => 'index'], array('escape' => false, 'class' => 'btn btn-primary')); ?> &nbsp;

            <?= $this->Form->create($stage) ?>
            <fieldset>
                <legend><?= __('Edit Stage') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('min_day');
                    echo $this->Form->control('max_day');
                    echo $this->Form->control('duration');
                    echo $this->Form->control('allowance');
                ?>
            </fieldset>            
        <hr>
        <div class="form-group"> 
            <div class="col-sm-offset-4 col-sm-8"> 
                <button type="submit" class="btn btn-success active" id="login"><i class="fa fa-save" aria-hidden="true"></i> Update</button>
            </div> 
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>