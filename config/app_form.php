<?php
// in config/app_form.php
return [
    // Used for button elements in button().
    'button' => '<div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button  class="btn btn-default"{{attrs}}>{{text}}</button>
                    </div>
                </div>',
     // Used for checkboxes in checkbox() and multiCheckbox().
    'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
    // Input group wrapper for checkboxes created via control().
    'checkboxFormGroup' => '{{label}}',
    // Wrapper container for checkboxes.
    'checkboxWrapper' => '<div class="checkbox">{{label}}</div>',
    'formStart' => '<form  class="form-horizontal" {{attrs}}>',
    'formGroup' => '<div class="form-group"> {{label}}{{input}} </div>',
    'label' => '<div class="col-sm-4 control-label"><label {{attrs}}>{{text}}</label></div>',
    // Generic input element.
    'input' => '<div class="col-sm-6"><input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/></div>',
    // Container element used by control() when a field has an error.
    'inputContainerError' => '<div class="input {{type}}{{required}} has-error">{{content}}{{error}}</div>',
    // Error message wrapper elements.
    'error' => '<span class="col-sm-offset-4 col-sm-6 help-block">{{content}}</span>',
    // Container for error items.
    'errorList' => '<ul class="has-error">{{content}}</ul>',
    // Select element,
    'select' => '<div class="col-sm-6"><select class="form-control" name="{{name}}"{{attrs}}>{{content}}</select></div>',
  	// Radio input element,
    //'radio' => '<input type="radio" name="{{name}}" value="{{value}}"{{attrs}}>',
    //'radioWrapper' => '<div class="col-sm-8"><div class="radio">{{label}}</div></div>',
  	'textarea' => '<div class="col-sm-8"><textarea class="form-control" rows="2" name="{{name}}"{{attrs}}>{{value}}</textarea></div>',
];
