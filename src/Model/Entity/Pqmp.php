<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pqmp Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $county_id
 * @property int $sub_county_id
 * @property int $country_id
 * @property int $designation_id
 * @property string $facility_name
 * @property string $facility_code
 * @property string $facility_address
 * @property string $facility_phone
 * @property string $brand_name
 * @property string $generic_name
 * @property string $batch_number
 * @property string $manufacture_date
 * @property \Cake\I18n\FrozenDate $expiry_date
 * @property \Cake\I18n\FrozenDate $receipt_date
 * @property string $name_of_manufacturer
 * @property string $country_of_origin
 * @property string $supplier_name
 * @property string $supplier_address
 * @property string $product_formulation
 * @property string $product_formulation_specify
 * @property bool $colour_change
 * @property bool $separating
 * @property bool $powdering
 * @property bool $caking
 * @property bool $moulding
 * @property bool $odour_change
 * @property bool $mislabeling
 * @property bool $incomplete_pack
 * @property bool $complaint_other
 * @property string $complaint_other_specify
 * @property string $complaint_description
 * @property string $require_refrigeration
 * @property string $product_at_facility
 * @property string $returned_by_client
 * @property string $stored_to_recommendations
 * @property string $other_details
 * @property string $comments
 * @property string $reporter_name
 * @property string $reporter_email
 * @property string $contact_number
 * @property int $emails
 * @property int $submitted
 * @property bool $active
 * @property int $device
 * @property int $notified
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\County $county
 * @property \App\Model\Entity\SubCounty $sub_county
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\Designation $designation
 * @property \App\Model\Entity\Attachment[] $attachments
 * @property \App\Model\Entity\Feedback[] $feedbacks
 * @property \App\Model\Entity\Message[] $messages
 */
class Pqmp extends Entity
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
        'user_id' => true,
        'county_id' => true,
        'sub_county_id' => true,
        'country_id' => true,
        'designation_id' => true,
        'facility_name' => true,
        'facility_code' => true,
        'facility_address' => true,
        'facility_phone' => true,
        'brand_name' => true,
        'generic_name' => true,
        'batch_number' => true,
        'manufacture_date' => true,
        'expiry_date' => true,
        'receipt_date' => true,
        'name_of_manufacturer' => true,
        'country_of_origin' => true,
        'supplier_name' => true,
        'supplier_address' => true,
        'product_formulation' => true,
        'product_formulation_specify' => true,
        'colour_change' => true,
        'separating' => true,
        'powdering' => true,
        'caking' => true,
        'moulding' => true,
        'odour_change' => true,
        'mislabeling' => true,
        'incomplete_pack' => true,
        'complaint_other' => true,
        'complaint_other_specify' => true,
        'complaint_description' => true,
        'require_refrigeration' => true,
        'product_at_facility' => true,
        'returned_by_client' => true,
        'stored_to_recommendations' => true,
        'other_details' => true,
        'comments' => true,
        'reporter_name' => true,
        'reporter_email' => true,
        'contact_number' => true,
        'emails' => true,
        'submitted' => true,
        'active' => true,
        'device' => true,
        'notified' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'county' => true,
        'sub_county' => true,
        'country' => true,
        'designation' => true,
        'attachments' => true,
        'feedbacks' => true,
        'messages' => true
    ];
}
