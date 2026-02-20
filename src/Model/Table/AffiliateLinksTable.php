<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AffiliateLinks Model
 *
 * @property \App\Model\Table\AffiliatesTable&\Cake\ORM\Association\BelongsTo $Affiliates
 * @property \App\Model\Table\SitesTable&\Cake\ORM\Association\BelongsTo $Sites
 *
 * @method \App\Model\Entity\AffiliateLink newEmptyEntity()
 * @method \App\Model\Entity\AffiliateLink newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\AffiliateLink> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AffiliateLink get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\AffiliateLink findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\AffiliateLink patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\AffiliateLink> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AffiliateLink|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\AffiliateLink saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\AffiliateLink>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AffiliateLink>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AffiliateLink>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AffiliateLink> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AffiliateLink>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AffiliateLink>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\AffiliateLink>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\AffiliateLink> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AffiliateLinksTable extends Table
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

        $this->setTable('affiliate_links');
        $this->setDisplayField('slug');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Affiliates', [
            'foreignKey' => 'affiliate_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Sites', [
            'foreignKey' => 'site_id',
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
            ->nonNegativeInteger('affiliate_id')
            ->notEmptyString('affiliate_id');

        $validator
            ->nonNegativeInteger('site_id')
            ->notEmptyString('site_id');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 160)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug');

        $validator
            ->allowEmptyString('tracking_data');

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
        $rules->add($rules->existsIn(['affiliate_id'], 'Affiliates'), ['errorField' => 'affiliate_id']);
        $rules->add($rules->existsIn(['site_id'], 'Sites'), ['errorField' => 'site_id']);

        return $rules;
    }
}
