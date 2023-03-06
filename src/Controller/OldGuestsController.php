<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * OldGuests Controller
 *
 * @property \App\Model\Table\OldGuestsTable $OldGuests
 * @property \App\Model\Table\GuestsTable $Guests
 * @method \App\Model\Entity\OldGuest[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OldGuestsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
        
     public function beforeFilter(\Cake\Event\EventInterface $event)
     {
         parent::beforeFilter($event);
         $result = $this->Authentication->getResult();
         if ($result->isValid()) {
         $this->viewBuilder()->setLayout('user');
         }
     }
 
    public function index()
    {
        $this->paginate = [
            'contain' => [],
        ];
        $oldGuests = $this->paginate($this->OldGuests);

        $this->set(compact('oldGuests'));
    }

    /**
     * View method
     *
     * @param string|null $id Old Guest id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $oldGuest = $this->OldGuests->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('oldGuest'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $oldGuest = $this->OldGuests->newEmptyEntity();
        $departing_guest_id = $this->request->getSession()->read('departing_guest_id');
        $this->request->getSession()->write('departing_guest_id', null);
        $guests = $this->getTableLocator()->get('Guests');
        $departing_guest = $guests->get($departing_guest_id);
        $arr = array('guest_id' => $departing_guest['id'], 'guest_name' => $departing_guest['name'], 'guest_age' => '0', 'guest_room_id' => $departing_guest['room_id'], 'guest_entry_date' => $departing_guest['entry_date'], 'guest_departure_date' => $departing_guest['departure_date'], 'guest' => $departing_guest);   
        // patchEntity fonksiyonu array istedigi icin $departing_guest Entitysinin icindeki verileri bir arraya aktardim.
        // bunu yapmanin muhtemelen daha pratik bir yolu vardir
        $oldGuest = $this->OldGuests->patchEntity($oldGuest, $arr);
            if ($this->OldGuests->save($oldGuest)) {
                $this->Flash->success(__('The old guest has been saved.'));
                $departing_guest_id = intval($departing_guest_id);
                return $this->redirect(['controller' => 'Guests', 'action' => 'delete', $departing_guest_id]); //misafir old guests tablosuna eklenince guests tablosundan silinir
            }
            $this->Flash->error(__('The old guest could not be saved. Please, try again.'));
        // $guests = $this->OldGuests->Guests->find('list', ['limit' => 200])->all();
        // $this->set(compact('oldGuest', 'guests')); //otomatik olusturulan kodu comment out yaptim cunku kullanicilarin kafasina gore girip old guests tablosuna veri girmesini istemiyorum
    }

    /**
     * Edit method
     *
     * @param string|null $id Old Guest id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $oldGuest = $this->OldGuests->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $oldGuest = $this->OldGuests->patchEntity($oldGuest, $this->request->getData());
            if ($this->OldGuests->save($oldGuest)) {
                $this->Flash->success(__('The old guest has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The old guest could not be saved. Please, try again.'));
        }
        $guests = $this->OldGuests->Guests->find('list', ['limit' => 200])->all();
        $this->set(compact('oldGuest', 'guests'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Old Guest id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $oldGuest = $this->OldGuests->get($id);
        if ($this->OldGuests->delete($oldGuest)) {
            $this->Flash->success(__('The old guest has been deleted.'));
        } else {
            $this->Flash->error(__('The old guest could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
