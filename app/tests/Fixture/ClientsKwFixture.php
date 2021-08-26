<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ClientsKwFixture
 */
class ClientsKwFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'clients_kw';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'client_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'getrecords_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'clientID' => ['type' => 'index', 'columns' => ['client_id'], 'length' => []],
            'getrecords_id' => ['type' => 'index', 'columns' => ['getrecords_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'clients_kw_ibfk_6' => ['type' => 'foreign', 'columns' => ['getrecords_id'], 'references' => ['getrecords', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'clients_kw_ibfk_4' => ['type' => 'foreign', 'columns' => ['client_id'], 'references' => ['clients', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'id' => 1,
                'client_id' => 1,
                'getrecords_id' => 1,
            ],
        ];
        parent::init();
    }
}
