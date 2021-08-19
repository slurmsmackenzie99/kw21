<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KsiegaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KsiegaTable Test Case
 */
class KsiegaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\KsiegaTable
     */
    protected $Ksiega;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Ksiega',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Ksiega') ? [] : ['className' => KsiegaTable::class];
        $this->Ksiega = $this->getTableLocator()->get('Ksiega', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Ksiega);

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
