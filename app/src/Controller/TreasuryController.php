<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Treasury Controller
 *
 * @property \App\Model\Table\TreasuryTable $Treasury
 * @method \App\Model\Entity\Treasury[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TreasuryController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $treasury = $this->paginate($this->Treasury);

        $this->set(compact('treasury'));
    }

    /**
     * View method
     *
     * @param string|null $id Treasury id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $treasury = $this->Treasury->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('treasury'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $treasury = $this->Treasury->newEmptyEntity();
        if ($this->request->is('post')) {
            $treasury = $this->Treasury->patchEntity($treasury, $this->request->getData());
            if ($this->Treasury->save($treasury)) {
                $this->Flash->success(__('The treasury has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The treasury could not be saved. Please, try again.'));
        }
        $this->set(compact('treasury'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Treasury id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $treasury = $this->Treasury->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $treasury = $this->Treasury->patchEntity($treasury, $this->request->getData());
            if ($this->Treasury->save($treasury)) {
                $this->Flash->success(__('The treasury has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The treasury could not be saved. Please, try again.'));
        }
        $this->set(compact('treasury'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Treasury id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $treasury = $this->Treasury->get($id);
        if ($this->Treasury->delete($treasury)) {
            $this->Flash->success(__('The treasury has been deleted.'));
        } else {
            $this->Flash->error(__('The treasury could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
