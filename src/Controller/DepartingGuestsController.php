<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * DepartingGuests Controller
 *
 * @property \App\Model\Table\DepartingGuestsTable $DepartingGuests
 * @property \App\Model\Table\OldGuestsTable $OldGuests
 * @method \App\Model\Entity\DepartingGuest[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DepartingGuestsController extends AppController
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
            'contain' => ['Guests'],
        ];
        $departingGuests = $this->paginate($this->DepartingGuests);

        $this->set(compact('departingGuests'));
    }

    /**
     * View method
     *
     * @param string|null $id Departing Guest id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $departingGuest = $this->DepartingGuests->get($id, [
            'contain' => ['Guests'],
        ]);

        $this->set(compact('departingGuest'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $departingGuest = $this->DepartingGuests->newEmptyEntity();
        if ($this->request->is('post')) {
            $departingGuest = $this->DepartingGuests->patchEntity($departingGuest, $this->request->getData());
            if ($this->DepartingGuests->save($departingGuest)) {
                $this->Flash->success(__('The departing guest has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The departing guest could not be saved. Please, try again.'));
        }
        $guests = $this->DepartingGuests->Guests->find('list', ['limit' => 200])->all();
        $this->set(compact('departingGuest', 'guests'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Departing Guest id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $departingGuest = $this->DepartingGuests->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $departingGuest = $this->DepartingGuests->patchEntity($departingGuest, $this->request->getData());
            if ($this->DepartingGuests->save($departingGuest)) {
                $this->Flash->success(__('The departing guest has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The departing guest could not be saved. Please, try again.'));
        }
        $guests = $this->DepartingGuests->Guests->find('list', ['limit' => 200])->all();
        $this->set(compact('departingGuest', 'guests'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Departing Guest id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // $this->request->allowMethod(['post', 'delete']); guvenlik icin bunu uncomment etmek daha iyi olur ama henuz depart() fonksiyonundan buraya delete veya post istegiyle gelmeyi ayarlayamadim
        $departingGuest = $this->DepartingGuests->get($id);
        if ($this->DepartingGuests->delete($departingGuest)) {
            $this->Flash->success(__('The departing guest has been deleted.'));
        } else {
            $this->Flash->error(__('The departing guest could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'OldGuests', 'action' => 'add']); //silinen misafiri eski misafirler tablosuna eklemek icin cagirir
    }

    public function depart($id=null, $guest_id = null){

        $this->request->getSession()->write('departing_guest_id', $guest_id); //sessiona ekler

        return $this->redirect(['action' => 'delete', $id]); //depart tablosundan silmek icin cagirir

    }
}
