<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Execution Entity
 *
 * @property int $id
 * @property int $workflow_id
 * @property string $triggered_by
 * @property string|null $idempotency_key
 * @property string $status
 * @property array|null $request_payload
 * @property array|null $response_payload
 * @property string|null $error_message
 * @property int $attempt
 * @property \Cake\I18n\DateTime|null $started_at
 * @property \Cake\I18n\DateTime|null $finished_at
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Workflow $workflow
 */
class Execution extends Entity
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
        'workflow_id' => true,
        'triggered_by' => true,
        'idempotency_key' => true,
        'status' => true,
        'request_payload' => true,
        'response_payload' => true,
        'error_message' => true,
        'attempt' => true,
        'started_at' => true,
        'finished_at' => true,
        'created' => true,
        'modified' => true,
        'workflow' => true,
    ];
}
