<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Guests Model
 *
 * @property \App\Model\Table\RoomsTable&\Cake\ORM\Association\BelongsTo $Rooms
 * @property \App\Model\Table\DepartingGuestsTable&\Cake\ORM\Association\HasMany $DepartingGuests
 * @property \App\Model\Table\OldGuestsTable&\Cake\ORM\Association\HasMany $OldGuests
 * @property \App\Model\Table\RequestsTable&\Cake\ORM\Association\HasMany $Requests
 *
 * @method \App\Model\Entity\Guest newEmptyEntity()
 * @method \App\Model\Entity\Guest newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Guest[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Guest get($primaryKey, $options = [])
 * @method \App\Model\Entity\Guest findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Guest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Guest[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Guest|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Guest saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Guest[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Guest[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Guest[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Guest[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class GuestsTable extends Table
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

        $this->setTable('guests');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Rooms', [
            'foreignKey' => 'room_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('DepartingGuests', [
            'foreignKey' => 'guest_id',
        ]);
        $this->hasMany('OldGuests', [
            'foreignKey' => 'guest_id',
        ]);
        $this->hasMany('Requests', [
            'foreignKey' => 'guest_id',
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
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('room_id')
            ->notEmptyString('room_id');

        $validator
            ->date('entry_date')
            ->requirePresence('entry_date', 'create')
            ->notEmptyDate('entry_date');

        $validator
            ->date('departure_date')
            ->requirePresence('departure_date', 'create')
            ->notEmptyDate('departure_date');

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
        $rules->add($rules->existsIn('room_id', 'Rooms'), ['errorField' => 'room_id']);

        return $rules;
    }
}
