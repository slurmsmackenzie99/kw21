<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersKwFixture
 */
class UsersKwFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'users_kw';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'userID' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ksiegaID' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'userID' => ['type' => 'index', 'columns' => ['userID'], 'length' => []],
            'ksiegaID' => ['type' => 'index', 'columns' => ['ksiegaID'], 'length' => []],
        ],
        '_constraints' => [
            'users_kw_ibfk_2' => ['type' => 'foreign', 'columns' => ['ksiegaID'], 'references' => ['ksiega', 'idKsiega'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'users_kw_ibfk_1' => ['type' => 'foreign', 'columns' => ['userID'], 'references' => ['user', 'userID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'userID' => 1,
                'ksiegaID' => 1,
            ],
        ];
        parent::init();
    }
}
