<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Changekw Model
 *
 * @property \App\Model\Table\GetrecordsTable&\Cake\ORM\Association\BelongsTo $Getrecords
 *
 * @method \App\Model\Entity\Changekw newEmptyEntity()
 * @method \App\Model\Entity\Changekw newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Changekw[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Changekw get($primaryKey, $options = [])
 * @method \App\Model\Entity\Changekw findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Changekw patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Changekw[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Changekw|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Changekw saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Changekw[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Changekw[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Changekw[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Changekw[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ChangekwTable extends Table
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

        $this->belongsTo('Getrecords', [
            'foreignKey' => 'getrecord_id',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

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

        $validator
            ->scalar('md5')
            ->maxLength('md5', 255)
            ->requirePresence('md5', 'create')
            ->notEmptyString('md5');

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
        $rules->add($rules->existsIn(['getrecord_id'], 'Getrecords'), ['errorField' => 'getrecord_id']);

        return $rules;
    }
}
