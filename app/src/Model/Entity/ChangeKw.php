<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ChangeKw Entity
 *
 * @property int $id
 * @property int $ksiega.id
 * @property \Cake\I18n\FrozenTime $last_checked
 * @property string $string_dzial_drugi
 * @property int $counter
 */
class ChangeKw extends Entity
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
        'ksiega.id' => true,
        'last_checked' => true,
        'string_dzial_drugi' => true,
        'counter' => true,
    ];
}
