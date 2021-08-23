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

    var $sections = [
        '2.2.1' => 'ownership',
        '2.2.2' => 'treasury',
        '2.2.3' => 'self_gov',
        '2.2.4' => 'company',
        '2.2.5' => 'individual',

    ];

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

    public function api()
    {
        $this->viewBuilder()->enableAutoLayout(false);
        $onerecord = $this->Getrecords
            ->find()
            ->order(['id' => 'DESC'])
            ->first();
        $encoded = json_encode($onerecord);

        $getrecords = $this->paginate($this->Getrecords);
        // $getrecords = $this->Getrecords->get($id);        
        $this->set(compact('getrecords', 'encoded', 'onerecord'));
        Log::debug($encoded);
        return $this->render('api_html');
    }

    public function receiver()
    {
        $data_str = file_get_contents('php://input'); //returns all data after HTTP headers of the request
        $data = json_decode($data_str, true);
        Log::debug('json', $data_str);
        debug($data);
//        echo $data;
        $getrecords = $this->paginate($this->Getrecords);
        $this->set(compact('getrecords'));
//        echo $this->request->getHeader('exampleHeaderName');
        $this->request->getData('');
    }

    //załóżmy że dostaję taki obiekt w odpowiedzi, moim zdaniem jest wpisać te wartości do bazy
    //w odpowiednie miejsca
    function tests()
    {
        //$data = QUERY from db?
        $data = [
            'params' => [
                'region' => 'WA1G',
                'numer' => '00079441',
                'numerKontrolny' => '5',
            ],
            '2.2.1' => [ //udzial
                0 => [
                    'numerUdzialu' => '1',
                    'wielkoscUdzialu' => '1 / 1',
                    'rodzajWspolnosci' => '---',
                ],
            ],
            '2.2.2' => [ //treasury
            ],
            '2.2.3' => [ //non-gov
            ],
            '2.2.4' => [ //company
                0 => [
                    'listaWskazan' => '1',
                    'nazwa' => 'BREVITER NIERUCHOMOŚCI SPÓŁKA Z OGRANICZONĄ ODPOWIEDZIALNOŚCIĄ',
                    'siedziba' => 'GRODZISK MAZOWIECKI',
                    'regon' => '---',
                    'stanPrzejsciowy' => '---',
                    'KRS' => '---',
                ],
            ],
            '2.2.5' => [ //individual
            ],
        ];

        $params = $data['params'];
        unset($data['params']);
        $result = [];
        foreach ($data as $k => $item) {
            if ($item) {
                $section = $this->sections[$k];
                $result[$section] = $item;
            };

        }
        debug($params);
        debug($result);
        die;

        //insert $data['params'] into ksiega
        $ksiegaTable = $this->getTableLocator()->get('Ksiega');
        $query = $ksiegaTable->query();
        $query->insert(['idKsiega', 'region', 'number', 'control_number'])
            ->values([
                'idKsiega' => 1,
                'region' => $params['region'],
                'number' => $params['numer'],
                'control_number' => $params['numerKontrolny']
            ])->execute();
    }
}
