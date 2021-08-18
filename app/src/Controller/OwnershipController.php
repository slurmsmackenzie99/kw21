<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Ownership Controller
 *
 * @property \App\Model\Table\OwnershipTable $Ownership
 * @method \App\Model\Entity\Ownership[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OwnershipController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $ownership = $this->paginate($this->Ownership);

        $this->set(compact('ownership'));
    }

    /**
     * View method
     *
     * @param string|null $id Ownership id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ownership = $this->Ownership->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('ownership'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ownership = $this->Ownership->newEmptyEntity();
        if ($this->request->is('post')) {
            $ownership = $this->Ownership->patchEntity($ownership, $this->request->getData());
            if ($this->Ownership->save($ownership)) {
                $this->Flash->success(__('The ownership has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ownership could not be saved. Please, try again.'));
        }
        $this->set(compact('ownership'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ownership id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ownership = $this->Ownership->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ownership = $this->Ownership->patchEntity($ownership, $this->request->getData());
            if ($this->Ownership->save($ownership)) {
                $this->Flash->success(__('The ownership has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ownership could not be saved. Please, try again.'));
        }
        $this->set(compact('ownership'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ownership id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ownership = $this->Ownership->get($id);
        if ($this->Ownership->delete($ownership)) {
            $this->Flash->success(__('The ownership has been deleted.'));
        } else {
            $this->Flash->error(__('The ownership could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
