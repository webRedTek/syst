<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property int $id
 * @property int $site_id
 * @property int $user_id
 * @property string $stripe_payment_id
 * @property string $amount
 * @property string $currency
 * @property string $status
 * @property array|null $metadata
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Site $site
 * @property \App\Model\Entity\User $user
 */
class Payment extends Entity
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
        'user_id' => true,
        'stripe_payment_id' => true,
        'amount' => true,
        'currency' => true,
        'status' => true,
        'metadata' => true,
        'created' => true,
        'modified' => true,
        'site' => true,
        'user' => true,
    ];
}
