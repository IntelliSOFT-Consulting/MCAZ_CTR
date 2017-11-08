<?php
// in config/app_form.php
return [
    'formStart' => '<form  class="form-horizontal" {{attrs}}>',
    'formGroup' => '<div class="form-group"> {{label}}{{input}} </div>',
    'label' => '<div class="col-sm-4 control-label"><label {{attrs}}>{{text}}</label></div>',
    // Generic input element.
    'input' => '<div class="col-sm-6"><input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/></div>',
    // Select element,
    'select' => '<div class="col-sm-6"><select class="form-control" name="{{name}}"{{attrs}}>{{content}}</select></div>',
    // Used for button elements in button().
    'button' => '<div class="form-group">
    				<div class="col-sm-offset-2 col-sm-10">
    				<button  class="btn btn-default"{{attrs}}>{{text}}</button>
    				</div>
  				</div>',
  	// Radio input element,
    //'radio' => '<input type="radio" name="{{name}}" value="{{value}}"{{attrs}}>',
    //'radioWrapper' => '<div class="col-sm-8"><div class="radio">{{label}}</div></div>',
  	'textarea' => '<div class="col-sm-8"><textarea class="form-control" rows="2" name="{{name}}"{{attrs}}>{{value}}</textarea></div>',
];
