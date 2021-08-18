<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SelfGov Model
 *
 * @property \App\Model\Table\KsiegasTable&\Cake\ORM\Association\BelongsTo $Ksiegas
 *
 * @method \App\Model\Entity\SelfGov newEmptyEntity()
 * @method \App\Model\Entity\SelfGov newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\SelfGov[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SelfGov get($primaryKey, $options = [])
 * @method \App\Model\Entity\SelfGov findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\SelfGov patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SelfGov[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SelfGov|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SelfGov saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SelfGov[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SelfGov[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\SelfGov[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SelfGov[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SelfGovTable extends Table
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

        $this->setTable('self_gov');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Ksiegas', [
            'foreignKey' => 'ksiega_id',
            'joinType' => 'INNER',
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
            ->scalar('nazwa')
            ->maxLength('nazwa', 100)
            ->requirePresence('nazwa', 'create')
            ->notEmptyString('nazwa');

        $validator
            ->scalar('siedziba')
            ->maxLength('siedziba', 100)
            ->requirePresence('siedziba', 'create')
            ->notEmptyString('siedziba');

        $validator
            ->integer('regon')
            ->requirePresence('regon', 'create')
            ->notEmptyString('regon');

        $validator
            ->scalar('nazwa_uprawnionego')
            ->maxLength('nazwa_uprawnionego', 100)
            ->requirePresence('nazwa_uprawnionego', 'create')
            ->notEmptyString('nazwa_uprawnionego');

        $validator
            ->scalar('siedziba_uprawnionego')
            ->maxLength('siedziba_uprawnionego', 100)
            ->requirePresence('siedziba_uprawnionego', 'create')
            ->notEmptyString('siedziba_uprawnionego');

        $validator
            ->scalar('regon_uprawnionego')
            ->maxLength('regon_uprawnionego', 100)
            ->requirePresence('regon_uprawnionego', 'create')
            ->notEmptyString('regon_uprawnionego');

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
        $rules->add($rules->existsIn(['ksiega_id'], 'Ksiegas'), ['errorField' => 'ksiega_id']);

        return $rules;
    }
}
