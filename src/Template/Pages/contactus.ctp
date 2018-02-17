<?php $this->loadHelper('Captcha.Captcha'); ?>
<?= $this->cell('Site::contactus'); ?>
<div class="row">   
    <div class="col-sm-12 form">
        <form class="form-horizontal" method="post" accept-charset="utf-8" action="/feedbacks/add">
            <div style="display:none;">
                <div class="col-sm-6"><input class="form-control" name="_method" value="POST" type="hidden"></div>
            </div>    
            <fieldset>
                <legend>Contact us</legend>
                <div class="input text">
                    <div class="form-group"> 
                        <div class="col-sm-4 control-label"><label for="email">Email <span class="sterix fa fa-asterisk" aria-hidden="true"></span></label></div>
                        <div class="col-sm-6"><input class="form-control" name="email" id="email" type="text" required="required"></div> 
                    </div>
                </div>
                <div class="input text">
                    <div class="form-group"> 
                        <div class="col-sm-4 control-label"><label for="subject">Subject <span class="sterix fa fa-asterisk" aria-hidden="true"></span></label></div>
                        <div class="col-sm-6"><input class="form-control" name="subject" id="subject" type="text" required="required"></div> 
                    </div>
                </div>
                <div class="input message">
                        <div class="form-group"> <div class="col-sm-4 control-label">
                            <label for="message">Message <span class="sterix fa fa-asterisk" aria-hidden="true"></span></label>
                        </div>
                        <div class="col-sm-6">
                            <textarea class="form-control" name="message" id="message" rows="7"  required="required"></textarea>
                        </div> 
                    </div>
                </div>    
                <?php
                    echo $this->Captcha->render(['placeholder' => __('Please solve the riddle')]);
                ?>
            </fieldset>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-6">
                    <button class="btn btn-default" type="submit">Submit</button>
                </div>
            </div>    
        </form>
    </div>
</div>