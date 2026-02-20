<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sites Model
 *
 * @property \App\Model\Table\AffiliateLinksTable&\Cake\ORM\Association\HasMany $AffiliateLinks
 * @property \App\Model\Table\PaymentsTable&\Cake\ORM\Association\HasMany $Payments
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\HasMany $Projects
 * @property \App\Model\Table\SitePagesTable&\Cake\ORM\Association\HasMany $SitePages
 * @property \App\Model\Table\WorkflowsTable&\Cake\ORM\Association\HasMany $Workflows
 *
 * @method \App\Model\Entity\Site newEmptyEntity()
 * @method \App\Model\Entity\Site newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Site> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Site get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Site findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Site patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Site> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Site|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Site saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Site>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Site>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Site>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Site> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Site>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Site>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Site>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Site> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SitesTable extends Table
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

        $this->setTable('sites');
        $this->setDisplayField('uuid');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('AffiliateLinks', [
            'foreignKey' => 'site_id',
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'site_id',
        ]);
        $this->hasMany('Projects', [
            'foreignKey' => 'site_id',
        ]);
        $this->hasMany('SitePages', [
            'foreignKey' => 'site_id',
        ]);
        $this->hasMany('Workflows', [
            'foreignKey' => 'site_id',
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
            ->scalar('uuid')
            ->maxLength('uuid', 64)
            ->requirePresence('uuid', 'create')
            ->notEmptyString('uuid')
            ->add('uuid', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('domain')
            ->maxLength('domain', 160)
            ->requirePresence('domain', 'create')
            ->notEmptyString('domain')
            ->add('domain', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('status')
            ->maxLength('status', 24)
            ->notEmptyString('status');

        $validator
            ->allowEmptyString('config');

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
        $rules->add($rules->isUnique(['uuid']), ['errorField' => 'uuid']);
        $rules->add($rules->isUnique(['domain']), ['errorField' => 'domain']);

        return $rules;
    }
}
