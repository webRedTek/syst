<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AffiliateLinksFixture
 */
class AffiliateLinksFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'affiliate_id' => 1,
                'site_id' => 1,
                'slug' => 'Lorem ipsum dolor sit amet',
                'tracking_data' => '',
                'created' => '2026-02-19 11:14:51',
                'modified' => '2026-02-19 11:14:51',
            ],
        ];
        parent::init();
    }
}
