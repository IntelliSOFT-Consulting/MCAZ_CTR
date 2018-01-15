<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-4"><h6><strong>CONFIDENTIAL</strong></h6></div>
                <div class="col-xs-4"><h6 class="text-center"><strong>MEDICINES CONTROL AUTHORITY</strong></h6></div>
                <div class="col-xs-4"></div>
            </div>
            <h5 class="text-center">MEDICINES AND ALLIED SUBSTANCES CONTROL ACT [CHAPTER 15:031</h5>
            <h3 class="text-center"><span class="text-center"><?= $this->Html->image("mcaz_3.png", ['fullBase' => true, 'style' => 'width: 70%;']); ?></span> <br>
      APPLICATION FOR AUTHORIZATION TO CONDUCT A CLINICAL TRIAL</h3>  
            <h4 class="text-center"><strong>CLINICAL TRIAL</strong></h4>
            <p class="text-center"><small><em>(to be <b>submitted in triplicate</b>)</em></small></p>
        </div>

    </div>

    <!-- individual -->
    <div class="row">
        <div class="col-xs-1">
            <h5>1.</h5>
        </div>
        <div class="col-xs-11">
            <h4>Particulars of applicant</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-xs-offset-1">
            <p><strong>Individual Full names</strong></p>
            <p><strong>Date of Birth</strong></p>
            <p><strong>Place of Birth</strong></p>
            <p><strong>Qualifications</strong></p>
            <p><strong>Professional Address</strong></p>
            <p><strong>Telephone number</strong></p>
            <p><strong>Email Address</strong></p>
        </div>
        <div class="col-xs-7">
            <p class="answer"><?= $application['investigator_contacts'][0]['given_name']?></p>
            <p class="answer"><?= $application['investigator_contacts'][0]['date_of_birth']?></p>
            <p class="answer"><?= $application['investigator_contacts'][0]['date_of_birth']?></p>
            <p class="answer"><?= $application['investigator_contacts'][0]['qualification']?></p>
            <p class="answer"><?= $application['investigator_contacts'][0]['professional_address']?></p>
            <p class="answer"><?= $application['investigator_contacts'][0]['telephone']?></p>
            <p class="answer"><?= $application['investigator_contacts'][0]['email']?></p>
        </div>
    </div>

    <!-- company -->
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1">
            <h6>if company</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-xs-offset-1">
            <p><strong>Name of company</strong></p>
            <p><strong>Registered office</strong></p>
            <p><strong>Physical address</strong></p>
            <p><strong>Telephone number</strong></p>
            <p><strong>Position of applicant</strong></p>
            <p><strong>Main field of manufacture</strong></p>
        </div>
        <div class="col-xs-7">
            <p class="answer"><?= $application['business_name']?></p>
            <p class="answer"><?= $application['business_office']?></p>
            <p class="answer"><?= $application['business_physical_address']?></p>
            <p class="answer"><?= $application['business_telephone']?></p>
            <p class="answer"><?= $application['business_position']?></p>
            <p class="answer"><?= $application['business_field_manufacture']?></p>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>2.</h5>
        </div>
        <div class="col-xs-11">
            <h4>State the name of the medicine, its chemical composition, graphic and empirical formulae, animal pharmacology, toxicity and teratology as well as any clinical or field trials in humans Or animals, or any other relevant information and supply reports, if any</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-11 col-xs-offset-1"> 
            <div class="answer"><?= $application['drug_details']?></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-3 col-xs-offset-1">
            <p><strong>Name of medicine</strong></p>
        </div>
        <div class="col-xs-8">
            <p class="answer"><?= $application['drug_name']?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3 col-xs-offset-1">
            <p><strong>Study drug</strong></p>
        </div>
        <div class="col-xs-8">
            <p class="answer"><?= $application['study_drug']?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-2 col-xs-offset-1">
            <p><strong>Chemical composition</strong></p>
        </div>
        <div class="col-xs-3">
            <p class="answer"><?= $application['product_type_chemical_name']?></p>
        </div>
        <div class="col-xs-2">
            <p><strong>Medical Device</strong></p>
        </div>
        <div class="col-xs-4">
            <p class="answer"><?= $application['product_type_medical_device_name']?></p>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>3.</h5>
        </div>
        <div class="col-xs-11">
            <h4>State any adverse or possible reactions to the medicine  </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1"> 
            <div class="answer"><p><?= $application['medicine_reaction']?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>4.</h5>
        </div>
        <div class="col-xs-11">
            <h4>State therapeutic effects of the medicine </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1"> 
            <div class="answer"><p><?= $application['medicine_therapeutic_effects']?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>5.</h5>
        </div>
        <div class="col-xs-1">
            <h5>(a)</h5>
        </div>
        <div class="col-xs-8">
            <h4>Has the medicine been registered in the country of origin? </h4>
        </div>
        <div class="col-xs-2">
            <p class="answer"><?= $application['medicine_registered']?></p>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-10 col-xs-offset-2">
            <h6>If <b>YES</b> a valid certificate of registration in respect of such medicine issued by the appropriate authority established for the registration of medicines in the country of origin shall accompany this application. </h6>
        </div>
        <div class="col-xs-10 col-xs-offset-2">
            <?php
                if (!empty($application['registrations'])) {
                  for ($i = 0; $i <= count($application['registrations'])-1; $i++) { ?>
                  <div style="margin-top: 5px; margin-bottom: 5px;">
                  <?php
                    echo $this->Html->link($application['registrations'][$i]->file, substr($application['registrations'][$i]->dir, 8) . '/' . $application['registrations'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
                  ?>
                </div>
                <?php
                  }
                } 
            ?>
        </div>
        <div class="col-xs-10 col-xs-offset-2">
            <h6>if <b>NO</b> state details </h6>
        </div>
        <div class="col-xs-10 col-xs-offset-2"> 
            <div class="answer"><p><?= $application['medicine_registered_details']?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1 col-xs-offset-1">
            <h5>(b)</h5>
        </div>
        <div class="col-xs-8">
            <h4>Have clinical trials been conducted in the country of origin? </h4>
        </div>
        <div class="col-xs-2">
            <p class="answer"><?= $application['trials_origin_country']?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-2">
            <h6>If <b>YES</b> state details </h6>
        </div>
        <div class="col-xs-10 col-xs-offset-2">
            <div class="answer"><p><?php if($application['trials_origin_country'] == 'Yes') echo $application['trial_origin_details']; ?></p></div>
        </div>
        <div class="col-xs-10 col-xs-offset-2">
            <h6>if <b>NO</b> give reasons why </h6>
        </div>
        <div class="col-xs-10 col-xs-offset-2"> 
            <div class="answer"><p><?php if($application['trials_origin_country'] == 'No') echo $application['trial_origin_details']; ?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1 col-xs-offset-1">
            <h5>(c)</h5>
        </div>
        <div class="col-xs-8">
            <h4>Has an application for the registration of the medicine been made in any other country? </h4>
        </div>
        <div class="col-xs-2">
            <p class="answer"><?= $application['application_other_country']?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-2">
            <h6>If <b>YES</b> state details including the date on which the application was lodged </h6>
        </div>
        <div class="col-xs-10 col-xs-offset-2">
            <div class="answer"><p><?php echo $application['application_other_country_details']; ?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1 col-xs-offset-1">
            <h5>(d)</h5>
        </div>
        <div class="col-xs-8">
            <h4>Has the medicine been registered in any other country? </h4>
        </div>
        <div class="col-xs-2">
            <p class="answer"><?= $application['registered_other_country']?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-2">
            <h6>If <b>YES</b> state details </h6>
        </div>
        <div class="col-xs-10 col-xs-offset-2">
            <div class="answer"><p><?php echo $application['registered_other_country_details']; ?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1 col-xs-offset-1">
            <h5>(e)</h5>
        </div>
        <div class="col-xs-8">
            <h4>Has the registration tug the medicine been rejected, or refused, deferred or cancelled in any country? </h4>
        </div>
        <div class="col-xs-2">
            <p class="answer"><?= $application['rejected_other_country']?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-2">
            <h6>If <b>YES</b> state details </h6>
        </div>
        <div class="col-xs-10 col-xs-offset-2">
            <div class="answer"><p><?php echo $application['rejected_other_country_details']; ?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1 col-xs-offset-1">
            <h5>(f)</h5>
        </div>
        <div class="col-xs-7">
            <h4>What is the status of the medicine in Zimbabwe? </h4>
        </div>
        <div class="col-xs-3">
            <p class="answer"><?= $application['status_medicine']?></p>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>6.</h5>
        </div>
        <div class="col-xs-11">
            <h4>State the name(s), addresstes) and telephone members) and qualifications of the person(s) who will conduct the trial </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3"><p><strong>Name</strong></p></div>
        <div class="col-xs-3"><p><strong>Qualifications</strong></p></div>
        <div class="col-xs-3"><p><strong>Address</strong></p></div>
        <div class="col-xs-3"><p><strong>Telephone Number</strong></p></div>
    </div>
    <div class="row">
        <?php
            if (!empty($application['investigator_contacts'])) {
              for ($i = 0; $i <= count($application['investigator_contacts'])-1; $i++) { ?>
                <div class="col-xs-3" > <p class="answer"> <?= $application['investigator_contacts'][$i]['given_name'] ?>  </p> </div>
                <div class="col-xs-3" > <p class="answer"> <?= $application['investigator_contacts'][$i]['qualification'] ?>  </p> </div>
                <div class="col-xs-3" > <p class="answer"> <?= $application['investigator_contacts'][$i]['professional_address'] ?> </p>  </div>
                <div class="col-xs-3" > <p class="answer"> <?= $application['investigator_contacts'][$i]['telephone'] ?>  </p> </div>
            <?php
              }
            } 
        ?>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h4>Business</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3"><p class="answer"><?= $application['business_name']?></p></div>
        <div class="col-xs-3"><p class="answer"><?= $application['business_office']?></p></div>
        <div class="col-xs-2"><p class="answer"><?= $application['business_physical_address']?></p></div>
        <div class="col-xs-2"><p class="answer"><?= $application['business_telephone']?></p></div>
        <div class="col-xs-2"><p class="answer"><?= $application['business_position']?></p></div>
    </div>


    <div class="row">
        <div class="col-xs-1">
            <h5>7.</h5>
        </div>
        <div class="col-xs-11">
            <h4>State the name. physical address and telephone number of the institution or the places where the trial will be conducted </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3"><p><strong>Name</strong></p></div>
        <div class="col-xs-3"><p><strong>Physical address</strong></p></div>
        <div class="col-xs-3"><p><strong>Telephone</strong></p></div>
        <div class="col-xs-3"><p><strong>Contact person</strong></p></div>
    </div>
    <div class="row">
        <div class="col-xs-3" > <p class="answer"> <?= $application['location_of_area'] ?>  </p> </div>
        <div class="col-xs-3" > <p class="answer"> <?= $application['single_site_physical_address'] ?>  </p> </div>
        <div class="col-xs-3" > <p class="answer"> <?= $application['single_site_telephone'] ?> </p>  </div>
        <div class="col-xs-3" > <p class="answer"> <?= $application['single_site_contact_person'] ?>  </p> </div>
    </div>
    <div class="row">
        <div class="col-xs-3" > <p class="answer"> <?= $application['single_site_name'] ?>  </p> </div>
        <div class="col-xs-3" > <p class="answer"> <?= $application['single_site_physical_address'] ?>  </p> </div>
        <div class="col-xs-3" > <p class="answer"> <?= $application['single_site_contact_details'] ?> </p>  </div>
        <div class="col-xs-3" > <p class="answer"> <?= $application['single_site_contact_person'] ?>  </p> </div>
    </div>
    <div class="row">
        <?php
            if (!empty($application['site_details'])) {
              for ($i = 0; $i <= count($application['site_details'])-1; $i++) { ?>
                <div class="col-xs-3" > <p class="answer"> <?= $application['site_details'][$i]['site_name'] ?>  </p> </div>
                <div class="col-xs-3" > <p class="answer"> <?= $application['site_details'][$i]['physical_address'] ?>  </p> </div>
                <div class="col-xs-3" > <p class="answer"> <?= $application['site_details'][$i]['contact_details'] ?> </p>  </div>
                <div class="col-xs-3" > <p class="answer"> <?= $application['site_details'][$i]['contact_person'] ?>  </p> </div>
            <?php
              }
            } 
        ?>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>8.</h5>
        </div>
        <div class="col-xs-11">
            <h4>State the purpose of the trial and the reasons therefore  </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1"> 
            <div class="answer"><p><?= $application['abstract_of_study']?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>9.</h5>
        </div>
        <div class="col-xs-11">
            <h4>State the time period for the trial  </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1"> 
            <div class="answer"><p><?= $application['estimated_duration']?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>10.</h5>
        </div>
        <div class="col-xs-11">
            <h4>Description of the type of trial </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1"> <p>Type of trial: <u><?= $application['design_controlled']?></u></p></div>
        <div class="col-xs-11 col-xs-offset-1"> <p>Randomised: <u><?= $application['design_controlled_randomised']?></u></p></div>
        <div class="col-xs-11 col-xs-offset-1"> <p>Open: <u><?= $application['design_controlled_open']?></u></p></div>
        <div class="col-xs-11 col-xs-offset-1"> <p>Single Blind: <u><?= $application['design_controlled_single_blind']?></u></p></div>
        <div class="col-xs-11 col-xs-offset-1"> <p>Double Blind: <u><?= $application['design_controlled_double_blind']?></u></p></div>
        <div class="col-xs-11 col-xs-offset-1"> <p>Parallel group: <u><?= $application['design_controlled_parallel_group']?></u></p></div>
        <div class="col-xs-11 col-xs-offset-1"> <p>Cross over: <u><?= $application['design_controlled_cross_over']?></u></p></div>
        <div class="col-xs-11 col-xs-offset-1"> <p>Other: <u><?= $application['design_controlled_other']?></u></p></div>
        <div class="col-xs-11 col-xs-offset-1"> <p>if <b>yes</b> to other, specify: <u><?= $application['design_controlled_specify']?></u></p></div>
        <div class="col-xs-11 col-xs-offset-1"> <p>If controlled, specify the comparator: <u><?= $application['design_controlled_comparator']?></u></p></div>
        <div class="col-xs-11 col-xs-offset-1"> <p>Other medicinal product(s): <u><?= $application['design_controlled_other_medicinal']?></u></p></div>
        <div class="col-xs-11 col-xs-offset-1"> <p>Placebo: <u><?= $application['design_controlled_placebo']?></u></p></div>
        <div class="col-xs-11 col-xs-offset-1"> <p>Other: <u><?= $application['design_controlled_medicinal_other']?></u></p></div>
        <div class="col-xs-11 col-xs-offset-1"> <p>if <b>yes</b> to other, specify: <u><?= $application['design_controlled_medicinal_specify']?></u></p></div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>11.</h5>
        </div>
        <div class="col-xs-11">
            <h4>Description of participants (e.g. age group of persons or animals, type or class of persons or animals, sex. etc.) </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1">
            <div class="answer"><p><?= $application['participants_description']?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>12.</h5>
        </div>
        <div class="col-xs-11">
            <h4>Criteria for inclusion or exclusion of participants </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1">
            <div class="answer"><p><?= $application['principal_inclusion_criteria']?></p></div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1">
            <div class="answer"><p><?= $application['principal_exclusion_criteria']?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>13.</h5>
        </div>
        <div class="col-xs-11">
            <h4>Number of participants expected to take part in the trial and a justification thereof (e.g. based on statistical considerations) </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-xs-offset-1"> <p><strong>Expected Number of participants </strong></p>  </div>
        <div class="col-xs-7">
            <p class="answer"><?= $application['number_participants']?></p>
        </div>
        <div class="col-xs-4 col-xs-offset-1"> <p><strong>Total enrolment in each site</strong></p>  </div>
        <div class="col-xs-7">
            <p class="answer"><?= $application['total_enrolment_per_site']?></p>
        </div>
        <div class="col-xs-4 col-xs-offset-1"> <p><strong>Total participants worldwide </strong></p>  </div>
        <div class="col-xs-7">
            <p class="answer"><?= $application['total_participants_worldwide']?></p>
        </div>
        <div class="col-xs-11 col-xs-offset-1"> <p><strong>Justification</strong></p>  </div>
        <div class="col-xs-11 col-xs-offset-1"> <div class="answer"><p><?= $application['participants_justification'] ?> </p></div>  </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>14.</h5>
        </div>
        <div class="col-xs-11">
            <h4>Administration route, dosage, dosage interval and period for the medicine beMg tested and the medicine being used as a control </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1">
            <div class="answer"><p><?= $application['administration_route']?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>15.</h5>
        </div>
        <div class="col-xs-11">
            <h4>Control groups (placebo, other therapy, etc.) </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1">
            <div class="answer"><p><?= $application['exemption_required']?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>16.</h5>
        </div>
        <div class="col-xs-1">
            <h5>(a)</h5>
        </div>
        <div class="col-xs-8">
            <h4>State whether any other medicine will be Oven concomitantly. </h4>
        </div>
        <div class="col-xs-2">
            <p class="answer"><?= $application['given_concomitantly']?></p>
        </div>
    </div>    
    <div class="row">
        <div class="col-xs-10 col-xs-offset-2">
            <h6>If <b>YES</b>, state the name of the medicine </h6>
        </div>
        <div class="col-xs-10 col-xs-offset-2">
            <div class="answer"><p><?php  echo $application['concomitant_medicine']; ?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1 col-xs-offset-1">
            <h5>(b)</h5>
        </div>
        <div class="col-xs-8">
            <h4>State whether the person already on another medicine will be given the experimential medicine at the same time or will be taken off the medicine </h4>
        </div>
        <div class="col-xs-2">
            <p class="answer"><?= $application['concurrent_medicine']?></p>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>17.</h5>
        </div>
        <div class="col-xs-11">
            <h4>Recording of effects: give a description of the methods of recordings and times of recordings </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1">
            <div class="answer"><p><?= $application['recording_effects']?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>18.</h5>
        </div>
        <div class="col-xs-11">
            <h4>State clinical and laboratory tests, phannacokinetic analysis, etc., that are to be carried out </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1">
            <div class="answer"><p><?= $application['tests_done']?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>19.</h5>
        </div>
        <div class="col-xs-11">
            <h4>State the method of recording adverse reactions and provisions for dealing with same and other complications </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1">
            <div class="answer"><p><?= $application['recording_method']?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>20.</h5>
        </div>
        <div class="col-xs-11">
            <h4>State antidote </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1">
            <div class="answer"><p><?= $application['state_antidote']?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>21.</h5>
        </div>
        <div class="col-xs-11">
            <h4>State the procedure for the keeping of participant lists and participant records for each participant taking part in the trial + </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1">
            <div class="answer"><p><?= $application['record_keeping']?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>22.</h5>
        </div>
        <div class="col-xs-11">
            <h4>State where the trial code will be kept and how it can be broken in the event of an emergency  </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1">
            <div class="answer"><p><?= $application['trial_storage']?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>23.</h5>
        </div>
        <div class="col-xs-11">
            <h4>State the measures to be implemented to ensure the safe handling of medicines and to promote and control conipliances with the prescribed instructions </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1">
            <div class="answer"><p><?= $application['measures_compliance']?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>24.</h5>
        </div>
        <div class="col-xs-11">
            <h4>Evaluation of results, state the description of methodology (e.g. statistical methods) </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1">
            <div class="answer"><p><?= $application['evalution_of_results']?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>25.</h5>
        </div>
        <div class="col-xs-11">
            <h4>State how the persons or owners of animals are to be informed about the trial </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1">
            <div class="answer"><p><?= $application['inform_persons']?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>26.</h5>
        </div>
        <div class="col-xs-11">
            <h4>State how the staff involved are to be informed about the way the trial is to be conducted and about the procedures for medicine itsat.,,e and administration and what to do in an emergency  </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1">
            <div class="answer"><p><?= $application['inform_staff']?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>27.</h5>
        </div>
        <div class="col-xs-11">
            <h4>State whether there are any ethical or moral considerations relating to the trial, giving details </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1">
            <div class="answer"><p><?= $application['ethic_considerations']?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>28.</h5>
        </div>
        <div class="col-xs-11">
            <h4>State the name and address of the company who will insure all the participants in the proposed trial </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1">
            <div class="answer"><p><?= $application['insurance_company']?></p></div>
            <div class="answer"><p><?= $application['insurance_address']?></p></div>
        </div>
        <div class="col-xs-11 col-xs-offset-1"><p><strong>Insurance letter and policy</strong></p></div>
        <div class="col-xs-11 col-xs-offset-1">
            <?php
                if (!empty($application['policies'])) {
                  for ($i = 0; $i <= count($application['policies'])-1; $i++) { ?>
                  <div style="margin-top: 5px; margin-bottom: 5px;">
                  <?php
                    echo $this->Html->link($application['policies'][$i]->file, substr($application['policies'][$i]->dir, 8) . '/' . $application['policies'][$i]->file, ['fullBase' => true, 'class' => 'btn btn-info']);
                  ?>
                </div>
                <?php
                  }
                } 
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>29.</h5>
        </div>
        <div class="col-xs-11">
            <h4>State the amount of insurance in respect of each participant </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1">
            <div class="answer"><p><?= $application['insurance_amount']?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>30.</h5>
        </div>
        <div class="col-xs-11">
            <h4>State the quantity of the medicine for which exemption is required if the mediAne is not registered </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1">
            <div class="answer"><p><?= $application['exemption_required']?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>31.</h5>
        </div>
        <div class="col-xs-11">
            <h4>Particulars of persons who will take part in the clinical trial </h4>
        </div>
    </div>    
    <div class="row">
        <div class="col-xs-3"><p><strong>Name</strong></p></div>
        <div class="col-xs-3"><p><strong>Occupation</strong></p></div>
        <div class="col-xs-3"><p><strong>Address</strong></p></div>
        <div class="col-xs-3"><p><strong>Date &amp; place of Birth</strong></p></div>
    </div>
    <div class="row">
        <?php
            if (!empty($application['participants'])) {
              for ($i = 0; $i <= count($application['participants'])-1; $i++) { ?>
                <div class="col-xs-3" > <p class="answer"> <?= $application['participants'][$i]['name'] ?>  </p> </div>
                <div class="col-xs-3" > <p class="answer"> <?= $application['participants'][$i]['occupation'] ?>  </p> </div>
                <div class="col-xs-3" > <p class="answer"> <?= $application['participants'][$i]['address'] ?> </p>  </div>
                <div class="col-xs-3" > <p class="answer"> <?= $application['participants'][$i]['date_of_birth'].'-'.$application['participants'][$i]['place_of_birth'] ?>  </p> </div>
            <?php
              }
            } 
        ?>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>32.</h5>
        </div>
        <div class="col-xs-11">
            <h4>Particulars of the animals that will take part in the clinical Trial <small>Kind and breed of animal Age of animal if known Names and Addresses of owners of animals</small></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1">
            <div class="answer"><p><?= $application['animal_particulars']?></p></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-1">
            <h5>33.</h5>
        </div>
        <div class="col-xs-11">
            <h4>Attached is a sample of the medicine, together with methods of analysis and storage conditions.</small></h4>
        </div>
    </div>

    <br><br>

    <div class="row">
        <div class="col-xs-6">
            <div class="answer"><p></p></div>
        </div>
        <div class="col-xs-6">
            <div class="answer"><p></p></div>
        </div>
        <div class="col-xs-6">
            <p>Date</p>
        </div>
        <div class="col-xs-6">
            <p><em>Signature of applicant</em></p>
        </div>
    </div>

</div>