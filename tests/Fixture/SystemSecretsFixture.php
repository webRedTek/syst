<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SystemSecretsFixture
 */
class SystemSecretsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'value' => 'Lorem ipsum dolor sit amet',
                'active' => 1,
                'created' => '2026-02-19 11:16:05',
                'modified' => '2026-02-19 11:16:05',
            ],
        ];
        parent::init();
    }
}
