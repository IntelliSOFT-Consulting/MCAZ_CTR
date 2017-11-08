<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FacilityCode Entity
 *
 * @property int $id
 * @property string $facility_code
 * @property string $facility_name
 * @property string $province
 * @property string $county
 * @property string $district
 * @property string $division
 * @property string $type
 * @property string $owner
 * @property string $location
 * @property string $sub_location
 * @property string $description_of_location
 * @property string $constituency
 * @property string $nearest_town
 * @property string $beds
 * @property string $cots
 * @property string $official_landline
 * @property string $official_fax
 * @property string $official_mobile
 * @property string $official_email
 * @property string $official_address
 * @property string $official_alternate_number
 * @property string $town
 * @property string $post_code
 * @property string $in_charge
 * @property string $job_title_of_in_charge
 * @property string $open_24hrs
 * @property string $open_weekends
 * @property string $operational_status
 * @property string $anc
 * @property string $art
 * @property string $beoc
 * @property string $blood
 * @property string $caes_sec
 * @property string $ceoc
 * @property string $c_imci
 * @property string $epi
 * @property string $fp
 * @property string $growm
 * @property string $hbc
 * @property string $hct
 * @property string $ipd
 * @property string $opd
 * @property string $outreach
 * @property string $pmtct
 * @property string $rad_xray
 * @property string $rhtc_rhdc
 * @property string $tb_diag
 * @property string $tb_labs
 * @property string $tb_treat
 * @property string $Youth
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class FacilityCode extends Entity
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
        'facility_code' => true,
        'facility_name' => true,
        'province' => true,
        'county' => true,
        'district' => true,
        'division' => true,
        'type' => true,
        'owner' => true,
        'location' => true,
        'sub_location' => true,
        'description_of_location' => true,
        'constituency' => true,
        'nearest_town' => true,
        'beds' => true,
        'cots' => true,
        'official_landline' => true,
        'official_fax' => true,
        'official_mobile' => true,
        'official_email' => true,
        'official_address' => true,
        'official_alternate_number' => true,
        'town' => true,
        'post_code' => true,
        'in_charge' => true,
        'job_title_of_in_charge' => true,
        'open_24hrs' => true,
        'open_weekends' => true,
        'operational_status' => true,
        'anc' => true,
        'art' => true,
        'beoc' => true,
        'blood' => true,
        'caes_sec' => true,
        'ceoc' => true,
        'c_imci' => true,
        'epi' => true,
        'fp' => true,
        'growm' => true,
        'hbc' => true,
        'hct' => true,
        'ipd' => true,
        'opd' => true,
        'outreach' => true,
        'pmtct' => true,
        'rad_xray' => true,
        'rhtc_rhdc' => true,
        'tb_diag' => true,
        'tb_labs' => true,
        'tb_treat' => true,
        'Youth' => true,
        'created' => true,
        'modified' => true
    ];
}
