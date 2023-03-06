<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OldGuests Model
 *
 * @property \App\Model\Table\GuestsTable&\Cake\ORM\Association\BelongsTo $Guests
 *
 * @method \App\Model\Entity\OldGuest newEmptyEntity()
 * @method \App\Model\Entity\OldGuest newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\OldGuest[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OldGuest get($primaryKey, $options = [])
 * @method \App\Model\Entity\OldGuest findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\OldGuest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OldGuest[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\OldGuest|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OldGuest saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OldGuest[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OldGuest[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\OldGuest[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OldGuest[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class OldGuestsTable extends Table
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

        $this->setTable('old_guests');
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
            ->scalar('guest_name')
            ->maxLength('guest_name', 50)
            ->requirePresence('guest_name', 'create')
            ->notEmptyString('guest_name');

        $validator
            ->integer('guest_age')
            ->requirePresence('guest_age', 'create')
            ->notEmptyString('guest_age');

        $validator
            ->integer('guest_room_id')
            ->requirePresence('guest_room_id', 'create')
            ->notEmptyString('guest_room_id');

        $validator
            ->date('guest_entry_date')
            ->requirePresence('guest_entry_date', 'create')
            ->notEmptyDate('guest_entry_date');

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
