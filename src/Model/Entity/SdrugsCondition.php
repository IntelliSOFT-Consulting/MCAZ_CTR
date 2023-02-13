<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SdrugsCondition Entity
 *
 * @property int $id
 * @property int $application_id
 * @property int $sdrug_id
 * @property string $batch_details
 * @property string $manu_process
 * @property string $neg_seventy
 * @property string $neg_twenty
 * @property string $pos_five
 * @property int $pos_twenty_five
 * @property int $pos_thirty
 * @property int $pos_forty
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property string $model
 *
 * @property \App\Model\Entity\Application $application
 * @property \App\Model\Entity\Sdrug $sdrug
 * @property \App\Model\Entity\Pdrug $pdrug
 */
class SdrugsCondition extends Entity
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
        'sdrug_id' => true,
        'batch_details' => true,
        'manu_process' => true,
        'neg_seventy' => true,
        'neg_twenty' => true,
        'pos_five' => true,
        'pos_twenty_five' => true,
        'pos_thirty' => true,
        'pos_forty' => true,
        'created_at' => true,
        'updated_at' => true,
        'model' => true,
        'application' => true,
        'sdrug' => true,
        'pdrug' => true
    ];
}
