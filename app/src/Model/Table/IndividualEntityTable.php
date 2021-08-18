<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * IndividualEntity Model
 *
 * @method \App\Model\Entity\IndividualEntity newEmptyEntity()
 * @method \App\Model\Entity\IndividualEntity newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\IndividualEntity[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\IndividualEntity get($primaryKey, $options = [])
 * @method \App\Model\Entity\IndividualEntity findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\IndividualEntity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\IndividualEntity[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\IndividualEntity|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IndividualEntity saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IndividualEntity[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\IndividualEntity[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\IndividualEntity[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\IndividualEntity[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class IndividualEntityTable extends Table
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

        $this->setTable('individual_entity');
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
            ->scalar('imie_pierwsze')
            ->maxLength('imie_pierwsze', 50)
            ->requirePresence('imie_pierwsze', 'create')
            ->notEmptyString('imie_pierwsze');

        $validator
            ->scalar('imie_drugie')
            ->maxLength('imie_drugie', 50)
            ->requirePresence('imie_drugie', 'create')
            ->notEmptyString('imie_drugie');

        $validator
            ->scalar('nazwisko')
            ->maxLength('nazwisko', 50)
            ->requirePresence('nazwisko', 'create')
            ->notEmptyString('nazwisko');

        $validator
            ->scalar('drugi_cz_nazwiska')
            ->maxLength('drugi_cz_nazwiska', 50)
            ->requirePresence('drugi_cz_nazwiska', 'create')
            ->notEmptyString('drugi_cz_nazwiska');

        $validator
            ->scalar('imie_ojca')
            ->maxLength('imie_ojca', 50)
            ->requirePresence('imie_ojca', 'create')
            ->notEmptyString('imie_ojca');

        $validator
            ->scalar('imie_matki')
            ->maxLength('imie_matki', 50)
            ->requirePresence('imie_matki', 'create')
            ->notEmptyString('imie_matki');

        $validator
            ->integer('pesel')
            ->requirePresence('pesel', 'create')
            ->notEmptyString('pesel');

        return $validator;
    }
}
