<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Treasury Model
 *
 * @method \App\Model\Entity\Treasury newEmptyEntity()
 * @method \App\Model\Entity\Treasury newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Treasury[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Treasury get($primaryKey, $options = [])
 * @method \App\Model\Entity\Treasury findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Treasury patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Treasury[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Treasury|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Treasury saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Treasury[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Treasury[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Treasury[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Treasury[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TreasuryTable extends Table
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

        $this->setTable('treasury');
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
            ->integer('lista_wskazan')
            ->requirePresence('lista_wskazan', 'create')
            ->notEmptyString('lista_wskazan');

        $validator
            ->scalar('nazwa')
            ->maxLength('nazwa', 200)
            ->requirePresence('nazwa', 'create')
            ->notEmptyString('nazwa');

        $validator
            ->scalar('siedziba')
            ->maxLength('siedziba', 200)
            ->requirePresence('siedziba', 'create')
            ->notEmptyString('siedziba');

        $validator
            ->integer('regon')
            ->requirePresence('regon', 'create')
            ->notEmptyString('regon');

        $validator
            ->scalar('stanprzejsciowy')
            ->maxLength('stanprzejsciowy', 40)
            ->requirePresence('stanprzejsciowy', 'create')
            ->notEmptyString('stanprzejsciowy');

        $validator
            ->integer('krs')
            ->requirePresence('krs', 'create')
            ->notEmptyString('krs');

        return $validator;
    }
}
