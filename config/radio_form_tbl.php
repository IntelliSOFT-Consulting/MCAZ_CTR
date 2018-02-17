<?php
// in config/app_form.php
return [
    'radio' => '<input type="radio" class="radio-inline" name="{{name}}" value="{{value}}"{{attrs}}>', 
    'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
    'nestingLabel' => '{{hidden}}<label class="radio-inline" {{attrs}}>{{input}}{{text}}</label>',
    'formGroup' => '{{label}}{{input}} ',
    'inputContainer' => '<div class="{{required}}">{{content}}</div>',
];
