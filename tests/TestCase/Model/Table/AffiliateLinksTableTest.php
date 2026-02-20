<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AffiliateLinksTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AffiliateLinksTable Test Case
 */
class AffiliateLinksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AffiliateLinksTable
     */
    protected $AffiliateLinks;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.AffiliateLinks',
        'app.Affiliates',
        'app.Sites',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('AffiliateLinks') ? [] : ['className' => AffiliateLinksTable::class];
        $this->AffiliateLinks = $this->getTableLocator()->get('AffiliateLinks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->AffiliateLinks);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\AffiliateLinksTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\AffiliateLinksTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
