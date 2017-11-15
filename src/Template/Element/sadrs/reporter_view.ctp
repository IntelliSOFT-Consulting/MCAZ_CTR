<div class="sadr_form">
  <table>
    <tbody>
      <tr>
        <td>
          <h3 class="text-center">
            <img style="width: 190px;" alt="Medicines Control Authourity of Zimbabwe" src="http://localhost:8765/img/mcaz_logo.png">
            <br>
            Spontenous Adverse Drug Reaction (ADR) Report Form
          </h3>  
          <h5 class="text-center">Identities of Reporter, Patient and Institute will remain confidential</h5>
          <h5 class="text-center">MCAZ Reference Number: <strong><?= $sadr->reference_number ?></strong></h5>
        </td>
      </tr>
    </tbody>
  </table>

  <table>
    <tbody>
      <tr>
        <td colspan="4">
          <h5 class="text-center">Patient details (to allow linkage with other reports)</h5>
        </td>
      </tr>
      <tr>
        <td><h3>Clinic/Hospital Name</h3></td>
        <td><p><?= $sadr->name_of_institution ?></p></td>
        <td><h3>Patient Initials <span class="sterix fa fa-asterisk" aria-hidden="true"></span> </h3></td>
        <td><p><?= $sadr->patient_name ?></p></td>
      </tr>
    </tbody>
  </table>



</div> <!-- sadr_form -->