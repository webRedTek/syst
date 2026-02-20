<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * WorkflowsFixture
 */
class WorkflowsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'engine' => 'Lorem ipsum dolor sit amet',
                'external_workflow_id' => 'Lorem ipsum dolor sit amet',
                'webhook_url' => 'Lorem ipsum dolor sit amet',
                'config' => '',
                'active' => 1,
                'version' => 1,
                'created' => '2026-02-19 11:14:19',
                'modified' => '2026-02-19 11:14:19',
            ],
        ];
        parent::init();
    }
}
