<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SectiontwoFixture
 */
class SectiontwoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'sectiontwo';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'two' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['two'], 'length' => []],
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
                'two' => 1,
            ],
        ];
        parent::init();
    }
}
