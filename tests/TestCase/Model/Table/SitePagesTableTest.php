<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SitePagesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SitePagesTable Test Case
 */
class SitePagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SitePagesTable
     */
    protected $SitePages;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.SitePages',
        'app.Sites',
        'app.PageVersions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('SitePages') ? [] : ['className' => SitePagesTable::class];
        $this->SitePages = $this->getTableLocator()->get('SitePages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->SitePages);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\SitePagesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\SitePagesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
