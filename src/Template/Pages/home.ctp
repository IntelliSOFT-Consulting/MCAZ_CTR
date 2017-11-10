<!-- Example row of columns -->
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
          <p><a class="btn btn-primary" href="/sadrs/add" role="button">Report &raquo;</a></p>
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
          <p><a class="btn btn-success" href="/aefis/add" role="button">Report &raquo;</a></p>
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
          <p><a class="btn btn-info" href="/adrs/add" role="button">View details &raquo;</a></p>
          <?php
              }
          ?>
        </div>
      </div>