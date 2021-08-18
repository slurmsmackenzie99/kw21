<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * SelfGov Controller
 *
 * @property \App\Model\Table\SelfGovTable $SelfGov
 * @method \App\Model\Entity\SelfGov[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SelfGovController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ksiegas'],
        ];
        $selfGov = $this->paginate($this->SelfGov);

        $this->set(compact('selfGov'));
    }

    /**
     * View method
     *
     * @param string|null $id Self Gov id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $selfGov = $this->SelfGov->get($id, [
            'contain' => ['Ksiegas'],
        ]);

        $this->set(compact('selfGov'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $selfGov = $this->SelfGov->newEmptyEntity();
        if ($this->request->is('post')) {
            $selfGov = $this->SelfGov->patchEntity($selfGov, $this->request->getData());
            if ($this->SelfGov->save($selfGov)) {
                $this->Flash->success(__('The self gov has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The self gov could not be saved. Please, try again.'));
        }
        $ksiegas = $this->SelfGov->Ksiegas->find('list', ['limit' => 200]);
        $this->set(compact('selfGov', 'ksiegas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Self Gov id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $selfGov = $this->SelfGov->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $selfGov = $this->SelfGov->patchEntity($selfGov, $this->request->getData());
            if ($this->SelfGov->save($selfGov)) {
                $this->Flash->success(__('The self gov has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The self gov could not be saved. Please, try again.'));
        }
        $ksiegas = $this->SelfGov->Ksiegas->find('list', ['limit' => 200]);
        $this->set(compact('selfGov', 'ksiegas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Self Gov id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $selfGov = $this->SelfGov->get($id);
        if ($this->SelfGov->delete($selfGov)) {
            $this->Flash->success(__('The self gov has been deleted.'));
        } else {
            $this->Flash->error(__('The self gov could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
