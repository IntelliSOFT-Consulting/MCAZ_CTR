<?php
// in config/app_form.php
return [
    'formStart' => '<form  class="form-inline" {{attrs}}>',
    'formGroup' => ' {{label}}{{input}} ',
    'label' => '<label {{attrs}}>{{text}}</label>',
    // Generic input element.
    'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>
                <a onclick="$(\'input[name={{name}}]\').val(\'\');" class="tiptip"  data-original-title="clear!!">
                <em class="accordion-toggle"><i class="fa fa-window-close-o" aria-hidden="true"></i></em></a>
    ',
    // Select element,
    'select' => '<select class="form-control" name="{{name}}"{{attrs}}>{{content}}</select>',
    // Used for button elements in button().
    'button' => '<div class="form-group">
                    <button  class="btn btn-default"{{attrs}}>{{text}}</button>
                </div>',
    // Radio input element,
    'radio' => '<input type="radio" class="radio-inline" name="{{name}}" value="{{value}}"{{attrs}}>',
    //'radioWrapper' => '<div class="col-sm-8"><div class="radio">{{label}}</div></div>',
    'textarea' => '<textarea rows="1" class="form-control" name="{{name}}"{{attrs}}>{{value}}</textarea>',
    'checkboxWrapper' => '{{label}}',
    'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
    'dateWidget' => '{{day}}{{month}}{{year}}',
    //'select' => '<select name="{{name}}"{{attrs}}>{{content}}</select>',    
    'inputContainer' => '<div class="form-group {{required}}">{{content}}</div>',
    'submitContainer' => '{{content}}',
];
