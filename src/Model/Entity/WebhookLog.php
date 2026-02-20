<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WebhookLog Entity
 *
 * @property int $id
 * @property string $direction
 * @property string $source
 * @property bool $signature_valid
 * @property array|null $headers
 * @property array|null $payload
 * @property int|null $response_code
 * @property \Cake\I18n\DateTime $created
 */
class WebhookLog extends Entity
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
        'direction' => true,
        'source' => true,
        'signature_valid' => true,
        'headers' => true,
        'payload' => true,
        'response_code' => true,
        'created' => true,
    ];
}
