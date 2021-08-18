<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Sectiontwo Controller
 *
 * @property \App\Model\Table\SectiontwoTable $Sectiontwo
 * @method \App\Model\Entity\Sectiontwo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SectiontwoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $sectiontwo = $this->paginate($this->Sectiontwo);

        $this->set(compact('sectiontwo'));
    }

    /**
     * View method
     *
     * @param string|null $id Sectiontwo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sectiontwo = $this->Sectiontwo->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('sectiontwo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sectiontwo = $this->Sectiontwo->newEmptyEntity();
        if ($this->request->is('post')) {
            $sectiontwo = $this->Sectiontwo->patchEntity($sectiontwo, $this->request->getData());
            if ($this->Sectiontwo->save($sectiontwo)) {
                $this->Flash->success(__('The sectiontwo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sectiontwo could not be saved. Please, try again.'));
        }
        $this->set(compact('sectiontwo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sectiontwo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sectiontwo = $this->Sectiontwo->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sectiontwo = $this->Sectiontwo->patchEntity($sectiontwo, $this->request->getData());
            if ($this->Sectiontwo->save($sectiontwo)) {
                $this->Flash->success(__('The sectiontwo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sectiontwo could not be saved. Please, try again.'));
        }
        $this->set(compact('sectiontwo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sectiontwo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sectiontwo = $this->Sectiontwo->get($id);
        if ($this->Sectiontwo->delete($sectiontwo)) {
            $this->Flash->success(__('The sectiontwo has been deleted.'));
        } else {
            $this->Flash->error(__('The sectiontwo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
