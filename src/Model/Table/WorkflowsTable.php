<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Workflows Model
 *
 * @property \App\Model\Table\SitesTable&\Cake\ORM\Association\BelongsTo $Sites
 * @property \App\Model\Table\ExecutionsTable&\Cake\ORM\Association\HasMany $Executions
 *
 * @method \App\Model\Entity\Workflow newEmptyEntity()
 * @method \App\Model\Entity\Workflow newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Workflow> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Workflow get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Workflow findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Workflow patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Workflow> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Workflow|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Workflow saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Workflow>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Workflow>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Workflow>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Workflow> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Workflow>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Workflow>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Workflow>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Workflow> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WorkflowsTable extends Table
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

        $this->setTable('workflows');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Sites', [
            'foreignKey' => 'site_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Executions', [
            'foreignKey' => 'workflow_id',
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
            ->scalar('name')
            ->maxLength('name', 160)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('engine')
            ->maxLength('engine', 32)
            ->requirePresence('engine', 'create')
            ->notEmptyString('engine');

        $validator
            ->scalar('external_workflow_id')
            ->maxLength('external_workflow_id', 160)
            ->allowEmptyString('external_workflow_id');

        $validator
            ->scalar('webhook_url')
            ->maxLength('webhook_url', 255)
            ->allowEmptyString('webhook_url');

        $validator
            ->allowEmptyString('config');

        $validator
            ->boolean('active')
            ->notEmptyString('active');

        $validator
            ->integer('version')
            ->notEmptyString('version');

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
        $rules->add($rules->isUnique(['site_id', 'name']), ['errorField' => 'site_id', 'message' => __('This combination of site_id and name already exists')]);
        $rules->add($rules->existsIn(['site_id'], 'Sites'), ['errorField' => 'site_id']);

        return $rules;
    }
}
