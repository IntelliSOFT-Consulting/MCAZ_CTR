<?php $this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<div class="row">
    <div class="col-xs-12">
        <?= $this->Html->link('<i class="fa fa-plus" aria-hidden="true"></i> Users', ['controller' => 'Users', 'action' => 'index'], array('escape' => false, 'class' => 'btn btn-primary')); ?> &nbsp;

        <div class="page-header">
            <div class="styled_title"><h1>Update Details </h1></div>
        </div>
        <?= $this->Flash->render() ?>

    <?= $this->Form->create($user) ?>

    <div class="row">
        <div class="col-xs-6">
            <?php
                // echo $this->Form->control('id', ['templates' => 'table_form']);
                echo $this->Form->control('name', ['label' => 'Name', 'escape' => false]);
                echo $this->Form->control('email', ['label' => 'Email', 'escape' => false]);
                echo $this->Form->control('username');
                echo $this->Form->control('password', ['label' => 'Password', 'escape' => false, 'value' => '', 'required' => false]);
                echo $this->Form->control('confirm_password', ['type' => 'password', 'label' => 'Confirm Password', 'escape' => false, 'value' => '', 'required' => false]);   
                echo $this->Form->control('group_id');
                ?>
        </div><!--/span-->
        <div class="col-xs-6">
            <?php
                echo $this->Form->control('phone_no');
                // echo $this->Form->control('name_of_institution');
                // echo $this->Form->control('institution_address');
                // echo $this->Form->control('institution_code');
                echo $this->Form->control('is_active', ['label' => 'Is Active? <small class="muted">(activation after registration)</small>', 
                    'templates' => 'checkbox_form_user', 'escape' => false]);  
                echo $this->Form->control('deactivated', ['label' => 'Deactivated? <small class="muted">(deny user access)</small>', 
                    'templates' => 'checkbox_form_user', 'escape' => false]);  
                echo $this->Form->control('is_admin', ['label' => 'Is Admin? <small class="muted">(for manual data entry)</small>', 
                    'templates' => 'checkbox_form_user', 'escape' => false]);  
                
                ?>
        </div><!--/span-->
    </div><!--/row-->
     <hr>
      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10"> 
          <button type="submit" class="btn btn-success active" id="login"><i class="fa fa-save" aria-hidden="true"></i> Update</button>
        </div> 
    </div>
     <?= $this->Form->end() ?>
    </div>
</div>

<script>
    $(function() {
        var cache2 = {},    lastXhr;
        $( "#name-of-institution" ).autocomplete({
            source: function( request, response ) {
                var term = request.term;
                if ( term in cache2 ) {
                    response( cache2[ term ] );
                    return;
                }

                lastXhr = $.getJSON( "/facilities/facility-name.json", request, function( data, status, xhr ) {
                    cache2[ term ] = data;
                    if ( xhr === lastXhr ) {
                        response( data );
                    }
                });
            },
            select: function( event, ui ) {
                $( "#institution-code" ).val( ui.item.value );
                $( "#name-of-institution" ).val( ui.item.label );
                return false;
            }
        });

        var cache3 = {},    lastXhr;
        $( "#institution-code" ).autocomplete({
            source: function( request, response ) {
                var term = request.term;
                if ( term in cache3 ) {
                    response( cache3[ term ] );
                    return;
                }

                lastXhr = $.getJSON( "/facilities/facility-code.json", request, function( data, status, xhr ) {
                    cache3[ term ] = data;
                    if ( xhr === lastXhr ) {
                        response( data );
                    }
                });
            },
            select: function( event, ui ) {
                $( "#institution-code" ).val( ui.item.label );
                $( "#name-of-institution" ).val( ui.item.value );
                return false;
            }
        });
    });
</script>
