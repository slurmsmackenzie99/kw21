<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * IndividualEntity Controller
 *
 * @property \App\Model\Table\IndividualEntityTable $IndividualEntity
 * @method \App\Model\Entity\IndividualEntity[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IndividualEntityController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $individualEntity = $this->paginate($this->IndividualEntity);

        $this->set(compact('individualEntity'));
    }

    /**
     * View method
     *
     * @param string|null $id Individual Entity id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $individualEntity = $this->IndividualEntity->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('individualEntity'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $individualEntity = $this->IndividualEntity->newEmptyEntity();
        if ($this->request->is('post')) {
            $individualEntity = $this->IndividualEntity->patchEntity($individualEntity, $this->request->getData());
            if ($this->IndividualEntity->save($individualEntity)) {
                $this->Flash->success(__('The individual entity has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The individual entity could not be saved. Please, try again.'));
        }
        $this->set(compact('individualEntity'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Individual Entity id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $individualEntity = $this->IndividualEntity->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $individualEntity = $this->IndividualEntity->patchEntity($individualEntity, $this->request->getData());
            if ($this->IndividualEntity->save($individualEntity)) {
                $this->Flash->success(__('The individual entity has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The individual entity could not be saved. Please, try again.'));
        }
        $this->set(compact('individualEntity'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Individual Entity id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $individualEntity = $this->IndividualEntity->get($id);
        if ($this->IndividualEntity->delete($individualEntity)) {
            $this->Flash->success(__('The individual entity has been deleted.'));
        } else {
            $this->Flash->error(__('The individual entity could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
