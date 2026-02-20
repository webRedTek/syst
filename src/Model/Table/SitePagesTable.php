<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SitePages Model
 *
 * @property \App\Model\Table\SitesTable&\Cake\ORM\Association\BelongsTo $Sites
 * @property \App\Model\Table\PageVersionsTable&\Cake\ORM\Association\HasMany $PageVersions
 *
 * @method \App\Model\Entity\SitePage newEmptyEntity()
 * @method \App\Model\Entity\SitePage newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\SitePage> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SitePage get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\SitePage findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\SitePage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\SitePage> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SitePage|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\SitePage saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\SitePage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SitePage>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SitePage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SitePage> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SitePage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SitePage>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SitePage>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SitePage> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SitePagesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('site_pages');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Sites', [
            'foreignKey' => 'site_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('PageVersions', [
            'foreignKey' => 'site_page_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->nonNegativeInteger('site_id')
            ->notEmptyString('site_id');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 160)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('status')
            ->maxLength('status', 24)
            ->notEmptyString('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['site_id', 'slug']), ['errorField' => 'site_id', 'message' => __('This combination of site_id and slug already exists')]);
        $rules->add($rules->existsIn(['site_id'], 'Sites'), ['errorField' => 'site_id']);

        return $rules;
    }
}
