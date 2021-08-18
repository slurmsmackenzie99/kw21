<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sectiontwo Model
 *
 * @method \App\Model\Entity\Sectiontwo newEmptyEntity()
 * @method \App\Model\Entity\Sectiontwo newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Sectiontwo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sectiontwo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sectiontwo findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Sectiontwo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sectiontwo[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sectiontwo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sectiontwo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sectiontwo[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sectiontwo[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sectiontwo[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sectiontwo[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SectiontwoTable extends Table
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

        $this->setTable('sectiontwo');
        $this->setDisplayField('two');
        $this->setPrimaryKey('two');
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
            ->integer('two')
            ->allowEmptyString('two', null, 'create');

        return $validator;
    }
}
