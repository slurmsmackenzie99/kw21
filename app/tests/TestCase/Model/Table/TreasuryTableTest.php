<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TreasuryTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TreasuryTable Test Case
 */
class TreasuryTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TreasuryTable
     */
    protected $Treasury;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Treasury',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Treasury') ? [] : ['className' => TreasuryTable::class];
        $this->Treasury = $this->getTableLocator()->get('Treasury', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Treasury);

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
}
