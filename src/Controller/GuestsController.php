<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Guests Controller
 *
 * @property \App\Model\Table\GuestsTable $Guests
 * @method \App\Model\Entity\Guest[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GuestsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login', 'add']);
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
        $this->viewBuilder()->setLayout('user');
        }
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Rooms'],
        ];
        $guests = $this->paginate($this->Guests);

        $this->set(compact('guests'));
    }

    /**
     * View method
     *
     * @param string|null $id Guest id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $guest = $this->Guests->get($id, [
            'contain' => ['Rooms', 'DepartingGuests', 'OldGuests', 'Requests'],
        ]);

        $this->set(compact('guest'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $guest = $this->Guests->newEmptyEntity();
        if ($this->request->is('post')) {
            $guest = $this->Guests->patchEntity($guest, $this->request->getData());
            if ($this->Guests->save($guest)) {
                $this->Flash->success(__('The guest has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The guest could not be saved. Please, try again.'));
        }
        $rooms = $this->Guests->Rooms->find('list', ['limit' => 200])->all();
        $this->set(compact('guest', 'rooms'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Guest id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $guest = $this->Guests->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $guest = $this->Guests->patchEntity($guest, $this->request->getData());
            if ($this->Guests->save($guest)) {
                $this->Flash->success(__('The guest has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The guest could not be saved. Please, try again.'));
        }
        $rooms = $this->Guests->Rooms->find('list', ['limit' => 200])->all();
        $this->set(compact('guest', 'rooms'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Guest id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // $this->request->allowMethod(['post', 'delete']);
        $guest = $this->Guests->get($id);
        if ($this->Guests->delete($guest)) {
            $this->Flash->success(__('The guest has been deleted.'));
            $requests = $this->getTableLocator()->get('Requests'); 
            $query = $requests->query();
            $query->delete()->where(['guest_id' => $id])->execute(); //guest silinince olusturdugu requestler de silinmesi icin veritabanina istekte bulunur
        } else {
            $this->Flash->error(__('The guest could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function login(){

        if ($this->request->is(['patch', 'post', 'put'])) {     
            $export = $this->request->getData('my_button');
             if (isset($export)) {
               $var = $this->request->getData();
               $guest_id = $var['ID'];
               $this->request->getSession()->write('current_guest_id', $guest_id);
               return $this->redirect(['action' => 'service', $guest_id]);
             }
            }
            $this->viewBuilder()->setLayout('login');
        $this->render();
        
    }

    public function service($id){

        
        $guest = $this->Guests->get($id, [
            'contain' => ['Rooms'],
        ]);
        
        $this->viewBuilder()->setLayout('none');
        $this->set(compact('guest'));

        
    }
}
