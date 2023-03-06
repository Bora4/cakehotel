<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Requests Controller
 *
 * @property \App\Model\Table\RequestsTable $Requests
 * @method \App\Model\Entity\Request[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RequestsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

     public function beforeFilter(\Cake\Event\EventInterface $event)
     {
         parent::beforeFilter($event);
         $this->Authentication->addUnauthenticatedActions(['add', 'back']); //bu sayfalar misafirler icin
         $result = $this->Authentication->getResult();
         if ($result->isValid()) {
         $this->viewBuilder()->setLayout('user');
         }
     }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Guests', 'Foods', 'Employees'],
        ];
        $requests = $this->paginate($this->Requests);

        $this->set(compact('requests'));
    }

    /**
     * View method
     *
     * @param string|null $id Request id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $request = $this->Requests->get($id, [
            'contain' => ['Guests', 'Foods', 'Employees'],
        ]);

        $this->set(compact('request'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('none');
        $current_guest = $this->request->getSession()->read('current_guest_id'); //Guests/login ile giris yapmis misafirimiz istek olustursun diye
        //daha ideal bir projede misafirlarin tamamen farkli bir uygulamasi isleri daha pratik ve duzenli yapardi
        $request = $this->Requests->newEmptyEntity();
        $this->set('current_guest', $current_guest);
        if ($this->request->is('post')) {
            $request = $this->Requests->patchEntity($request, $this->request->getData());
            $request['guest_id'] = $current_guest;
            if ($this->Requests->save($request)) {
                $this->Flash->success(__('The request has been created.'));
            } else {
                $this->Flash->error(__('The request could not be saved. Please, try again.'));}
            
        }
        $guests = $this->Requests->Guests->find('list', ['limit' => 200])->all();
        $foods = $this->Requests->Foods->find('list', ['limit' => 200])->all();
        $employees = $this->Requests->Employees->find('list', ['limit' => 200])->all();
        $this->set(compact('request', 'guests', 'foods', 'employees'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Request id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $request = $this->Requests->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $request = $this->Requests->patchEntity($request, $this->request->getData());
            if ($this->Requests->save($request)) {
                $this->Flash->success(__('The request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The request could not be saved. Please, try again.'));
        }
        $guests = $this->Requests->Guests->find('list', ['limit' => 200])->all();
        $foods = $this->Requests->Foods->find('list', ['limit' => 200])->all();
        $employees = $this->Requests->Employees->find('list', ['limit' => 200])->all();
        $this->set(compact('request', 'guests', 'foods', 'employees'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Request id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $request = $this->Requests->get($id);
        if ($this->Requests->delete($request)) {
            $this->Flash->success(__('The request has been deleted.'));
        } else {
            $this->Flash->error(__('The request could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function back(){ //suanlik kullanim disi
        $current_guest = $this->request->getSession()->read('current_guest_id');
        return $this->redirect(['controller' => 'Guests', 'action' => "service", $current_guest]);
    }
}
