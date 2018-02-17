<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php
    $this->assign('Login', 'active');
?>

<div class="row">
    <div class="col-md-12">
        <?= $this->Html->link('<i class="fa fa-backward" aria-hidden="true"></i> Back to profile', ['controller' => 'Users', 'action' => 'profile', $user->id], array('escape' => false, 'class' => 'btn btn-info')); ?> &nbsp;

        <div class="page-header">
            <div class="styled_title"><h1>Update Details </h1></div>
        </div>
        <?= $this->Flash->render() ?>
    <?php

        // echo $this->Form->create('User', array(
        //     'class' => 'form-horizontal',
        //      'inputDefaults' => array(
        //         'div' => array('class' => 'form-group'),
        //         'label' => array('class' => 'control-label'),
        //         'between' => '<div class="controls">',
        //         'after' => '</div>',
        //         'class' => '',
        //         'format' => array('before', 'label', 'between', 'input', 'after','error'),
        //         'error' => array('attributes' => array('class' => 'controls help-block')),
        //      ),
        // ));
    ?>

    <?= $this->Form->create($user) ?>

    <div class="row">
        <h5 class="text-center"><small><em>fields marked with <span class="sterix fa fa-asterisk" aria-hidden="true"></span> are required!!</em></small></h5>
        <div class="col-md-6">
            <?php
                echo $this->Form->control('name', ['label' => 'Name', 'escape' => false]);
                echo $this->Form->control('email', ['label' => 'Email', 'escape' => false]);
                //echo $this->Form->control('password', ['label' => 'Password', 'escape' => false, 'value' => '', 'required' => false]);
                //echo $this->Form->control('confirm_password', ['type' => 'password', 'label' => 'Confirm Password', 'escape' => false, 'value' => '', 'required' => false]);   
                //echo $this->Form->control('name_of_institution');
                ?>
        </div><!--/span-->
        <div class="col-md-6">
            <?php
                echo $this->Form->control('username');
                echo $this->Form->control('phone_no');  
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
