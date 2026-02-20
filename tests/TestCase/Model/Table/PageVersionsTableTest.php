<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PageVersionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PageVersionsTable Test Case
 */
class PageVersionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PageVersionsTable
     */
    protected $PageVersions;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.PageVersions',
        'app.SitePages',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PageVersions') ? [] : ['className' => PageVersionsTable::class];
        $this->PageVersions = $this->getTableLocator()->get('PageVersions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PageVersions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\PageVersionsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\PageVersionsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
