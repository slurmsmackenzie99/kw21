<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersKwTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersKwTable Test Case
 */
class UsersKwTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersKwTable
     */
    protected $UsersKw;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.UsersKw',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('UsersKw') ? [] : ['className' => UsersKwTable::class];
        $this->UsersKw = $this->getTableLocator()->get('UsersKw', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->UsersKw);

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
