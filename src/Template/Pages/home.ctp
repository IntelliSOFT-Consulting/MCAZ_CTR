<?php
  $this->Html->script('jquery/partial_register', ['block' => true]);
?>
<!-- Example row of columns -->
  <?php if($this->request->session()->read('Auth.User')) { ?>
    <div class="row">
      <div class="col-md-12">
        <p class="text-center">Logged in!! Click link to access reports.</p>
        <p class="text-center"><a class="btn btn-primary btn-lg" href="/users/home" role="button"><i class="fa fa-dashboard" aria-hidden="true"></i> Dashboard </a></p>
      </div>
    </div>
  <?php    } else { ?>
      <div class="row">
        <div class="col-md-4">
          <h2>ADR</h2>
          <p>Adverse drug reaction. </p>
          <?php
              if($this->request->session()->read('Auth.User')) {
          ?>
          <p><a class="btn btn-primary" href="/sadrs/add" role="button">Report!</a></p>
          <?php                  
              } else {
          ?>
          <!-- <p><a class="btn btn-primary" href="/sadrs/add" role="button">Report &raquo;</a></p> -->
          <P><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrationModal">Report &raquo;</button></P>
          <?php
              }
          ?>
        </div>
        <div class="col-md-4">
          <h2>AEFI</h2>
          <p>Adverse Event Following Immunization. </p>
          <?php
              if($this->request->session()->read('Auth.User')) {
          ?>

          <p><a class="btn btn-success" href="/aefis/add" role="button">Report!</a></p>
          <?php                  
              } else {
          ?>
          <!-- <p><a class="btn btn-success" href="/aefis/add" role="button">Report &raquo;</a></p> -->
          <p><button type="button" class="btn btn-success" data-toggle="modal" data-target="#registrationModal">Report &raquo;</button></p>
          <p class="has-error"><label>If Serious AEFI...</label></p>
          <p><button type="button" class="btn btn-success" data-toggle="modal" data-target="#registrationModal">Report &raquo;</button></p>
          <?php
              }
          ?>
          
       </div>
        <div class="col-md-4">
          <h2>SAE</h2>
          <p>SERIOUS ADVERSE EVENT REPORTING FORM.</p>
          <?php
              if($this->request->session()->read('Auth.User')) {
          ?>
          <p><a class="btn btn-info" href="/adrs/add" role="button">Report!</a></p>
          <?php                  
              } else {
          ?>
          <!-- <p><a class="btn btn-info" href="/adrs/add" role="button">View details &raquo;</a></p> -->
          <P><button type="button" class="btn btn-info" data-toggle="modal" data-target="#registrationModal">Report &raquo;</button></P>
          <?php
              }
          ?>
        </div>
      </div>

      
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrationModal" data-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrationModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button>
...more buttons... -->

<div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="row"> 
          <div class="col-md-12">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
        </div>
           
        <div class="row">
          <div class="col-md-6">
            <h4 class="modal-title" id="registrationModalHeader">Quick Registration
                <small class="help-block" id="help-registration-modal"></small>
            </h4>
          </div>
          <div class="col-md-6"><h4 class="modal-title" id="registrationModalHeader">Login 
              <small class="help-block" id="help-login-modal"></small>
          </h4></div>
        </div>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <form id="partialRegistration">
              <div class="form-group" id="fg-email">
                <label for="recipient-name" class="control-label">Email:</label>
                <input class="form-control" name="email" required="required" maxlength="50" id="email" value="" type="email">
                <span class="help-block" id="help-email"></span>
              </div>
              <div class="form-group" id="fg-password">
                <label for="recipient-name" class="control-label">Password:</label>
                <input class="form-control" name="password" required="required" id="password" type="password">
                <span class="help-block" id="help-password"></span>
              </div>
              <div class="form-group" id="fg-confirm-password">
                <label for="recipient-name" class="control-label">Confirm Password:</label>
                <input class="form-control" name="confirm_password" required="required" id="confirm-password" value="" type="password">
                <span class="help-block" id="help-confirm-password"></span>
              </div>
            </form>
          </div>
          <div class="col-md-6">
            <form method="post" accept-charset="utf-8" action="/users/login">                
              <div class="form-group">
                  <label for="username">Username/Email</label>
                  <input class="form-control" name="username" id="username" type="text">
              </div>        
              <div class="form-group"> 
                <label for="password">Password</label>
                <input class="form-control" name="password" id="password" type="password">
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button class="btn btn-default" type="submit">Login</button>
                </div>
              </div>    
            </form>
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-md-6">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="registerUser">Register</button>
          </div>
          <div class="col-md-6">
            
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>

  <?php     }       ?>