<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SystemSecretsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SystemSecretsTable Test Case
 */
class SystemSecretsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SystemSecretsTable
     */
    protected $SystemSecrets;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.SystemSecrets',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('SystemSecrets') ? [] : ['className' => SystemSecretsTable::class];
        $this->SystemSecrets = $this->getTableLocator()->get('SystemSecrets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->SystemSecrets);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\SystemSecretsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\SystemSecretsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
