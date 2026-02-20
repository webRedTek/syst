<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SubscriptionsFixture
 */
class SubscriptionsFixture extends TestFixture
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
                'stripe_subscription_id' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ipsum dolor sit ',
                'plan' => 'Lorem ipsum dolor sit amet',
                'created' => '2026-02-19 11:15:33',
                'modified' => '2026-02-19 11:15:33',
            ],
        ];
        parent::init();
    }
}
