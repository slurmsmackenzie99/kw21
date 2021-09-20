<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GetrecordsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GetrecordsTable Test Case
 */
class GetrecordsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GetrecordsTable
     */
    protected $Getrecords;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Getrecords',
        'app.Clients',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Getrecords') ? [] : ['className' => GetrecordsTable::class];
        $this->Getrecords = $this->getTableLocator()->get('Getrecords', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Getrecords);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\GetrecordsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\GetrecordsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
