<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ChangeKw Controller
 *
 * @property \App\Model\Table\ChangeKwTable $ChangeKw
 * @method \App\Model\Entity\ChangeKw[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChangeKwController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $changeKw = $this->paginate($this->ChangeKw);

        $this->set(compact('changeKw'));
    }

    /**
     * View method
     *
     * @param string|null $id Change Kw id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $changeKw = $this->ChangeKw->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('changeKw'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $changeKw = $this->ChangeKw->newEmptyEntity();
        if ($this->request->is('post')) {
            $changeKw = $this->ChangeKw->patchEntity($changeKw, $this->request->getData());
            if ($this->ChangeKw->save($changeKw)) {
                $this->Flash->success(__('The change kw has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The change kw could not be saved. Please, try again.'));
        }
        $this->set(compact('changeKw'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Change Kw id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $changeKw = $this->ChangeKw->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $changeKw = $this->ChangeKw->patchEntity($changeKw, $this->request->getData());
            if ($this->ChangeKw->save($changeKw)) {
                $this->Flash->success(__('The change kw has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The change kw could not be saved. Please, try again.'));
        }
        $this->set(compact('changeKw'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Change Kw id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $changeKw = $this->ChangeKw->get($id);
        if ($this->ChangeKw->delete($changeKw)) {
            $this->Flash->success(__('The change kw has been deleted.'));
        } else {
            $this->Flash->error(__('The change kw could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function compare(){

    }
}
