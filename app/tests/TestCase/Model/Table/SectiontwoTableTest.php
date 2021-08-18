<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SectiontwoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SectiontwoTable Test Case
 */
class SectiontwoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SectiontwoTable
     */
    protected $Sectiontwo;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Sectiontwo',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Sectiontwo') ? [] : ['className' => SectiontwoTable::class];
        $this->Sectiontwo = $this->getTableLocator()->get('Sectiontwo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Sectiontwo);

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
