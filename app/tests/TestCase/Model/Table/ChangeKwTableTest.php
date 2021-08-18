<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChangeKwTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChangeKwTable Test Case
 */
class ChangeKwTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChangeKwTable
     */
    protected $ChangeKw;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ChangeKw',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ChangeKw') ? [] : ['className' => ChangeKwTable::class];
        $this->ChangeKw = $this->getTableLocator()->get('ChangeKw', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ChangeKw);

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
