<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * WebhookLogsFixture
 */
class WebhookLogsFixture extends TestFixture
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
                'direction' => 'Lorem ipsum do',
                'source' => 'Lorem ipsum dolor sit amet',
                'signature_valid' => 1,
                'headers' => '',
                'payload' => '',
                'response_code' => 1,
                'created' => '2026-02-19 11:15:54',
            ],
        ];
        parent::init();
    }
}
