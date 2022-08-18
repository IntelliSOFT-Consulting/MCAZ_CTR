<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Quality Entity
 *
 * @property int $id
 * @property int $application_id
 * @property int $user_id
 * @property string $quality_workspace
 * @property bool $gmp_smpc
 * @property bool $gmp_included
 * @property string $labelling
 * @property string $labelling_comments
 * @property string $blinding_workspace
 * @property string $blinding_comments
 * @property string $acceptable
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $deleted
 * @property string $supplementary_need
 * @property string $overall_comments
 *
 * @property \App\Model\Entity\Application $application
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Sdrug[] $sdrug
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
        'quality_workspace' => true,
        'gmp_smpc' => true,
        'gmp_included' => true,
        'labelling' => true,
        'labelling_comments' => true,
        'blinding_workspace' => true,
        'blinding_comments' => true,
        'acceptable' => true,
        'created' => true,
        'deleted' => true,
        'supplementary_need' => true,
        'overall_comments' => true,
        'application' => true,
        'user' => true,
        'sdrug' => true
    ];
}
