<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AffiliateLink Entity
 *
 * @property int $id
 * @property int $affiliate_id
 * @property int $site_id
 * @property string $slug
 * @property array|null $tracking_data
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Affiliate $affiliate
 * @property \App\Model\Entity\Site $site
 */
class AffiliateLink extends Entity
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
        'affiliate_id' => true,
        'site_id' => true,
        'slug' => true,
        'tracking_data' => true,
        'created' => true,
        'modified' => true,
        'affiliate' => true,
        'site' => true,
    ];
}
