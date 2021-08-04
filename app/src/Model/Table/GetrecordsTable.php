<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Getrecords Model
 *
 * @method \App\Model\Entity\Getrecord newEmptyEntity()
 * @method \App\Model\Entity\Getrecord newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Getrecord[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Getrecord get($primaryKey, $options = [])
 * @method \App\Model\Entity\Getrecord findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Getrecord patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Getrecord[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Getrecord|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Getrecord saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Getrecord[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Getrecord[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Getrecord[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Getrecord[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GetrecordsTable extends Table
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

        $this->setTable('getrecords');
        $this->setDisplayField('id');
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('region')
            ->maxLength('region', 20)
            ->requirePresence('region', 'create')
            ->notEmptyString('region');

        $validator
            ->requirePresence('kw', 'create')
            ->notEmptyString('kw');

        $validator
            ->requirePresence('digit', 'create')
            ->notEmptyString('digit');

        $validator
            ->boolean('checked')
            ->notEmptyString('checked');

        return $validator;
    }
}
