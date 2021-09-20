<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Changekw Entity
 *
 * @property int $id
 * @property int|null $getrecord_id
 * @property \Cake\I18n\FrozenTime $last_checked
 * @property string $string_dzial_drugi
 * @property int $counter
 * @property string $md5
 *
 * @property \App\Model\Entity\Getrecord $getrecord
 */
class Changekw extends Entity
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
        'getrecord_id' => true,
        'last_checked' => true,
        'string_dzial_drugi' => true,
        'counter' => true,
        'md5' => true,
        'getrecord' => true,
    ];
}
