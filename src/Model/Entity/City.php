<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * City Entity.
 *
 * @property int $id
 * @property int $club_id
 * @property \App\Model\Entity\Club $club
 * @property string $city_name
 * @property string $region_name
 */
class City extends Entity
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
