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
 * @property \App\Model\Table\ClientsTable&\Cake\ORM\Association\BelongsTo $Clients
 * @property \App\Model\Table\ChangekwTable&\Cake\ORM\Association\HasMany $ChangeKw
 * @property \App\Model\Table\ClientsKwTable&\Cake\ORM\Association\HasMany $ClientsKw
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

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('ChangeKw', [
            'foreignKey' => 'getrecord_id',
        ]);
        $this->hasMany('ClientsKw', [
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
            ->scalar('region')
            ->maxLength('region', 20)
            ->requirePresence('region', 'create')
            ->notEmptyString('region');

        $validator
            ->scalar('number')
            ->maxLength('number', 20)
            ->requirePresence('number', 'create')
            ->notEmptyString('number');

        $validator
            ->integer('control_number')
            ->requirePresence('control_number', 'create')
            ->notEmptyString('control_number');

        $validator
            ->integer('done')
            ->notEmptyString('done');

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
        $rules->add($rules->existsIn(['client_id'], 'Clients'), ['errorField' => 'client_id']);

        return $rules;
    }
}
