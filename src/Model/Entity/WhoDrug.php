<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WhoDrug Entity
 *
 * @property string $id
 * @property string $MedId
 * @property string $drug_record_number
 * @property string $sequence_no_1
 * @property string $sequence_no_2
 * @property string $sequence_no_3
 * @property string $sequence_no_4
 * @property string $generic
 * @property string $drug_name
 * @property string $name_specifier
 * @property string $market_authorization_number
 * @property string $market_authorization_date
 * @property string $market_authorization_withdrawal_date
 * @property string $country
 * @property string $company
 * @property string $marketing_authorization_holder
 * @property string $source_code
 * @property string $source_country
 * @property string $source_year
 * @property string $product_type
 * @property string $product_group
 * @property string $create_date
 * @property string $date_changed
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class WhoDrug extends Entity
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
        'MedId' => true,
        'drug_record_number' => true,
        'sequence_no_1' => true,
        'sequence_no_2' => true,
        'sequence_no_3' => true,
        'sequence_no_4' => true,
        'generic' => true,
        'drug_name' => true,
        'name_specifier' => true,
        'market_authorization_number' => true,
        'market_authorization_date' => true,
        'market_authorization_withdrawal_date' => true,
        'country' => true,
        'company' => true,
        'marketing_authorization_holder' => true,
        'source_code' => true,
        'source_country' => true,
        'source_year' => true,
        'product_type' => true,
        'product_group' => true,
        'create_date' => true,
        'date_changed' => true,
        'created' => true,
        'modified' => true
    ];
}
