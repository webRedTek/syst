<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Executions Model
 *
 * @property \App\Model\Table\WorkflowsTable&\Cake\ORM\Association\BelongsTo $Workflows
 *
 * @method \App\Model\Entity\Execution newEmptyEntity()
 * @method \App\Model\Entity\Execution newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Execution> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Execution get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Execution findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Execution patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Execution> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Execution|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Execution saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Execution>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Execution>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Execution>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Execution> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Execution>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Execution>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Execution>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Execution> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ExecutionsTable extends Table
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

        $this->setTable('executions');
        $this->setDisplayField('triggered_by');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Workflows', [
            'foreignKey' => 'workflow_id',
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
            ->nonNegativeInteger('workflow_id')
            ->notEmptyString('workflow_id');

        $validator
            ->scalar('triggered_by')
            ->maxLength('triggered_by', 32)
            ->requirePresence('triggered_by', 'create')
            ->notEmptyString('triggered_by');

        $validator
            ->scalar('idempotency_key')
            ->maxLength('idempotency_key', 160)
            ->allowEmptyString('idempotency_key')
            ->add('idempotency_key', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('status')
            ->maxLength('status', 24)
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->allowEmptyString('request_payload');

        $validator
            ->allowEmptyString('response_payload');

        $validator
            ->scalar('error_message')
            ->allowEmptyString('error_message');

        $validator
            ->integer('attempt')
            ->notEmptyString('attempt');

        $validator
            ->dateTime('started_at')
            ->allowEmptyDateTime('started_at');

        $validator
            ->dateTime('finished_at')
            ->allowEmptyDateTime('finished_at');

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
        $rules->add($rules->isUnique(['idempotency_key'], ['allowMultipleNulls' => true]), ['errorField' => 'idempotency_key']);
        $rules->add($rules->existsIn(['workflow_id'], 'Workflows'), ['errorField' => 'workflow_id']);

        return $rules;
    }
}
