<?php
  $this->Html->script('jquery/partial_register', ['block' => true]);
?>
<!-- Example row of columns -->
  <?php if($this->request->session()->read('Auth.User')) { ?>
    <div class="row">
      <div class="col-md-12">
        <p class="text-center">Logged in!! Click link to access reports.</p>
        <!-- <p class="text-center"><a class="btn btn-primary btn-lg" href="/users/home" role="button"><i class="fa fa-dashboard" aria-hidden="true"></i> Dashboard </a></p> -->
        <p class="text-center">
          <?php echo $this->Html->link(
                '<i class="fa fa-dashboard" aria-hidden="true"></i> Dashboard',
                ['controller' => 'Users', 'action' => 'dashboard', 'prefix' => $prefix], ['escape' => false, 'class' => 'btn btn-primary btn-lg']
              );  
          ?>
        </p>
      </div>
    </div>
  <?php    } else { ?>
      <div class="row">
        <div class="col-md-12">
          
  <?= $this->cell('Site::home') ?>
  
        </div>        
      </div>

      <div>

</div>

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrationModal" data-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrationModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button>
...more buttons... -->

<div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="row"> 
          <div class="col-sm-12">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
        </div>
           
        <div class="row">
          <!-- <div class="col-md-6">
            <h4 class="modal-title" id="registrationModalHeader">Quick Registration
                <small class="help-block" id="help-registration-modal"></small>
            </h4>
          </div>
          <div class="col-md-6"><h4 class="modal-title" id="registrationModalHeader">Login 
              <small class="help-block" id="help-login-modal"></small>
          </h4></div> -->
          <div class="col-sm-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#register" aria-controls="register" role="tab" data-toggle="tab">Register</a></li>
              <li role="presentation"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">Login</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="row">            

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="register">
                <div class="col-sm-12">
                  <form class="form-horizontal" id="partialRegistration">
                    <div class="form-group" id="fg-email">
                      <div class="col-sm-4"><label for="recipient-name" class="control-label">Email:</label></div>
                      <div class="col-sm-7">
                        <input class="form-control" name="email" required="required" maxlength="50" id="email" value="" type="email">
                        <span class="help-block" id="help-email"></span>
                      </div>
                    </div>
                    <div class="form-group" id="fg-password">
                      <div class="col-sm-4"><label for="recipient-name" class="control-label">Password:</label></div>
                      <div class="col-sm-7"><input class="form-control" name="password" required="required" id="password" type="password">
                      <span class="help-block" id="help-password"></span></div>
                    </div>
                    <div class="form-group" id="fg-confirm-password">
                      <div class="col-sm-4"><label for="recipient-name" class="control-label">Confirm Password:</label></div>
                      <div class="col-sm-7"><input class="form-control" name="confirm_password" required="required" id="confirm-password" value="" type="password">
                      <span class="help-block" id="help-confirm-password"></span></div>
                    </div>
                    <!-- <div class="form-group">
                      <button type="button" class="btn btn-primary" id="registerUser"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
Register</button>
                    </div> -->
                    <div class="form-group"> 
                      <div class="col-sm-offset-4 col-sm-8"> 
                        <button type="button" class="btn btn-primary active" id="registerUser"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
Register</button>
                      </div> 
                    </div>
                  </form>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="login">
                <div class="col-sm-12">
                  <form class="form-horizontal" method="post" accept-charset="utf-8" action="/users/login">                
                    <div class="form-group">
                        <div class="col-sm-4"><label for="username" class="control-label">Username/Email:</label></div>
                        <div class="col-sm-7">
                          <input class="form-control" name="username" id="username" type="text">
                          <span class="help-block" id="help-username"></span>
                        </div>
                    </div>        
                    <div class="form-group"> 
                      <div class="col-sm-4"><label for="password" class="control-label">Password:</label></div>
                      <div class="col-sm-7">
                        <input class="form-control" name="password" id="password" type="password">
                        <span class="help-block" id="help-passworda"></span>
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8"> 
                          <button class="btn btn-primary active" type="submit"><i class="fa fa-sign-in" aria-hidden="true"></i>
 Login</button>
                      </div>
                    </div>    
                  </form>
                </div>
              </div>
            </div>          
        </div>
        
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-12">
            <!-- <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>
Close</button>   --> 
            <div class="form-group"> 
              <div class="col-sm-offset-2 col-sm-10"> 
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>
Close</button>   
              </div> 
            </div>         
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>

  <?php     }       ?>