<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TasksFixture
 */
class TasksFixture extends TestFixture
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
                'project_id' => 1,
                'type' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ipsum dolor sit ',
                'priority' => 1,
                'payload' => '',
                'result' => '',
                'score' => 1.5,
                'created' => '2026-02-19 11:14:06',
                'modified' => '2026-02-19 11:14:06',
            ],
        ];
        parent::init();
    }
}
