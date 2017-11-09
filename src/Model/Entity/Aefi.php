<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Aefi Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $designation_id
 * @property string $report_type
 * @property string $name_of_institution
 * @property string $institution_code
 * @property string $patient_name
 * @property string $ip_no
 * @property string $date_of_birth
 * @property string $age_group
 * @property string $gender
 * @property string $weight
 * @property string $height
 * @property string $date_of_onset_of_reaction
 * @property string $date_of_end_of_reaction
 * @property string $duration_type
 * @property string $duration
 * @property string $description_of_reaction
 * @property string $severity
 * @property string $severity_reason
 * @property string $medical_history
 * @property string $past_drug_therapy
 * @property string $outcome
 * @property string $lab_test_results
 * @property string $reporter_name
 * @property string $reporter_email
 * @property string $reporter_phone
 * @property int $submitted
 * @property int $emails
 * @property bool $active
 * @property int $device
 * @property int $notified
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Designation $designation
 */
class Aefi extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true
        // 'user_id' => true,
        // 'designation_id' => true,
        // 'report_type' => true,
        // 'name_of_institution' => true,
        // 'institution_code' => true,
        // 'patient_name' => true,
        // 'ip_no' => true,
        // 'date_of_birth' => true,
        // 'age_group' => true,
        // 'gender' => true,
        // 'weight' => true,
        // 'height' => true,
        // 'date_of_onset_of_reaction' => true,
        // 'date_of_end_of_reaction' => true,
        // 'duration_type' => true,
        // 'duration' => true,
        // 'description_of_reaction' => true,
        // 'severity' => true,
        // 'severity_reason' => true,
        // 'medical_history' => true,
        // 'past_drug_therapy' => true,
        // 'outcome' => true,
        // 'lab_test_results' => true,
        // 'reporter_name' => true,
        // 'reporter_email' => true,
        // 'reporter_phone' => true,
        // 'submitted' => true,
        // 'emails' => true,
        // 'active' => true,
        // 'device' => true,
        // 'notified' => true,
        // 'created' => true,
        // 'modified' => true,
        // 'user' => true,
        // 'designation' => true
    ];
}
