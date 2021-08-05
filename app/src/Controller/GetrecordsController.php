<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;
use Cake\Event\EventInterface;
use Cake\Core\Configure;
use Cake\Log\Log;
// use Cake\Log\Engine\BaseLog;
// use Psr\Log\LoggerInterface;

/**
 * Getrecords Controller
 *
 * @property \App\Model\Table\GetrecordsTable $Getrecords
 * @method \App\Model\Entity\Getrecord[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GetrecordsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $getrecords = $this->paginate($this->Getrecords);

        $this->set(compact('getrecords'));
    }

    /**
     * View method
     *
     * @param string|null $id Getrecord id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $getrecord = $this->Getrecords->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('getrecord'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $getrecord = $this->Getrecords->newEmptyEntity();
        if ($this->request->is('post')) {
            $getrecord = $this->Getrecords->patchEntity($getrecord, $this->request->getData());
            if ($this->Getrecords->save($getrecord)) {
                $this->Flash->success(__('The getrecord has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The getrecord could not be saved. Please, try again.'));
        }
        $this->set(compact('getrecord'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Getrecord id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $getrecord = $this->Getrecords->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $getrecord = $this->Getrecords->patchEntity($getrecord, $this->request->getData());
            if ($this->Getrecords->save($getrecord)) {
                $this->Flash->success(__('The getrecord has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The getrecord could not be saved. Please, try again.'));
        }
        $this->set(compact('getrecord'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Getrecord id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $getrecord = $this->Getrecords->get($id);
        if ($this->Getrecords->delete($getrecord)) {
            $this->Flash->success(__('The getrecord has been deleted.'));
        } else {
            $this->Flash->error(__('The getrecord could not be deleted. Please, try again.'));
        }

        
        return $this->redirect(['action' => 'index']);
    }

    // public function beforeFilter(EventInterface $event)
    // {
    //     parent::beforeFilter($event);
    //     $this->Security->setConfig('unlockedActions', ['index']);
    // }

    //api shows one record values to the extension that inputs them
    public function api(){
        //fetch records to check from the database (from getrecords)
        // $getrecord = $this->Getrecords->get($id, [
        //     'contain' => [],
        // ]);
        // $connection = ConnectionManager::get('default');
        // $results = $connection->execute('SELECT * FROM getrecords')
        // ->fetchAll('assoc');
        // echo $results;

        // $query = $this->Getrecords->execute('SELECT * FROM getrecords LIMIT 1');
        // $this->layout = false;
        $this->viewBuilder()->enableAutoLayout(false);
        $onerecord = $this->Getrecords->find()->where(['id' => 1])->all(); //get latest(id DESC) limit 1
        //najwyższe id jest najnowsze
        $onerecord = $this->Getrecords
            ->find()
            ->order(['id' => 'DESC'])
            ->first();

        $encoded = json_encode($onerecord);
        $env = $this->request->getServerParams();

        $getrecords = $this->paginate($this->Getrecords);
        $this->set(compact('getrecords', 'onerecord', 'encoded', 'env'));
        Log::debug($encoded);
        // $this->set(compact('getrecord'));
    }

    public function receiver(){
        $data_str = file_get_contents('php://input');
        $data = json_decode($data_str, true);
        // Log::debug('cos');
        Log::debug('json','sgsdgsdg');
        Log::debug('json',$data_str);
        debug($data);
        echo $data;
        debug($_POST);
        $getrecords = $this->paginate($this->Getrecords);
        $this->set(compact('getrecords'));
        //receive a JSON response from the extension
        // echo $this->request->getHeader('x-cos-x'); //array to string conversion warning
        echo $this->request->getHeader('exampleHeaderName'); //array to string conversion warning

        //get request, perform operation, return the response
        $this->request->getData('');

       // <div data-json="{'nr':'asdas',}" ><button>find dis </button></div>
      //  <div data-json="{'nr':'asdas',}" ><button>find dis </button></div>
    }
}
