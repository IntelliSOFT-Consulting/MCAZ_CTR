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
          <h2>Clinical Trials</h2>
          <hr>
          <p>

            Clinical trials are defined as a systematic study in human beings or animals inorder to establish the efficacy of, or to discover or verify the effects or adverse reactions of medicines, and includes a study of the absorption, distribution, metabolism and excretion of medicines.
         </p><p>
            All clinical trials that are conducted in Zimbabwe are regulated in terms of Part III of the Medicines and Allied Substances Control Act [Chapter 15:03] and its regulations. In terms of the Act, no person shall conduct a clinical trial of any medicine without the prior written authorisation of the Authority, granted with the approval of the Secretary of the Ministry of Health and Child Welfare.
        </p><p>
            The guidelines for Good Clinical Practice have been updated. You will find the new guidelines on the Downloads page. The file is entitled "Guidelines for GCP 2012 Zimbabwe", it replaces "Zimbabwe Guidelines for good clinical trial practice", which has been removed from this website.
          </p><p>
            Details of approved, ongoing and previously approved clinical trials will be made available on this site in due course.
          </p><h3>
            Medicines Review
          </h3><p>
            During the process of medicine registration and post registration the MCAZ is engaged in the process of reviewing the acceptability of certain Active Pharmaceutical Ingredients (API), Combinations of APIs and excipients for use in medicinal products.

            Information on current policies and guidelines will be made available soon.
          </p>
          <?php
              if($this->request->session()->read('Auth.User')) {
          ?>
          <p><a class="btn btn-success" href="/" role="button">Report!</a></p>
          <?php                  
              } else {
          ?>
          <!-- <p><a class="btn btn-primary" href="/sadrs/add" role="button">Report &raquo;</a></p> -->
          <!-- <P><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrationModal">Report &raquo;</button></P> -->
          <?php
              }
          ?>
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