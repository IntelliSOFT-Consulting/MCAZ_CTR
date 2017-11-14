<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sadr $sadr
 */
?>

<div>
    <h3><?= h($sadr->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Clinic/Hospital Name:') ?></th>
            <td><?= h($sadr->name_of_institution) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Patient Initials:') ?></th>
            <td><?= h($sadr->patient_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Birth') ?></th>
            <td><?= h($sadr->date_of_birth) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Age Group') ?></th>
            <td><?= h($sadr->age_group) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clinic/Hospital Number:') ?></th>
            <td><?= h($sadr->institution_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('VCT/OI/TB Number:') ?></th>
            <td><?= h($sadr->ip_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weight') ?></th>
            <td><?= h($sadr->weight) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Height') ?></th>
            <td><?= h($sadr->height) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= h($sadr->gender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Onset Of Reaction') ?></th>
            <td><?= h($sadr->date_of_onset_of_reaction) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration Type') ?></th>
            <td><?= h($sadr->duration_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration') ?></th>
            <td><?= h($sadr->duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seriousness') ?></th>
            <td><?= h($sadr->severity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reason for Seriousness:') ?></th>
            <td><?= h($sadr->severity_reason) ?></td>
        </tr>
        
    </table>

    <div class="row">
        <h4><?= __('Description Of Reaction') ?></h4>
        <?= $this->Text->autoParagraph(h($sadr->description_of_reaction)); ?>
    </div>

 
</div>
