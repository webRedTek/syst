<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PageVersion Entity
 *
 * @property int $id
 * @property int $site_page_id
 * @property string|null $html
 * @property string|null $css
 * @property string|null $js
 * @property bool $active
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\SitePage $site_page
 */
class PageVersion extends Entity
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
        'site_page_id' => true,
        'html' => true,
        'css' => true,
        'js' => true,
        'active' => true,
        'created' => true,
        'modified' => true,
        'site_page' => true,
    ];
}
