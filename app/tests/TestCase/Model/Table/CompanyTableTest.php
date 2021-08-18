<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompanyTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompanyTable Test Case
 */
class CompanyTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CompanyTable
     */
    protected $Company;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Company',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Company') ? [] : ['className' => CompanyTable::class];
        $this->Company = $this->getTableLocator()->get('Company', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Company);

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
