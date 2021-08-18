<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SelfGov Entity
 *
 * @property int $id
 * @property int $ksiega_id
 * @property string $nazwa
 * @property string $siedziba
 * @property int $regon
 * @property string $nazwa_uprawnionego
 * @property string $siedziba_uprawnionego
 * @property string $regon_uprawnionego
 *
 * @property \App\Model\Entity\Ksiega $ksiega
 */
class SelfGov extends Entity
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
        'ksiega_id' => true,
        'nazwa' => true,
        'siedziba' => true,
        'regon' => true,
        'nazwa_uprawnionego' => true,
        'siedziba_uprawnionego' => true,
        'regon_uprawnionego' => true,
        'ksiega' => true,
    ];
}
