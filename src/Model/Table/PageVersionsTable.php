<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PageVersions Model
 *
 * @property \App\Model\Table\SitePagesTable&\Cake\ORM\Association\BelongsTo $SitePages
 *
 * @method \App\Model\Entity\PageVersion newEmptyEntity()
 * @method \App\Model\Entity\PageVersion newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\PageVersion> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PageVersion get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\PageVersion findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\PageVersion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\PageVersion> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PageVersion|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\PageVersion saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\PageVersion>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PageVersion>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\PageVersion>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PageVersion> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\PageVersion>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PageVersion>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\PageVersion>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\PageVersion> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PageVersionsTable extends Table
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

        $this->setTable('page_versions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('SitePages', [
            'foreignKey' => 'site_page_id',
            'joinType' => 'INNER',
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
            ->nonNegativeInteger('site_page_id')
            ->notEmptyString('site_page_id');

        $validator
            ->scalar('html')
            ->maxLength('html', 4294967295)
            ->allowEmptyString('html');

        $validator
            ->scalar('css')
            ->maxLength('css', 4294967295)
            ->allowEmptyString('css');

        $validator
            ->scalar('js')
            ->maxLength('js', 4294967295)
            ->allowEmptyString('js');

        $validator
            ->boolean('active')
            ->notEmptyString('active');

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
        $rules->add($rules->existsIn(['site_page_id'], 'SitePages'), ['errorField' => 'site_page_id']);

        return $rules;
    }
}
