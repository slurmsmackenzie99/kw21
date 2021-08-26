<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClientsKwTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClientsKwTable Test Case
 */
class ClientsKwTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClientsKwTable
     */
    protected $ClientsKw;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ClientsKw',
        'app.Clients',
        'app.Getrecords',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ClientsKw') ? [] : ['className' => ClientsKwTable::class];
        $this->ClientsKw = $this->getTableLocator()->get('ClientsKw', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ClientsKw);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
