<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ksiega Entity
 *
 * @property int $id
 * @property int $clientID
 * @property string $region
 * @property int $number
 * @property int $control_number
 */
class Ksiega extends Entity
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
        'clientID' => true,
        'region' => true,
        'number' => true,
        'control_number' => true,
    ];
}
