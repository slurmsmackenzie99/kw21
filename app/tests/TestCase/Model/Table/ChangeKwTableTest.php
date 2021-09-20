<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChangekwTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChangekwTable Test Case
 */
class ChangekwTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChangekwTable
     */
    protected $Changekw;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Changekw',
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
        $config = $this->getTableLocator()->exists('Changekw') ? [] : ['className' => ChangekwTable::class];
        $this->Changekw = $this->getTableLocator()->get('Changekw', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Changekw);

        parent::tearDown();
    }
}
