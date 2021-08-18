<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OwnershipTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OwnershipTable Test Case
 */
class OwnershipTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OwnershipTable
     */
    protected $Ownership;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Ownership',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Ownership') ? [] : ['className' => OwnershipTable::class];
        $this->Ownership = $this->getTableLocator()->get('Ownership', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Ownership);

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
