<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Treasury Entity
 *
 * @property int $id
 * @property int $lista_wskazan
 * @property string $nazwa
 * @property string $siedziba
 * @property int $regon
 * @property string $stanprzejsciowy
 * @property int $krs
 */
class Treasury extends Entity
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
        'lista_wskazan' => true,
        'nazwa' => true,
        'siedziba' => true,
        'regon' => true,
        'stanprzejsciowy' => true,
        'krs' => true,
    ];
}
