<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Ksiega Controller
 *
 * @property \App\Model\Table\KsiegaTable $Ksiega
 * @method \App\Model\Entity\Ksiega[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class KsiegaController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['api', 'api_html']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $ksiega = $this->paginate($this->Ksiega);

        $this->set(compact('ksiega'));
    }

    /**
     * View method
     *
     * @param string|null $id Ksiega id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ksiega = $this->Ksiega->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('ksiega'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ksiega = $this->Ksiega->newEmptyEntity();
        if ($this->request->is('post')) {
            $ksiega = $this->Ksiega->patchEntity($ksiega, $this->request->getData());
            if ($this->Ksiega->save($ksiega)) {
                $this->Flash->success(__('The ksiega has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ksiega could not be saved. Please, try again.'));
        }
        $this->set(compact('ksiega'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ksiega id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ksiega = $this->Ksiega->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ksiega = $this->Ksiega->patchEntity($ksiega, $this->request->getData());
            if ($this->Ksiega->save($ksiega)) {
                $this->Flash->success(__('The ksiega has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ksiega could not be saved. Please, try again.'));
        }
        $this->set(compact('ksiega'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ksiega id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ksiega = $this->Ksiega->get($id);
        if ($this->Ksiega->delete($ksiega)) {
            $this->Flash->success(__('The ksiega has been deleted.'));
        } else {
            $this->Flash->error(__('The ksiega could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function api()
    {
        $this->viewBuilder()->enableAutoLayout(false);
        $onerecord = $this->Ksiega
            ->find()
            ->order(['id' => 'DESC'])
            ->first();
        $encoded = json_encode($onerecord);

        $ksiega = $this->paginate($this->Ksiega);
        $this->set(compact('ksiega', 'encoded'));
        return $this->render('api_html');
    }
}