<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ClientsKw Controller
 *
 * @property \App\Model\Table\ClientsKwTable $ClientsKw
 * @method \App\Model\Entity\ClientsKw[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientsKwController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clients', 'Getrecords'],
        ];
        $clientsKw = $this->paginate($this->ClientsKw);

        $this->set(compact('clientsKw'));
    }

    /**
     * View method
     *
     * @param string|null $id Clients Kw id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clientsKw = $this->ClientsKw->get($id, [
            'contain' => ['Clients', 'Getrecords'],
        ]);

        $this->set(compact('clientsKw'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clientsKw = $this->ClientsKw->newEmptyEntity();
        if ($this->request->is('post')) {
            $clientsKw = $this->ClientsKw->patchEntity($clientsKw, $this->request->getData());
            if ($this->ClientsKw->save($clientsKw)) {
                $this->Flash->success(__('The clients kw has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The clients kw could not be saved. Please, try again.'));
        }
        $clients = $this->ClientsKw->Clients->find('list', ['limit' => 200]);
        $getrecords = $this->ClientsKw->Getrecords->find('list', ['limit' => 200]);
        $this->set(compact('clientsKw', 'clients', 'getrecords'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Clients Kw id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $clientsKw = $this->ClientsKw->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clientsKw = $this->ClientsKw->patchEntity($clientsKw, $this->request->getData());
            if ($this->ClientsKw->save($clientsKw)) {
                $this->Flash->success(__('The clients kw has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The clients kw could not be saved. Please, try again.'));
        }
        $clients = $this->ClientsKw->Clients->find('list', ['limit' => 200]);
        $getrecords = $this->ClientsKw->Getrecords->find('list', ['limit' => 200]);
        $this->set(compact('clientsKw', 'clients', 'getrecords'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Clients Kw id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clientsKw = $this->ClientsKw->get($id);
        if ($this->ClientsKw->delete($clientsKw)) {
            $this->Flash->success(__('The clients kw has been deleted.'));
        } else {
            $this->Flash->error(__('The clients kw could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
