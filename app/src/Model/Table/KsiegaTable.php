<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ksiega Model
 *
 * @method \App\Model\Entity\Ksiega newEmptyEntity()
 * @method \App\Model\Entity\Ksiega newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Ksiega[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ksiega get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ksiega findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Ksiega patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ksiega[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ksiega|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ksiega saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ksiega[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ksiega[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ksiega[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ksiega[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class KsiegaTable extends Table
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

        $this->setTable('ksiega');
        $this->setDisplayField('idKsiega');
        $this->setPrimaryKey('idKsiega');

        $this->hasMany('SelfGov', [
            'foreignKey' => 'ksiega_id',
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
            ->integer('userID')
            ->requirePresence('userID', 'create')
            ->notEmptyString('userID')
            ->add('userID', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('id')
            ->requirePresence('id', 'create')
            ->notEmptyString('id')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('idKsiega')
            ->allowEmptyString('idKsiega', null, 'create');

        $validator
            ->scalar('region')
            ->maxLength('region', 20)
            ->requirePresence('region', 'create')
            ->notEmptyString('region');

        $validator
            ->integer('number')
            ->requirePresence('number', 'create')
            ->notEmptyString('number');

        $validator
            ->integer('control_number')
            ->requirePresence('control_number', 'create')
            ->notEmptyString('control_number');

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
        $rules->add($rules->isUnique(['id']), ['errorField' => 'id']);
        $rules->add($rules->isUnique(['userID']), ['errorField' => 'userID']);

        return $rules;
    }
}
