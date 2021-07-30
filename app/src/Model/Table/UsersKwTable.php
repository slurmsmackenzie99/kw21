<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsersKw Model
 *
 * @method \App\Model\Entity\UsersKw newEmptyEntity()
 * @method \App\Model\Entity\UsersKw newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\UsersKw[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsersKw get($primaryKey, $options = [])
 * @method \App\Model\Entity\UsersKw findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\UsersKw patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UsersKw[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsersKw|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsersKw saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsersKw[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UsersKw[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\UsersKw[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UsersKw[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsersKwTable extends Table
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

        $this->setTable('users_kw');
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
            ->notEmptyString('userID');

        $validator
            ->integer('ksiegaID')
            ->requirePresence('ksiegaID', 'create')
            ->notEmptyString('ksiegaID');

        return $validator;
    }
}
