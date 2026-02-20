<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WebhookLogs Model
 *
 * @method \App\Model\Entity\WebhookLog newEmptyEntity()
 * @method \App\Model\Entity\WebhookLog newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\WebhookLog> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WebhookLog get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\WebhookLog findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\WebhookLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\WebhookLog> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\WebhookLog|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\WebhookLog saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\WebhookLog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\WebhookLog>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\WebhookLog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\WebhookLog> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\WebhookLog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\WebhookLog>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\WebhookLog>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\WebhookLog> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WebhookLogsTable extends Table
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

        $this->setTable('webhook_logs');
        $this->setDisplayField('direction');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('direction')
            ->maxLength('direction', 16)
            ->requirePresence('direction', 'create')
            ->notEmptyString('direction');

        $validator
            ->scalar('source')
            ->maxLength('source', 80)
            ->requirePresence('source', 'create')
            ->notEmptyString('source');

        $validator
            ->boolean('signature_valid')
            ->notEmptyString('signature_valid');

        $validator
            ->allowEmptyString('headers');

        $validator
            ->allowEmptyString('payload');

        $validator
            ->integer('response_code')
            ->allowEmptyString('response_code');

        return $validator;
    }
}
