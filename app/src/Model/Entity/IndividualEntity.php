<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * IndividualEntity Entity
 *
 * @property int $id
 * @property string $imie_pierwsze
 * @property string $imie_drugie
 * @property string $nazwisko
 * @property string $drugi_cz_nazwiska
 * @property string $imie_ojca
 * @property string $imie_matki
 * @property int $pesel
 */
class IndividualEntity extends Entity
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
        'imie_pierwsze' => true,
        'imie_drugie' => true,
        'nazwisko' => true,
        'drugi_cz_nazwiska' => true,
        'imie_ojca' => true,
        'imie_matki' => true,
        'pesel' => true,
    ];
}
