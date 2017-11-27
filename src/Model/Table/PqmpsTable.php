<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pqmps Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CountiesTable|\Cake\ORM\Association\BelongsTo $Counties
 * @property \App\Model\Table\SubCountiesTable|\Cake\ORM\Association\BelongsTo $SubCounties
 * @property \App\Model\Table\CountriesTable|\Cake\ORM\Association\BelongsTo $Countries
 * @property \App\Model\Table\DesignationsTable|\Cake\ORM\Association\BelongsTo $Designations
 * @property \App\Model\Table\AttachmentsTable|\Cake\ORM\Association\HasMany $Attachments
 * @property \App\Model\Table\FeedbacksTable|\Cake\ORM\Association\HasMany $Feedbacks
 * @property \App\Model\Table\MessagesTable|\Cake\ORM\Association\HasMany $Messages
 *
 * @method \App\Model\Entity\Pqmp get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pqmp newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pqmp[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pqmp|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pqmp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pqmp[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pqmp findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PqmpsTable extends Table
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

        $this->setTable('pqmps');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Counties', [
            'foreignKey' => 'county_id'
        ]);
        $this->belongsTo('SubCounties', [
            'foreignKey' => 'sub_county_id'
        ]);
        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id'
        ]);
        $this->belongsTo('Designations', [
            'foreignKey' => 'designation_id'
        ]);
        $this->hasMany('Attachments', [
            'foreignKey' => 'pqmp_id'
        ]);
        $this->hasMany('Feedbacks', [
            'foreignKey' => 'pqmp_id'
        ]);
        $this->hasMany('Messages', [
            'foreignKey' => 'pqmp_id'
        ]);
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
            ->scalar('facility_name')
            ->allowEmpty('facility_name');

        $validator
            ->scalar('facility_code')
            ->allowEmpty('facility_code');

        $validator
            ->scalar('facility_address')
            ->allowEmpty('facility_address');

        $validator
            ->scalar('facility_phone')
            ->allowEmpty('facility_phone');

        $validator
            ->scalar('brand_name')
            ->allowEmpty('brand_name');

        $validator
            ->scalar('generic_name')
            ->allowEmpty('generic_name');

        $validator
            ->scalar('batch_number')
            ->allowEmpty('batch_number');

        $validator
            ->scalar('manufacture_date')
            ->allowEmpty('manufacture_date');

        $validator
            ->date('expiry_date')
            ->allowEmpty('expiry_date');

        $validator
            ->date('receipt_date')
            ->allowEmpty('receipt_date');

        $validator
            ->scalar('name_of_manufacturer')
            ->allowEmpty('name_of_manufacturer');

        $validator
            ->scalar('country_of_origin')
            ->allowEmpty('country_of_origin');

        $validator
            ->scalar('supplier_name')
            ->allowEmpty('supplier_name');

        $validator
            ->scalar('supplier_address')
            ->allowEmpty('supplier_address');

        $validator
            ->scalar('product_formulation')
            ->allowEmpty('product_formulation');

        $validator
            ->scalar('product_formulation_specify')
            ->allowEmpty('product_formulation_specify');

        $validator
            ->boolean('colour_change')
            ->allowEmpty('colour_change');

        $validator
            ->boolean('separating')
            ->allowEmpty('separating');

        $validator
            ->boolean('powdering')
            ->allowEmpty('powdering');

        $validator
            ->boolean('caking')
            ->allowEmpty('caking');

        $validator
            ->boolean('moulding')
            ->allowEmpty('moulding');

        $validator
            ->boolean('odour_change')
            ->allowEmpty('odour_change');

        $validator
            ->boolean('mislabeling')
            ->allowEmpty('mislabeling');

        $validator
            ->boolean('incomplete_pack')
            ->allowEmpty('incomplete_pack');

        $validator
            ->boolean('complaint_other')
            ->allowEmpty('complaint_other');

        $validator
            ->scalar('complaint_other_specify')
            ->allowEmpty('complaint_other_specify');

        $validator
            ->scalar('complaint_description')
            ->allowEmpty('complaint_description');

        $validator
            ->scalar('require_refrigeration')
            ->allowEmpty('require_refrigeration');

        $validator
            ->scalar('product_at_facility')
            ->allowEmpty('product_at_facility');

        $validator
            ->scalar('returned_by_client')
            ->allowEmpty('returned_by_client');

        $validator
            ->scalar('stored_to_recommendations')
            ->allowEmpty('stored_to_recommendations');

        $validator
            ->scalar('other_details')
            ->allowEmpty('other_details');

        $validator
            ->scalar('comments')
            ->allowEmpty('comments');

        $validator
            ->scalar('reporter_name')
            ->allowEmpty('reporter_name');

        $validator
            ->scalar('reporter_email')
            ->allowEmpty('reporter_email');

        $validator
            ->scalar('contact_number')
            ->allowEmpty('contact_number');

        $validator
            ->allowEmpty('emails');

        $validator
            ->allowEmpty('submitted');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        $validator
            ->allowEmpty('device');

        $validator
            ->allowEmpty('notified');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['county_id'], 'Counties'));
        $rules->add($rules->existsIn(['sub_county_id'], 'SubCounties'));
        $rules->add($rules->existsIn(['country_id'], 'Countries'));
        $rules->add($rules->existsIn(['designation_id'], 'Designations'));

        return $rules;
    }
}
