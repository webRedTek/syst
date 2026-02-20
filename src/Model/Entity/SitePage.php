<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SitePage Entity
 *
 * @property int $id
 * @property int $site_id
 * @property string $slug
 * @property string $title
 * @property string $status
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Site $site
 * @property \App\Model\Entity\PageVersion[] $page_versions
 */
class SitePage extends Entity
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
        'slug' => true,
        'title' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'site' => true,
        'page_versions' => true,
    ];
}
