<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExecutionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExecutionsTable Test Case
 */
class ExecutionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExecutionsTable
     */
    protected $Executions;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Executions',
        'app.Workflows',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Executions') ? [] : ['className' => ExecutionsTable::class];
        $this->Executions = $this->getTableLocator()->get('Executions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Executions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ExecutionsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\ExecutionsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
