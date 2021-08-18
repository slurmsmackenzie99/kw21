<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SelfGovTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SelfGovTable Test Case
 */
class SelfGovTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SelfGovTable
     */
    protected $SelfGov;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.SelfGov',
        'app.Ksiegas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('SelfGov') ? [] : ['className' => SelfGovTable::class];
        $this->SelfGov = $this->getTableLocator()->get('SelfGov', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->SelfGov);

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
