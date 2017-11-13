<?php
// in config/app_form.php
return [
     // Used for checkboxes in checkbox() and multiCheckbox().
    'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
    // Input group wrapper for checkboxes created via control().
    'checkboxFormGroup' => '{{label}}',
    // Wrapper container for checkboxes.
    'checkboxWrapper' => '<div class="checkbox">{{label}}</div>',
    // Generic input element.
    'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
    // Container element used by control().
    'inputContainer' => '<div class="form-group"><div class="col-sm-offset-2 col-sm-10 {{required}}"><div class="checkbox">{{content}}</div></div></div>',
];
