<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AffiliatesFixture
 */
class AffiliatesFixture extends TestFixture
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
                'user_id' => 1,
                'code' => 'Lorem ipsum dolor sit amet',
                'commission_rate' => 1.5,
                'status' => 'Lorem ipsum dolor sit ',
                'created' => '2026-02-19 11:14:40',
                'modified' => '2026-02-19 11:14:40',
            ],
        ];
        parent::init();
    }
}
