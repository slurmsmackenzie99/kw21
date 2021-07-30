<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * UsersKw Controller
 *
 * @property \App\Model\Table\UsersKwTable $UsersKw
 * @method \App\Model\Entity\UsersKw[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersKwController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $usersKw = $this->paginate($this->UsersKw);

        $this->set(compact('usersKw'));
    }

    /**
     * View method
     *
     * @param string|null $id Users Kw id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersKw = $this->UsersKw->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('usersKw'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersKw = $this->UsersKw->newEmptyEntity();
        if ($this->request->is('post')) {
            $usersKw = $this->UsersKw->patchEntity($usersKw, $this->request->getData());
            if ($this->UsersKw->save($usersKw)) {
                $this->Flash->success(__('The users kw has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users kw could not be saved. Please, try again.'));
        }
        $this->set(compact('usersKw'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Kw id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersKw = $this->UsersKw->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersKw = $this->UsersKw->patchEntity($usersKw, $this->request->getData());
            if ($this->UsersKw->save($usersKw)) {
                $this->Flash->success(__('The users kw has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users kw could not be saved. Please, try again.'));
        }
        $this->set(compact('usersKw'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Kw id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersKw = $this->UsersKw->get($id);
        if ($this->UsersKw->delete($usersKw)) {
            $this->Flash->success(__('The users kw has been deleted.'));
        } else {
            $this->Flash->error(__('The users kw could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
