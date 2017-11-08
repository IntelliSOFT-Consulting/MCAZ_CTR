<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HelpInfo Entity
 *
 * @property int $id
 * @property string $field_name
 * @property string $field_label
 * @property string $place_holder
 * @property string $help_type
 * @property string $title
 * @property string $content
 * @property string $help_text
 * @property string $type
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class HelpInfo extends Entity
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
        'field_name' => true,
        'field_label' => true,
        'place_holder' => true,
        'help_type' => true,
        'title' => true,
        'content' => true,
        'help_text' => true,
        'type' => true,
        'created' => true,
        'modified' => true
    ];
}
