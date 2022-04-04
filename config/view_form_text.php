<?php
// in config/app_form.php
return [
    // Used for button elements in button().
    'label' => '<div class="col-sm-12"><label {{attrs}}>{{text}}</label></div>',
    'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
    //'textarea' => '<div class="col-sm-8"><textarea class="form-control" rows="2" name="{{name}}"{{attrs}}>{{value}}</textarea></div>',
    'textarea' => '<div class="col-sm-12"><textarea class="form-control {{rteditor}}" rows="2" name="{{name}}"{{attrs}}>{{value}}</textarea></div>'
];