<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Attachment Entity
 *
 * @property int $id
 * @property int $sadr_id
 * @property int $sadr_followup_id
 * @property int $pqmp_id
 * @property string $filename
 * @property string $description
 * @property string $mimetype
 * @property int $filesize
 * @property string $dir
 * @property string $file
 * @property string $basename
 * @property string $dirname
 * @property string $checksum
 * @property string $model
 * @property int $foreign_key
 * @property string $alternative
 * @property string $group
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Sadr $sadr
 * @property \App\Model\Entity\SadrFollowup $sadr_followup
 * @property \App\Model\Entity\Pqmp $pqmp
 */
class Attachment extends Entity
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
        'sadr_id' => true,
        'sadr_followup_id' => true,
        'pqmp_id' => true,
        'filename' => true,
        'description' => true,
        'mimetype' => true,
        'filesize' => true,
        'dir' => true,
        'file' => true,
        'basename' => true,
        'dirname' => true,
        'checksum' => true,
        'model' => true,
        'foreign_key' => true,
        'alternative' => true,
        'group' => true,
        'created' => true,
        'modified' => true,
        'sadr' => true,
        'sadr_followup' => true,
        'pqmp' => true
    ];
}
