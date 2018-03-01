<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ApplicationStage Entity
 *
 * @property int $id
 * @property int $application_id
 * @property string $stage
 * @property string $description
 * @property \Cake\I18n\FrozenTime $stage_date
 * @property \Cake\I18n\FrozenTime $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Application $application
 */
class ApplicationStage extends Entity
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
        '*' => true,
    ];
}
