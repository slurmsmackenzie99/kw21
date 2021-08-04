<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Getrecord Entity
 *
 * @property int $id
 * @property string $region
 * @property int $kw
 * @property int $digit
 * @property bool $checked
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Getrecord extends Entity
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
        'region' => true,
        'kw' => true,
        'digit' => true,
        'checked' => true,
        'created' => true,
        'modified' => true,
    ];
}
