<div class="span8">
   <?php echo $this->fetch('form-actions'); ?>

   <div id="applicationPrintArea">
    <div class="vformbackp">
       <hr>
      <table style="width: 100%;">
        <tr>
          <td style="width: 25%;">Protocol No:</td>
          <td style="width: 25%;"><strong><?php echo __($application['Application']['protocol_no'], true) ?></strong></td>
          <td style="width: 25%;">Date of Protocol:</td>
          <td style="width: 25%;"><strong><?php echo __($application['Application']['date_of_protocol'], true) ?></strong></td>
        </tr>
      </table>
       <hr>
      <table style="width: 100%;">
        <tr>
          <td style="width: 25%;">Abstract of Study:</td>
          <td style="width: 75%;"><strong><?php echo __($application['Application']['abstract_of_study'], true) ?></strong></td>
        </tr>
        <tr>
          <td style="width: 25%;">Study Title:</td>
          <td style="width: 75%;"><strong><?php echo __($application['Application']['study_title'], true) ?></strong></td>
        </tr>
      </table>
      <hr>
    </div>
  </div>

</div>
