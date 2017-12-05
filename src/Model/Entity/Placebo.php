<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Placebo Entity
 *
 * @property int $id
 * @property int $application_id
 * @property string $placebo_present
 * @property string $pharmaceutical_form
 * @property string $route_of_administration
 * @property string $composition
 * @property string $identical_indp
 * @property string $major_ingredients
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Application $application
 */
class Placebo extends Entity
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
        'placebo_present' => true,
        'pharmaceutical_form' => true,
        'route_of_administration' => true,
        'composition' => true,
        'identical_indp' => true,
        'major_ingredients' => true,
        'created' => true,
        'modified' => true,
        'application' => true
    ];
}
