<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Changekw;
use App\Model\Entity\Document;
use Cake\Controller\ComponentRegistry;
use Cake\Event\EventManagerInterface;
use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Cake\Log\Log;
use Cake\I18n\Time;
use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\Datasource\FactoryLocator;

//use Cake\ORM\ResultSet;
use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\Writer;
use League\Csv\TabularDataReader;
use League\Csv\ResultSet;
/**
 * Getrecords Controller
 *
 * @property \App\Model\Table\GetrecordsTable $Getrecords
 * @method \App\Model\Entity\Getrecord[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GetrecordsController extends AppController
{
    var $clientVar;
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clients'],
        ];
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
            'contain' => ['Clients'],
        ]);

        $this->set(compact('getrecord'));
    }
    public function addcsv()
    {
        if($this->request->is('post')) {
            $postData = $this->request->getData();
            $file = $this->request->getData('upload_file');
            // $name = $file->getFilename();
            $name = '3';
            $type = $file->getClientMediaType();
            $targetPath = WWW_ROOT. 'documents'. DS . 'post_document'. DS. $name;
            if($file->getError() == 0 && $type == 'text/csv'){
                $file->moveTo($targetPath);
                $postData['upload_file'] = $name;
            }
            //$file = Reader::createFromFileObject($file)->setHeaderOffset(0);
            debug(gettype($file));
            debug($file);
//            $csv = Reader::createFromPath($file)->setHeaderOffset(0);
//            $csv = Writer::createFromFileObject($file);
//            $csv = $file;
            $csv = json_encode($file);
            debug($csv);

//            foreach($csv as $record){
//                echo
//            }
            $stmt = Statement::create()->offset(1)->limit(20);
//            $records = $stmt->process($csv);
//            foreach ($records as $record){
//                debug($record);
//            }
//            debug($csv);
            die;
        }
    }
    
    public $csvTableObj;
    public function addcsvtwo()
    {
        $this->clientVar;
        $csvEntity = $this->csvTableObj->newEmptyEntity();
        $getrecord = $this->Getrecords->newEmptyEntity();
        if ($this->request->is('post')) {
            $csvData = $this->request->getData();
            $csvSpreadsheet = $this->request->getData('csv_spreadsheet');
            $clientid = $this->request->getData('id');

            $clientVar = $clientid; //$this?

            $name = $csvSpreadsheet->getClientFilename();
            $type = $csvSpreadsheet->getClientMediaType();
            $targetPath = WWW_ROOT . 'documents' . DS . 'post_document' . DS . $clientid . '.csv';
            $flag = true; //TODO: use it to check the file type
            if ($flag) {
                $csvSpreadsheet->moveTo($targetPath);
                $csvData['csv_spreadsheet'] = $name;
                $csvData['client_id'] = $clientid;
            }

            $csv = $this->csvTableObj->patchEntity($csvEntity, $csvData);

            if ($this->csvTableObj->save($csv)) {
                $this->Flash->success(__('Your csv has been saved.'));

                //return $this->redirect(['action' => 'manipulatecsv']);
                $this->manipulatecsv($clientid);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The csv could not be saved. Please, try again.'));
        }
        //$clients = $this->Getrecords->Clients->find('list', ['limit' => 200]);

        $this->set(compact('csvEntity', $csvEntity)); //add $csvEntity?
    }

    public function manipulatecsv($clientid = false)
    {
        //list of clients
        $clients = $this->getTableLocator()->get('Clients');
//Log::debug($clientid);
        $getrecordsTable = $this->getTableLocator()->get('Getrecords');
       // $clientid = $clientVar; //where do i get clientid from? from the form
        $filename = $clientid . ".csv";
        $targetPath = WWW_ROOT . 'documents' . DS . 'post_document' . DS . $filename;
       // $csv =file_get_contents($targetPath);
       // Log::debug($csv);

        $csv = Reader::createFromPath($targetPath, 'r');
        //$csv->
       // Log::debug(print_r($csv,true));
        //what if there is more than 1?
        $records = $csv->getRecords();
        foreach ($records as $offset => $record) {
            $getrecord = $this->Getrecords->newEmptyEntity();
            $getrecord->client_id = $clientid; //TODO: client_id is in the filename
            $getrecord->region = $record[0];
            $getrecord->number = $record[1];
            $getrecord->control_number = $record[2];

            $getrecordsTable->save($getrecord);

//            var_dump($record[0]);
//            var_dump($record[1]);
//            var_dump($record[2]);
        }
        $this->set(compact($clientid));

    }
    public function displayamount(){
        $this->viewBuilder()->enableAutoLayout(false);
        $var = $this->Getrecords->find()->count('geterecords');
       $this->set('var', $var);
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
        $clients = $this->Getrecords->Clients->find('list', ['limit' => 200]);
        $this->set(compact('getrecord', 'clients'));
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
        $clients = $this->Getrecords->Clients->find('list', ['limit' => 200]);
        $this->set(compact('getrecord', 'clients'));
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
        $this->set(compact('getrecords', 'encoded', 'onerecord'));
        return $this->render('api_html');
    }

    public function receiver()
    {
        $jsonData = $this->request->input('json_decode', true);

        //id
        $id_record_from_json = $jsonData["idrecord"];
        //$my_id = json_encode($jsonData["idrecord"]);
        $my_id = intval($id_record_from_json);

        //serializedData
        $sds = json_encode($jsonData["serializedData"]);
        $md5 = md5($sds);
        $sd = json_decode($sds, true);
        // $sd = implode(", ", $sd);

        $getrecordsTable = $this->getTableLocator()->get('Getrecords');
        $getrecords = $getrecordsTable->get($my_id);

        //ChangeKw
        $flag = false;
        $flagTwo = false;
        $changeKw = $this->getTableLocator()->get('ChangeKw');
        $query = $changeKw->query();
        $result = $query->find('all')->where(['getrecord_id' => $my_id])->all();

        if($result->count()!==0){
            foreach ($result as $hash) {
            }
            $global_md5 = $hash->md5; //$global_md5 contains md5 from the last result
            if($global_md5 == $md5){
                $flag = false; //if md5s are the same, then string_dzial_drugi is the same, TODO record only time change(?)
                $flagTwo = true; //update the check date to now, leave rest unchanged
            } else{
                $flag = true; //md5s are different, write in the database
            }
        }else{
            $flag = true;
        }

        //if md5 are different record the current version
        if($flag){
            $query->insert(['getrecord_id', 'last_checked', 'string_dzial_drugi', 'counter', 'md5'])
                ->values([
                    'getrecord_id' => $my_id,
                    'last_checked' => Time::now(),
                    'string_dzial_drugi' => $sds,
                    'counter' => 2,
                    'md5' => $md5
                ])->execute();

            $getrecords->done = 1;
            $getrecordsTable->save($getrecords);
        }

        if($flagTwo){
            
        }

        /*
        if($id_located_result && $id_located_result->md5 === $md5){
            //then nothing changed, dont insert the record
            echo "Nothing changed in the record";
        } else {
            $query->insert(['getrecord_id', 'last_checked', 'string_dzial_drugi', 'counter', 'md5'])
                ->values([
                    // id => $idFromJson,
                    'getrecord_id' => $my_id,
                    //  'client_id' => $getrecords->client_id,
                    'last_checked' => Time::now(),
                    'string_dzial_drugi' => $sds,
                    'counter' => 2, //TODO: counter should increase when md5 is different than before
                    'md5' => $md5
                ])->execute();

            $getrecords->done = 1;
            $getrecordsTable->save($getrecords);
        }
        */
        //changes done status from 0 to 1 upon completion
        // $getrecordsTable = $this->getTableLocator()->get('Getrecords');
        //  $getrecords = $getrecordsTable->get($my_id);

        $getrecords = $this->paginate($this->Getrecords);
        $this->set(compact('getrecords'));
    }

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

    public function test3(){
        $str='{"serializedData":{"params":{"region":"SZ1S","numer":"00070029","numerKontrolny":"2"},"2.2.1":[{"numerUdzialu":"1","wielkoscUdzialu":"1 / 1","rodzajWspolnosci":"---"}],"2.2.2":[],"2.2.3":[],"2.2.4":[],"2.2.5":[{"listaWskazan":"1","imiePierwsze":"JANUSZ","imieDrugie":"---","nazwisko":"CIAPUTA","drugiCzlonNazwisko":"---","imieOjca":"WŁADYSŁAW","imieMatki":"LEOKADIA","pesel":"---"}]},"idrecord":"7"}';
        $jsonData = json_decode($str,true);
        debug($jsonData["serializedData"]);
        $jsonData = json_decode($str);
        $sd = json_encode($jsonData->serializedData);
        debug($sd);
        echo $sd;
        echo md5($sd);
        $jsonData = json_decode($str);
        debug($jsonData);
        echo "jsonData data type is: " . gettype($jsonData);
        $ser = $jsonData->serializedData;
        echo "<br>";
        echo "ser data type is: " . gettype($ser);
        // $ser = serialize($ser);
        // echo $jsonData->serializedData;
        $my_id = $jsonData->idrecord;
        echo "<br>";
        echo "my_id data type is: " . gettype($my_id);

        $para= $jsonData->serializedData->params;
        $key = "2.2.1";
        $cos = $jsonData->serializedData->$key;
        debug($cos);
        echo $jsonData->idrecord;
        die;
    }

    public function test4() {
        $str='{"serializedData":{"params":{"region":"WA1G","numer":"00010199","numerKontrolny":"2"},"2.2.1":[{"numerUdzialu":"1","wielkoscUdzialu":"1 / 1","rodzajWspolnosci":"---"},{"numerUdzialu":"2","wielkoscUdzialu":"1 / 1","rodzajWspolnosci":"---"}],"2.2.2":[],"2.2.3":[],"2.2.4":[],"2.2.5":[{"listaWskazan":"1","imiePierwsze":"MARIA","imieDrugie":"---","nazwisko":"BORDZI\u0141OWSKA","drugiCzlonNazwisko":"---","imieOjca":"W\u0141ADYS\u0141AW","imieMatki":"APOLONIA","pesel":"---"},{"listaWskazan":"2","imiePierwsze":"KRZYSZTOF","imieDrugie":"PAWE\u0141","nazwisko":"POGORZELSKI","drugiCzlonNazwisko":"---","imieOjca":"---","imieMatki":"---","pesel":"85071719370"}]},"idrecord":"80"}';
        $jsonData = json_decode($str);
        $sd = json_encode($jsonData->serializedData);

        //get idrecord
        //see if idrecord present in the table
        //if present compare md5

        $md5 = md5($sd);
        $global_md5 = '';
        $my_id = $jsonData->idrecord;

        $changeKw = $this->getTableLocator()->get('ChangeKw');
        $query = $changeKw->query();
        $result = $query->find('all')->where(['getrecord_id' => $my_id])->all();

        if($result->count()!==0){
            foreach ($result as $hash) {
            }
            $global_md5 = $hash->md5;
            }else{
            echo "No matching record found";
        }
        debug($global_md5);
        debug($md5);
        if($md5 !== $global_md5){
            //write into file
        } else {
            echo "MD5s are the same";
        }


//        debug($result[0]->id);
//        $previous_md5 = $result['md5'];
//        debug($previous_md5);
        debug($result);
//        echo $result;
        die;

//        $query = $changeKw->query();
//        $query = $changeKw->find('all')->where([
//            'getrecord_id' => 85
//        ])->execute();
//        echo $query;
//        debug($query);

        $para= $jsonData->serializedData->params;
        $key = "2.2.1";
        $cos = $jsonData->serializedData->$key;
        debug($cos);
        $idr = $jsonData->idrecord;
        echo $jsonData->idrecord;
    }
    public function script(){
        
    }
}
