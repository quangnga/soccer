<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;


use Cake\Auth\DefaultPasswordHasher;



/**
 * User Entity.
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $confirm_password
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $phone_number
 * @property string $token
 * @property int $club_id
 * @property \App\Model\Entity\Club $club
 * @property int $coming
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
        '*' => true,
        'id' => false,
    ];

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
        'token'
    ];
    
    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
          return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
