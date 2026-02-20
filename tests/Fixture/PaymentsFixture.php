<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PaymentsFixture
 */
class PaymentsFixture extends TestFixture
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
                'site_id' => 1,
                'user_id' => 1,
                'stripe_payment_id' => 'Lorem ipsum dolor sit amet',
                'amount' => 1.5,
                'currency' => 'Lorem ip',
                'status' => 'Lorem ipsum dolor sit ',
                'metadata' => '',
                'created' => '2026-02-19 11:15:23',
                'modified' => '2026-02-19 11:15:23',
            ],
        ];
        parent::init();
    }
}
