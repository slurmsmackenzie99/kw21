<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Getrecord Entity
 *
 * @property int $id
 * @property int $client_id
 * @property string $region
 * @property string $number
 * @property int $control_number
 * @property int $done
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Changekw[] $change_kw
 * @property \App\Model\Entity\ClientsKw[] $clients_kw
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
        'client_id' => true,
        'region' => true,
        'number' => true,
        'control_number' => true,
        'done' => true,
        'created' => true,
        'client' => true,
        'change_kw' => true,
        'clients_kw' => true,
    ];
}
