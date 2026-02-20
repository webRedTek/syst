<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Workflow Entity
 *
 * @property int $id
 * @property int $site_id
 * @property string $name
 * @property string $engine
 * @property string|null $external_workflow_id
 * @property string|null $webhook_url
 * @property array|null $config
 * @property bool $active
 * @property int $version
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Site $site
 * @property \App\Model\Entity\Execution[] $executions
 */
class Workflow extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'site_id' => true,
        'name' => true,
        'engine' => true,
        'external_workflow_id' => true,
        'webhook_url' => true,
        'config' => true,
        'active' => true,
        'version' => true,
        'created' => true,
        'modified' => true,
        'site' => true,
        'executions' => true,
    ];
}
