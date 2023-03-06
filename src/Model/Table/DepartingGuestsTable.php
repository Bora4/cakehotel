<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DepartingGuests Model
 *
 * @property \App\Model\Table\GuestsTable&\Cake\ORM\Association\BelongsTo $Guests
 *
 * @method \App\Model\Entity\DepartingGuest newEmptyEntity()
 * @method \App\Model\Entity\DepartingGuest newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\DepartingGuest[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DepartingGuest get($primaryKey, $options = [])
 * @method \App\Model\Entity\DepartingGuest findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\DepartingGuest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DepartingGuest[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DepartingGuest|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DepartingGuest saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DepartingGuest[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DepartingGuest[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\DepartingGuest[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DepartingGuest[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DepartingGuestsTable extends Table
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

        $this->setTable('departing_guests');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Guests', [
            'foreignKey' => 'guest_id',
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
            ->integer('guest_id')
            ->notEmptyString('guest_id');

        $validator
            ->date('guest_departure_date')
            ->requirePresence('guest_departure_date', 'create')
            ->notEmptyDate('guest_departure_date');

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
        $rules->add($rules->existsIn('guest_id', 'Guests'), ['errorField' => 'guest_id']);

        return $rules;
    }
}
