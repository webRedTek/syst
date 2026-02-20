<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SystemSecrets Model
 *
 * @method \App\Model\Entity\SystemSecret newEmptyEntity()
 * @method \App\Model\Entity\SystemSecret newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\SystemSecret> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SystemSecret get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\SystemSecret findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\SystemSecret patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\SystemSecret> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SystemSecret|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\SystemSecret saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\SystemSecret>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SystemSecret>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SystemSecret>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SystemSecret> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SystemSecret>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SystemSecret>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SystemSecret>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SystemSecret> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SystemSecretsTable extends Table
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

        $this->setTable('system_secrets');
        $this->setDisplayField('name');
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
            ->scalar('name')
            ->maxLength('name', 80)
            ->requirePresence('name', 'create')
            ->notEmptyString('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('value')
            ->maxLength('value', 255)
            ->requirePresence('value', 'create')
            ->notEmptyString('value');

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
        $rules->add($rules->isUnique(['name']), ['errorField' => 'name']);

        return $rules;
    }
}
