<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients
 * @method \App\Model\Entity\Client[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
//        if($this->request){
//
//           $req= $this->Articles->find('all')->where(
//               ['published' => true]
//           );
//        }
        $clients = $this->paginate($this->Clients);

        $this->set(compact('clients'));
    }

    /**
     * View method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => ['ClientsKw', 'Getrecords', 'Results'],
        ]);

        $clients = $this->Clients->query();

        $this->set(compact('client'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $client = $this->Clients->newEmptyEntity();
        if ($this->request->is('post')) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client could not be saved. Please, try again.'));
        }
        $this->set(compact('client'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client could not be saved. Please, try again.'));
        }
        $this->set(compact('client'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $client = $this->Clients->get($id);
        if ($this->Clients->delete($client)) {
            $this->Flash->success(__('The client has been deleted.'));
        } else {
            $this->Flash->error(__('The client could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function search()
    {
        //clients
        $id = $this->request->getQuery('id');
        if($id){
            $query = $this->Clients->find('all')->contain([
                    'Getrecords'=>['ClientsKw']
                ])->where(['id like' => $id]);
            } else {
                $query = $this->Clients;
            }
        /*
            $query = $this->Clients->find('all')
                ->where(['id like'=>$id]);
            }else{
                $query = $this->Clients;
            }
        */

        //getrecords
        $this->loadModel('Getrecords');
        $changeKws=[];
        if($id){
            $queryTwo = $this->Getrecords->find('all')
            ->where(['client_id like'=> $id]); //save getrecord.id and pass it to change_kw query

            $this->loadModel('ChangeKw');

            $changeKws = $this->ChangeKw->find('all')->contain([
                    'Getrecords'=>['Clients']
                ]
            )
                ->where(['Clients.id'=> $id ]); //retrieve getrecords.id from previous result


        }else{
            $queryTwo = $this->Getrecords;
        }


        //change_kw where getrecords_id = result getrecords.client_id


        $client = $this->paginate($query);
        $clients = $this->paginate($this->Clients);

        $getrecord = $this->paginate($queryTwo);

        $this->set(compact('client','clients', 'changeKws', 'getrecord'));
    }
}
