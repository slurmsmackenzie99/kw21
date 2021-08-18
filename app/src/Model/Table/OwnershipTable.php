<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ownership Model
 *
 * @method \App\Model\Entity\Ownership newEmptyEntity()
 * @method \App\Model\Entity\Ownership newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Ownership[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ownership get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ownership findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Ownership patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ownership[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ownership|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ownership saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ownership[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ownership[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ownership[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Ownership[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class OwnershipTable extends Table
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

        $this->setTable('ownership');
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('numer_udzialu')
            ->requirePresence('numer_udzialu', 'create')
            ->notEmptyString('numer_udzialu');

        $validator
            ->integer('wielkosc_udzialu')
            ->requirePresence('wielkosc_udzialu', 'create')
            ->notEmptyString('wielkosc_udzialu');

        $validator
            ->scalar('rodzaj_wspolnosci')
            ->maxLength('rodzaj_wspolnosci', 20)
            ->requirePresence('rodzaj_wspolnosci', 'create')
            ->notEmptyString('rodzaj_wspolnosci');

        return $validator;
    }
}
