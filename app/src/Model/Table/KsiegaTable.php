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
 * @property \App\Model\Table\SelfGovTable&\Cake\ORM\Association\HasMany $SelfGov
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
        $this->setPrimaryKey('id');

        // $this->hasMany('SelfGov', [
        //     'foreignKey' => 'ksiega_id',
        // ]);
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
            ->integer('idKsiega')
            // ->requirePresence('idKsiega', 'create')
            ->notEmptyString('idKsiega')
            ->add('idKsiega', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('clientID')
            ->requirePresence('clientID', 'create')
            ->notEmptyString('clientID');

        $validator
            ->scalar('region')
            ->maxLength('region', 20)
            ->requirePresence('region', 'create')
            ->notEmptyString('region');

        $validator
            // ->nonNegativeInteger('number')
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
        $rules->add($rules->isUnique(['idKsiega']), ['errorField' => 'idKsiega']);

        return $rules;
    }
}
