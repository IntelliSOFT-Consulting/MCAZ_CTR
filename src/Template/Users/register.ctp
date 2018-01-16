<?php
    $this->loadHelper('Captcha.Captcha');
    $this->assign('Register', 'active');
?>

<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <div class="styled_title"><h1>Register </h1></div>
        </div>
    <?= $this->Form->create($user) ?>

    <div class="row">
        <h5 class="text-center"><small><em>fields marked with <span class="sterix fa fa-asterisk" aria-hidden="true"></span> are required!!</em></small></h5>
        <div class="col-md-6">
            <?php
                echo $this->Form->control('name', ['label' => 'Name <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]);
                echo $this->Form->control('username');
                echo $this->Form->control('password', ['label' => 'Password <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]);
                echo $this->Form->control('confirm_password', ['type' => 'password', 'label' => 'Confirm Password <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]);   
                ?>
        </div><!--/span-->
        <div class="col-md-6">
            <?php
                echo $this->Form->control('email', ['label' => 'Email <span class="sterix fa fa-asterisk" aria-hidden="true"></span>', 'escape' => false]);
                echo $this->Form->control('phone_no');
                echo $this->Captcha->render(['placeholder' => __('Please solve the riddle')]);
                // echo $this->Form->control('name_of_institution');
                // echo $this->Form->control('institution_address');
                // echo $this->Form->control('institution_code');
                //echo $this->Form->control('designation_id', ['options' => $designations, 'empty' => true]);     
                //echo $this->Form->control('institution_contact');
                //echo $this->Form->control('ward');                
                //echo $this->Form->control('forgot_password');
                //echo $this->Form->control('initial_email');
                //echo $this->Form->control('is_active');
                //echo $this->Form->control('is_admin');
                ?>
        </div><!--/span-->
    </div><!--/row-->
     <hr>
      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10"> 
          <button type="submit" class="btn btn-primary active" id="login"><i class="fa fa-edit" aria-hidden="true"></i> Register</button>
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
