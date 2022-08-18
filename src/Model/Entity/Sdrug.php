<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sdrug Entity
 *
 * @property int $id
 * @property int $application_id
 * @property int $user_id
 * @property int $quality_id
 * @property bool $drug_eur
 * @property bool $drug_usp
 * @property string $drug_authorised
 *
 * @property \App\Model\Entity\Application $application
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Quality $quality
 */
class Sdrug extends Entity
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
        'application_id' => true,
        'user_id' => true,
        'quality_id' => true,
        'drug_eur' => true,
        'drug_usp' => true,
        'drug_authorised' => true,
        'application' => true,
        'user' => true,
        'quality' => true
    ];
}
