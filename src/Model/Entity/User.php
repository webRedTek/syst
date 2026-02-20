<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property int $role_id
 * @property string $status
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Affiliate[] $affiliates
 * @property \App\Model\Entity\AuditLog[] $audit_logs
 * @property \App\Model\Entity\Payment[] $payments
 * @property \App\Model\Entity\Subscription[] $subscriptions
 */
class User extends Entity
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
        'email' => true,
        'password' => true,
        'role_id' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'role' => true,
        'affiliates' => true,
        'audit_logs' => true,
        'payments' => true,
        'subscriptions' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected array $_hidden = [
        'password',
    ];
}
