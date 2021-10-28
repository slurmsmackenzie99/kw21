<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $id
 * @property string $username
 * @property string $client_email
 * @property string $last_name
 * @property int $telephone_number
 * @property string $company_name
 *
 * @property \App\Model\Entity\ClientsKw[] $clients_kw
 * @property \App\Model\Entity\Getrecord[] $getrecords
 * @property \App\Model\Entity\Result[] $results
 */
class Client extends Entity
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
        'username' => true,
        'client_email' => true,
        'last_name' => true,
        'telephone_number' => true,
        'company_name' => true,
        'clients_kw' => true,
        'getrecords' => true,
        'results' => true,
    ];
}
