<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ExecutionsFixture
 */
class ExecutionsFixture extends TestFixture
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
                'workflow_id' => 1,
                'triggered_by' => 'Lorem ipsum dolor sit amet',
                'idempotency_key' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ipsum dolor sit ',
                'request_payload' => '',
                'response_payload' => '',
                'error_message' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'attempt' => 1,
                'started_at' => '2026-02-19 11:14:30',
                'finished_at' => '2026-02-19 11:14:30',
                'created' => '2026-02-19 11:14:30',
                'modified' => '2026-02-19 11:14:30',
            ],
        ];
        parent::init();
    }
}
