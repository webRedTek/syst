<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Affiliates Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\AffiliateLinksTable&\Cake\ORM\Association\HasMany $AffiliateLinks
 *
 * @method \App\Model\Entity\Affiliate newEmptyEntity()
 * @method \App\Model\Entity\Affiliate newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Affiliate> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Affiliate get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Affiliate findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Affiliate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Affiliate> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Affiliate|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Affiliate saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Affiliate>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Affiliate>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Affiliate>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Affiliate> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Affiliate>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Affiliate>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Affiliate>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Affiliate> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AffiliatesTable extends Table
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

        $this->setTable('affiliates');
        $this->setDisplayField('code');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('AffiliateLinks', [
            'foreignKey' => 'affiliate_id',
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
            ->nonNegativeInteger('user_id')
            ->notEmptyString('user_id');

        $validator
            ->scalar('code')
            ->maxLength('code', 80)
            ->requirePresence('code', 'create')
            ->notEmptyString('code')
            ->add('code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->decimal('commission_rate')
            ->notEmptyString('commission_rate');

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
        $rules->add($rules->isUnique(['code']), ['errorField' => 'code']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
