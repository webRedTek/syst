<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WebhookLogsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WebhookLogsTable Test Case
 */
class WebhookLogsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\WebhookLogsTable
     */
    protected $WebhookLogs;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.WebhookLogs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('WebhookLogs') ? [] : ['className' => WebhookLogsTable::class];
        $this->WebhookLogs = $this->getTableLocator()->get('WebhookLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->WebhookLogs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\WebhookLogsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
