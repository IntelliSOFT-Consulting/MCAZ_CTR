<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Quality Entity
 *
 * @property int $id
 * @property int $application_id
 * @property int $user_id
 * @property string $submitted
 * @property string $quality_workspace
 * @property int $gmp_smpc
 * @property int $gmp_included
 *
 * @property \App\Model\Entity\Application $application
 * @property \App\Model\Entity\User $user
 */
class Quality extends Entity
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
        'submitted' => true,
        'quality_workspace' => true,
        'gmp_smpc' => true,
        'gmp_included' => true,
        'application' => true,
        'user' => true
    ];
}
