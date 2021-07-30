<?php
declare(strict_types=1);

namespace App\Controller;

// use League\Csv\Reader;

/**
 * Ksiega Controller
 *
 * @property \App\Model\Table\KsiegaTable $Ksiega
 * @method \App\Model\Entity\Ksiega[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class KsiegaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        //nie działa pobieranie .csv z zewnętrznego linku (https://raw.githubusercontent.com/slurmsmackenzie99/external_csv_file/main/input.csv)
        //docelowo ma być nie-lokalnie
        // $csv = Reader::createFromPath('/var/www/vhosts/p.tt/kw21.g12.pw/app/src/Model/input.csv', 'r');
        // $csv->setHeaderOffset(0);

        // $header = $csv->getHeader(); //returns the CSV header record
        // $records = $csv->getRecords(); //returns all the CSV records as an Iterator object

        // echo $csv->toString(); //returns the CSV document as a string


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

    public function form($id = null)
    {
        //upload file to document in like region, number, control_number? split
        //loop for as many times as there is entries
        $document = $this->Ksiega->newEmptyEntity();
        if($this->request->is('post')){
            $document = $this->Ksiega->patchEntity($document, $this->request->getData());
            if ($this->Ksiega->save($document)) {
                $this->Flash->success(__('The record has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The record could not be saved. Please, try again.'));
        }
        $this->set(compact('document'));
    }
}
