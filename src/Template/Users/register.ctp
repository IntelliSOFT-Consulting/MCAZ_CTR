<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php
    $this->assign('Register', 'active');
?>

<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <div class="styled_title"><h1>Register </h1></div>
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
        <div class="col-md-6">
            <?php
                echo $this->Form->control('name');
                echo $this->Form->control('email');
                echo $this->Form->control('phone_no');
                echo $this->Form->control('designation_id', ['options' => $designations, 'empty' => true]);        
                //echo $this->Form->control('name_of_institution');
                //echo $this->Form->control('institution_address');
                ?>
        </div><!--/span-->
        <div class="col-md-6">
            <?php
                echo $this->Form->control('username');
                echo $this->Form->control('password');
                echo $this->Form->control('confirm_password', ['type' => 'password']);
                //echo $this->Form->control('institution_code');
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
     <div class="row">
        <?= $this->Form->button(__('Submit')) ?>
     </div>
     <?= $this->Form->end() ?>
    </div>
</div>

<script>
    (function( $ ) {
        $.widget( "ui.combobox", {
            _create: function() {
                var input,
                    that = this,
                    select = this.element.hide(),
                    selected = select.children( ":selected" ),
                    value = selected.val() ? selected.text() : "",
                    wrapper = this.wrapper = $( "<span>" )
                        .addClass( "ui-combobox" )
                        .insertAfter( select );

                function removeIfInvalid(element) {
                    var value = $( element ).val(),
                        matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( value ) + "$", "i" ),
                        valid = false;
                    select.children( "option" ).each(function() {
                        if ( $( this ).text().match( matcher ) ) {
                            this.selected = valid = true;
                            return false;
                        }
                    });
                    if ( !valid ) {
                        // remove invalid value, as it didn't match anything
                        $( element )
                            .val( "" )
                            .attr( "title", value + " didn't match any item" )
                            .tooltip( "open" );
                        select.val( "" );
                        setTimeout(function() {
                            input.tooltip( "close" ).attr( "title", "" );
                        }, 2500 );
                        input.data( "autocomplete" ).term = "";
                        return false;
                    }
                }

                input = $( "<input>" )
                    .appendTo( wrapper )
                    .val( value )
                    .attr( "title", "" )
                    .addClass( "ui-state-default ui-combobox-input" )
                    .autocomplete({
                        delay: 0,
                        minLength: 0,
                        source: function( request, response ) {
                            var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
                            response( select.children( "option" ).map(function() {
                                var text = $( this ).text();
                                if ( this.value && ( !request.term || matcher.test(text) ) )
                                    return {
                                        label: text.replace(
                                            new RegExp(
                                                "(?![^&;]+;)(?!<[^<>]*)(" +
                                                $.ui.autocomplete.escapeRegex(request.term) +
                                                ")(?![^<>]*>)(?![^&;]+;)", "gi"
                                            ), "<strong>$1</strong>" ),
                                        value: text,
                                        option: this
                                    };
                            }) );
                        },
                        select: function( event, ui ) {
                            ui.item.option.selected = true;
                            that._trigger( "selected", event, {
                                item: ui.item.option
                            });
                        },
                        change: function( event, ui ) {
                            if ( !ui.item )
                                return removeIfInvalid( this );
                        }
                    })
                    .addClass( "ui-widget ui-widget-content ui-corner-left" );

                input.data( "autocomplete" )._renderItem = function( ul, item ) {
                    return $( "<li>" )
                        .data( "item.autocomplete", item )
                        .append( "<a>" + item.label + "</a>" )
                        .appendTo( ul );
                };

                $( "<a>" )
                    .attr( "tabIndex", -1 )
                    .attr( "title", "Show All Items" )
                    .tooltip()
                    .appendTo( wrapper )
                    .button({
                        icons: {
                            primary: "ui-icon-triangle-1-s"
                        },
                        text: false
                    })
                    .removeClass( "ui-corner-all" )
                    .addClass( "ui-corner-right ui-combobox-toggle" )
                    .click(function() {
                        // close if already visible
                        if ( input.autocomplete( "widget" ).is( ":visible" ) ) {
                            input.autocomplete( "close" );
                            removeIfInvalid( input );
                            return;
                        }

                        // work around a bug (likely same cause as #5265)
                        $( this ).blur();

                        // pass empty string as value to search for, displaying all results
                        input.autocomplete( "search", "" );
                        input.focus();
                    });

                    input
                        .tooltip({
                            position: {
                                of: this.button
                            },
                            tooltipClass: "ui-state-highlight"
                        });
            },

            destroy: function() {
                this.wrapper.remove();
                this.element.show();
                $.Widget.prototype.destroy.call( this );
            }
        });
    })( jQuery );

    $(function() {
        $( "#UserCountyId" ).combobox();
        $( "#UserCountryId" ).combobox();
        // $( "#toggle" ).click(function() {
        //  $( "#combobox" ).toggle();
        // });
    });
    </script>
