<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Site Entity
 *
 * @property int $id
 * @property string $uuid
 * @property string $domain
 * @property string $status
 * @property array|null $config
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\AffiliateLink[] $affiliate_links
 * @property \App\Model\Entity\Payment[] $payments
 * @property \App\Model\Entity\Project[] $projects
 * @property \App\Model\Entity\SitePage[] $site_pages
 * @property \App\Model\Entity\Workflow[] $workflows
 */
class Site extends Entity
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
        'uuid' => true,
        'domain' => true,
        'status' => true,
        'config' => true,
        'created' => true,
        'modified' => true,
        'affiliate_links' => true,
        'payments' => true,
        'projects' => true,
        'site_pages' => true,
        'workflows' => true,
    ];
}
