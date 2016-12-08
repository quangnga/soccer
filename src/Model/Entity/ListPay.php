<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Acl Entity.
 *
 * @property int $id * @property int $user_id * @property \App\Model\Entity\User $user * @property string $page_name * @property bool $childcare_centres * @property bool $daily_worksheets * @property bool $archive * @property bool $users * @property bool $messages * @property bool $content_manger * @property \App\Model\Entity\AclUser[] $acl_user */
class ListPay extends Entity
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
