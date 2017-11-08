<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FacilityCodes Model
 *
 * @method \App\Model\Entity\FacilityCode get($primaryKey, $options = [])
 * @method \App\Model\Entity\FacilityCode newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FacilityCode[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FacilityCode|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FacilityCode patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FacilityCode[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FacilityCode findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FacilityCodesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('facility_codes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('facility_code')
            ->allowEmpty('facility_code');

        $validator
            ->scalar('facility_name')
            ->allowEmpty('facility_name');

        $validator
            ->scalar('province')
            ->allowEmpty('province');

        $validator
            ->scalar('county')
            ->allowEmpty('county');

        $validator
            ->scalar('district')
            ->allowEmpty('district');

        $validator
            ->scalar('division')
            ->allowEmpty('division');

        $validator
            ->scalar('type')
            ->allowEmpty('type');

        $validator
            ->scalar('owner')
            ->allowEmpty('owner');

        $validator
            ->scalar('location')
            ->allowEmpty('location');

        $validator
            ->scalar('sub_location')
            ->allowEmpty('sub_location');

        $validator
            ->scalar('description_of_location')
            ->allowEmpty('description_of_location');

        $validator
            ->scalar('constituency')
            ->allowEmpty('constituency');

        $validator
            ->scalar('nearest_town')
            ->allowEmpty('nearest_town');

        $validator
            ->scalar('beds')
            ->allowEmpty('beds');

        $validator
            ->scalar('cots')
            ->allowEmpty('cots');

        $validator
            ->scalar('official_landline')
            ->allowEmpty('official_landline');

        $validator
            ->scalar('official_fax')
            ->allowEmpty('official_fax');

        $validator
            ->scalar('official_mobile')
            ->allowEmpty('official_mobile');

        $validator
            ->scalar('official_email')
            ->allowEmpty('official_email');

        $validator
            ->scalar('official_address')
            ->allowEmpty('official_address');

        $validator
            ->scalar('official_alternate_number')
            ->allowEmpty('official_alternate_number');

        $validator
            ->scalar('town')
            ->allowEmpty('town');

        $validator
            ->scalar('post_code')
            ->allowEmpty('post_code');

        $validator
            ->scalar('in_charge')
            ->allowEmpty('in_charge');

        $validator
            ->scalar('job_title_of_in_charge')
            ->allowEmpty('job_title_of_in_charge');

        $validator
            ->scalar('open_24hrs')
            ->allowEmpty('open_24hrs');

        $validator
            ->scalar('open_weekends')
            ->allowEmpty('open_weekends');

        $validator
            ->scalar('operational_status')
            ->allowEmpty('operational_status');

        $validator
            ->scalar('anc')
            ->allowEmpty('anc');

        $validator
            ->scalar('art')
            ->allowEmpty('art');

        $validator
            ->scalar('beoc')
            ->allowEmpty('beoc');

        $validator
            ->scalar('blood')
            ->allowEmpty('blood');

        $validator
            ->scalar('caes_sec')
            ->allowEmpty('caes_sec');

        $validator
            ->scalar('ceoc')
            ->allowEmpty('ceoc');

        $validator
            ->scalar('c_imci')
            ->allowEmpty('c_imci');

        $validator
            ->scalar('epi')
            ->allowEmpty('epi');

        $validator
            ->scalar('fp')
            ->allowEmpty('fp');

        $validator
            ->scalar('growm')
            ->allowEmpty('growm');

        $validator
            ->scalar('hbc')
            ->allowEmpty('hbc');

        $validator
            ->scalar('hct')
            ->allowEmpty('hct');

        $validator
            ->scalar('ipd')
            ->allowEmpty('ipd');

        $validator
            ->scalar('opd')
            ->allowEmpty('opd');

        $validator
            ->scalar('outreach')
            ->allowEmpty('outreach');

        $validator
            ->scalar('pmtct')
            ->allowEmpty('pmtct');

        $validator
            ->scalar('rad_xray')
            ->allowEmpty('rad_xray');

        $validator
            ->scalar('rhtc_rhdc')
            ->allowEmpty('rhtc_rhdc');

        $validator
            ->scalar('tb_diag')
            ->allowEmpty('tb_diag');

        $validator
            ->scalar('tb_labs')
            ->allowEmpty('tb_labs');

        $validator
            ->scalar('tb_treat')
            ->allowEmpty('tb_treat');

        $validator
            ->scalar('Youth')
            ->allowEmpty('Youth');

        return $validator;
    }
}
