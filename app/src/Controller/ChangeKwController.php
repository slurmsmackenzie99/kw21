<?php
declare(strict_types=1);
namespace App\Controller;

use Cake\Datasource\FactoryLocator;
use mpdf;

/**
 * ChangeKw Controller
 *
 * @property \App\Model\Table\ChangeKwTable $ChangeKw
 * @property \App\Model\Table\ClientsTable $Clients
 * @method \App\Model\Entity\Client[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 * @method \App\Model\Entity\ChangeKw[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChangeKwController extends AppController
{
    public $clientTableObj;

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->clientsTableObj = FactoryLocator::get('Table')->get('Clients');
    }

    public function generatereport()
    {
        //load clients to send to view
        $clients = $this->loadModel('Clients');
        $clientsKeyValue = $this->Clients->find('list', [
            'keyField' => 'id',
            'valueField' => 'client_email'
        ])->select(['id', 'client_email'])->all()->toArray();

        //after POST, choose the client to generate report for
        if ($this->request->is('post')) {
            $id = $this->request->getData('id');
            $client = $this->Clients->get($id, [
                'contain' => ['Getrecords'=>['ChangeKw']],
            ]);

            //report variables
            $date = date("d-m-Y");
            $clientEmail = $client->client_email; //should the rest be displayed if we've only got email?
            $clientName = $client->username . " " . $client->last_name;
            $clientID = $client->id;
            $numberOfChanges = '0'; //todo: find threaded data in getrecords->changekw
            $clientsGetrecords = $client->getrecords;

            //mpdf attributes
            $mpdf = new \Mpdf\Mpdf(['margin_left' => 20,'margin_right' => 15,'margin_top' => 48,'margin_bottom' => 25,'margin_header' => 10,'margin_footer' => 10]);
            $mpdf->SetProtection(array('print'));
            $mpdf->SetTitle("Monitoring Ksiąg Wieczytych - raport dla $clientEmail");
            $mpdf->SetAuthor("monitoringkw.pl");
            // $mpdf->SetWatermarkText("monitoringkw.pl");
            $mpdf->showWatermarkText = true;
            $mpdf->watermark_font = 'DejaVuSansCondensed';
            $mpdf->watermarkTextAlpha = 0.1;
            $mpdf->SetDisplayMode('fullpage');
           
            //get the number of monitored records, same as array length/count
            $numberOfMonitored = 0;
            foreach ($clientsGetrecords as $valueForEachLoop){
                $numberOfMonitored++;
            };

            
            //first part of the report
            $html = "<head>
                <style>
                table {
                    font-family: arial, sans-serif;
                    border-collapse: collapse;
                    width: 100%;
                }

                td, th {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 8px;
                }

                tr:nth-child(even) {
                    background-color: #dddddd;
                }
                th {
                    background-color: #dddddd;
                }
                </style>
            </head>
            <body>
            <h1>Raport ksiąg wieczystych na dzień ".$date ."</h1>
            <h2> Klient: " .$clientName ."<br> Email klienta: ". $clientEmail ."</h2>
            <p>Podsumowanie:
            <table>
                <tr>
                    <td> Zmiany zaobserwowane w księgach od czasu ostatniego sprawdzenia</td>
                    <td>".$numberOfChanges."</td>
                </tr>
                <tr>
                    <td> Ilość monitorowanych wpisów w księgach</td>
                    <td>".$numberOfMonitored."</td>
                </tr>
            </table>
            </p>
            ";  
            $mpdf->WriteHTML($html);
            
            
            //j is used for looping over every getrecord
            $j = 0;
            //arrayLength is used to make sure we cover all the records
            $arrayLength = count($clientsGetrecords);
            //if there's 3 records it loops 3 times

            while($j < $arrayLength){
                //TODO table headers adjustment, also it all should be a one table
                if($j == 0){
                    $html = "<br>
                    Obserwowane księgi oraz ich właściciele:
                    <table>
                       <tr>
                        <th>Księga</th>
                        <th>Właściciel nieruchomości</th>
                       </tr>
                    </table>";  
                    $mpdf->writeHTML($html);
                }
                
                $change = $clientsGetrecords[$j]->change_kw[0]->string_dzial_drugi; //only get the first change_kw
                
                $changeDecoded = json_decode($change, true);
                $ksiega = $changeDecoded["params"]["region"];

                $html = "
                <table>
                    <tr>
                        <td>" . $changeDecoded["params"]["region"] . "/" . $changeDecoded["params"]["numer"] . "/" .$changeDecoded["params"]["numerKontrolny"] . "</td>
                        <td>". $changeDecoded["wlasciciel"][0]["rodzaj"] . "</td>
                        <td>". $changeDecoded["wlasciciel"][0]["nazwaWlasciciela"] . "</td>
                    </tr>
                </table>
                ";
                $mpdf->WriteHTML($html);
                //this loop checks if the field is present (accessing array as key->value) (it does not)
                foreach($changeDecoded as $klucz=>$wartosc){
                    //display records as e.g. WA2M/232323/2
                    if($klucz == 'params'){
                        foreach($wartosc as $key=>$value){
                            $x = 0;
                            // for($x;$x<4;$x++){

                            //     if($x==3){
                            //         $mpdf->writeHTML($value);
                            //     }
                            // }
                            
                            
                            // $fool = '';
                            // if($key == 'region' || $key == 'numer'){
                            //     $fool .= $value . '/';
                            // }
                            // elseif($key == 'numerKontrolny'){
                            //     $fool .= $value . '/';
                            // }
                            // debug($wartosc);
                        }
                    }
                    
                    
                    if($klucz == 'wlasciciel'){
                        foreach($wartosc as $key=>$value){
                            // debug($wartosc);        
                        }
                    }
            
                    // $html = "<table>
                    // <tr>
                    // <td></td>
                    // <td></td>
                    // </tr>
                    // </table>
                    // ";
                    // $mpdf->writeHTML($html);
                    
                }
                $j++;
            } 

        $mpdf->Output();

        $this->viewBuilder()->setLayout('pdf'); //unncessary
        }
    $this->set(compact('clientsKeyValue', 'clients')); 
    }

    public function report()
    {
        // $foo = $this->$clientEmailForReport;
        // debug($clientEmailForReport);die;
        // $foo = $this->request->getData('clientEmailForReport');
        // debug($_POST);die;
        // debug($foo);die;
        // debug($clientEmailForReport);die;
        // $mpdf = new \Mpdf\Mpdf();

        // $mpdf->Bookmark('Start of the document');
        // $mpdf->WriteHTML('<h1>Hello world!</h1>');
        // $mpdf->Output();
        $clientName = 'Test test';
        $clientEmail = 'test@email.com';
        $numberOfChanges = '0';
        $numberOfMonitored = '1';
        $date = date("d-m-Y");

        $html = "<head>
        <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }

        tr:nth-child(even) {
          background-color: #dddddd;
        }
        </style>
        </head>
        <h1>Raport ksiąg wieczystych na dzień ".$date ."</h1>
        <h3> Klient: " .$clientName ."<br>
        Email klienta: ". $clientEmail ."</h3>
        <p>Podsumowanie:
            <table>
                <tr>
                    <td> Zmiany w obserwowanych wpisach w księgach od czasu ostatniego sprawdzenia</td>
                    <td>".$numberOfChanges."</td>
                </tr>
                <tr>
                    <td> Ilość monitorowanych wpisów w księgach</td>
                    <td>".$numberOfMonitored."</td>
                </tr>
            </table>
        <p>
            <table>
                <tr>
                    <th> Region</th>
                    <th> Numer księgi</th>
                    <th>Cyfra kontrolna</th>
                    <th>Właściciel nieruchomości</th>
                </tr>
                <tr>
                    <td> WA1G</td>
                    <td> 00069574</td>
                    <td> 3</td>
<td>Jednostka samorządu terytorialnego: MIASTO STOŁECZNE WARSZAWA, Siedziba: WARSZAWA; Osoba fizyczna, Ilość: 6, Osoby: MACIEJ LUNIAK PESEL, MAGDALENA LUNIAK PESEL, EWA MALEWICZ PESEL, IRENA LACHOWICZ PESEL, EWA MALEWICZ PESEL, EWA MALEWICZ PESEL</td>
            </table>
            
        </p>
        ";

        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 20,
            'margin_right' => 15,
            'margin_top' => 48,
            'margin_bottom' => 25,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);

        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("Monitoring Ksiąg Wieczytych - raport dla $clietEmail");
        // $mpdf->SetAuthor("Author");
        // $mpdf->SetWatermarkText("Monitoringkw.pl");
        $mpdf->showWatermarkText = true;
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');

        $mpdf->WriteHTML($html);

        $mpdf->Output();

        $this->viewBuilder()->setLayout('pdf');
    }

    public function pdf()
    {

        // $snappy = new Pdf('/usr/local/bin/wkhtmltopdf');

        // $snappy = new Pdf('/usr/local/bin/wkhtmltopdf');
        // header('Content-Type: application/pdf');
        // echo $snappy->getOutput('http://www.github.com');

        $changeKw = $this->paginate($this->ChangeKw);

        $this->set(compact('changeKw'));
    }
    public function renderpdf(){
//        $change = $this->ChangeKw->find()->all()->where(
//            count('getrecord_id' > 1);
//        );
//        $this->set('change', $change);

//        $change = $this->ChangeKw->find('all')
//            ->select(["getrecord_id"])
//            ->where(['1'])
//            ->having([" count(getrecord_id)>1"])
//            ->group(['getrecord_id'])
//            ->toArray();
        //this variable holds duplicate
        $change = $this->ChangeKw->find('all')
            ->select('ALL')
            ->where([
            'getrecord_id' => ($this->ChangeKw->find('all')->select('getrecord_id')->having(["count(getrecord_id)>1"])->group(['getrecord_id'])
            )])
            ->toArray();
       // debug($change);die;
        $this->set('change', $change);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $changeKw = $this->paginate($this->ChangeKw);

        $this->set(compact('changeKw'));
        //$test= $this->request->getQuery();
        //debug($test);
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