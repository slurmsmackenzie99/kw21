<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IndividualEntityTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IndividualEntityTable Test Case
 */
class IndividualEntityTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\IndividualEntityTable
     */
    protected $IndividualEntity;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.IndividualEntity',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('IndividualEntity') ? [] : ['className' => IndividualEntityTable::class];
        $this->IndividualEntity = $this->getTableLocator()->get('IndividualEntity', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->IndividualEntity);

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
