<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property int $designation_id
 * @property int $county_id
 * @property string $username
 * @property string $password
 * @property string $confirm_password
 * @property string $name
 * @property string $email
 * @property int $group_id
 * @property string $name_of_institution
 * @property string $institution_address
 * @property string $institution_code
 * @property string $institution_contact
 * @property string $ward
 * @property string $phone_no
 * @property int $forgot_password
 * @property int $initial_email
 * @property bool $is_active
 * @property bool $is_admin
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Designation $designation
 * @property \App\Model\Entity\County $county
 * @property \App\Model\Entity\Group $group
 * @property \App\Model\Entity\Feedback[] $feedbacks
 * @property \App\Model\Entity\Pqmp[] $pqmps
 * @property \App\Model\Entity\SadrFollowup[] $sadr_followups
 * @property \App\Model\Entity\Sadr[] $sadrs
 */
class User extends Entity
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
        'designation_id' => true,
        //'county_id' => true,
        'username' => true,
        'password' => true,
        'confirm_password' => true,
        'name' => true,
        'email' => true,
        'group_id' => true,
        'name_of_institution' => true,
        'institution_address' => true,
        'institution_code' => true,
        'institution_contact' => true,
        'ward' => true,
        'phone_no' => true,
        'forgot_password' => true,
        'initial_email' => true,
        'is_active' => true,
        'is_admin' => true,
        'created' => true,
        'modified' => true,
        'designation' => true,
        //'county' => true,
        'group' => true,
        'feedbacks' => true,
        'pqmps' => true,
        'sadr_followups' => true,
        'sadrs' => true,
        'id' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    public function parentNode()
    {
        if (!$this->id) {
            return null;
        }
        if (isset($this->group_id)) {
            $groupId = $this->group_id;
        } else {
            $Users = TableRegistry::get('Users');
            $user = $Users->find('all', ['fields' => ['group_id']])->where(['id' => $this->id])->first();
            $groupId = $user->group_id;
        }
        if (!$groupId) {
            return null;
        }
        return ['Groups' => ['id' => $groupId]];
    }
}

