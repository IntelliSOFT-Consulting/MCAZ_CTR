<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span></h3>
            <p style="text-align: right;"><small>Form M.C. 19</small></p>         
            <h4 class="text-center"><strong>MEDICINES AND ALLIED SUBSTANCES CONTROL ACT [CHAPTER 15:031</strong></h4>
        </div>
    </div>

    <!-- individual -->
    <div class="row">
        <div class="col-xs-12">
            <h4 class="text-center"><b>AUTHORISATION TO CONDUCT A CLINICAL TRIAL TITLED </b></h4>
            <h4 class="text-center"><?= $application->scientific_title ?></h4>
            <h4><b>REF No. </b> <?= $application->protocol_no ?></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <p><strong>IT is hereby notified that the Medicines Control Authority of Zimbabwe has, in terms of subsection (2) of section 18 of the Medicines and Allied Substances Control Act [Chapter15:03], with the approval of the Secretary for Health, authorised </strong></p>
            <p><?= (!empty($application->investigator_contacts[0]['given_name'])) ? $application->investigator_contacts[0]['given_name'].' '.$application->investigator_contacts[0]['middle_name'].' '.$application->investigator_contacts[0]['family_name'] : '' ?></p>
            <p><?= $application->business_name ?></p>
            <p><strong>to conduct a clinical trial titled </strong></p>
            <p><?= $application->scientific_title ?></p>
            <p>Version: <?= $application->protocol_version ?></p>
            <p><?= $application->date_of_protocol ?></p>
            <p>REF No. <?= $application->protocol_no ?></p>
            <p><strong>in compliance with current good clinical practice (cGCP) and the contents of the clinical trial protocol application subject to the following conditions:—  </strong></p>
            <ol>
                <li>Reporting of all serious adverse events to MCAZ</li>
                <li>Submission of all amendments to the protocol for approval by MCAZ;</li>
                <li>Submission of a progress report of the clinical trial annually on the anniversary of the approval date of the application; and</li>
                <li>Submission of the final report and copy of any publication of the clinical trial prior to publication of results.</li>
            </ol>
        </div>
    </div>

    <br><br>

    <div class="row">
        <div class="col-xs-6">
            <p>Date</p>
        </div>
        <div class="col-xs-6">
            <p><em>Signature</em></p>
        </div>
    </div>

</div>