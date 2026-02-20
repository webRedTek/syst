<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AuditLogsFixture
 */
class AuditLogsFixture extends TestFixture
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
                'entity' => 'Lorem ipsum dolor sit amet',
                'entity_id' => 1,
                'action' => 'Lorem ipsum dolor sit amet',
                'before_state' => '',
                'after_state' => '',
                'created' => '2026-02-19 11:16:15',
            ],
        ];
        parent::init();
    }
}
