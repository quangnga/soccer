<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Club Entity.
 *
 * @property int $id
 * @property int $training_id
 * @property \App\Model\Entity\Training $training
 * @property string $club_name
 * @property int $phone1
 * @property int $phone2
 * @property string $address
 * @property string $city
 * @property \App\Model\Entity\User[] $users
 */
class Club extends Entity
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
}
