<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ChangeKw Model
 *
 * @method \App\Model\Entity\ChangeKw newEmptyEntity()
 * @method \App\Model\Entity\ChangeKw newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ChangeKw[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ChangeKw get($primaryKey, $options = [])
 * @method \App\Model\Entity\ChangeKw findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ChangeKw patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ChangeKw[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ChangeKw|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ChangeKw saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ChangeKw[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ChangeKw[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ChangeKw[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ChangeKw[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ChangeKwTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('change_kw');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('ksiega.id')
            ->requirePresence('ksiega.id', 'create')
            ->notEmptyString('ksiega.id');

        $validator
            ->dateTime('last_checked')
            ->requirePresence('last_checked', 'create')
            ->notEmptyDateTime('last_checked');

        $validator
            ->scalar('string_dzial_drugi')
            ->requirePresence('string_dzial_drugi', 'create')
            ->notEmptyString('string_dzial_drugi');

        $validator
            ->integer('counter')
            ->requirePresence('counter', 'create')
            ->notEmptyString('counter');

        return $validator;
    }
}
