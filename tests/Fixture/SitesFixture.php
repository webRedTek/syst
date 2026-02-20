<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SitesFixture
 */
class SitesFixture extends TestFixture
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
                'uuid' => 'Lorem ipsum dolor sit amet',
                'domain' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ipsum dolor sit ',
                'config' => '',
                'created' => '2026-02-19 11:13:10',
                'modified' => '2026-02-19 11:13:10',
            ],
        ];
        parent::init();
    }
}
